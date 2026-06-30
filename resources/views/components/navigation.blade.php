<style>
    /* Jarak bawah untuk Mobile agar konten tidak tertutup Bottom Bar */
    @media (max-width: 1023px) { body { padding-bottom: 2rem !important; } }
</style>

<div class="relative w-full h-0 lg:h-20 bg-transparent pointer-events-none select-none"></div>

<nav class="hidden lg:flex fixed top-5 left-0 right-0 z-50 justify-center transition-all duration-300">
    <div class="w-full max-w-7xl mx-4 bg-gray-900/80 backdrop-blur-xl border border-gray-700/50 rounded-2xl shadow-2xl shadow-black/50 px-4 py-3 flex items-center justify-between ring-1 ring-white/10">
        
        <div class="flex items-center gap-6 xl:gap-8">
            <a href="{{ route('home') }}" class="group flex items-center gap-2">
                <img src="https://storage.ntewallpapers.com/assets/logo.png" alt="{{ env('APP_NAME') }} Logo" class="h-9 w-auto group-hover:scale-105 transition-transform">
            </a>

            <div class="flex items-center bg-gray-800/50 rounded-full p-1 border border-gray-700/50 relative overflow-x-auto no-scrollbar">
                
                <a href="{{ route('home') }}" class="{{ request()->routeIs('wallpapers.index') ? 'bg-gray-700 text-white shadow-sm' : 'text-gray-200 hover:text-white hover:bg-gray-700/50' }} px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Home
                </a>

                <a href="{{ route('characters.index') }}" class="{{ request()->routeIs('characters.*') ? 'bg-gray-700 text-white shadow-sm' : 'text-gray-200 hover:text-white hover:bg-gray-700/50' }} px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">
                    <svg class="w-3.5 h-3.5 {{ request()->routeIs('characters.*') ? 'text-white' : 'text-pink-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    Characters
                </a>

                <a href="{{ route('series.index') }}" class="{{ request()->routeIs('series.*') ? 'bg-gray-700 text-white shadow-sm' : 'text-gray-200 hover:text-white hover:bg-gray-700/50' }} px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">
                    <svg class="w-3.5 h-3.5 {{ request()->routeIs('series.*') ? 'text-white' : 'text-yellow-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                    </svg>
                    Series
                </a>

                <a href="{{ route('tags.index') }}" class="{{ request()->routeIs('tags.*') ? 'bg-gray-700 text-white shadow-sm' : 'text-gray-200 hover:text-white hover:bg-gray-700/50' }} px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">
                    <svg class="w-3.5 h-3.5 {{ request()->routeIs('tags.*') ? 'text-white' : 'text-green-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" /></svg>
                    Tags
                </a>

                <a href="{{ route('posts.index') }}" class="{{ request()->routeIs('posts.*') ? 'bg-gray-700 text-white shadow-sm' : 'text-gray-200 hover:text-white hover:bg-gray-700/50' }} px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">
                    <svg class="w-3.5 h-3.5 {{ request()->routeIs('posts.*') ? 'text-white' : 'text-blue-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" /></svg>
                    Posts
                </a>

            </div>
        </div>

        <div class="flex items-center gap-4">
            
            <form action="{{ route('wallpapers.search') }}" method="GET" class="group relative hidden xl:block">
                <div class="flex items-center bg-gray-800 border border-gray-700 rounded-full px-3 py-1.5 focus-within:border-cyan-500 focus-within:ring-2 focus-within:ring-cyan-500/20 transition-all w-48 focus-within:w-64">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" name="q" placeholder="Search..." value="{{ request('q') }}" class="bg-transparent border-none text-sm text-white placeholder-gray-500 focus:ring-0 w-full ml-2">
                </div>
            </form>
            <a href="{{ route('wallpapers.search') }}" class="xl:hidden text-gray-400 hover:text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></a>

            <div class="h-6 w-px bg-gray-700"></div>

            @auth
                <div class="relative group/user ml-2">
                    <button class="flex items-center gap-3 focus:outline-none">
                        <div class="text-right hidden 2xl:block">
                            <p class="text-xs font-bold text-white">{{ Auth::user()->username }}</p>
                            <p class="text-[10px] text-gray-400">{{ Auth::user()->is_artist ? 'Artist' : 'Member' }}</p>
                        </div>
                        <div class="h-9 w-9 rounded-full p-0.5 bg-gradient-to-tr from-cyan-500 to-purple-600">
                            <div class="h-full w-full rounded-full bg-gray-900 flex items-center justify-center overflow-hidden">
                                @if(Auth::user()->avatar)
                                    <img src="{{ Auth::user()->image['webp'] }}" class="h-full w-full object-cover">
                                @else
                                    <span class="text-xs font-bold text-white">{{ substr(Auth::user()->username, 0, 1) }}</span>
                                @endif
                            </div>
                        </div>
                    </button>

                    <div class="absolute right-0 top-full mt-4 w-56 opacity-0 invisible group-hover/user:opacity-100 group-hover/user:visible transition-all duration-200 transform translate-y-2 group-hover/user:translate-y-0">
                        <div class="bg-gray-900 border border-gray-700 rounded-xl shadow-xl overflow-hidden ring-1 ring-white/10">
                            <div class="p-3 border-b border-gray-800 bg-gray-800/50">
                                <p class="text-xs text-gray-500 uppercase tracking-wider font-bold">My Account</p>
                            </div>
                            <div class="p-2 space-y-1">
                                <a href="{{ route('favorites.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                                    <svg class="w-4 h-4 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                                    My Favorites
                                </a>
                                <a href="{{ route('settings.edit') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    Settings
                                </a>
                            </div>
                            <div class="p-2 border-t border-gray-800 bg-gray-900">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="w-full flex items-center justify-center gap-2 px-3 py-1.5 rounded-lg text-xs font-bold text-red-400 bg-red-400/10 hover:bg-red-400/20 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('login.index') }}" class="text-sm font-bold text-gray-300 hover:text-white transition-colors">Log In</a>
            @endauth
        </div>
    </div>
