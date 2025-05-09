<section id="projects" class="py-16 bg-gray-50 rounded-3xl">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-16">Mes projets</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach ($projects as $project)
      <div class="overflow-hidden border hover:border-black/30 transition hover:shadow-md rounded-xl">
      <div class="relative h-48 w-full">
        <img src="{{ $project->image ?? asset('images/pp.jpeg') }}" alt="Projet" class="object-cover w-full h-full" />
      </div>
      <div class="p-6">
        <h3 class="text-xl font-semibold mb-2">{{ $project->title }}</h3>
        <p class="text-muted-foreground mb-4">{{ $project->description }}</p>

        <div class="flex flex-wrap gap-2 mb-4">
        @foreach ($project->tags as $tag)
      <span class="text-xs bg-gray-100 text-primary px-2 py-1 rounded">{{ $tag }}</span>
      @endforeach
        </div>
        <div class="flex gap-2 mt-4">
        @if(!empty($project->ressource[0]['url']))
      <a href="{{ $project->ressource[0]['url'] }}" target="_blank"
        class="flex items-center gap-1 text-sm border px-2 py-1 hover:bg-gray-100 transition rounded">
        🔗 Démo
      </a>
      @endif
        @if(!empty($project->ressource[0]['url']))
      <a href="{{ $project->ressource[0]['url'] }}" target="_blank"
        class="flex items-center gap-1 text-sm border px-2 py-1 hover:bg-gray-100 transition rounded">
        💻 Code
      </a>
      @endif
        </div>
      </div>
      </div>
    @endforeach
    </div>
  </div>
</section>