<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Privacy Policy | {{ env('APP_NAME') }}</title>

    <meta name="description" content="Read the Privacy Policy for {{ env('APP_NAME') }}. Understand what information we collect, how we use it, and your rights related to your data on our anime wallpaper platform.">
    <meta name="keywords" content="waifuwall, privacy policy, waifuwall privacy, data protection, user privacy, anime wallpaper privacy">
    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Privacy Policy - {{ env('APP_NAME') }}">
    <meta property="og:description" content="Understand what information we collect at {{ env('APP_NAME') }}, how we use it, and your rights related to your data.">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Privacy Policy - {{ env('APP_NAME') }}">
    <meta name="twitter:description" content="Understand what information we collect at {{ env('APP_NAME') }}, how we use it, and your rights related to your data.">

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org/",
        "@@type": "WebPage",
        "name": "Privacy Policy",
        "description": "Privacy Policy for {{ env('APP_NAME') }}.",
        "url": "{{ url()->current() }}",
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
                "name": "Privacy Policy",
                "item": "{{ url()->current() }}"
            }]
        }
    }
    </script>

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "PolicyPage",
      "name": "Privacy Policy",
      "url": "{{ route('privacy') }}",
      "description": "The official privacy policy for {{ env('APP_NAME') }}, outlining data collection and protection practices.",
      "publisher": {
        "@@type": "Organization",
        "name": "{{ env('APP_NAME') }}",
        "url": "{{ url('/') }}"
      }
    }
    </script>
</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden py-12">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-cyan-900/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>

        <div class="container mx-auto px-4 max-w-4xl">

            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-500 mb-4">
                    Privacy Policy
                </h1>
                <p class="text-gray-400">
                    Last updated: <span class="text-gray-300 font-medium">June 29, 2026</span>
                </p>
            </div>

            <article class="bg-gray-800/50 backdrop-blur-md border border-gray-700/50 rounded-2xl shadow-2xl p-8 md:p-12 relative overflow-hidden">

                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-cyan-500 to-transparent opacity-50"></div>

                <div class="space-y-8 text-gray-300 leading-relaxed text-lg">
                    <p class="border-b border-gray-700/50 pb-6">
                        Welcome to <strong>{{ env('APP_NAME') }}</strong>. We respect your privacy and are committed to protecting it. This Privacy Policy explains what information we collect, how we use it, and your rights in relation to it regarding our anime wallpaper platform.
                    </p>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-gray-700/50 p-2 rounded-lg mr-3 text-cyan-400 text-sm">01</span>
                            Information We Collect
                        </h2>
                        <ul class="list-none space-y-3 pl-2">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-cyan-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span><strong>Account Information:</strong> When you register, we collect your username, email address, and encrypted password.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-cyan-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span><strong>Uploaded Content:</strong> We store the wallpapers you upload along with metadata like tags, characters, and artists.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-cyan-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span><strong>Usage Data:</strong> We automatically collect basic data about how you interact with our site (e.g., IP address, browser type) to improve performance.</span>
                            </li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-gray-700/50 p-2 rounded-lg mr-3 text-cyan-400 text-sm">02</span>
                            How We Use Your Information
                        </h2>
                        <p class="mb-4">We use the collected information to:</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-gray-900/50 p-4 rounded-lg border border-gray-700/50">
                                Provide, operate, and maintain our website.
                            </div>
                            <div class="bg-gray-900/50 p-4 rounded-lg border border-gray-700/50">
                                Manage your account and facilitate uploads.
                            </div>
                            <div class="bg-gray-900/50 p-4 rounded-lg border border-gray-700/50">
                                Prevent abuse and ensure platform security.
                            </div>
                            <div class="bg-gray-900/50 p-4 rounded-lg border border-gray-700/50">
                                Communicate with you regarding service updates.
                            </div>
                        </div>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-gray-700/50 p-2 rounded-lg mr-3 text-cyan-400 text-sm">03</span>
                            Cookies
                        </h2>
                        <p>
                            We use cookies primarily to maintain your session when you are logged in. Cookies are small files stored on your device that help our website function properly. You can instruct your browser to refuse all cookies, but you may not be able to use some portions of our service (like logging in).
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-gray-700/50 p-2 rounded-lg mr-3 text-cyan-400 text-sm">04</span>
                            Data Sharing
                        </h2>
                        <p>
                            We do <strong>not</strong> sell, trade, or otherwise transfer your personally identifiable information to outside parties. However, please note that any content you voluntarily upload (wallpapers, comments) is public by nature.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-gray-700/50 p-2 rounded-lg mr-3 text-cyan-400 text-sm">05</span>
                            Contact Us
                        </h2>
                        <p>
                            If you have any questions about this Privacy Policy, please do not hesitate to contact us.
                        </p>
                        <div class="mt-4">
                            <a href="mailto:privacy@waifuwall.com" class="inline-flex items-center text-cyan-400 hover:text-white transition-colors bg-gray-900/50 px-6 py-3 rounded-lg border border-cyan-900/30 hover:border-cyan-500/50">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                privacy@waifuwall.com
                            </a>
                        </div>
                    </section>
                </div>
            </article>

        </div>
    </main>

    @include('components.footer')
</body>
</html>