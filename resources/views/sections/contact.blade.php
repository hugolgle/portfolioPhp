<section id="contact" class="py-16 bg-gray-50 rounded-3xl">
    <div class="container mx-auto px-4 w-full">
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
                        <div class="bg-gray-100/50 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail">
                                <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium">Email</h4>
                            <p class="text-muted-foreground">{{ $about->email }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="bg-gray-100/50 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone">
                                <path
                                    d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium">Téléphone</h4>
                            <p class="text-muted-foreground">{{ $about->numero }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="bg-gray-100/50 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium">Localisation</h4>
                            <p class="text-muted-foreground">{{ $about->localisation }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="w-full">
                            <label for="nom" class="block text-sm font-medium mb-1">Nom</label>
                            <input type="text" id="nom" name="nom" placeholder="Nom"
                                class="w-full border border-gray-300 bg-gray-100/50 rounded-lg px-4 py-2" required>
                        </div>
                        <div class="w-full">
                            <label for="prenom" class="block text-sm font-medium mb-1">Prénom</label>
                            <input type="text" id="prenom" name="prenom" placeholder="Prénom"
                                class="w-full border border-gray-300 bg-gray-100/50 rounded-lg px-4 py-2" required>
                        </div>
                    </div>

                    <div>
                        <label for="sujet" class="block text-sm font-medium mb-1">Sujet</label>
                        <input type="text" id="sujet" name="sujet" placeholder="Sujet"
                            class="w-full border border-gray-300 bg-gray-100/50 rounded-lg px-4 py-2" required>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium mb-1">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Votre message"
                            class="w-full border border-gray-300 bg-gray-100/50 rounded-lg px-4 py-2" required></textarea>
                    </div>

                    <button type="submit"
                        class="flex justify-center items-center gap-2 w-full text-sm px-4 py-2 bg-black text-white rounded hover:bg-opacity-85 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-send-icon lucide-send">
                            <path
                                d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z" />
                            <path d="m21.854 2.147-10.94 10.939" />
                        </svg>
                        Envoyer
                    </button>
                </form>

            </div>
        </div>


    </div>
</section>
