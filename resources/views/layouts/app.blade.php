<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>{{ $preference->site_title ?? 'Titre par défaut' }}</title>
    <meta name="description" content="{{ $preference->site_description ?? 'Description par défaut' }}">
    <meta name="keywords" content="{{ $preference->seo_keywords ?? '' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if ($preference && $preference->favicon)
        <link rel="icon" href="{{ asset('storage/favicons/' . $preference->favicon) }}">
    @endif
</head>

<body class="min-h-screen bg-background">
    <header id="header" class="fixed top-0 w-full z-50 transition-all duration-300 bg-transparent">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="text-xl font-bold">Hugo</a>

            <!-- Bouton mobile -->
            <button id="menu-toggle" class="md:hidden text-gray-800" aria-label="Menu">
                <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Menu mobile -->
            <div id="mobile-menu" class="hidden fixed inset-0 top-16 bg-white z-40 p-4 md:hidden">
                <nav class="flex flex-col space-y-4 text-lg">
                    <button onclick="scrollToSection('accueil')">Accueil</button>
                    <button onclick="scrollToSection('about')">À propos</button>
                    <button onclick="scrollToSection('skills')">Compétences</button>
                    <button onclick="scrollToSection('projects')">Projets</button>
                    <button onclick="scrollToSection('services')">Mes services</button>
                    <button onclick="scrollToSection('contact')">Contact</button>
                    @if ($isAuthenticated)
                        <a href="{{ route('admin') }}">Accéder à l'admin</a>
                    @else
                        <a href="{{ route('login') }}" class="">
                            <i data-lucide="user" class="mx-auto mb-4 w-8 h-8 text-primary"></i></a>
                    @endif

                </nav>
            </div>

            <!-- Menu desktop -->
            <nav class="hidden md:flex items-center space-x-8">
                <button onclick="scrollToSection('accueil')">Accueil</button>
                <button onclick="scrollToSection('about')">À propos</button>
                <button onclick="scrollToSection('skills')">Compétences</button>
                <button onclick="scrollToSection('projects')">Projets</button>
                <button onclick="scrollToSection('services')">Mes services</button>
                <button onclick="scrollToSection('contact')">Contact</button>
                @if ($isAuthenticated)
                    <a href="{{ route('admin') }}" class="p-2 rounded cursor-pointer hover:bg-gray-100 transition"><i
                            data-lucide="shield-user" class="size-4"></i></a>
                @else
                    <a href="{{ route('login') }}" class="p-2 rounded cursor-pointer hover:bg-gray-100 transition">
                        <i data-lucide="user" class="size-4"></i></a>
                @endif

            </nav>
        </div>
    </header>

    <script>
        const toggle = document.getElementById("menu-toggle")
        const menu = document.getElementById("mobile-menu")
        const icon = document.getElementById("menu-icon")

        toggle?.addEventListener("click", () => {
            menu.classList.toggle("hidden")
            icon.innerHTML = menu.classList.contains("hidden") ?
                `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>` :
                `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>`
        })

        const scrollToSection = (id) => {
            const el = document.getElementById(id)
            if (el) el.scrollIntoView({
                behavior: "smooth"
            })
            menu?.classList.add("hidden")
        }

        window.addEventListener("scroll", () => {
            const header = document.getElementById("header")
            if (window.scrollY > 10) {
                header.classList.add("bg-white/80", "backdrop-blur-md", "shadow-sm")
            } else {
                header.classList.remove("bg-white/80", "backdrop-blur-md", "shadow-sm")
            }
        })
    </script>

    <main class="px-6 pb-6">
        @yield('content')
    </main>

    <footer class="p-4 bg-white border-t text-center text-sm">
        <div class="flex justify-center items-center mb-4">
            <a href="https://github.com/hugolgle/" target="_blank"
                class="p-2 rounded-full hover:bg-gray-100 transition">
                <i data-lucide="github" class="size-4"></i>
            </a>
        </div>
        <p class="text-gray-500">&copy; {{ date('Y') }} Hugo. Tous droits réservés.</p>
    </footer>
</body>

</html>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
