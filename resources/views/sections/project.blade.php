<section id="projects" class="py-16 min-h-screen snap-start ">
    <div class="container mx-auto px-4 mt-10">
        <h2 class="text-3xl font-bold text-center mb-16">Mes projets</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($projects as $project)
                <div class="overflow-hidden border hover:border-black/30 transition hover:shadow-md rounded-xl">
                    <div class="relative h-48 w-full">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="Projet"
                            class="object-cover w-full h-full" />
                    </div>
                    <div class="p-6 flex flex-col justify-between h-[250px]">
                        <div>
                            <h3 class="text-xl font-semibold mb-2">{{ $project->title }}</h3>
                            <p class="text-muted-foreground text-sm mb-4">{{ $project->description }}</p>
                        </div>
                        <div>
                            <div class="flex flex-wrap gap-2 mb-4">
                                @php
                                    $tags = is_array($project->tags) ? $project->tags : explode(',', $project->tags);
                                @endphp

                                @foreach ($tags as $tag)
                                    <span
                                        class="text-xs bg-gray-100 text-primary px-2 py-1 rounded">{{ trim($tag) }}</span>
                                @endforeach

                            </div>
                            <div class="flex gap-2 mt-4">
                                @if (!empty($project->demo))
                                    <a href="{{ $project->demo }}" target="_blank"
                                        class="flex items-center gap-1 text-sm border px-2 py-1 hover:bg-gray-100 transition rounded">
                                        🔗 Démo
                                    </a>
                                @endif
                                @if (!empty($project->ressource))
                                    <a href="{{ $project->ressource }}" target="_blank"
                                        class="flex items-center gap-1 text-sm border px-2 py-1 hover:bg-gray-100 transition rounded">
                                        💻 Code
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
