<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $preference->site_title ?? 'Titre par défaut' }}</title>
    <meta name="description" content="{{ $preference->site_description ?? 'Description par défaut' }}">
    <meta name="keywords" content="{{ $preference->seo_keywords ?? '' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if ($preference && $preference->favicon)
        <link rel="icon" href="{{ asset('storage/favicons/' . $preference->favicon) }}">
    @endif
</head>

<body class="min-h-screen bg-background">
    <header id="header" class="fixed top-0 w-full z-50 transition duration-300 bg-transparent">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="text-xl font-bold">Hugo.</a>

            <!-- Bouton mobile -->
            <button id="menu-toggle" class="md:hidden text-gray-800" aria-label="Menu">
                <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Menu desktop -->
            <nav class="hidden md:flex items-center space-x-8">
                <button onclick="scrollToSection('accueil')"
                    class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">Accueil</button>
                <button onclick="scrollToSection('about')"
                    class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">À propos</button>
                <button onclick="scrollToSection('skills')"
                    class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">Compétences</button>
                <button onclick="scrollToSection('projects')"
                    class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">Projets</button>
                <button onclick="scrollToSection('services')"
                    class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">Mes services</button>
                <button onclick="scrollToSection('contact')"
                    class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">Contact</button>
                @if ($isAuthenticated)
                    <a href="{{ route('admin') }}" class="p-2 rounded hover:bg-gray-100 transition">
                        <i data-lucide="shield-user" class="w-5 h-5"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="p-2 rounded hover:bg-gray-100 transition">
                        <i data-lucide="user" class="w-5 h-5"></i>
                    </a>
                @endif
            </nav>
        </div>

        <!-- Menu mobile -->
        <div id="mobile-menu"
            class="fixed inset-x-0 top-16 bg-white w-full z-50 h-screen p-4 flex flex-col space-y-4 text-lg md:hidden 
                    transform -translate-y-2 opacity-0 transition-transform transition-opacity duration-200 hidden">
            <button onclick="scrollToSection('accueil')"
                class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">Accueil</button>
            <button onclick="scrollToSection('about')" class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">À
                propos</button>
            <button onclick="scrollToSection('skills')"
                class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">Compétences</button>
            <button onclick="scrollToSection('projects')"
                class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">Projets</button>
            <button onclick="scrollToSection('services')"
                class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">Mes services</button>
            <button onclick="scrollToSection('contact')"
                class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">Contact</button>
            @if ($isAuthenticated)
                <button>
                    <a href="{{ route('admin') }}"
                        class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">Accéder à
                        l'admin</a>
                </button>
            @else
                <button>
                    <a href="{{ route('login') }}" class="hover:bg-gray-100 transition text-sm px-2 py-1 rounded">
                        Se connecter
                    </a>
                </button>
            @endif
        </div>
    </header>

    <main class="pb-6 py-16 snap-y snap-mandatory overflow-y-scroll h-screen">
        @yield('content')
    </main>

    <script>
        const toggle = document.getElementById("menu-toggle");
        const menu = document.getElementById("mobile-menu");
        const icon = document.getElementById("menu-icon");
        const header = document.getElementById("header");

        toggle?.addEventListener("click", () => {
            if (menu.classList.contains('hidden')) {
                // ouverture du menu : on retire hidden, puis on force l'animation
                menu.classList.remove('hidden');
                // dans le prochain frame, retirer les classes de départ
                requestAnimationFrame(() => {
                    menu.classList.remove('-translate-y-2', 'opacity-0');
                    menu.classList.add('translate-y-0', 'opacity-100');
                });
                // forcer background du header quand menu ouvert
                header.classList.add('bg-white/80', 'backdrop-blur', 'shadow-sm');
                // changer icône
                icon.innerHTML =
                    `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>`;
            } else {
                // fermeture : on lance l'animation de sortie
                menu.classList.remove('translate-y-0', 'opacity-100');
                menu.classList.add('-translate-y-2', 'opacity-0');
                // après transition, on remet hidden et ajuste header
                const handler = () => {
                    menu.classList.add('hidden');
                    menu.removeEventListener('transitionend', handler);
                };
                menu.addEventListener('transitionend', handler);
                // icône burger
                icon.innerHTML =
                    `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>`;
            }
        });

        const scrollToSection = (id) => {
            const el = document.getElementById(id);
            if (el) {
                el.scrollIntoView({
                    behavior: "smooth"
                });
                // ferme le menu si ouvert
                if (!menu.classList.contains('hidden')) {
                    // même logique que clic fermeture
                    menu.classList.remove('translate-y-0', 'opacity-100');
                    menu.classList.add('-translate-y-2', 'opacity-0');
                    const handler = () => {
                        menu.classList.add('hidden');
                        menu.removeEventListener('transitionend', handler);
                    };
                    menu.addEventListener('transitionend', handler);
                    // remettre icône burger
                    icon.innerHTML =
                        `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>`;
                }
            }
        };

        window.addEventListener('scroll', () => {
            // si menu mobile ouvert, on ne touche pas au header bg
            if (!menu.classList.contains('hidden')) {
                return;
            }
            if (window.scrollY > 10) {
                header.classList.add('bg-white/80', 'backdrop-blur', 'shadow-sm');
            } else {
                header.classList.remove('bg-white/80', 'backdrop-blur', 'shadow-sm');
            }
        });
    </script>

    <script>
        const container = document.querySelector('main')
        container.addEventListener('scroll', () => {
            const header = document.getElementById('header')
            if (container.scrollTop > 10) {
                header.classList.add('bg-white/50', 'backdrop-blur', 'shadow-sm')
            } else {
                header.classList.remove('bg-white/50', 'backdrop-blur', 'shadow-sm')
            }
        })
    </script>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons()
    </script>
</body>

</html>
