<section id="contact" class="min-h-screen snap-start py-16 bg-gray-50">
    <div class="container mx-auto px-4 mt-10 w-full">
        <h2 class="text-3xl font-bold text-center mb-16">Me contacter</h2>
        <div class="flex gap-x-10">
            <div class="w-full">
                <h3 class="text-2xl font-semibold mb-6">Parlons de votre projet</h3>
                <p class="text-muted-foreground text-sm mb-8">
                    Vous avez un projet en tête ? N'hésitez pas à me contacter pour en discuter. Je suis toujours à la
                    recherche de nouvelles opportunités et de défis intéressants.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="bg-white p-3 rounded-full">
                            <i data-lucide='mail'></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Email</h4>
                            <p class="text-muted-foreground">{{ $about->email ?? '' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="bg-white p-3 rounded-full">
                            <i data-lucide='phone'></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Téléphone</h4>
                            <p class="text-muted-foreground">
                                +33 {{ substr(ltrim($about->numero ?? '', '0'), 0, 1) }}
                                {{ rtrim(chunk_split(substr(ltrim($about->numero ?? '', '0'), 1), 2, ' ')) }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="bg-white p-3 rounded-full">
                            <i data-lucide='map-pin'></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Localisation</h4>
                            <p class="text-muted-foreground">{{ $about->localisation ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <form method="POST" action="{{ route('admin.messages.store') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium mb-1">Nom</label>
                        <input type="text" id="name" name="name" placeholder="Nom"
                            class="w-full border border-gray-300 bg-white rounded-lg px-4 py-2" required>
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium mb-1">Sujet</label>
                        <select id="subject" name="subject"
                            class="w-full border border-gray-300 bg-white rounded-lg px-4 py-2" required>
                            <option value="" disabled selected>Sujet</option>
                            @foreach ($optionsSubjectFormContact as $option)
                                <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email"
                            class="w-full border border-gray-300 bg-white rounded-lg px-4 py-2" required>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium mb-1">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Votre message"
                            class="w-full border border-gray-300 bg-white rounded-lg px-4 py-2" required></textarea>
                    </div>

                    <button type="submit"
                        class="flex justify-center items-center gap-2 w-full text-sm px-4 py-2 bg-black text-white rounded hover:bg-opacity-85 transition">
                        <i data-lucide='send' class="size-4"></i>
                        Envoyer
                    </button>
                </form>

            </div>
        </div>


    </div>
</section>
