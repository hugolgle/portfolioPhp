<section id="skills" class="py-16 min-h-screen snap-start">
    <div class="container mx-auto px-4 mt-10 w-full">
        <h2 class="text-3xl font-bold text-center mb-16">Mes compétences</h2>
        <div class="flex flex-wrap gap-4 justify-evenly">
            @foreach ($skills as $skill)
                <div
                    class="p-6 w-80 border rounded border-border/50 hover:border-primary/50 transition hover:shadow text-center">
                    {!! $skill['icon'] !!}
                    <h3 class="text-xl font-semibold mb-2">{{ $skill['title'] }}</h3>
                    <p class="text-muted-foreground">{{ $skill['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>
</section>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
