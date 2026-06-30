<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ request()->filled('q') ? 'Search Characters: ' . request('q') : 'Browse All Anime Characters' }} | {{ env('APP_NAME') }}</title>

    <meta name="description" content="{{ request()->filled('q') ? 'Search results for ' . request('q') . ' anime and game characters on '.env('APP_NAME') : 'Explore a complete directory of anime characters on '.env('APP_NAME').'. Find your favorite characters and browse thousands of high-quality wallpapers featuring them.' }}">

    <meta name="keywords" content="anime characters, waifu list, husbando list, anime wallpaper characters, genshin impact characters, honkai star rail characters">
    
    @if(request()->filled('q'))
    <meta name="robots" content="noindex, follow" />
    @else
    <meta name="robots" content="index, follow, max-image-preview:large" />
    @endif

    <link rel="canonical" href="{{ request()->filled('q') ? route('characters.index', ['q' => request('q')]) : route('characters.index') }}" />

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Browse All Anime Characters | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Explore a complete directory of anime characters on {{ env('APP_NAME') }}." />
    <meta property="og:url" content="{{ route('characters.index') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Browse All Anime Characters | {{ env('APP_NAME') }}" />
    <meta name="twitter:description" content="Explore a complete directory of anime characters on {{ env('APP_NAME') }}." />

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "CollectionPage",
        "name": "Anime Characters Directory",
        "url": "{{ route('characters.index') }}",
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
                "name": "Characters",
                "item": "{{ route('characters.index') }}"
            }]
        }
    }
    </script>

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "CollectionPage",
      "name": "{{ env('APP_NAME') }} Anime & Game Characters Database",
      "description": "Directory of anime waifu and game character wallpaper collections.",
      "url": "{{ route('characters.index') }}"
    }
    </script>
</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden py-12">

        <div class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-cyan-900/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>
        <div class="absolute bottom-0 right-1/4 w-[600px] h-[600px] bg-purple-900/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-500 mb-4">
                    Characters
                </h1>
                <p class="text-gray-400 text-lg mb-8">Discover wallpapers by browsing your favorite characters.</p>

                <div class="max-w-xl mx-auto">
                    <form action="{{ route('characters.index') }}" method="GET" class="relative group">
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

            <div id="character-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">

                @forelse($characters as $character)
                    <x-character-card :character="$character" />
                @empty
                    <div class="col-span-full py-20 text-center bg-gray-800/30 rounded-2xl border border-gray-700/50 border-dashed">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-800 mb-4 text-gray-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-white">No characters found</h3>
                        <p class="text-gray-400 mt-1">Try searching for something else.</p>
                        @if(request('q'))
                            <a href="{{ route('characters.index') }}" class="mt-4 inline-block text-cyan-400 hover:text-cyan-300 hover:underline">Clear Search</a>
                        @endif
                    </div>
                @endforelse

            </div>

            @if($characters->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $characters->links('components.pagination') }}
                </div>
            @endif

        </div>
    </main>

    @include('components.footer')
</body>
</html>