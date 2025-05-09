<section id="services" class="py-16 bg-white rounded-3xl">
    <div class="container mx-auto px-4 w-full max-w-6xl">
        <h2 class="text-3xl font-bold text-center mb-4">Mes services</h2>
        <p class="text-muted-foreground text-center text-sm mb-10">
            Je propose une gamme complète de services pour vous accompagner dans la réalisation<br> de vos projets
            numériques, de la conception à la mise en production.
        </p>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($services as $key => $service)
                <div class="border border-gray-200 rounded-lg p-6 shadow-sm space-y-4">
                    <h3 class="text-lg font-semibold">{{ $service['title'] }}</h3>
                    <p class="text-sm text-muted-foreground">{{ $service['description'] }}</p>
                    <button
                        class="toggle-details px-4 py-2 text-sm w-full  font-medium bg-black  text-white rounded hover:bg-black/80 transition"
                        data-target="details-{{ $key }}">
                        Sélectionner
                    </button>
                </div>
            @endforeach
        </div>
        <div class="mt-10 space-y-6">
            @foreach ($services as $key => $service)
                <div id="details-{{ $key }}"
                    class="hidden border border-gray-200 rounded-lg p-6 shadow-sm space-y-4">
                    <div class="flex justify-between items-center">
                        <h4 class="text-lg font-semibold">{{ $service->title }}</h4>
                        <span class="text-primary font-bold">{{ $service->price }} €</span>
                    </div>
                    <p class="text-sm text-muted-foreground">{{ $service->description }}</p>

                    <div class="flex items-center">
                        <input type="checkbox" id="checkbox-{{ $key }}" class="service-checkbox"
                            data-price="{{ $service->price }}" data-service-id="{{ $key }}" />
                        <label for="checkbox-{{ $key }}" class="ml-2 text-sm font-medium">Inclure ce
                            service</label>
                    </div>

                    <div>
                        <h5 class="text-sm font-semibold mb-2">Options supplémentaires :</h5>
                        <ul class="space-y-2">
                            @if ($service->options && $service->options->count() > 0)
                                @foreach ($service->options as $option)
                                    <li class="flex items-center gap-2">
                                        <input type="checkbox" id="option-{{ $option->id }}" class="option-checkbox"
                                            data-service-id="{{ $service->id }}"
                                            data-option-price="{{ $option->price }}" />
                                        <label for="option-{{ $option->id }}"
                                            class="flex justify-between w-full text-sm">
                                            <span>{{ $option->title }}</span>
                                            <span class="text-primary">+{{ $option->price }} €</span>
                                        </label>
                                    </li>
                                @endforeach
                            @else
                                <p>Aucune option disponible.</p>
                            @endif
                        </ul>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="totalEstimate mt-10 text-center border-t pt-6" style="display:none;">
            <h3 class="text-xl font-semibold">Total Estimé :</h3>
            <p id="price" class="text-2xl font-bold text-primary mt-1">0€</p>
        </div>

        <button
            class="sendDemande mx-auto px-4 py-2 text-sm mt-5 font-medium bg-black text-white rounded hover:bg-black/80 transition"
            style="display:none;">
            Envoyer la demande
        </button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-details');
            const serviceCheckboxes = document.querySelectorAll('.service-checkbox');
            const optionCheckboxes = document.querySelectorAll('.option-checkbox');
            const totalPriceElement = document.getElementById('price');
            const totalEstimate = document.querySelector('.totalEstimate');
            const submitButton = document.querySelector('button.sendDemande');

            optionCheckboxes.forEach(opt => opt.disabled = true);

            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const target = document.getElementById(targetId);

                    document.querySelectorAll('[id^="details-"]').forEach(div => {
                        if (div.id !== targetId) div.classList.add('hidden');
                    });

                    target.classList.toggle('hidden');
                });
            });

            function updateTotalPrice() {
                let total = 0;
                let serviceSelected = false;

                serviceCheckboxes.forEach(cb => {
                    if (cb.checked) {
                        serviceSelected = true;
                        total += parseFloat(cb.dataset.price || 0);
                    }
                });

                optionCheckboxes.forEach(cb => {
                    if (cb.checked) {
                        total += parseFloat(cb.dataset.optionPrice || 0);
                    }
                });

                if (serviceSelected) {
                    totalEstimate.style.display = 'block';
                    totalPriceElement.innerText = total.toFixed(2) + '€';
                    submitButton.style.display = 'block';
                } else {
                    totalEstimate.style.display = 'none';
                    submitButton.style.display = 'none';
                }
            }

            serviceCheckboxes.forEach(cb => {
                cb.addEventListener('change', function() {
                    const serviceId = cb.dataset.serviceId;
                    const detailsDiv = document.getElementById(
                        `details-${serviceId}`);
                    const relatedOptions = detailsDiv.querySelectorAll('.option-checkbox');


                    relatedOptions.forEach(opt => {
                        opt.disabled = !cb
                            .checked;
                        if (!cb.checked) {
                            opt.checked = false;
                        }
                    });

                    updateTotalPrice();
                });
            });

            optionCheckboxes.forEach(cb => {
                cb.addEventListener('change', updateTotalPrice);
            });
        });
    </script>
</section>
