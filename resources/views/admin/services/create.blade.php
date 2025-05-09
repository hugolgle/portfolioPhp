<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un service') }}
        </h2>
    </x-slot>

    @section('contentAdmin')
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="title" class="block text-lg font-medium text-gray-700">Titre du service</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                        class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500"
                        placeholder="Titre du service">
                </div>

                <div>
                    <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" required
                        class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Description du service">{{ old('description') }}</textarea>
                </div>

                <!-- Nouveau champ pour le prix du service -->
                <div>
                    <label for="price" class="block text-lg font-medium text-gray-700">Prix du service</label>
                    <input type="number" name="price" id="price" required
                        class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500"
                        placeholder="Prix du service">
                </div>


                <!-- Section pour ajouter des options -->
                <div id="options-container" class="space-y-4">
                    <div class="option" id="option-1">
                        <label for="option_title_1" class="block text-lg font-medium text-gray-700">Option 1 - Titre de
                            l'option</label>
                        <input type="text" name="options[0][title]" id="option_title_1" required
                            class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500"
                            placeholder="Titre de l'option">

                        <label for="option_price_1" class="block text-lg font-medium text-gray-700 mt-4">Prix de
                            l'option</label>
                        <input type="number" name="options[0][price]" id="option_price_1" required
                            class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500"
                            placeholder="Prix de l'option">
                    </div>
                </div>

                <button type="button" id="add-option-btn"
                    class="w-full py-3 bg-slate-400 text-white font-semibold rounded-md hover:bg-slate-400/80 transition duration-300">
                    Ajouter une autre option
                </button>

                <button type="submit"
                    class="w-full py-3 bg-black text-white font-semibold rounded-md hover:bg-black/80 transition duration-300">
                    Soumettre
                </button>
            </form>
        </div>

        <script>
            document.getElementById('add-option-btn').addEventListener('click', function() {
                const container = document.getElementById('options-container');
                const optionCount = container.children.length + 1;

                const newOption = document.createElement('div');
                newOption.classList.add('option', 'space-y-4');
                newOption.id = `option-${optionCount}`;

                newOption.innerHTML = `
    <label for="option_title_${optionCount}" class="block text-lg font-medium text-gray-700">Option ${optionCount} - Titre de l'option</label>
    <input type="text" name="options[${optionCount}][title]" id="option_title_${optionCount}" required
           class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Titre de l'option">

    <label for="option_price_${optionCount}" class="block text-lg font-medium text-gray-700 mt-4">Prix de l'option</label>
    <input type="number" name="options[${optionCount}][price]" id="option_price_${optionCount}" required
           class="mt-2 p-3 w-full border rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Prix de l'option">

    <button type="button" class="remove-option-btn text-red-600 hover:underline mt-2">Supprimer cette option</button>
`;

                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-option-btn')) {
                        e.target.closest('.option').remove();
                    }
                });

                container.appendChild(newOption);
            });
        </script>
    @endsection
</x-app-layout>
