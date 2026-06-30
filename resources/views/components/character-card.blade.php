@props(['character'])

@if ($character->series->isNotEmpty())
    <article class="group relative rounded-2xl overflow-hidden bg-gray-800 shadow-lg hover:shadow-[0_0_25px_-5px_rgba(6,182,212,0.3)] hover:-translate-y-1.5 transition-all duration-300 border border-gray-700/50 hover:border-cyan-500/50">
        <a href="{{ route('characters.view', ['series' => $character->series->first(), 'character' => $character]) }}" class="block w-full h-full">
            
            {{-- Floating Badge untuk Total Wallpapers --}}
            <div class="absolute top-3 right-3 z-20">
                <div class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-gray-900/60 backdrop-blur-md border border-gray-600/50 group-hover:border-cyan-500/50 group-hover:bg-cyan-950/80 transition-all duration-300 shadow-lg">
                    <svg class="w-3.5 h-3.5 text-gray-400 group-hover:text-cyan-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-xs font-bold text-gray-300 group-hover:text-white transition-colors duration-300">
                        {{ $character->wallpapers_count }}
                    </span>
                </div>
            </div>

            <div class="aspect-[3/4] w-full overflow-hidden bg-gray-900 relative">
                <picture>
                    <source srcset="{{ $character->image['webp'] }}" type="image/webp">
                    <source srcset="{{ $character->image['jpg'] }}" type="image/jpeg">
                    <img src="{{ $character->image['webp'] }}" alt="{{ $character->name }}" width="300" height="400" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
                </picture>
                
                {{-- Gradient Overlay yang lebih smooth --}}
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent opacity-80 group-hover:opacity-95 transition-opacity duration-300"></div>
            </div>

            {{-- Informasi Karakter di Bawah --}}
            <div class="absolute bottom-0 left-0 right-0 p-5 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                <div class="flex items-center justify-between gap-3">
                    <div class="font-extrabold text-white text-base md:text-lg truncate leading-tight group-hover:text-cyan-400 transition-colors drop-shadow-md">
                        {{ $character->name }}
                    </div>
                    
                    {{-- Panah penunjuk yang muncul saat di-hover --}}
                    <div class="shrink-0 opacity-0 transform -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300">
                        <div class="bg-cyan-500/20 p-1.5 rounded-md">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
        </a>
    </article>
@endif