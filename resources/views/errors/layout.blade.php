<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('code') @yield('title')</title>
    <meta name="robots" content="noindex, nofollow" />

    @include('components.file-assets')
</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow flex items-center justify-center py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-screen-xl mx-auto text-center">
            
            <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">
                @yield('code')
            </h1>
            
            <p class="mb-4 text-3xl tracking-tight font-bold text-white md:text-4xl">
                @yield('title')
            </p>
            
            <p class="mb-8 text-lg font-light text-gray-400">
                @yield('message')
            </p>
            
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-6 py-3 text-base font-bold text-white transition-all duration-200 bg-gradient-to-r from-cyan-600 to-blue-600 rounded-lg hover:from-cyan-500 hover:to-blue-500 focus:ring-4 focus:outline-none focus:ring-cyan-800 shadow-lg shadow-cyan-500/20 transform hover:-translate-y-0.5">
                Back to Homepage
            </a>

        </div>
    </main>

    @include('components.footer')

</body>
</html>