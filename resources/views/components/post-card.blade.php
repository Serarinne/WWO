@props(['post'])

<article class="bg-gray-800/40 backdrop-blur-sm border border-gray-700/50 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:border-cyan-500/30 transition-all duration-300 group flex flex-col h-full transform hover:-translate-y-1">
    <a href="{{ route('posts.view', $post->slug) }}" class="relative block aspect-video overflow-hidden">
        <picture>
            <source srcset="{{ $post->blog_image_webp }}" type="image/webp">
            <source srcset="{{ $post->blog_image_jpg }}" type="image/jpeg">
            <img src="{{ $post->blog_image_webp }}" 
                 alt="{{ $post->title }}" 
                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                 loading="lazy">
        </picture>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-60"></div>

        <div class="absolute top-4 left-4 flex gap-2 flex-wrap">
            @foreach($post->categories->take(2) as $category)
                <span class="px-2.5 py-1 text-xs font-bold text-white bg-gray-900/80 backdrop-blur-md rounded-full border border-gray-700/50 shadow-sm">
                    {{ $category->name }}
                </span>
            @endforeach
        </div>
    </a>

    <div class="p-6 flex flex-col flex-grow">
        <div class="flex items-center text-xs text-gray-400 mb-3 gap-3">
            <div class="flex items-center gap-1.5">
                <img src="{{ $post->author->user_image_webp }}" alt="{{ $post->author->name }}" class="w-5 h-5 rounded-full">
                <span>{{ $post->author->name }}</span>
            </div>
            <span>•</span>
            <time datetime="{{ $post->created_at->toIso8601String() }}">
                {{ $post->created_at->format('M d, Y') }}
            </time>
        </div>

        <h2 class="text-xl font-bold text-white mb-3 line-clamp-2 group-hover:text-cyan-400 transition-colors">
            <a href="{{ route('posts.view', $post->slug) }}">{{ $post->title }}</a>
        </h2>

        <p class="text-gray-400 text-sm mb-4 line-clamp-3 flex-grow leading-relaxed">
            {{ Str::limit(strip_tags($post->body), 120) }}
        </p>

        <div class="mt-auto border-t border-gray-700/50 pt-4 flex justify-between items-center">
            <a href="{{ route('posts.view', $post->slug) }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 font-medium text-sm transition-colors group/link">
                Read Article
                <svg class="w-4 h-4 ml-1 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>

            <span class="text-xs text-gray-500">
                {{ $post->reading_time }}
            </span>
        </div>
    </div>
</article>