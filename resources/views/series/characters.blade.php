<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>All Characters from {{ $series->name }} | {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ route('series.characters', $series) }}" />
    <meta name="description" content="Explore the complete list of characters, waifus, and heroines from {{ $series->name }}. Discover character profiles and find your favorite HD & 4K wallpapers.">
    <meta name="keywords" content="{{ $series->seo_keywords }}">
    
    @if($characters->isEmpty())
    <meta name="robots" content="noindex, follow" />
    @else
    <meta name="robots" content="index, follow" />
    @endif

    <meta property="og:type" content="website" />
    <meta property="og:title" content="All Characters from {{ $series->name }} | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Explore the complete list of characters, waifus, and heroines from {{ $series->name }}. Discover character profiles and find your favorite HD & 4K wallpapers." />
    <meta property="og:url" content="{{ route('series.characters', $series) }}" />
    <meta property="og:image" content="{{ $series->image['jpg'] }}" />
    <meta name="twitter:card" content="summary_large_image">
    
    @include('components.file-assets')

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .animate-fade-in { animation: fadeIn 0.4s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "BreadcrumbList",
        "itemListElement": [{
            "@@type": "ListItem", "position": 1, "name": "Home", "item": "{{ route('home') }}"
        }, {
            "@@type": "ListItem", "position": 2, "name": "Series", "item": "{{ route('series.index') }}"
        }, {
            "@@type": "ListItem", "position": 3, "name": "{{ $series->name }}", "item": "{{ route('series.view', $series) }}"
        }, {
            "@@type": "ListItem", "position": 4, "name": "Characters", "item": "{{ url()->current() }}"
        }]
    }
    </script>
</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow">
        {{-- Hero Header --}}
        <div class="relative bg-gray-900 border-b border-gray-800 overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-cover bg-center opacity-30 blur-3xl scale-110" style="background-image: url('{{ $series->image['webp'] }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
            </div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    {{-- Series Poster --}}
                    <div class="flex-shrink-0 relative group">
                        <div class="w-32 md:w-40 rounded-xl overflow-hidden border-4 border-gray-800 shadow-2xl relative z-10 aspect-[2/3] bg-gray-800">
                            <img src="{{ $series->image['webp'] }}" alt="{{ $series->name }}" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute inset-0 bg-purple-500 blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500 -z-10 rounded-full"></div>
                    </div>

                    <div class="flex-grow text-center md:text-left pt-1 w-full md:w-auto">
                        <div class="flex items-center justify-center md:justify-start gap-2 mb-2">
                            <span class="px-2 py-0.5 rounded bg-blue-900/50 text-blue-300 text-xs font-medium border border-blue-700/50">Series</span>
                        </div>
                        <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight mb-4">{{ $series->name }}</h1>
                        
                        {{-- Description with Read More --}}
                        <div class="max-w-2xl mx-auto md:mx-0 mb-6">
                            <div id="series-desc-container" class="relative">
                                <p id="series-desc-text" class="text-gray-300 text-sm md:text-base leading-relaxed line-clamp-3 transition-all duration-300">
                                    {!! nl2br(e($series->description)) !!}
                                </p>
                                @if(strlen(strip_tags($series->description)) > 160)
                                <button id="read-more-btn" class="mt-2 text-cyan-400 hover:text-cyan-300 text-sm font-medium focus:outline-none flex items-center gap-1 mx-auto md:mx-0">
                                    <span>Read more</span>
                                    <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Navigation Tabs --}}
        @include('series.nav')

        {{-- Character Grid Area --}}
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[500px] animate-fade-in">
            {{-- Grid --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">
                @forelse($characters as $character)
                <x-character-card :character="$character" />
                @empty
                <div class="col-span-full py-20 text-center bg-gray-800/30 rounded-2xl border border-gray-700/50 border-dashed">
                    <p class="text-gray-400">No characters found matching your criteria.</p>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($characters->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $characters->appends(request()->query())->links('components.pagination') }}
            </div>
            @endif
        </div>
    </main>

    @include('components.footer')

    <script>
        // Read More Toggle
        const readMoreBtn = document.getElementById('read-more-btn');
        const seriesDescText = document.getElementById('series-desc-text');
        if (readMoreBtn && seriesDescText) {
            readMoreBtn.addEventListener('click', () => {
                const isClamped = seriesDescText.classList.contains('line-clamp-3');
                seriesDescText.classList.toggle('line-clamp-3');
                readMoreBtn.querySelector('span').textContent = isClamped ? 'Show less' : 'Read more';
                readMoreBtn.querySelector('svg').style.transform = isClamped ? 'rotate(180deg)' : 'rotate(0deg)';
            });
        }
    </script>
</body>
</html>