</nav>

<div class="lg:hidden fixed bottom-0 left-0 right-0 bg-gray-900 border-t border-gray-800 z-50 pb-safe">
    <div class="flex items-center justify-around h-16">
        
        <a href="{{ route('home') }}" class="flex flex-col items-center justify-center w-full h-full space-y-1 {{ request()->routeIs('wallpapers.index') ? 'bg-gray-700 text-white shadow-sm' : 'text-gray-200 hover:text-white hover:bg-gray-700/50' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            <span class="text-[10px] font-medium">Home</span>
        </a>

        <a href="{{ route('wallpapers.search') }}" class="flex flex-col items-center justify-center w-full h-full space-y-1 {{ request()->routeIs('wallpapers.search') ? 'bg-gray-700 text-white shadow-sm' : 'text-gray-200 hover:text-white hover:bg-gray-700/50' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <span class="text-[10px] font-medium">Search</span>
        </a>

        @auth
            <a href="{{ route('favorites.index') }}" class="flex flex-col items-center justify-center w-full h-full space-y-1 {{ request()->routeIs('favorites.index') ? 'bg-gray-700 text-white shadow-sm' : 'text-gray-200 hover:text-white hover:bg-gray-700/50' }}">
                @if(Auth::user()->avatar)
                    <img src="{{ Auth::user()->image['webp'] }}" class="w-6 h-6 rounded-full object-cover border border-gray-700">
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                @endif
                <span class="text-[10px] font-medium">Me</span>
            </a>
        @else
            <a href="{{ route('login.index') }}" class="flex flex-col items-center justify-center w-full h-full space-y-1 {{ request()->routeIs('login.index') ? 'bg-gray-700 text-white shadow-sm' : 'text-gray-200 hover:text-white hover:bg-gray-700/50' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                <span class="text-[10px] font-medium">Login</span>
            </a>
        @endauth

        <button onclick="document.getElementById('mobile-menu-drawer').classList.remove('translate-y-full')" class="flex flex-col items-center justify-center w-full h-full space-y-1 text-gray-200 hover:text-white hover:bg-gray-700/50">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            <span class="text-[10px] font-medium">Menu</span>
        </button>
    </div>
