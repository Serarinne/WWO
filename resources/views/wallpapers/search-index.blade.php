<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Search Anime Wallpapers | {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ route('wallpapers.search') }}" />
    <meta name="description" content="Search thousands of high-quality anime and waifu wallpapers on {{ env('APP_NAME') }}. Find 4K and HD backgrounds for your PC or smartphone.">
    <meta name="keywords" content="search, find wallpaper, waifuwall, waifu wallpaper, anime girl wallpaper, 4K wallpaper, HD wallpaper, anime wallpaper">
    <meta name="robots" content="index, follow">

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Search Anime Wallpapers | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Search thousands of high-quality anime and waifu wallpapers on {{ env('APP_NAME') }}." />
    <meta property="og:url" content="{{ route('wallpapers.search') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Search Anime Wallpapers | {{ env('APP_NAME') }}" />
    <meta name="twitter:description" content="Search thousands of high-quality anime and waifu wallpapers on {{ env('APP_NAME') }}." />

    @include('components.file-assets')

</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow relative flex flex-col items-center overflow-hidden pt-12 pb-20">

        <div class="absolute inset-0 overflow-hidden pointer-events-none -z-10">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-purple-900/20 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-cyan-900/20 rounded-full blur-[100px]"></div>
            <div class="absolute inset-0 opacity-[0.03]"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 w-full max-w-6xl relative z-10">

            <div class="text-center mb-10">
                <span class="inline-block py-1 px-3 rounded-full bg-gray-800 border border-gray-700 text-xs font-semibold text-cyan-400 mb-4 uppercase tracking-wider">
                    Wallpaper Search Engine
                </span>
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 tracking-tight">
                    Find Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-500">Waifu</span>
                </h1>
                <p class="text-lg text-gray-400 max-w-lg mx-auto">
                    Search through thousands of high-resolution wallpapers. Characters, series, artists, or specific tags.
                </p>
            </div>

            <div class="max-w-2xl mx-auto mb-20">
                <form action="{{ route('wallpapers.search') }}" method="GET" class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-xl blur opacity-30 group-hover:opacity-60 transition duration-200"></div>

                    <div class="relative flex items-center">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
                            <svg class="w-6 h-6 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" 
                               id="search-query" 
                               name="q" 
                               class="block w-full p-5 pl-14 text-base text-white bg-gray-900 border border-gray-700 rounded-xl focus:ring-0 focus:border-cyan-500 placeholder-gray-500 shadow-2xl" 
                               placeholder="Try 'Genshin Impact', 'Blue Archive', or '4K'..." 
                               required 
                               autofocus
                               autocomplete="off">

                        <button type="submit" class="absolute right-2.5 bg-cyan-600 hover:bg-cyan-500 text-white font-medium rounded-lg text-sm px-6 py-2.5 transition-colors shadow-lg shadow-cyan-500/20">
                            Search
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold mb-3">Trending Searches</p>
                    <div class="flex flex-wrap justify-center gap-2">
                        <a href="{{ route('wallpapers.search', ['q' => 'Genshin Impact']) }}" class="px-3 py-1.5 bg-gray-800 hover:bg-gray-700 border border-gray-700 rounded-full text-xs text-gray-300 transition-colors">Genshin Impact</a>
                        <a href="{{ route('wallpapers.search', ['q' => 'Hololive']) }}" class="px-3 py-1.5 bg-gray-800 hover:bg-gray-700 border border-gray-700 rounded-full text-xs text-gray-300 transition-colors">Hololive</a>
                        <a href="{{ route('wallpapers.search', ['q' => 'Blue Archive']) }}" class="px-3 py-1.5 bg-gray-800 hover:bg-gray-700 border border-gray-700 rounded-full text-xs text-gray-300 transition-colors">Blue Archive</a>
                        <a href="{{ route('wallpapers.search', ['q' => 'Honkai Star Rail']) }}" class="px-3 py-1.5 bg-gray-800 hover:bg-gray-700 border border-gray-700 rounded-full text-xs text-gray-300 transition-colors">Honkai Star Rail</a>
                        <a href="{{ route('wallpapers.search', ['q' => '4K']) }}" class="px-3 py-1.5 bg-gray-800 hover:bg-gray-700 border border-gray-700 rounded-full text-xs text-gray-300 transition-colors">4K</a>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <h2 class="text-2xl font-bold text-white mb-8 text-center">Explore Collection</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                    <a href="{{ route('characters.index') }}" class="group relative h-40 rounded-2xl overflow-hidden border border-gray-700 hover:border-pink-500 transition-all duration-300">
                        <img src="https://storage.waifuwall.com/thumbnail/000/000/024/24.webp" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-50 group-hover:opacity-70">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/20 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <h3 class="text-xl font-bold text-white group-hover:text-pink-400 transition">Characters</h3>
                            <p class="text-[10px] leading-tight text-gray-400 group-hover:text-gray-200">Meet your legendary waifus and heroes</p>
                        </div>
                    </a>

                    <a href="{{ route('series.index') }}" class="group relative h-40 rounded-2xl overflow-hidden border border-gray-700 hover:border-cyan-500 transition-all duration-300">
                        <img src="https://storage.waifuwall.com/thumbnail/000/000/065/65.webp" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-50 group-hover:opacity-70">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/20 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <h3 class="text-xl font-bold text-white group-hover:text-cyan-400 transition">Series</h3>
                            <p class="text-[10px] leading-tight text-gray-400 group-hover:text-gray-200">Explore worlds from Anime and Games</p>
                        </div>
                    </a>

                    <a href="{{ route('tags.index') }}" class="group relative h-40 rounded-2xl overflow-hidden border border-gray-700 hover:border-emerald-500 transition-all duration-300">
                        <img src="https://storage.waifuwall.com/thumbnail/000/000/097/97.webp" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-50 group-hover:opacity-70">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/20 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <h3 class="text-xl font-bold text-white group-hover:text-emerald-400 transition">Tags</h3>
                            <p class="text-[10px] leading-tight text-gray-400 group-hover:text-gray-200">Filter by style, mood, or specific traits</p>
                        </div>
                    </a>

                    <a href="{{ route('artists.index') }}" class="group relative h-40 rounded-2xl overflow-hidden border border-gray-700 hover:border-orange-500 transition-all duration-300">
                        <img src="https://storage.waifuwall.com/thumbnail/000/000/111/111.webp" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-50 group-hover:opacity-70">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/20 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <h3 class="text-xl font-bold text-white group-hover:text-orange-400 transition">Artists</h3>
                            <p class="text-[10px] leading-tight text-gray-400 group-hover:text-gray-200">Gallery of world-class illustrators</p>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </main>

    @include('components.footer')
</body>
</html>