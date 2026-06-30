<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} | High-Quality Anime & Game Wallpapers in HD & 4K</title>

    <link rel="canonical" href="{{ route('home') }}" />
    <meta name="description" content="Discover and download a vast collection of stunning HD and 4K anime and game wallpapers on {{ env('APP_NAME') }}. Find the perfect background for your phone or PC.">
    <meta name="keywords" content="waifuwall, anime wallpaper, 4k wallpaper, gaming wallpaper, genshin impact wallpaper, honkai star rail wallpaper">
    <meta name="robots" content="index, follow">

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ env('APP_NAME') }} | Best Anime Wallpapers" />
    <meta property="og:description" content="Discover stunning HD and 4K anime and game wallpapers on {{ env('APP_NAME') }}." />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "WebSite",
        "url": "{{ route('home') }}",
        "potentialAction": {
            "@@type": "SearchAction",
            "target": "{{ route('wallpapers.search') }}?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow">
        @if($latestWallpapers->currentPage() == 1)
            <div class="relative bg-gray-900 py-20 lg:py-32 overflow-hidden border-b border-gray-800">
                <div class="absolute inset-0">
                    <div class="absolute inset-0 opacity-5"></div>
                    <div class="absolute top-0 left-1/4 w-96 h-96 bg-cyan-600/20 rounded-full blur-[128px]"></div>
                    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-600/20 rounded-full blur-[128px]"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-[#0f172a]"></div>
                </div>

                <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                    <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-6">
                        Your Gateway to <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-500">Stunning Anime Worlds</span>
                    </h1>
                    <p class="text-lg md:text-xl text-gray-400 mb-10 max-w-2xl mx-auto">
                        Search through thousands of high-quality HD & 4K wallpapers for your desktop and mobile devices.
                    </p>

                    <div class="max-w-2xl mx-auto">
                        <form action="{{ route('wallpapers.search') }}" method="GET" class="relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-xl blur opacity-25 group-hover:opacity-50 transition duration-200"></div>
                            <div class="relative flex items-center bg-gray-900 rounded-xl border border-gray-700 shadow-2xl">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="text" name="q" class="block w-full p-4 pl-12 text-base text-white bg-transparent border-none rounded-xl focus:ring-0 placeholder-gray-500" placeholder="Search character, series, or artist..." required>
                                <button type="submit" class="absolute right-2.5 bottom-2.5 bg-gray-800 hover:bg-gray-700 text-white font-medium rounded-lg text-sm px-4 py-2 transition-colors">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            @if($latestWallpapers->currentPage() == 1)
                <section class="mb-16">
                    <div class="flex justify-between items-end mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                                <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                Trending Tags
                            </h2>
                        </div>
                        <a href="{{ route('tags.index') }}" class="text-sm text-cyan-400 hover:text-cyan-300 font-medium transition-colors">View All Tags &rarr;</a>
                    </div>

                    <div class="flex gap-4 overflow-x-auto no-scrollbar pb-4 mask-image-right">
                        @foreach($trendingTags as $tag)
                            <a href="{{ route('tags.view', $tag->slug) }}" class="flex-shrink-0 group relative overflow-hidden rounded-xl bg-gray-800 border border-gray-700 hover:border-cyan-500/50 transition-all duration-300 w-40 h-24">
                                <img src="{{ $tag->image['webp'] ?? rand(1,100) }}" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-110 transition-transform duration-500" alt="{{ $tag->name }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-3">
                                    <span class="block text-white font-bold text-sm group-hover:text-cyan-400 transition-colors">{{ $tag->name }}</span>
                                    <span class="block text-[10px] text-gray-400">{{ $tag->wallpapers_count ?? 0 }} items</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>

                <section class="mb-16">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                            <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            Popular Wallpapers This Week
                        </h2>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 gap-6">
                        @foreach($popularWallpapers ?? [] as $wallpaper)
                            <a href="{{ route('wallpapers.view', $wallpaper) }}" class="group relative block rounded-lg overflow-hidden shadow-lg aspect-[2/3]">
                                @if ($wallpaper->thumbnail)
                                    <picture>
                                        <source srcset="{{ $wallpaper->thumbnail['webp'] }}" type="image/webp">
                                        <source srcset="{{ $wallpaper->thumbnail['jpg'] }}" type="image/jpeg">
                                        <img src="{{ $wallpaper->thumbnail['webp'] }}" alt="{{ $wallpaper->seo_title ?? 'Popular anime wallpaper' }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                                    </picture>
                                @else
                                    <img src="{{ $wallpaper->thumbnail }}.webp" alt="{{ $wallpaper->seo_title ?? 'Popular anime wallpaper' }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-4 text-white">
                                    <h3 class="font-bold text-sm truncate">
                                        {{ $wallpaper->characters->first()->name ?? $wallpaper->seo_title }}
                                    </h3>
                                    <p class="text-xs text-gray-300">
                                        {{ $wallpaper->characters->first()->series->first()->name ?? '' }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif

            <section id="latest">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                        @if($latestWallpapers->currentPage() == 1)
                            <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Newest Wallpapers
                        @else
                            <span class="text-gray-400 text-lg">Page {{ $latestWallpapers->currentPage() }}</span>
                        @endif
                    </h2>
                </div>

                @if(isset($latestWallpapers) && $latestWallpapers->count() > 0)
                    <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-6 space-y-6">
                        @foreach($latestWallpapers as $wallpaper)
                            <div class="break-inside-avoid mb-6">
                                <x-wallpaper-card :wallpaper="$wallpaper" />
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="w-full py-20 flex flex-col items-center justify-center text-center bg-gray-800/30 rounded-2xl border border-gray-700/50">
                        <svg class="w-16 h-16 text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <h3 class="text-xl font-bold text-gray-300 mb-2">No Wallpapers Found</h3>
                        <p class="text-gray-500 max-w-sm">We couldn't find any wallpapers at the moment. Please check back later.</p>
                    </div>
                @endif

                @if(isset($latestWallpapers) && method_exists($latestWallpapers, 'links'))
                    <div class="mt-12 flex justify-center">
                        {{ $latestWallpapers->links('components.pagination') }}
                    </div>
                @endif
            </section>
        </div>
    </main>

    @include('components.footer')
</body>
</html>