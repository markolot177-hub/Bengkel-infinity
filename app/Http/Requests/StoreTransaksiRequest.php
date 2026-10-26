<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaksiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_servis' => 'required|integer|exists:servis,id_servis',
            'id_pengelola' => 'required|integer|exists:pengelola,id_pengelola',
            'tgl_transaksi' => 'required|date',
            'total_biaya' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'metode_pembayaran' => 'required|in:Tunai,Transfer,QRIS,Kartu Debit/Kredit',
            'jumlah_bayar' => 'required|numeric|min:0',
            'kembalian' => 'nullable|numeric|min:0',
            'tgl_pembayaran' => 'nullable|date',
            'status_pembayaran' => 'required|in:Belum Lunas,Lunas,Gagal',
        ];
    }
}
