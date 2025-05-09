<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('À propos') }}
            </h2>
            <button id="editBtn" onclick="toggleEdit()"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                Modifier
            </button>
        </div>
    </x-slot>

    @section('contentAdmin')
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
            <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data" id="aboutForm">
                @csrf @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    @foreach ($about as $item)
                        {{-- CV --}}
                        <div class="flex flex-col">
                            <label class="font-medium mb-2">CV (PDF)</label>
                            <input type="file" name="cv" accept="application/pdf" class="border rounded px-3 py-2"
                                disabled>
                        </div>

                        {{-- Bio --}}
                        <div class="flex flex-col">
                            <label class="font-medium mb-2">Bio</label>
                            <textarea name="bio" class="border rounded px-3 py-2 h-32" disabled>{{ old('bio', $item->bio) }}</textarea>
                        </div>

                        {{-- Photo --}}
                        <div class="flex flex-col">
                            <label class="font-medium mb-2">Photo de profil</label>
                            <input type="file" name="photo" accept="image/*" class="border rounded px-3 py-2" disabled>
                        </div>

                        {{-- Numéro --}}
                        <div class="flex flex-col">
                            <label class="font-medium mb-2">Numéro</label>
                            <input type="number" name="numero" value="{{ old('numero', $item->numero) }}"
                                class="border rounded px-3 py-2" disabled>
                        </div>

                        {{-- E-mail --}}
                        <div class="flex flex-col">
                            <label class="font-medium mb-2">E‑mail</label>
                            <input type="email" name="email" value="{{ old('email', $item->email) }}"
                                class="border rounded px-3 py-2" disabled>
                        </div>

                        {{-- Localisation --}}
                        <div class="flex flex-col">
                            <label class="font-medium mb-2">Localisation</label>
                            <input type="text" name="localisation" value="{{ old('localisation', $item->localisation) }}"
                                class="border rounded px-3 py-2" disabled>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 flex justify-end space-x-4">
                    <button type="submit" id="saveBtn"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition hidden">
                        OK
                    </button>
                </div>
            </form>
        </div>

        <script>
            let formInitial = {};
            let editing = false;

            window.addEventListener('load', () => {
                document.querySelectorAll('#aboutForm input, #aboutForm textarea')
                    .forEach(i => formInitial[i.name] = i.value);
            });

            function toggleEdit() {
                editing = !editing;
                document.querySelectorAll('#aboutForm input, #aboutForm textarea')
                    .forEach(i => i.disabled = !editing);
                document.getElementById('saveBtn')
                    .classList.toggle('hidden', !editing);
                document.getElementById('editBtn')
                    .textContent = editing ? 'Annuler' : 'Modifier';
                if (!editing) {
                    // reset
                    Object.entries(formInitial).forEach(([name, val]) => {
                        document.querySelector(`[name="${name}"]`).value = val;
                    });
                }
            }

            document.querySelectorAll('#aboutForm input, #aboutForm textarea')
                .forEach(i => i.addEventListener('input', () => {
                    const changed = Array.from(
                        document.querySelectorAll('#aboutForm input, #aboutForm textarea')
                    ).some(inp => inp.value !== formInitial[inp.name]);
                    document.getElementById('saveBtn')
                        .classList.toggle('hidden', !changed);
                }));
        </script>
    @endsection
</x-app-layout>
