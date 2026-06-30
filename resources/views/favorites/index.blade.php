<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>My Favorites | {{ env('APP_NAME') }}</title>
    <meta name="description" content="View and manage your saved Honkai: Star Rail wallpapers on {{ env('APP_NAME') }}." />
    <meta name="robots" content="noindex, nofollow" />
    <link rel="canonical" href="{{ route('favorites.index') }}" />

    <x-file-assets />
    
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

    <x-navigation />

    <main class="flex-grow">
        {{-- Hero Header --}}
        <div class="relative bg-gray-900 border-b border-gray-800 overflow-hidden">
            <div class="absolute inset-0 z-0">
                <!-- Background ambient blur (menggantikan image background) -->
                <div class="absolute inset-0 bg-gradient-to-br from-cyan-900/30 via-gray-900 to-pink-900/20 opacity-60 blur-3xl scale-110"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a] via-[#0f172a]/60 to-transparent"></div>
            </div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
                <!-- Breadcrumb -->
                <div class="mb-6 flex flex-wrap items-center gap-2 text-xs font-bold text-gray-400 uppercase tracking-widest">
                    <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors focus-visible:outline-none">Home</a>
                    <span class="text-gray-600">&bull;</span>
                    <span class="text-cyan-400">My Favorites</span>
                </div>

                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    {{-- Icon Box (Menggantikan Tag Image) --}}
                    <div class="flex-shrink-0 relative group">
                        <div class="w-32 h-32 md:w-48 md:h-48 rounded-2xl overflow-hidden border-4 border-gray-800 shadow-2xl relative z-10 bg-gray-900 flex items-center justify-center">
                            <svg class="w-16 h-16 md:w-24 md:h-24 text-pink-500 drop-shadow-[0_0_15px_rgba(236,72,153,0.5)] group-hover:scale-110 transition-transform duration-500" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        </div>
                        <div class="absolute inset-0 bg-pink-500 blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500 -z-10 rounded-full"></div>
                    </div>

                    <div class="flex-grow text-center md:text-left pt-1 w-full md:w-auto">
                        <div class="flex items-center justify-center md:justify-start gap-2 mb-2">
                            <span class="px-2 py-0.5 rounded bg-cyan-900/50 text-cyan-300 text-xs font-medium border border-cyan-700/50">Collection</span>
                        </div>
                        
                        <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
                            My Favorites
                        </h1>

                        <div class="max-w-xl mx-auto md:mx-0 mb-6">
                            <p class="text-gray-300 text-sm md:text-base leading-relaxed">
                                @if($wallpapers->total() > 0)
                                    You have saved <span class="text-cyan-400 font-bold">{{ $wallpapers->total() }}</span> HSR wallpapers to your personal collection.
                                @else
                                    Your Data Bank is currently empty. Start building your collection by exploring the gallery and saving wallpapers you love!
                                @endif
                            </p>
                        </div>

                        @if($wallpapers->total() > 0)
                            <div class="flex justify-center md:justify-start">
                                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-gray-800 hover:bg-gray-750 border border-gray-700 hover:border-cyan-500/50 transition-all text-sm font-medium text-gray-300 hover:text-white group">
                                    Browse More Wallpapers
                                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if($wallpapers->total() > 0)
            {{-- Filter/Count Bar --}}
            <div class="border-b border-gray-800 bg-gray-900/90 top-16 z-40 backdrop-blur-md shadow-md">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center gap-3">
                        <h2 class="text-lg font-bold text-white tracking-wide">Saved Collection</h2>
                        <span class="flex items-center justify-center px-2.5 py-0.5 rounded-full bg-gray-800 border border-gray-700 text-cyan-400 text-xs font-bold shadow-sm">
                            {{ number_format($wallpapers->total()) }}
                        </span>
                    </div>
                </div>
            </div>
        @endif

        {{-- Main Content Section --}}
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            @if($wallpapers->total() > 0)
                {{-- Gallery Grid --}}
                <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-6 space-y-6">
                    @foreach($wallpapers as $wallpaper)
                        <div class="break-inside-avoid mb-6">
                            <x-wallpaper-card :wallpaper="$wallpaper" />
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if($wallpapers->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $wallpapers->links('components.pagination') }}
                    </div>
                @endif

            @else
                {{-- Empty State (Disesuaikan dengan tema Tag/Gray) --}}
                <div class="col-span-full py-24 px-4 text-center bg-gray-800/30 rounded-2xl border border-gray-700/50 border-dashed max-w-4xl mx-auto mt-8">
                    <div class="relative mb-6 group inline-block">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-gray-800 border border-gray-700 flex items-center justify-center shadow-inner mx-auto group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-10 h-10 sm:w-12 sm:h-12 text-gray-500 group-hover:text-pink-500 transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <h2 class="text-2xl sm:text-3xl font-bold text-white mb-3">No favorites found</h2>
                    <p class="text-gray-400 max-w-md mx-auto text-sm sm:text-base mb-8">
                        It looks like you haven't added any wallpapers to your favorites. Click the <span class="text-pink-500 font-bold">❤️ button</span> on any wallpaper you like!
                    </p>
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-cyan-600 hover:bg-cyan-500 text-white font-medium rounded-lg transition-colors shadow-lg shadow-cyan-900/20">
                        Explore Wallpapers
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            @endif

        </div>
    </main>

    <x-footer />
</body>
</html>