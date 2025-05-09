<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le service') }}
        </h2>
    </x-slot>

    @section('contentAdmin')
        <div class="container mx-auto">

            <form action="{{ route('admin.services.update', $service) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT') <!-- Requête PUT pour la mise à jour -->

                <div>
                    <label for="title" class="block text-lg font-medium text-gray-700">Titre du service</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $service->title) }}" required
                        class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500"
                        placeholder="Titre du service">
                </div>

                <div>
                    <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" required
                        class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Description du service">{{ old('description', $service->description) }}</textarea>
                </div>

                <!-- Section pour afficher et modifier les options existantes -->
                <div id="options-container" class="space-y-4">
                    @foreach ($service->options as $index => $option)
                        <div class="option" id="option-{{ $index }}">
                            <label for="option_title_{{ $index }}" class="block text-lg font-medium text-gray-700">
                                Option {{ $index + 1 }} - Titre de l'option
                            </label>
                            <input type="text" name="options[{{ $index }}][title]"
                                id="option_title_{{ $index }}" required
                                class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500"
                                value="{{ old('options.' . $index . '.title', $option->title) }}"
                                placeholder="Titre de l'option">

                            <label for="option_price_{{ $index }}"
                                class="block text-lg font-medium text-gray-700 mt-4">
                                Prix de l'option
                            </label>
                            <input type="number" name="options[{{ $index }}][price]"
                                id="option_price_{{ $index }}" required
                                class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500"
                                value="{{ old('options.' . $index . '.price', $option->price) }}"
                                placeholder="Prix de l'option">

                            <!-- Bouton pour supprimer l'option -->
                            <button type="button" class="mt-2 text-red-600 hover:text-red-800"
                                onclick="removeOption({{ $index }})">
                                Supprimer cette option
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- Bouton pour ajouter une nouvelle option -->
                <button type="button" id="add-option-btn"
                    class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 transition duration-300">
                    Ajouter une autre option
                </button>

                <button type="submit"
                    class="w-full py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-300">
                    Mettre à jour
                </button>
            </form>
        </div>

        <script>
            let optionCount = {{ count($service->options) }}; // Initialiser le nombre d'options existantes

            // Ajout d'une nouvelle option
            document.getElementById('add-option-btn').addEventListener('click', function() {
                const container = document.getElementById('options-container');
                optionCount++;

                const newOption = document.createElement('div');
                newOption.classList.add('option', 'space-y-4');
                newOption.id = `option-${optionCount}`; // Ajouter un ID unique pour chaque option

                newOption.innerHTML = `
                    <label for="option_title_${optionCount}" class="block text-lg font-medium text-gray-700">Option ${optionCount + 1} - Titre de l'option</label>
                    <input type="text" name="options[${optionCount}][title]" id="option_title_${optionCount}" required
                        class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Titre de l'option">

                    <label for="option_price_${optionCount}" class="block text-lg font-medium text-gray-700 mt-4">Prix de l'option</label>
                    <input type="number" name="options[${optionCount}][price]" id="option_price_${optionCount}" required
                        class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Prix de l'option">

                    <!-- Bouton de suppression pour chaque option -->
                    <button type="button" class="mt-2 text-red-600 hover:text-red-800" onclick="removeOption(${optionCount})">
                        Supprimer cette option
                    </button>
                `;

                container.appendChild(newOption);
            });

            // Fonction pour supprimer une option
            function removeOption(optionId) {
                const optionElement = document.getElementById(`option-${optionId}`);
                optionElement.remove();
            }
        </script>
    @endsection
</x-app-layout>
