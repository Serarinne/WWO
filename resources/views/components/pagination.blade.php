<div class="mt-12 px-4 flex justify-center items-center">
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="w-full flex flex-col items-center">

            {{-- 1. TAMPILAN MOBILE (Hanya tombol Prev/Next besar) --}}
            <div class="flex justify-between w-full sm:hidden gap-2 mb-4">
                {{-- Mobile Previous --}}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-500 bg-gray-800 border border-gray-700 rounded-lg cursor-not-allowed w-1/2">
                        &lt;
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-300 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 hover:text-white transition-colors w-1/2">
                        &lt;
                    </a>
                @endif

                {{-- Mobile Next --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-300 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 hover:text-white transition-colors w-1/2">
                        &gt;
                    </a>
                @else
                    <span class="relative inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-500 bg-gray-800 border border-gray-700 rounded-lg cursor-not-allowed w-1/2">
                        &gt;
                    </span>
                @endif
            </div>

            {{-- Info Text (Muncul di Mobile & Desktop) --}}
            <div class="mb-4 text-center">
                <p class="text-sm text-gray-400">
                    Showing
                    <span class="font-semibold text-gray-200">{{ $paginator->firstItem() }}</span>
                    to
                    <span class="font-semibold text-gray-200">{{ $paginator->lastItem() }}</span>
                    of
                    <span class="font-semibold text-gray-200">{{ $paginator->total() }}</span>
                    results
                </p>
            </div>

            {{-- 2. TAMPILAN DESKTOP/TABLET (Nomor Halaman Lengkap) --}}
            {{-- Class 'hidden sm:flex' menyembunyikan ini di HP dan memunculkannya di Tablet ke atas --}}
            <div class="hidden sm:flex flex-wrap justify-center items-center gap-2">
                {{-- Desktop Previous --}}
                @if ($paginator->onFirstPage())
                    <span class="px-3 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-600 border border-gray-700 cursor-not-allowed">
                        &lt;
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-300 border border-gray-700 hover:bg-gray-700 hover:text-white transition-colors">
                        &lt;
                    </a>
                @endif

                {{-- Desktop Numbers Loop --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="px-3 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-500 border border-gray-700">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="px-3 py-2 rounded-lg text-sm font-medium bg-cyan-600 text-white border border-cyan-600 shadow-lg shadow-cyan-500/20">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="px-3 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-300 border border-gray-700 hover:bg-gray-700 hover:text-white transition-colors">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Desktop Next --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-300 border border-gray-700 hover:bg-gray-700 hover:text-white transition-colors">
                        &gt;
                    </a>
                @else
                    <span class="px-3 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-600 border border-gray-700 cursor-not-allowed">
                        &gt;
                    </span>
                @endif
            </div>
        </nav>
    @endif
</div>