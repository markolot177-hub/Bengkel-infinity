@props(['items' => []])

<nav class="flex px-4 py-2 text-slate-500 bg-white border border-slate-200 rounded-lg shadow-sm mb-4 text-xs font-medium" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2">
        <!-- Home / Dashboard Root -->
        <li class="inline-flex items-center">
            <a href="/dashboard-admin" class="inline-flex items-center text-slate-500 hover:text-blue-600">
                <svg class="w-3.5 h-3.5 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l1.293 1.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
                Dashboard
            </a>
        </li>

        <!-- Dynamic Breadcrumb Items -->
        @foreach($items as $label => $url)
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-slate-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    @if(!$loop->last)
                        <a href="{{ $url }}" class="text-slate-500 hover:text-blue-600">{{ $label }}</a>
                    @else
                        <span class="text-blue-600 font-bold">{{ $label }}</span>
                    @endif
                </div>
            </li>
        @endforeach
    </ol>
</nav>