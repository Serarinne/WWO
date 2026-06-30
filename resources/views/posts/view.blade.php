<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $post->title }} | {{ env('APP_NAME') }} Blog</title>

    <link rel="canonical" href="{{ route('posts.view', ['post' => $post]) }}" />
    <meta name="description" content="{{ $post->excerpt ?? Str::limit(strip_tags($post->body), 155) }}">
    <meta name="keywords" content="{{ $post->title }}, {{ $post->categories->pluck('name')->join(', ') }}, {{ env('APP_NAME') }}, anime blog, wallpaper news">
    <meta name="author" content="{{ $post->author->name }}" />
    <meta name="robots" content="index, follow, max-image-preview:large">

    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ $post->excerpt ?? Str::limit(strip_tags($post->body), 155) }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:url" content="{{ route('posts.view', ['post' => $post]) }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:image" content="{{ $post->blog_image_jpg }}" />
    <meta property="article:published_time" content="{{ $post->published_at->toIso8601String() }}" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ $post->excerpt ?? Str::limit(strip_tags($post->body), 155) }}">
    <meta name="twitter:image" content="{{ $post->blog_image_jpg }}">

    @include('components.file-assets')

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org/",
        "@@type": "BlogPosting",
        "headline": "{{ $post->title }}",
        "image": "{{ $post->blog_image_jpg }}",
        "datePublished": "{{ $post->published_at->toIso8601String() }}",
        "dateModified": "{{ $post->updated_at->toIso8601String() }}",
        "author": {
            "@@type": "Person",
            "name": "{{ $post->author->name }}"
        },
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
                "name": "Blog",
                "item": "{{ route('posts.index') }}"
            }, {
                "@@type": "ListItem",
                "position": 3,
                "name": "{{ $post->title }}",
                "item": "{{ route('posts.view', ['post' => $post]) }}"
            }]
        }
    }
    </script>

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "BlogPosting",
      "mainEntityOfPage": {
        "@@type": "WebPage",
        "@@id": "{{ url()->current() }}"
      },
      "headline": "{{ $post->title }}",
      "description": "{{ $post->seo_description ?? $post->excerpt ?? Str::limit(strip_tags($post->body), 150) }}",
      @if($post->featured_image)
      "image": [
        "{{ env('STORAGE_URL').'/' . $post->featured_image . '.webp' }}"
      ],
      @endif
      "datePublished": "{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->toIso8601String() }}",
      "dateModified": "{{ $post->updated_at->toIso8601String() }}",
      "author": {
        "@@type": "Organization",
        "name": "{{ env('APP_NAME') }} Editorial",
        "url": "{{ url('/') }}"
      },
      "publisher": {
        "@@type": "Organization",
        "name": "{{ env('APP_NAME') }}",
        "logo": {
          "@@type": "ImageObject",
          "url": "{{ env('STORAGE_URL') }}/assets/logo.png" 
        }
      }
    }
    </script>
</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-indigo-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow">

        <article>
            <div class="relative w-full bg-gray-900 border-b border-gray-800">
                <div class="absolute inset-0">
                    <picture>
                        <source srcset="{{ $post->blog_image_webp }}" type="image/webp">
                        <source srcset="{{ $post->blog_image_jpg }}" type="image/jpeg">
                        <img src="{{ $post->blog_image_webp }}" alt="{{ $post->title }}" class="w-full h-full object-cover opacity-20 blur-sm">
                    </picture>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a] via-[#0f172a]/80 to-transparent"></div>
                </div>

                <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 pt-16 pb-12 md:pt-24 md:pb-16">
                    <div class="max-w-4xl mx-auto text-center">
                        <div class="flex justify-center gap-2 mb-6">
                            @foreach ($post->categories as $category)
                                <a href="{{ route('posts.category', $category) }}" class="px-3 py-1 text-xs font-bold text-white bg-indigo-600/80 backdrop-blur-md rounded-full shadow-lg hover:bg-indigo-500 transition-colors uppercase tracking-wider">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>

                        <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6 drop-shadow-lg">
                            {{ $post->title }}
                        </h1>

                        <div class="flex flex-wrap items-center justify-center gap-6 text-sm text-gray-300">
                            <div class="flex items-center gap-2 hover:text-white transition-colors group">
                                <img src="{{ $post->author->image['webp'] }}" alt="{{ $post->author->name }}" class="w-8 h-8 rounded-full border border-gray-600 group-hover:border-indigo-400 transition-colors">
                                <span class="font-medium">{{ $post->author->name }}</span>
                            </div>

                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <time datetime="{{ $post->published_at->toIso8601String() }}">{{ $post->published_at->format('F d, Y') }}</time>
                            </span>

                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                {{ number_format($post->views_count) }} Views
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-20">
                <div class="max-w-4xl mx-auto rounded-xl overflow-hidden shadow-2xl border border-gray-700/50 bg-gray-800">
                    <picture>
                        <source srcset="{{ $post->blog_image_webp }}" type="image/webp">
                        <source srcset="{{ $post->blog_image_jpg }}" type="image/jpeg">
                        <img src="{{ $post->blog_image_webp }}" alt="{{ $post->title }}" fetchpriority="high" width="896" height="504" class="w-full h-auto aspect-video object-cover">
                    </picture>
                </div>
            </div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="max-w-3xl mx-auto">
                    <div class="prose prose-lg prose-invert max-w-none prose-img:rounded-xl prose-headings:scroll-mt-20">
                        {!! Str::of($post->body)->markdown() !!}
                    </div>

                    <div class="mt-16 pt-8 border-t border-gray-800">
                        <h3 class="text-lg font-bold text-white mb-4 text-center">Share this post</h3>
                        <div class="flex justify-center gap-4">
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $post->title }}" target="_blank" rel="noopener" class="p-3 bg-[#1DA1F2]/10 text-[#1DA1F2] rounded-full hover:bg-[#1DA1F2] hover:text-white transition-colors">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                </svg>
                            </a>
                            <a href="https://facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" rel="noopener" class="p-3 bg-[#1877F2]/10 text-[#1877F2] rounded-full hover:bg-[#1877F2] hover:text-white transition-colors">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </main>

    @include('components.footer')
</body>
</html>