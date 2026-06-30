<footer class="bg-gray-900 border-t border-gray-700 pt-12 pb-24 lg:pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8">

            <div class="flex flex-col items-center md:items-start text-center md:text-left space-y-2">
                <a href="{{ route('home') }}" class="flex items-center gap-2 group mb-1">
                    <img src="https://storage.ntewallpapers.com/assets/logo.png" alt="{{ env('APP_NAME') }}" class="h-8 w-auto grayscale group-hover:grayscale-0 transition-all duration-300">
                    <span class="text-lg font-bold text-gray-100 group-hover:text-white transition-colors">{{ env('APP_NAME') }}</span>
                </a>

                <div class="text-sm md:text-xs text-gray-300 space-y-1">
                    <p>&copy; {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved.</p>
                    <p>All images remain property of their original creators.</p>
                </div>
            </div>

            <div class="flex flex-wrap justify-center gap-x-8 gap-y-4">
                <a href="{{ route('about') }}" class="text-sm font-medium text-gray-200 hover:text-cyan-300 transition-colors">
                    About Us
                </a>
                <a href="{{ route('contact') }}" class="text-sm font-medium text-gray-200 hover:text-cyan-300 transition-colors">
                    Contact
                </a>
                <a href="{{ route('privacy') }}" class="text-sm font-medium text-gray-200 hover:text-cyan-300 transition-colors">
                    Privacy Policy
                </a>
                <a href="{{ route('tos') }}" class="text-sm font-medium text-gray-200 hover:text-cyan-300 transition-colors">
                    Terms of Service
                </a>
            </div>

        </div>
    </div>
</footer>

<script>
    const btnMobile = document.querySelector(".mobile-menu-button");
    const menuMobile = document.querySelector(".mobile-menu");

    if (btnMobile && menuMobile) {
        btnMobile.addEventListener("click", () => {
            menuMobile.classList.toggle("hidden");
            const expanded = btnMobile.getAttribute("aria-expanded") === "true" || false;
            btnMobile.setAttribute("aria-expanded", !expanded);
        });
    }

    const btnProfile = document.querySelector(".profile-menu-button");
    const menuProfile = document.querySelector(".profile-menu");

    if (btnProfile && menuProfile) {
        btnProfile.addEventListener("click", (e) => {
            e.stopPropagation();
            menuProfile.classList.toggle("hidden");
        });

        document.addEventListener("click", (e) => {
            if (!menuProfile.contains(e.target) && !btnProfile.contains(e.target)) {
                menuProfile.classList.add("hidden");
            }
        });
    }
</script>