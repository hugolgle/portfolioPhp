<section id="about" class="py-16 min-h-screen snap-start bg-gray-50">
    <div class="container mx-auto px-4 mt-10">
        <h2 class="text-3xl font-bold text-center mb-16">À propos de moi</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="flex justify-center">
                <div
                    class="relative size-44 md:size-64 rounded-full bg-white overflow-hidden border-4 border-primary/20">
                    @if ($about && $about->photo)
                        <img src="{{ asset('storage/' . $about->photo) }}" alt="Portrait"
                            class="object-cover w-full h-full" />
                    @else
                        <p class="text-center text-gray-500">Infos non disponibles pour le moment.</p>
                    @endif

                </div>
            </div>
            <div>
                <h3 class="text-2xl font-semibold mb-4">Qui suis-je ?</h3>
                <p class="text-muted-foreground mb-4 text-md">
                    {!! $about->bio ?? '' !!}
                </p>
                @if ($about && $about->cv)
                    <button
                        class="text-sm flex items-center gap-x-2 px-4 py-2 bg-white border text-black rounded hover:bg-gray-50 transition outline gap-2">
                        <i data-lucide='file-text' class="size-4"></i>
                        <a href="{{ asset('storage/' . $about->cv) }}" target="_blank" class="text-sm">Télécharger mon
                            CV</a>
                    </button>
                @endif
            </div>
        </div>
    </div>
</section>
