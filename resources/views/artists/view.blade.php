<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $artist->seo_title ?? $artist->name . ' Art & Illustrations' }} | {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ route('artists.view', $artist) }}" />
    <meta name="description" content="Explore a collection of high-quality anime wallpapers created by {{ $artist->name }}. Browse {{ $artist->wallpapers_count }} unique works on {{ env('APP_NAME') }}.">
    
    @if($wallpapers->isEmpty())
    <meta name="robots" content="noindex, follow" />
    @else
    <meta name="robots" content="index, follow, max-image-preview:large" />
    @endif

    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $artist->name }} - Anime Artist Wallpapers" />
    <meta property="og:url" content="{{ route('artists.view', $artist) }}" />
    <meta property="og:image" content="{{ $artist->image['jpg'] }}" />

    @include('components.file-assets')

    <style>
        [x-cloak] { display: none !important; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org/",
        "@@type": "BreadcrumbList",
        "itemListElement": [{
            "@@type": "ListItem", "position": 1, "name": "Home", "item": "{{ route('home') }}"
        }, {
            "@@type": "ListItem", "position": 2, "name": "Artists", "item": "{{ route('artists.index') }}"
        }, {
            "@@type": "ListItem", "position": 3, "name": "{{ $artist->name }}", "item": "{{ route('artists.view', $artist) }}"
        }]
    }
    </script>

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "ProfilePage",
        "mainEntity": {
          "@@type": "Person",
          "name": "{{ $artist->name }}",
          "description": "Anime fanart creator and illustrator.",
          @if(!empty($artist->image))
          "image": "{{ $artist->image['jpg'] ?? $artist->image['webp'] }}",
          @endif
          "url": "{{ route('artists.view', $artist) }}"
        }
      }
    </script>
