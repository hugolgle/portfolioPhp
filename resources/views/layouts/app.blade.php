<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Mon site')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-background">
  <header id="header" class="fixed top-0 w-full z-50 transition-all duration-300 bg-transparent">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
      <a href="/" class="text-xl font-bold">Hugo</a>

      <!-- Bouton mobile -->
      <button id="menu-toggle" class="md:hidden text-gray-800" aria-label="Menu">
        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
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
          <button onclick="scrollToSection('contact')">Contact</button>
        </nav>
      </div>

      <!-- Menu desktop -->
      <nav class="hidden md:flex items-center space-x-8">
        <button onclick="scrollToSection('accueil')">Accueil</button>
        <button onclick="scrollToSection('about')">À propos</button>
        <button onclick="scrollToSection('skills')">Compétences</button>
        <button onclick="scrollToSection('projects')">Projets</button>
        <button onclick="scrollToSection('contact')">Contact</button>
      </nav>
    </div>
  </header>

  <script>
    const toggle = document.getElementById("menu-toggle")
    const menu = document.getElementById("mobile-menu")
    const icon = document.getElementById("menu-icon")

    toggle?.addEventListener("click", () => {
      menu.classList.toggle("hidden")
      icon.innerHTML = menu.classList.contains("hidden")
        ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>`
        : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>`
    })

    const scrollToSection = (id) => {
      const el = document.getElementById(id)
      if (el) el.scrollIntoView({ behavior: "smooth" })
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

  <main class="px-6">
    @yield('content')
  </main>

  <footer class="p-4 bg-white border-t text-center text-sm text-gray-500">
    <div class="flex justify-center items-center mb-4">
      <a href="https://github.com/hugolgle/" target="_blank" class="p-2 rounded-full hover:bg-gray-100 transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" class="text-black" height="16" viewBox="0 0 24 24"
          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-github-icon lucide-github">
          <path
            d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4" />
          <path d="M9 18c-4.51 2-5-2-7-2" />
        </svg>
      </a>
    </div>
    &copy; {{ date('Y') }} Hugo. Tous droits réservés.
  </footer>
</body>

</html>