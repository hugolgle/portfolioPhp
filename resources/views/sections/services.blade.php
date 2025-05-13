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

        <x-primary-button class="sendDemande mx-auto mt-4" style="display:none;" itemscope x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'demande')">{{ __('Faire un devis') }}</x-primary-button>

        <x-modal name="demande" focusable>
            <form method="POST" action="{{ route('admin.devis.store') }}" class="p-6">
                @csrf
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Envoyer un devis?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Une fois votre demande envoyée, vous recevrez un e-mail de confirmation.') }}
                </p>

                <div class="mt-4">
                    <label for="client_name"
                        class="block text-sm font-medium text-gray-700">{{ __('Nom du client') }}</label>
                    <input type="text" id="client_name" name="client_name" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm" />
                </div>

                <div class="mt-4">
                    <label for="client_phone"
                        class="block text-sm font-medium text-gray-700">{{ __('Numéro de téléphone') }}</label>
                    <input type="text" id="client_phone" name="client_phone" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm" />
                </div>

                <div class="mt-4">
                    <label for="client_email"
                        class="block text-sm font-medium text-gray-700">{{ __('Email du client') }}</label>
                    <input type="email" id="client_email" name="client_email" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm" />
                </div>

                <div class="mt-6">
                    <h4 class="text-lg font-semibold">Services sélectionnés</h4>
                    <ul id="selected-services" class="mt-2">
                        <!-- Les services sélectionnés seront affichés ici -->
                    </ul>
                </div>

                <div class="mt-4">
                    <h4 class="text-lg font-semibold">Total :</h4>
                    <p id="modal-price" class="text-xl font-bold text-primary">0€</p>
                </div>

                <input type="hidden" id="selected_services_data" name="selected_services_data" value="">

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Annuler') }}
                    </x-secondary-button>

                    <x-primary-button class="ms-3">
                        {{ __('Envoyer la demande') }}
                    </x-primary-button>
                </div>
            </form>
        </x-modal>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-details');
            const serviceCheckboxes = document.querySelectorAll('.service-checkbox');
            const optionCheckboxes = document.querySelectorAll('.option-checkbox');
            const totalPriceElement = document.getElementById('price');
            const totalEstimate = document.querySelector('.totalEstimate');
            const submitButton = document.querySelector('.sendDemande');
            const selectedServicesList = document.getElementById('selected-services');

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
                selectedServicesList.innerHTML = '';

                serviceCheckboxes.forEach(cb => {
                    if (!cb.checked) return;
                    serviceSelected = true;
                    const serviceId = cb.dataset.serviceId;
                    const detailsDiv = document.getElementById(`details-${serviceId}`);
                    const titleEl = detailsDiv.querySelector('h4');
                    const serviceName = titleEl ? titleEl.innerText : 'Service';

                    total += parseFloat(cb.dataset.price) || 0;

                    const liService = document.createElement('li');
                    liService.textContent = `${serviceName} — ${cb.dataset.price}€`;
                    selectedServicesList.appendChild(liService);

                    const opts = detailsDiv.querySelectorAll('.option-checkbox');
                    opts.forEach(opt => {
                        if (!opt.checked) return;
                        const label = detailsDiv.querySelector(`label[for="${opt.id}"] span`)
                            .innerText;
                        const priceOpt = parseFloat(opt.dataset.optionPrice) || 0;
                        total += priceOpt;

                        const liOpt = document.createElement('li');
                        liOpt.textContent = `• ${label} (+${priceOpt}€)`;
                        selectedServicesList.appendChild(liOpt);
                    });
                });

                const selected = [];
                serviceCheckboxes.forEach(cb => {
                    if (!cb.checked) return;
                    const serviceId = cb.dataset.serviceId;
                    const details = document.getElementById(`details-${serviceId}`);
                    const title = details.querySelector('h4').innerText;
                    const price = parseFloat(cb.dataset.price);
                    const opts = [];
                    details.querySelectorAll('.option-checkbox').forEach(opt => {
                        if (!opt.checked) return;
                        opts.push({
                            id: opt.id.replace('option-', ''),
                            title: details.querySelector(`label[for="${opt.id}"] span`)
                                .innerText,
                            price: parseFloat(opt.dataset.optionPrice)
                        });
                    });
                    selected.push({
                        id: serviceId,
                        title,
                        price,
                        options: opts
                    });
                });

                document.getElementById('selected_services_data').value = JSON.stringify(selected);

                const modalPriceEl = document.getElementById('modal-price');
                if (modalPriceEl) modalPriceEl.innerText = total.toFixed(2) + '€';

                if (serviceSelected) {
                    totalEstimate.style.display = 'block';
                    totalPriceElement.innerText = total.toFixed(2) + '€';
                    submitButton.style.display = 'block';
                } else {
                    totalEstimate.style.display = 'none';
                    submitButton.style.display = 'none';
                }
            }



            serviceCheckboxes.forEach(cb => cb.addEventListener('change', function() {
                const details = document.getElementById(`details-${cb.dataset.serviceId}`);
                details.querySelectorAll('.option-checkbox')
                    .forEach(opt => {
                        opt.disabled = !cb.checked;
                        if (!cb.checked) opt.checked = false;
                    });
                updateTotalPrice();
            }));
            optionCheckboxes.forEach(cb => cb.addEventListener('change', updateTotalPrice));

            updateTotalPrice();
        });
    </script>
</section>
