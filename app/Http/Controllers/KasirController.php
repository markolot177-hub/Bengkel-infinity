<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Transaksi;
use App\Models\Sparepart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\ValidationException;

class KasirController extends Controller
{
    public function bayar(Request $request, string|int $id)
    {
        // 1. Validasi input dari form POS
        $request->validate([
            'biaya_jasa'        => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|string',
            'barang_id'         => 'nullable|array',
            'barang_id.*'       => 'integer',
            'qty'               => 'nullable|array',
            'qty.*'             => 'integer|min:1',
            'uang_bayar'        => 'nullable|numeric|min:0',
        ]);

        // 2. Ambil booking dan cegah pembayaran berulang
        $booking = Booking::findOrFail($id);

        if ($booking->status === 'Lunas') {
            throw ValidationException::withMessages([
                'pembayaran' => 'Pembayaran booking ini sudah lunas.',
            ]);
        }

        DB::beginTransaction();

        try {
            // Kunci booking agar tidak dibayar bersamaan oleh dua proses
            $booking = Booking::whereKey($id)->lockForUpdate()->firstOrFail();

            if ($booking->status === 'Lunas') {
                throw ValidationException::withMessages([
                    'pembayaran' => 'Pembayaran booking ini sudah lunas.',
                ]);
            }

            // 3. Hitung barang, cek stok, kurangi stok
            $totalBiayaBarang = 0;
            $itemTerjual = [];

            $barangIds = $request->input('barang_id', []);
            $qtys = $request->input('qty', []);

            foreach ($barangIds as $i => $barangId) {
                $qty = (int) ($qtys[$i] ?? 1);

                $sparepart = Sparepart::findOrFail($barangId);

                if ($sparepart->jumlah_stok < $qty) {
                    throw new \Exception(
                        "Stok {$sparepart->nama_barang} tidak mencukupi!"
                    );
                }

                $subtotal = $sparepart->harga_jual * $qty;
                $totalBiayaBarang += $subtotal;

                $sparepart->jumlah_stok -= $qty;
                $sparepart->save();

                $itemTerjual[] = [
                    'id_sparepart' => $sparepart->getKey(),
                    'nama' => $sparepart->nama_barang,
                    'qty' => $qty,
                    'harga' => $sparepart->harga_jual,
                ];
            }

            // 4. Hitung total dan kembalian
            $biayaJasa = (float) $request->biaya_jasa;
            $grandTotal = $totalBiayaBarang + $biayaJasa;

            $uangBayar = $request->filled('uang_bayar')
                ? (float) $request->uang_bayar
                : $grandTotal;

            if ($uangBayar < $grandTotal) {
                throw new \Exception(
                    'Uang pembayaran kurang dari total tagihan!'
                );
            }

            $kembalian = $uangBayar - $grandTotal;

            // 5. Update booking menjadi Lunas setelah pembayaran diproses
            $booking->status = 'Lunas';
            $booking->total_biaya = $grandTotal;

            $this->isiJikaKolomAda($booking, [
                'biaya_jasa' => $biayaJasa,
                'uang_bayar' => $uangBayar,
                'uang_kembali' => $kembalian,
            ]);

            $booking->save();

            // 6. Simpan transaksi utama
            $transaksi = new Transaksi();

            $transaksi->id_servis = $booking->getKey();
            $transaksi->id_pengelola = $this->idPengelola();
            $transaksi->tgl_transaksi = now();
            $transaksi->total_biaya = $grandTotal;
            $transaksi->keterangan =
                'Pembayaran Servis ' . ($booking->nopol ?? '');
            $transaksi->metode_pembayaran =
                $request->metode_pembayaran;
            $transaksi->jumlah_bayar = $uangBayar;
            $transaksi->kembalian = $kembalian;
            $transaksi->tgl_pembayaran = now();
            $transaksi->status_pembayaran = 'Lunas';

            $transaksi->save();

            $idTransaksiBaru = $transaksi->getKey();

            // 7. Simpan detail transaksi
            foreach ($itemTerjual as $item) {
                $dataDetail = [
                    'id_transaksi' => $idTransaksiBaru,
                    'jumlah' => $item['qty'],
                ];

                if (Schema::hasColumn('detail_transaksi', 'id_sparepart')) {
                    $dataDetail['id_sparepart'] =
                        $item['id_sparepart'];
                } elseif (Schema::hasColumn('detail_transaksi', 'id_barang')) {
                    $dataDetail['id_barang'] =
                        $item['id_sparepart'];
                }

                if (Schema::hasColumn('detail_transaksi', 'harga_satuan')) {
                    $dataDetail['harga_satuan'] = $item['harga'];
                } elseif (Schema::hasColumn('detail_transaksi', 'harga')) {
                    $dataDetail['harga'] = $item['harga'];
                }

                if (Schema::hasColumn('detail_transaksi', 'nama_item')) {
                    $dataDetail['nama_item'] = $item['nama'];
                } elseif (Schema::hasColumn('detail_transaksi', 'nama_barang')) {
                    $dataDetail['nama_barang'] = $item['nama'];
                }

                DB::table('detail_transaksi')->insert($dataDetail);
            }

            // Simpan biaya jasa sebagai detail jika kolom tersedia
            if (
                $biayaJasa > 0 &&
                Schema::hasColumn('detail_transaksi', 'nama_item')
            ) {
                $dataJasa = [
                    'id_transaksi' => $idTransaksiBaru,
                    'nama_item' => 'Biaya Jasa Servis',
                    'jumlah' => 1,
                    'harga_satuan' => $biayaJasa,
                ];

                DB::table('detail_transaksi')->insert($dataJasa);
            }

            DB::commit();

            return redirect()->back()->with(
                'success',
                'Pembayaran berhasil disimpan ke database!'
            );

        } catch (ValidationException $e) {
            DB::rollBack();
            throw $e;

        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Gagal memproses pembayaran kasir', [
                'booking_id' => $id,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()->back()->with(
                'error',
                'Gagal memproses pembayaran: ' . $e->getMessage()
            );
        }
    }

    /**
     * Ambil ID pengelola (kasir) yang valid.
     */
    private function idPengelola()
    {
        $kandidat = [
            session('id_pengelola'),
            session('user_id'),
            session('id'),
        ];

        foreach ($kandidat as $id) {
            if (
                $id &&
                DB::table('pengelola')
                    ->where('id_pengelola', $id)
                    ->exists()
            ) {
                return $id;
            }
        }

        $pertama = DB::table('pengelola')
            ->value('id_pengelola');

        if (!$pertama) {
            throw new \Exception(
                'Belum ada data di tabel pengelola. Tambahkan minimal satu pengelola/kasir.'
            );
        }

        return $pertama;
    }

    /**
     * Isi atribut model hanya jika kolom tersedia.
     */
    private function isiJikaKolomAda(Model $model, array $data): void
    {
        $tabel = $model->getTable();

        foreach ($data as $kolom => $nilai) {
            if (Schema::hasColumn($tabel, $kolom)) {
                $model->{$kolom} = $nilai;
            }
        }
    }
}
