<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Contact Us | {{ env('APP_NAME') }}</title>
    
    <meta name="title" content="Contact Us - {{ env('APP_NAME') }}">
    <meta name="description" content="Have a question, feedback, or artist inquiry? Contact the {{ env('APP_NAME') }} team. We are here to help with any anime wallpaper related questions.">
    <meta name="keywords" content="waifuwall, contact waifuwall, waifuwall feedback, get in touch, anime wallpaper support, artist inquiry">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ route('contact') }}">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('contact') }}">
    <meta property="og:title" content="Contact Us - {{ env('APP_NAME') }}">
    <meta property="og:description" content="Have a question or feedback for {{ env('APP_NAME') }}? Fill out our contact form to get in touch with the team.">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ route('contact') }}">
    <meta name="twitter:title" content="Contact Us - {{ env('APP_NAME') }}">
    <meta name="twitter:description" content="Have a question or feedback for {{ env('APP_NAME') }}? Fill out our contact form to get in touch with the team.">

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org/",
        "@@type": "BreadcrumbList",
        "itemListElement": [{
            "@@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ route('home') }}"
        }, {
            "@@type": "ListItem",
            "position": 2,
            "name": "Contact Us",
            "item": "{{ route('contact') }}"
        }]
    }
    </script>

    <script type="application/ld+json">
    [
      {
        "@@context": "https://schema.org",
        "@@type": "ContactPage",
        "name": "Contact {{ env('APP_NAME') }}",
        "url": "{{ route('contact') }}",
        "description": "Contact page for {{ env('APP_NAME') }}, offering channels for support, business, and legal inquiries."
      },
      {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "{{ env('APP_NAME') }}",
        "url": "{{ url('/') }}",
        "contactPoint": [
          {
            "@@type": "ContactPoint",
            "email": "support@waifuwall.com",
            "contactType": "customer support",
            "areaServed": "Worldwide"
          },
          {
            "@@type": "ContactPoint",
            "email": "admin@waifuwall.com",
            "contactType": "sales",
            "areaServed": "Worldwide"
          }
        ]
      }
    ]
    </script>
</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden py-12">
        <div class="absolute top-0 right-1/4 w-[600px] h-[600px] bg-purple-900/20 blur-[100px] rounded-full pointer-events-none -z-10"></div>
        <div class="absolute bottom-0 left-1/4 w-[500px] h-[500px] bg-cyan-900/10 blur-[100px] rounded-full pointer-events-none -z-10"></div>

        <div class="container mx-auto px-4 max-w-4xl">

            <div class="text-center mb-10">
                <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 mb-4">
                    Get in Touch
                </h1>
                <p class="text-gray-400 text-lg">
                    Have a question, feedback, or a specific inquiry? Reach out to us directly through the emails below.
                </p>
            </div>

            <div class="bg-gray-800/50 backdrop-blur-md border border-gray-700/50 rounded-2xl shadow-2xl p-6 md:p-10 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-cyan-500 to-transparent opacity-50"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- General Support -->
                    <a href="mailto:support@waifuwall.com" class="flex items-start p-5 rounded-xl bg-gray-900/50 border border-gray-700/50 hover:border-cyan-500/50 transition-all group hover:bg-gray-800/80">
                        <div class="p-3 bg-cyan-900/30 text-cyan-400 rounded-lg group-hover:bg-cyan-500 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-white group-hover:text-cyan-400 transition-colors">General Support</h3>
                            <p class="text-sm text-gray-400 mt-1 mb-2">For general questions, feedback, and user assistance.</p>
                            <span class="text-cyan-500 font-medium text-sm">support@waifuwall.com</span>
                        </div>
                    </a>

                    <!-- Admin / Business -->
                    <a href="mailto:admin@waifuwall.com" class="flex items-start p-5 rounded-xl bg-gray-900/50 border border-gray-700/50 hover:border-blue-500/50 transition-all group hover:bg-gray-800/80">
                        <div class="p-3 bg-blue-900/30 text-blue-400 rounded-lg group-hover:bg-blue-500 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-white group-hover:text-blue-400 transition-colors">Admin & Business</h3>
                            <p class="text-sm text-gray-400 mt-1 mb-2">For business inquiries, partnerships, and advertising.</p>
                            <span class="text-blue-500 font-medium text-sm">admin@waifuwall.com</span>
                        </div>
                    </a>

                    <!-- DMCA / Copyright -->
                    <a href="mailto:dmca@waifuwall.com" class="flex items-start p-5 rounded-xl bg-gray-900/50 border border-gray-700/50 hover:border-red-500/50 transition-all group hover:bg-gray-800/80">
                        <div class="p-3 bg-red-900/30 text-red-400 rounded-lg group-hover:bg-red-500 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-white group-hover:text-red-400 transition-colors">DMCA & Copyright</h3>
                            <p class="text-sm text-gray-400 mt-1 mb-2">For reporting copyright infringement or content removal requests.</p>
                            <span class="text-red-500 font-medium text-sm">dmca@waifuwall.com</span>
                        </div>
                    </a>

                    <!-- Artist Inquiry -->
                    <a href="mailto:artist@waifuwall.com" class="flex items-start p-5 rounded-xl bg-gray-900/50 border border-gray-700/50 hover:border-purple-500/50 transition-all group hover:bg-gray-800/80">
                        <div class="p-3 bg-purple-900/30 text-purple-400 rounded-lg group-hover:bg-purple-500 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-white group-hover:text-purple-400 transition-colors">Artist Inquiry</h3>
                            <p class="text-sm text-gray-400 mt-1 mb-2">For creators wanting to submit artwork or claim profiles.</p>
                            <span class="text-purple-500 font-medium text-sm">artist@waifuwall.com</span>
                        </div>
                    </a>

                </div>
            </div>

        </div>
    </main>

    @include('components.footer')
</body>
</html>