<section id="about" class="py-16 bg-gray-50 rounded-3xl">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-16">À propos de moi</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="flex justify-center">
                <div class="relative size-44 md:size-64 rounded-full overflow-hidden border-4 border-primary/20">
                    <!-- Afficher la photo de profil dynamiquement -->
                    <img src="{{ asset('storage/' . $about->photo) }}" alt="Portrait" class="object-cover w-full h-full" />
                </div>
            </div>
            <div>
                <h3 class="text-2xl font-semibold mb-4">Qui suis-je?</h3>
                <p class="text-muted-foreground mb-4 text-sm">
                    {!! $about->bio !!}
                </p>
                <button
                    class="text-sm flex items-center gap-x-2 px-4 py-2 bg-white border text-black rounded hover:bg-gray-50 transition variant="
                    outline" class="gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-file-text-icon lucide-file-text">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                        <path d="M10 9H8" />
                        <path d="M16 13H8" />
                        <path d="M16 17H8" />
                    </svg>
                    <a href="{{ asset('storage/' . $about->cv) }}" target="_blank" class="text-sm">Télécharger mon
                        CV</a>
                </button>
            </div>
        </div>
    </div>
</section>
