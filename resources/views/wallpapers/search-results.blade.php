<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Search Results for "{{ $query }}" | {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ route('wallpapers.search') }}" />
    <meta name="description" content="Find high-quality anime wallpapers matching your search for '{{ $query }}'. Explore a vast collection of art featuring your favorite characters.">
    <meta name="robots" content="noindex, follow">

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Search Results for '{{ $query }}' | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Find high-quality anime wallpapers matching your search for '{{ $query }}'." />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Search Results for '{{ $query }}'" />
    <meta name="twitter:description" content="Find high-quality anime wallpapers matching your search for '{{ $query }}'." />

    @include('components.file-assets')

</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden py-12">

        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-indigo-900/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <div class="text-center mb-12">
                <p class="text-sm text-gray-400 font-medium uppercase tracking-wider mb-2">Search Results</p>
                <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4">
                    "{{ $query }}"
                </h1>

                @if($wallpapers->total() > 0)
                    <p class="text-gray-400">Found <span class="text-cyan-400 font-bold">{{ $wallpapers->total() }}</span> matching wallpapers</p>
                @endif

                <div class="max-w-xl mx-auto mt-8">
                    <form action="{{ route('wallpapers.search') }}" method="GET" class="relative group">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg blur opacity-30 group-hover:opacity-70 transition duration-200"></div>
                        <div class="relative flex items-center bg-gray-900 rounded-lg">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" 
                                   name="q" 
                                   value="{{ $query }}" 
                                   class="block w-full p-3 pl-10 text-sm text-gray-100 bg-transparent border border-gray-700 rounded-lg focus:ring-0 focus:border-transparent placeholder-gray-500" 
                                   placeholder="Refine your search..." 
                                   required>
                        </div>
                    </form>
                </div>
            </div>

            @if($wallpapers->count())
                <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-6 space-y-6">
                    @foreach($wallpapers as $wallpaper)
                        <div class="break-inside-avoid">
                            <x-wallpaper-card :wallpaper="$wallpaper" />
                        </div>
                    @endforeach
                </div>

                @if($wallpapers->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $wallpapers->appends(['q' => $query])->links("components.pagination") }}
                    </div>
                @endif
            @else
                <div class="col-span-full py-20 text-center bg-gray-800/30 rounded-2xl border border-gray-700/50 border-dashed">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-800 mb-4 text-gray-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-white">No matches found</h3>
                    <p class="text-gray-400 mt-2">We couldn't find any wallpapers for "<strong>{{ $query }}</strong>".</p>
                    <div class="mt-6 flex justify-center gap-3">
                        <a href="{{ route('home') }}" class="text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 px-4 py-2 rounded-lg transition-colors">Go Home</a>
                        <a href="{{ route('tags.index') }}" class="text-sm font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg transition-colors">Browse Tags</a>
                    </div>
                </div>
            @endif

        </div>
    </main>

    @include('components.footer')
</body>
</html>