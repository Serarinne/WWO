<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $tag->seo_title }} | {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ route('tags.view', ['tag' => $tag]) }}" />
    <meta name="description" content="{{ $tag->seo_description }}">
    <meta name="keywords" content="{{ $tag->seo_keywords }}">
    
    @if($wallpapers->isEmpty())
    <meta name="robots" content="noindex, follow" />
    @else
    <meta name="robots" content="index, follow, max-image-preview:large" />
    @endif

    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $tag->seo_title }}" />
    <meta property="og:description" content="{{ $tag->seo_description }}" />
    <meta property="og:url" content="{{ route('tags.view', ['tag' => $tag]) }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:image" content="{{ $tag->image['jpg'] }}" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ $tag->image['jpg'] }}">

    @include('components.file-assets')
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org/",
        "@@type": "BreadcrumbList",
        "itemListElement": [{
            "@@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ route('home') }}"
        }, {
            "@@type": "ListItem",
            "position": 2,
            "name": "Tags",
            "item": "{{ route('tags.index') }}"
        }, {
            "@@type": "ListItem",
            "position": 3,
            "name": "{{ $tag->name }}",
            "item": "{{ route('tags.view', ['tag' => $tag]) }}"
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
                <div class="absolute inset-0 bg-cover bg-center opacity-30 blur-3xl scale-110" style="background-image: url('{{ $tag->image['webp'] }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
            </div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    {{-- Tag Image --}}
                    <div class="flex-shrink-0 relative group">
                        <div class="w-32 h-32 md:w-48 md:h-48 rounded-2xl overflow-hidden border-4 border-gray-800 shadow-2xl relative z-10">
                            <picture>
                                <source srcset="{{ $tag->image['webp'] }}" type="image/webp">
                                <img src="{{ $tag->image['jpg'] }}" alt="{{ $tag->name }}" class="w-full h-full object-cover">
                            </picture>
                        </div>
                        <div class="absolute inset-0 bg-pink-500 blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500 -z-10 rounded-full"></div>
                    </div>

                    <div class="flex-grow text-center md:text-left pt-1 w-full md:w-auto">
                        <div class="flex items-center justify-center md:justify-start gap-2 mb-2">
                            <span class="px-2 py-0.5 rounded bg-pink-900/50 text-pink-300 text-xs font-medium border border-pink-700/50">Tag</span>
                        </div>
                        <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4">{{ $tag->name }}</h1>

                        {{-- Related Tags (Example - Adjust with your Variable if available) --}}
                        @if(isset($relatedTags))
                        <div class="flex flex-wrap items-center justify-center md:justify-start gap-2 mb-5">
                            <span class="text-sm text-gray-400 mr-1">Related:</span>
                            @foreach($relatedTags as $related)
                            <a href="{{ route('tags.view', $related->slug) }}" class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-gray-800 hover:bg-gray-750 border border-gray-700 hover:border-cyan-500/50 transition-all group">
                                <div class="w-5 h-5 rounded-full overflow-hidden flex-shrink-0 bg-gray-700">
                                    <img src="{{ $related->image['webp'] }}" alt="{{ $related->name }}" class="w-full h-full object-cover">
                                </div>
                                <span class="text-sm font-medium text-gray-300 group-hover:text-white truncate max-w-[120px]">{{ $related->name }}</span>
                            </a>
                            @endforeach
                        </div>
                        @endif

                        {{-- Description with Read More --}}
                        <div class="max-w-xl mx-auto md:mx-0">
                            <div id="char-desc-container" class="relative">
                                <p id="char-desc-text" class="text-gray-300 text-sm md:text-base leading-relaxed line-clamp-3 transition-all duration-300">
                                    {!! nl2br(e($tag->description)) ?? 'No description available for this tag.' !!}
                                </p>
                                @if(strlen($tag->description) > 150)
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

        {{-- Filter/Count Bar --}}
        <div class="border-b border-gray-800 bg-gray-900/90 top-16 z-40 backdrop-blur-md shadow-md">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex items-center gap-3">
                    <h2 class="text-lg font-bold text-white tracking-wide">All Wallpapers</h2>
                    <span class="flex items-center justify-center px-2.5 py-0.5 rounded-full bg-gray-800 border border-gray-700 text-cyan-400 text-xs font-bold shadow-sm">
                        {{ number_format($wallpapers->total()) }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Gallery Grid --}}
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-6 space-y-6">
                @forelse($wallpapers as $wallpaper)
                    <div class="break-inside-avoid mb-6">
                        <x-wallpaper-card :wallpaper="$wallpaper" />
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center bg-gray-800/30 rounded-2xl border border-gray-700/50 border-dashed">
                        <p class="text-gray-400 text-lg font-medium">No wallpapers found for this tag.</p>
                        <a href="{{ route('tags.index') }}" class="inline-block mt-4 text-cyan-400 hover:text-cyan-300 hover:underline">Explore other tags</a>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($wallpapers->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $wallpapers->links('components.pagination') }}
                </div>
            @endif
        </div>
    </main>

    @include('components.footer')

    <script>
        // Read More Toggle
        const readMoreBtn = document.getElementById('read-more-btn');
        const charDescText = document.getElementById('char-desc-text');
        if (readMoreBtn && charDescText) {
            readMoreBtn.addEventListener('click', () => {
                if (charDescText.classList.contains('line-clamp-3')) {
                    charDescText.classList.remove('line-clamp-3');
                    readMoreBtn.querySelector('span').textContent = 'Show less';
                    readMoreBtn.querySelector('svg').style.transform = 'rotate(180deg)';
                } else {
                    charDescText.classList.add('line-clamp-3');
                    readMoreBtn.querySelector('span').textContent = 'Read more';
                    readMoreBtn.querySelector('svg').style.transform = 'rotate(0deg)';
                }
            });
        }
    </script>
</body>
</html>