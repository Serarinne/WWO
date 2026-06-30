<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Anime News & Articles | {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ route('posts.index') }}" />
    <meta name="description" content="Read the latest news, updates, and articles from the {{ env('APP_NAME') }} team. Discover new wallpaper collections, artist spotlights, and community highlights.">
    <meta name="keywords" content="waifuwall blog, anime news, wallpaper updates, artist spotlight, anime reviews">
    <meta name="robots" content="index, follow, max-image-preview:large">

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Anime News & Articles | {{ env('APP_NAME') }} Blog" />
    <meta property="og:description" content="Read the latest news, updates, and articles from the {{ env('APP_NAME') }} team." />
    <meta property="og:url" content="{{ route('posts.index') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Anime News & Articles | {{ env('APP_NAME') }} Blog" />
    <meta name="twitter:description" content="Read the latest news, updates, and articles from the {{ env('APP_NAME') }} team." />

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Blog",
        "name": "{{ env('APP_NAME') }} Blog",
        "description": "News and articles about anime wallpapers and artists.",
        "url": "{{ route('posts.index') }}",
        "publisher": {
            "@@type": "Organization",
            "name": "{{ env('APP_NAME') }}",
            "logo": {
                "@@type": "ImageObject",
                "url": "https://storage.waifuwall.com/assets/android-icon-192x192.png"
            }
        }
    }
    </script>
</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden">

        <div class="relative bg-gray-900 border-b border-gray-800 py-16 sm:py-24">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/20 via-transparent to-purple-900/20"></div>
            <div class="absolute inset-0 opacity-5"></div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <h1 class="text-4xl md:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 mb-4 tracking-tight">
                    News & Articles
                </h1>
                <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto">
                    Stay updated with the latest anime news, wallpaper collections, artist spotlights, and community highlights.
                </p>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <x-post-card :post="$post" />
                @empty
                    <div class="col-span-full py-20 text-center bg-gray-800/30 rounded-2xl border border-gray-700/50 border-dashed">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-800 mb-4 text-gray-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 00-2-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-white">No articles yet</h3>
                        <p class="text-gray-400 mt-2">Check back later for news and updates.</p>
                    </div>
                @endforelse
            </div>

            @if($posts->hasPages())
                <div class="mt-16 flex justify-center">
                    {{ $posts->links('components.pagination') }}
                </div>
            @endif

        </div>
    </main>

    @include('components.footer')
</body>
</html>