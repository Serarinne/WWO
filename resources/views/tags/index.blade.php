<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty($q) ? 'Search Tags: ' . $q : 'Browse All Anime Wallpaper Tags' }} | {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ !empty($q) ? route('tags.index', ['q' => $q]) : route('tags.index') }}" />
    <meta name="description" content="Explore a complete list of anime wallpaper tags on {{ env('APP_NAME') }}. Find your favorite categories and browse thousands of high-quality wallpapers.">
    <meta name="keywords" content="anime tags, wallpaper categories, waifuwall tags, anime girl themes, 4k anime wallpaper">
    
    @if(!empty($q))
    <meta name="robots" content="noindex, follow" />
    @else
    <meta name="robots" content="index, follow, max-image-preview:large" />
    @endif

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Browse All Anime Wallpaper Tags | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Explore a complete list of anime wallpaper tags on {{ env('APP_NAME') }}." />
    <meta property="og:url" content="{{ route('tags.index') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Browse All Anime Wallpaper Tags" />
    <meta name="twitter:description" content="Explore a complete list of anime wallpaper tags on {{ env('APP_NAME') }}." />

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "CollectionPage",
        "name": "Anime Wallpaper Tags Directory",
        "url": "{{ route('tags.index') }}",
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
                "name": "Tags",
                "item": "{{ route('tags.index') }}"
            }]
        }
    }
    </script>

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "CollectionPage",
      "name": "{{ env('APP_NAME') }} Wallpaper Tags",
      "description": "Directory of anime and game wallpaper categories.",
      "url": "{{ route('tags.index') }}"
    }
    </script>
</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden py-12">

        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[600px] bg-indigo-900/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 mb-4">
                    Explore Tags
                </h1>
                <p class="text-gray-400 text-lg mb-8">Find your favorite categories and themes.</p>

                <div class="max-w-xl mx-auto">
                    <form action="{{ route('tags.index') }}" method="GET" class="relative group">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg blur opacity-30 group-hover:opacity-70 transition duration-200"></div>
                        <div class="relative flex items-center bg-gray-900 rounded-lg">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" name="q" value="{{ request('q') }}" class="block w-full p-4 pl-12 text-sm text-gray-100 bg-transparent border border-gray-700 rounded-lg focus:ring-0 focus:border-transparent placeholder-gray-500" placeholder="Search tags (e.g. Uniform, Blue Eyes)..." required>
                        </div>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">

                @forelse($tags as $tag)
                    <div class="group relative rounded-xl overflow-hidden bg-gray-800 shadow-md hover:shadow-2xl hover:shadow-cyan-500/10 transition-all duration-300 transform hover:-translate-y-1">
                        <a href="{{ route('tags.view', $tag->slug) }}" class="block w-full h-full">

                            <div class="aspect-[1/1] w-full overflow-hidden bg-gray-700 relative">
                                <picture>
                                    <source srcset="{{ $tag->image['webp'] }}" type="image/webp">
                                    <source srcset="{{ $tag->image['jpg'] }}" type="image/jpeg">
                                    <img src="{{ $tag->image['webp'] }}" 
                                         alt="Anime wallpapers featuring {{ $tag->name }}" 
                                         width="300" height="300" 
                                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" 
                                         loading="lazy">
                                </picture>

                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                            </div>

                            <div class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-1 group-hover:translate-y-0 transition-transform duration-300">
                                <div class="font-bold text-white text-sm md:text-base truncate text-center group-hover:text-cyan-400 transition-colors">
                                    {{ $tag->name }}
                                </div>
                                @if(isset($tag->wallpapers_count))
                                    <p class="text-[10px] text-gray-400 text-center opacity-0 group-hover:opacity-100 transition-opacity uppercase tracking-wider">
                                        {{ $tag->wallpapers_count }} wallpapers
                                    </p>
                                @endif
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center bg-gray-800/30 rounded-2xl border border-gray-700/50 border-dashed">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-800 mb-4 text-gray-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-white">No tags found</h3>
                        <p class="text-gray-400 mt-1">We couldn't find any tags matching "<strong>{{ request('q') }}</strong>".</p>
                        @if(request('q'))
                            <a href="{{ route('tags.index') }}" class="mt-4 inline-block text-cyan-400 hover:text-cyan-300 hover:underline">View all tags</a>
                        @endif
                    </div>
                @endforelse

            </div>

            @if($tags->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $tags->links('components.pagination') }}
                </div>
            @endif

        </div>
    </main>

    @include('components.footer')
</body>
</html>