</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow">
        {{-- Hero Section --}}
        <div class="relative bg-gray-900 border-b border-gray-800 overflow-hidden">
            <div class="absolute inset-0 z-0">
                {{-- Dynamic Background --}}
                <div class="absolute inset-0 bg-cover bg-center opacity-30 blur-3xl scale-110" 
                     style="background-image: url('{{ $artist->image['jpg'] }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
            </div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    
                    {{-- Profile Picture --}}
                    <div class="flex-shrink-0 relative group">
                        <div class="w-32 h-32 md:w-48 md:h-48 rounded-2xl overflow-hidden border-4 border-gray-800 shadow-2xl relative z-10 bg-gray-800">
                             {{-- Using the Image URL logic we built previously --}}
                             <picture>
                                <source srcset="{{ $artist->image['webp'] }}" type="image/webp">
                                <img src="{{ $artist->image['jpg'] }}" alt="{{ $artist->name }}" class="w-full h-full object-cover">
                            </picture>
                        </div>
                        <div class="absolute inset-0 bg-sky-500 blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500 -z-10 rounded-full"></div>
                    </div>

                    <div class="flex-grow text-center md:text-left pt-1 w-full md:w-auto">
                        <div class="flex items-center justify-center md:justify-between w-full mb-3 relative">
                            <span class="px-2 py-0.5 rounded bg-sky-900/50 text-sky-300 text-xs font-medium border border-sky-700/50">Artist</span>
                        </div>

                        <div class="flex items-center justify-center md:justify-start gap-2 mb-2">
                            <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight">{{ $artist->name }}</h1>
                            
                            {{-- Official/Claimed Badge --}}
                            @if($artist->user_id)
                            <div title="Official Artist (Claimed)" class="bg-blue-500/10 rounded-full p-0.5 border border-blue-500/20">
                                <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.491 4.491 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" /></svg>
                            </div>
                            @endif
                        </div>

                        {{-- Managed By --}}
                        @if($artist->user_id && $artist->owner)
                        <div class="mb-4 flex items-center justify-center md:justify-start gap-2">
                            <span class="text-sm text-gray-400">Managed by:</span>
                            <a href="{{ route('users.wallpapers', $artist->owner->username) }}" class="flex items-center gap-2 px-2 py-1 rounded-lg bg-gray-800/50 hover:bg-gray-800 border border-gray-700/50 hover:border-gray-600 transition-all group">
                                <picture>
                                    <source srcset="{{ $artist->owner->user_image_webp }}" type="image/webp">
                                    <img src="{{ $artist->owner->user_image_jpg }}" alt="{{ $artist->owner->name }}" class="w-5 h-5 rounded-full object-cover">
                                </picture>
                                <span class="text-sm font-medium text-gray-300 group-hover:text-white">{{ $artist->owner->name }}</span>
                            </a>
                        </div>
                        @endif

                        {{-- Bio / Description --}}
                        <div class="max-w-xl mx-auto md:mx-0 mb-6">
                            <div id="char-desc-container" class="relative">
                                <p id="char-desc-text" class="text-gray-300 text-sm md:text-base leading-relaxed line-clamp-3 transition-all duration-300">
                                    {!! nl2br(e($artist->description)) ?? 'No biography available for this artist.' !!}
                                </p>
                                @if(strlen($artist->description) > 160)
                                <button id="read-more-btn" class="mt-2 text-sky-400 hover:text-sky-300 text-sm font-medium focus:outline-none flex items-center gap-1 mx-auto md:mx-0">
                                    <span>Read more</span>
                                    <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                @endif
                            </div>
                        </div>

                        {{-- Social Links Loop --}}
                        <div class="flex flex-wrap items-center justify-center md:justify-start gap-3">
                            @foreach($artist->socials as $social)
                                @php
                                    $type = Str::lower($social->type);
                                    
                                    // Default Styles
                                    $hoverClass = 'hover:border-gray-500 hover:text-gray-300';
                                    $iconPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>';

                                    if (str_contains($type, 'pixiv')) {
                                        $hoverClass = 'hover:border-blue-500 hover:text-blue-400';
                                        $iconPath = '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 14.36c-1.32.72-2.76.72-3.6.36l-3.36-2.52-1.32 1.32c-.36.36-.72.6-1.2.6-.72 0-1.2-.48-1.2-1.2V9.36c0-.48.24-.84.6-1.08l6.36-4.56c.6-.48 1.44-.36 1.92.24.48.6.36 1.44-.24 1.92l-4.56 3.24 3.24 2.4c.84.6 2.16.6 3.36-.12.48-.36 1.08-.24 1.44.24.24.48.12 1.08-.36 1.44z"/>';
                                    } elseif (str_contains($type, 'twitter') || str_contains($type, 'x')) {
                                        $hoverClass = 'hover:border-sky-500 hover:text-sky-400';
                                        $iconPath = '<path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>';
                                    } elseif (str_contains($type, 'artstation')) {
                                        $hoverClass = 'hover:border-blue-600 hover:text-blue-500';
                                        $iconPath = '<path d="M1.78 22.21l5.1-8.86 3.73 6.46H1.78zM12 2.07L6.44 11.66h11.1L12 2.07zm1.32 11.28l-3.73 6.47h12.63l-5.11-8.86H13.32z"/>';
                                    } elseif (str_contains($type, 'deviantart')) {
                                        $hoverClass = 'hover:border-green-500 hover:text-green-400';
                                        $iconPath = '<path d="M18.5 4.5l-3.5 3.5h-4l-1 1.5 3 5-1.5 5h3.5l3.5-3.5h4l1-1.5-3-5 1.5-5h-3.5z"/>'; // Simplified
                                    } elseif (str_contains($type, 'patreon')) {
                                        $hoverClass = 'hover:border-orange-500 hover:text-orange-400';
                                        $iconPath = '<path d="M0 .5h4.219v23H0z"/><path d="M15.384.5C11.324.5 7.81 2.914 6.17 6.456c-1.636 3.542-1.252 7.795 1.006 10.971 2.259 3.177 5.995 4.939 9.896 4.664 6.56-.465 11.66-5.91 11.66-12.449C28.732 4.318 22.75.5 15.384.5z"/>';
                                    }
                                @endphp

                                <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer" 
                                   class="flex items-center gap-2 px-3 py-2 rounded-lg bg-gray-800 border border-gray-700 hover:bg-gray-750 transition-all group shadow-sm {{ $hoverClass }}">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" fill="currentColor">
                                        {!! $iconPath !!}
                                    </svg>
                                    <span class="text-sm font-medium text-gray-300 group-hover:text-white">{{ $social->type }}</span>
                                </a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- Header Bar --}}
        <div class="border-b border-gray-800 bg-gray-900/90 sticky top-0 lg:top-16 z-40 backdrop-blur-md shadow-md">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex items-center gap-3">
                    <h2 class="text-lg font-bold text-white tracking-wide">All Wallpapers</h2>
                    <span class="flex items-center justify-center px-2.5 py-0.5 rounded-full bg-gray-800 border border-gray-700 text-sky-400 text-xs font-bold shadow-sm">
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
                        <p class="text-gray-400 text-lg font-medium">No wallpapers found for this artist.</p>
                    </div>
                @endforelse
            </div>

            @if($wallpapers->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $wallpapers->links('components.pagination') }}
                </div>
            @endif
        </div>
    </main>

    @include('components.footer')

    {{-- Scripts --}}
    <script>
        // Read More Functionality
        const readMoreBtn = document.getElementById('read-more-btn');
        const charDescText = document.getElementById('char-desc-text');
        if (readMoreBtn && charDescText) {
            readMoreBtn.addEventListener('click', () => {
                const isClamped = charDescText.classList.contains('line-clamp-3');
                charDescText.classList.toggle('line-clamp-3');
                readMoreBtn.querySelector('span').textContent = isClamped ? 'Show less' : 'Read more';
                readMoreBtn.querySelector('svg').style.transform = isClamped ? 'rotate(180deg)' : 'rotate(0deg)';
            });
        }
    </script>

</body>
</html>