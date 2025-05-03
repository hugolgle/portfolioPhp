<section id="projects" class="py-16 bg-gray-50 rounded-3xl">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-16">Mes projets</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach ($projects as $project)
      <div class="overflow-hidden border hover:border-black/30 transition hover:shadow-md rounded-xl">
      <div class="relative h-48 w-full">
        <img src="{{ $project['image'] ?? asset('images/pp.jpeg') }}" alt="Projet"
        class="object-cover w-full h-full" />
      </div>
      <div class="p-6">
        <h3 class="text-xl font-semibold mb-2">{{ $project['title'] }}</h3>
        <p class="text-muted-foreground mb-4">{{ $project['description'] }}</p>
        <div class="flex flex-wrap gap-2 mb-4">
        @foreach ($project['tags'] as $tag)
      <span class="text-xs bg-gray-100 text-primary px-2 py-1 rounded">{{ $tag }}</span>
      @endforeach
        </div>
        <div class="flex gap-2 mt-4">
        <a href="{{ $project['demoLink'] }}" target="_blank"
          class="flex items-center gap-1 text-sm border px-2 py-1 hover:bg-gray-100 transition rounded">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-external-link-icon lucide-external-link">
          <path d="M15 3h6v6" />
          <path d="M10 14 21 3" />
          <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
          </svg> Démo
        </a>
        <a href="{{ $project['codeLink'] }}" target="_blank"
          class="flex items-center gap-1 text-sm border px-2 py-1 hover:bg-gray-100 transition rounded">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-github-icon lucide-github">
          <path
            d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4" />
          <path d="M9 18c-4.51 2-5-2-7-2" />
          </svg> Code
        </a>
        </div>
      </div>
      </div>
    @endforeach
    </div>
  </div>
</section>