<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le service') }}
        </h2>
    </x-slot>

    @section('contentAdmin')
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">

            <form action="{{ route('admin.services.update', $service) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

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

                <div>
                    <label for="price" class="block text-lg font-medium text-gray-700">Prix du service</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $service->price) }}" required
                        class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500"
                        placeholder="Prix du service">
                </div>

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
                    class="w-full py-3 bg-slate-400 text-white font-semibold rounded-md hover:bg-slate-400/80 transition">
                    Ajouter une autre option
                </button>

                <button type="submit"
                    class="w-full py-3 bg-black text-white font-semibold rounded-md hover:bg-black/80 transition">
                    Mettre à jour
                </button>
            </form>
        </div>

        <script>
            let optionCount = {{ count($service->options) }};

            document.getElementById('add-option-btn').addEventListener('click', function() {
                const container = document.getElementById('options-container');
                optionCount++;

                const newOption = document.createElement('div');
                newOption.classList.add('option', 'space-y-4');
                newOption.id = `option-${optionCount}`;

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

            function removeOption(optionId) {
                const optionElement = document.getElementById(`option-${optionId}`);

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = `options[${optionId}][_delete]`;
                input.value = '1';
                optionElement.appendChild(input);

                optionElement.style.display = 'none';
            }
        </script>
    @endsection
</x-app-layout>
