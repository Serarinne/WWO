<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ request()->filled('q') ? 'Search Series: ' . request('q') : 'Browse All Anime Series' }} | {{ env('APP_NAME') }}</title>

    <meta name="description" content="Explore a complete list of anime series on {{ env('APP_NAME') }}. Find your favorite series and browse thousands of high-quality wallpapers from its universe.">
    <meta name="keywords" content="anime series list, anime wallpapers, waifuwall series, 4k anime backgrounds">
    
    @if(!empty($q))
    <meta name="robots" content="noindex, follow" />
    @else
    <meta name="robots" content="index, follow, max-image-preview:large" />
    @endif

    <link rel="canonical" href="{{ !empty($q) ? route('series.index', ['q' => $q]) : route('series.index') }}" />

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Browse All Anime Series | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Explore a complete list of anime series on {{ env('APP_NAME') }}." />
    <meta property="og:url" content="{{ route('series.index') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Browse All Anime Series | {{ env('APP_NAME') }}" />
    <meta name="twitter:description" content="Explore a complete list of anime series on {{ env('APP_NAME') }}." />

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "CollectionPage",
        "name": "Anime Series Directory",
        "url": "{{ route('series.index') }}",
        "breadcrumb": {
            "@@type": "BreadcrumbList",
            "itemListElement": [{
                "@@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "{{ route('home') }}"
            }, {
                "@@type": "ListItem",
                "position": 2,
                "name": "Series",
                "item": "{{ route('series.index') }}"
            }]
        }
    }
    </script>

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "CollectionPage",
      "name": "Browse All Anime Series",
      "description": "Directory of anime and game series wallpaper collections.",
      "url": "{{ route('series.index') }}"
    }
    </script>
</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden py-12">

        <div class="absolute top-0 right-1/4 w-[600px] h-[600px] bg-purple-900/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>
        <div class="absolute bottom-0 left-1/4 w-[600px] h-[600px] bg-cyan-900/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-500 mb-4">
                    Anime Series
                </h1>
                <p class="text-gray-400 text-lg mb-8">Browse thousands of wallpapers by your favorite anime universe.</p>

                <div class="max-w-xl mx-auto">
                    <form action="{{ route('series.index') }}" method="GET" class="relative group">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-purple-500 rounded-lg blur opacity-30 group-hover:opacity-70 transition duration-200"></div>
                        <div class="relative flex items-center bg-gray-900 rounded-lg">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" name="q" value="{{ request('q') }}" class="block w-full p-4 pl-12 text-sm text-gray-100 bg-transparent border border-gray-700 rounded-lg focus:ring-0 focus:border-transparent placeholder-gray-500" placeholder="Search for series (e.g. Hololive, Genshin)..." required>
                        </div>
                    </form>
                </div>
            </div>

            <div id="series-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">

                @forelse($series as $item)
                    <article class="group relative rounded-2xl overflow-hidden bg-gray-800 shadow-lg hover:shadow-2xl hover:shadow-cyan-500/10 transition-all duration-300 transform hover:-translate-y-1">
                        <a href="{{ route('series.view', $item) }}" class="block w-full h-full">

                            <div class="aspect-square w-full overflow-hidden bg-gray-700 relative">
                                <picture>
                                    <source srcset="{{ $item->image['webp'] }}" type="image/webp">
                                    <source srcset="{{ $item->image['jpg'] }}" type="image/jpeg">
                                    <img src="{{ $item->image['webp'] }}" 
                                         alt="{{ $item->name }}" 
                                         width="300" height="300" 
                                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" 
                                         loading="lazy">
                                </picture>

                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                            </div>

                            <div class="absolute bottom-0 left-0 right-0 p-4 transform translate-y-1 group-hover:translate-y-0 transition-transform duration-300">
                                <h3 class="font-bold text-white text-sm md:text-base truncate leading-tight group-hover:text-cyan-400 transition-colors" title="{{ $item->name }}">
                                    {{ $item->name }}
                                </h3>
                            </div>
                        </a>
                    </article>
                @empty
                    <div class="col-span-full py-20 text-center bg-gray-800/30 rounded-2xl border border-gray-700/50 border-dashed">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-800 mb-4 text-gray-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-white">No series found</h3>
                        <p class="text-gray-400 mt-1">We couldn't find matches for "<strong>{{ request('q') }}</strong>".</p>
                        @if(request('q'))
                            <a href="{{ route('series.index') }}" class="mt-4 inline-block text-cyan-400 hover:text-cyan-300 hover:underline">Clear Search</a>
                        @endif
                    </div>
                @endforelse

            </div>

            @if($series->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $series->links('components.pagination') }}
                </div>
            @endif

        </div>
    </main>

    @include('components.footer')
</body>
</html>