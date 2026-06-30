<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Privacy Policy HSR Wallpapers 4K | {{ env('APP_NAME') }}</title>

    <meta name="description" content="Read the Privacy Policy for HSR Wallpapers 4K. Understand what information we collect, how we use it, and your rights related to your data on our anime wallpaper platform.">
    <meta name="keywords" content="waifuwall, privacy policy, waifuwall privacy, data protection, user privacy, anime wallpaper privacy">

    <meta name="robots" content="noindex, nofollow">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Privacy Policy - {{ env('APP_NAME') }}">
    <meta property="og:description" content="Understand what information we collect at HSR Wallpapers 4K, how we use it, and your rights related to your data.">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Privacy Policy - {{ env('APP_NAME') }}">
    <meta name="twitter:description" content="Understand what information we collect at HSR Wallpapers 4K, how we use it, and your rights related to your data.">

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
            "name": "Privacy Policy",
            "item": "{{ url()->current() }}"
        }]
    }
    </script>
</head>

<body class="bg-[#0f172a] text-gray-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">

    @include('components.navigation')

    <main class="flex-grow py-12">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 p-8 md:p-12 rounded-2xl shadow-xl">
                
                <div class="text-center mb-10">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 mb-4">
                        Privacy Policy
                    </h1>
                    <p class="text-gray-400 text-sm">Last updated: {{ date('F d, Y') }}</p>
                </div>

                <div class="space-y-8 text-gray-300 leading-relaxed text-sm md:text-base">
                    
                    <div>
                        <p class="mb-4">This privacy policy applies to the <strong>HSR Wallpapers 4K</strong> (serarinne.hsrwallpaper4k) app (hereby referred to as "Application") for mobile devices that was created by <strong>Serarinne</strong> (hereby referred to as "Service Provider") as a Free service. This service is intended for use "AS IS".</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-white mb-3">Information Collection and Use</h2>
                        <p class="mb-4">The Application collects information when you download and use it. This information may include information such as:</p>
                        <ul class="list-disc pl-6 space-y-2 text-gray-400">
                            <li>Your device's Internet Protocol address (e.g. IP address)</li>
                            <li>The pages of the Application that you visit, the time and date of your visit, the time spent on those pages</li>
                            <li>The time spent on the Application</li>
                            <li>The operating system you use on your mobile device</li>
                        </ul>
                        <p class="mt-4">The Application does not gather precise information about the location of your mobile device.</p>
                        <p class="mt-4">The Service Provider may use the information you provided to contact you from time to time to provide you with important information, required notices and marketing promotions.</p>
                        <p class="mt-4">For a better experience, while using the Application, the Service Provider may require you to provide us with certain personally identifiable information. The information that the Service Provider request will be retained by them and used as described in this privacy policy.</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-white mb-3">Third Party Access</h2>
                        <p class="mb-4">Only aggregated, anonymized data is periodically transmitted to external services to aid the Service Provider in improving the Application and their service. The Service Provider may share your information with third parties in the ways that are described in this privacy statement.</p>
                        <p class="mb-4">Please note that the Application utilizes third-party services that have their own Privacy Policy about handling data. Below are the links to the Privacy Policy of the third-party service providers used by the Application:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li><a href="https://www.google.com/policies/privacy/" target="_blank" rel="noopener noreferrer" class="text-cyan-400 hover:underline">Google Play Services</a></li>
                            <li><a href="https://support.google.com/admob/answer/6128543?hl=en" target="_blank" rel="noopener noreferrer" class="text-cyan-400 hover:underline">AdMob</a></li>
                            <li><a href="https://onesignal.com/privacy_policy" target="_blank" rel="noopener noreferrer" class="text-cyan-400 hover:underline">One Signal</a></li>
                            <li><a href="https://www.applovin.com/privacy/" target="_blank" rel="noopener noreferrer" class="text-cyan-400 hover:underline">AppLovin</a></li>
                            <li><a href="https://www.startapp.com/privacy/" target="_blank" rel="noopener noreferrer" class="text-cyan-400 hover:underline">StartApp</a></li>
                        </ul>
                        <p class="mt-6">The Service Provider may disclose User Provided and Automatically Collected Information:</p>
                        <ul class="list-disc pl-6 space-y-2 text-gray-400">
                            <li>as required by law, such as to comply with a subpoena, or similar legal process;</li>
                            <li>when they believe in good faith that disclosure is necessary to protect their rights, protect your safety or the safety of others, investigate fraud, or respond to a government request;</li>
                            <li>with their trusted services providers who work on their behalf, do not have an independent use of the information we disclose to them, and have agreed to adhere to the rules set forth in this privacy statement.</li>
                        </ul>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-white mb-3">Opt-Out Rights</h2>
                        <p>You can stop all collection of information by the Application easily by uninstalling it. You may use the standard uninstall processes as may be available as part of your mobile device or via the mobile application marketplace or network.</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-white mb-3">Data Retention Policy</h2>
                        <p>The Service Provider will retain User Provided data for as long as you use the Application and for a reasonable time thereafter. If you'd like them to delete User Provided Data that you have provided via the Application, please contact them at <a href="mailto:serarinne@gmail.com" class="text-cyan-400 hover:underline">serarinne@gmail.com</a> and they will respond in a reasonable time.</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-white mb-3">Children</h2>
                        <p class="mb-4">The Service Provider does not use the Application to knowingly solicit data from or market to children under the age of 13.</p>
                        <p>The Application does not address anyone under the age of 13. The Service Provider does not knowingly collect personally identifiable information from children under 13 years of age. In the case the Service Provider discover that a child under 13 has provided personal information, the Service Provider will immediately delete this from their servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact the Service Provider so that they will be able to take the necessary actions.</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-white mb-3">Security</h2>
                        <p>The Service Provider is concerned about safeguarding the confidentiality of your information. The Service Provider provides physical, electronic, and procedural safeguards to protect information the Service Provider processes and maintains.</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-white mb-3">Changes</h2>
                        <p>This Privacy Policy may be updated from time to time for any reason. The Service Provider will notify you of any changes to the Privacy Policy by updating this page with the new Privacy Policy. You are advised to consult this Privacy Policy regularly for any changes, as continued use is deemed approval of all changes.</p>
                        <p class="mt-4 text-gray-500 italic">This privacy policy is effective as of 2025-05-09</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-white mb-3">Your Consent</h2>
                        <p>By using the Application, you are consenting to the processing of your information as set forth in this Privacy Policy now and as amended by us.</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-white mb-3">Contact Us</h2>
                        <p>If you have any questions regarding privacy while using the Application, or have questions about the practices, please contact the Service Provider via email at <a href="mailto:serarinne@gmail.com" class="text-cyan-400 hover:underline">serarinne@gmail.com</a>.</p>
                    </div>

                </div>
            </div>
        </div>
    </main>

    @include('components.footer')
</body>
</html>