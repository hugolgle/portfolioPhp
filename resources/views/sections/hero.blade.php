<section id="accueil" class="relative min-h-screen flex items-center justify-center py-16">
  <div class="container mx-auto px-4 py-20 flex flex-col items-center text-center">
    <h1 class="text-4xl md:text-6xl font-bold tracking-tight mb-6">
      Bonjour, je suis <span class="text-primary">Hugo</span>
    </h1>
    <h2 class="text-2xl md:text-3xl text-muted-foreground mb-8">Développeur Web</h2>
    <p class="text-lg max-w-2xl mb-10 text-muted-foreground">
      Je crée des expériences web élégantes et fonctionnelles, en combinant design et développement pour donner vie
      à vos projets.
    </p>
    <div class="flex flex-col sm:flex-row gap-4">
      <button class="text-sm px-4 py-2 bg-black text-white rounded hover:bg-opacity-85 transition"
        onclick="document.getElementById('projects').scrollIntoView({ behavior: 'smooth' })">
        Voir mes projets
      </button>

      <button class="text-sm px-4 py-2 bg-white border text-black rounded hover:bg-gray-50 transition"
        onclick="document.getElementById('contact').scrollIntoView({ behavior: 'smooth' })">
        Me contacter
      </button>
    </div>
  </div>

  <div
    class="absolute bottom-10 left-1/2 transform -translate-x-1/2 rounded animate-bounce hover:bg-gray-100 transition">
    <button onclick="document.getElementById('about').scrollIntoView({ behavior: 'smooth' })"
      class="text-primary hover:text-primary/80 p-2 rounded-full">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="lucide lucide-arrow-down-icon lucide-arrow-down">
        <path d="M12 5v14" />
        <path d="m19 12-7 7-7-7" />
      </svg>
    </button>
  </div>
  </div>
</section>