</div>

<div id="mobile-menu-drawer" class="lg:hidden fixed inset-0 z-[60] transform translate-y-full transition-transform duration-300">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="document.getElementById('mobile-menu-drawer').classList.add('translate-y-full')"></div>
    
    <div class="absolute bottom-0 left-0 right-0 bg-gray-900 rounded-t-2xl border-t border-gray-800 p-6 pb-24 shadow-2xl overflow-y-auto max-h-[80vh]">
        <div class="flex justify-center mb-6" onclick="document.getElementById('mobile-menu-drawer').classList.add('translate-y-full')">
            <div class="w-12 h-1 bg-gray-700 rounded-full"></div>
        </div>
        
        <h3 class="text-white font-bold text-lg mb-4">Explore</h3>
        <div class="grid grid-cols-2 gap-4 mb-6">
            <a href="{{ route('characters.index') }}" class="flex flex-col items-center gap-2 p-3 bg-gray-800 rounded-xl hover:bg-gray-700 border border-gray-800 hover:border-pink-500/30 transition-colors">
                <div class="p-2 bg-pink-500/20 text-pink-400 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <span class="{{ request()->routeIs('characters.*') ? 'bg-gray-700 text-white shadow-sm' : 'text-gray-200 hover:text-white hover:bg-gray-700/50' }} px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">Characters</span>
            </a>

            <a href="{{ route('series.index') }}" class="flex flex-col items-center gap-2 p-3 bg-gray-800 rounded-xl hover:bg-gray-700 border border-gray-800 hover:border-yellow-500/30 transition-colors">
                <div class="p-2 bg-yellow-500/20 text-yellow-400 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                    </svg>
                </div>
                <span class="{{ request()->routeIs('series.*') ? 'bg-gray-700 text-white shadow-sm' : 'text-gray-200 hover:text-white hover:bg-gray-700/50' }} px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">
                    Series
                </span>
            </a>
            
            <a href="{{ route('posts.index') }}" class="flex flex-col items-center gap-2 p-3 bg-gray-800 rounded-xl hover:bg-gray-700 border border-gray-800 hover:border-blue-500/30 transition-colors">
                <div class="p-2 bg-blue-500/20 text-blue-400 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
                <span class="{{ request()->routeIs('posts.*') ? 'bg-gray-700 text-white shadow-sm' : 'text-gray-200 hover:text-white hover:bg-gray-700/50' }} px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">Posts</span>
            </a>
            
            <a href="{{ route('tags.index') }}" class="flex flex-col items-center gap-2 p-3 bg-gray-800 rounded-xl hover:bg-gray-700 border border-gray-800 hover:border-green-500/30 transition-colors">
                <div class="p-2 bg-green-500/20 text-green-400 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                </div>
                <span class="{{ request()->routeIs('tags.*') ? 'bg-gray-700 text-white shadow-sm' : 'text-gray-200 hover:text-white hover:bg-gray-700/50' }} px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">Tags</span>
            </a>
        </div>

        @auth
            <h3 class="text-white font-bold text-lg mb-4">My Account</h3>
            <div class="space-y-2 mb-6">
                {{-- My Favorites --}}
                <a href="{{ route('favorites.index') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-800 rounded-lg text-gray-300 font-medium hover:bg-gray-700 hover:text-white transition-colors">
                    <svg class="w-5 h-5 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                    My Favorites
                </a>

                {{-- Settings --}}
                <a href="{{ route('settings.edit') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-800 rounded-lg text-gray-300 font-medium hover:bg-gray-700 hover:text-white transition-colors">
                    <svg class="w-5 h-5 text-gray-500 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    Settings
                </a>
            </div>

            <div class="border-t border-gray-800 pt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full flex items-center justify-center gap-2 p-3 bg-red-500/10 text-red-400 rounded-xl hover:bg-red-500/20 font-bold transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Log Out
                    </button>
                </form>
            </div>
        @else
            <a href="{{ route('login.index') }}" class="block w-full text-center bg-gray-800 border border-gray-700 text-white py-3 rounded-xl font-bold">Log In</a>
        @endauth
    </div>
</div>