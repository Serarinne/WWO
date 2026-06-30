<div class="relative z-40 bg-gray-900/95 backdrop-blur-md border-b border-gray-800">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Mobile Dropdown Wrapper (Tambahkan x-data) --}}
        <div class="md:hidden py-3 relative" x-data="{ open: false }">
            
            {{-- 1. Mobile Button --}}
            {{-- Ubah onclick menjadi @click --}}
            <button @click="open = !open" 
                    class="w-full bg-gray-800 border border-gray-700 text-white py-3 px-4 rounded-lg flex items-center justify-between font-medium shadow-sm hover:bg-gray-700 transition">
                
                <span class="flex items-center gap-2">
                    @if(request()->routeIs('series.view'))
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Wallpapers 
                    
                    @elseif(request()->routeIs('series.characters'))
                        <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        Characters 
                    @endif
                </span>

                {{-- Chevron Icon (Berputar saat open) --}}
                <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200" 
                     :class="{'rotate-180': open}" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            {{-- 2. Mobile Menu Items --}}
            {{-- Tambahkan x-show, x-transition, dan @click.outside --}}
            <div x-show="open" 
                 @click.outside="open = false"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-2"
                 class="absolute top-full left-0 right-0 mt-2 bg-gray-800 border border-gray-700 rounded-lg shadow-xl z-20 overflow-hidden"
                 style="display: none;"> {{-- style display:none untuk mencegah flicker saat load --}}
                
                <a href="{{ route('series.view', $series) }}" 
                   class="block px-4 py-3 border-l-4 {{ request()->routeIs('series.view') ? 'border-blue-500 bg-gray-700/50 text-white' : 'border-transparent text-gray-300 hover:bg-gray-700' }}">
                   <div class="flex items-center justify-between">
                       <span class="flex items-center gap-2">
                           <svg class="w-5 h-5 {{ request()->routeIs('series.view') ? 'text-blue-400' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                           Wallpapers
                       </span>
                   </div>
                </a>

                <a href="{{ route('series.characters', $series) }}" 
                   class="block px-4 py-3 border-l-4 {{ request()->routeIs('series.characters') ? 'border-cyan-500 bg-gray-700/50 text-white' : 'border-transparent text-gray-300 hover:bg-gray-700' }}">
                   <div class="flex items-center justify-between">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5 {{ request()->routeIs('series.characters') ? 'text-cyan-400' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Characters
                        </span>
                   </div>
                </a>

            </div>
        </div>

        {{-- 3. Desktop Navigation (Tidak berubah) --}}
        <nav class="hidden md:flex space-x-8" aria-label="Tabs">
            <a href="{{ route('series.view', $series) }}" 
               class="group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request()->routeIs('series.view') ? 'border-blue-500 text-blue-400' : 'border-transparent text-gray-400 hover:text-white hover:border-gray-600' }}">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Wallpapers 
            </a>

            <a href="{{ route('series.characters', $series) }}" 
               class="group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request()->routeIs('series.characters') ? 'border-cyan-500 text-cyan-400' : 'border-transparent text-gray-400 hover:text-white hover:border-gray-600' }}">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                Characters 
            </a>
        </nav>
    </div>
</div>