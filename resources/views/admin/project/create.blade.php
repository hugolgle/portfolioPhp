<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un projet') }}
        </h2>
    </x-slot>

    @section('contentAdmin')
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="flex flex-col">
                    <label for="title" class="font-medium mb-1">Titre du projet</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        class="border rounded px-3 py-2 w-full" />
                </div>

                <div class="flex flex-col">
                    <label for="description" class="font-medium mb-1">Description</label>
                    <textarea name="description" id="description" rows="4" class="border rounded px-3 py-2 w-full">{{ old('description') }}</textarea>
                </div>

                <div class="flex flex-col">
                    <label for="ressource" class="font-medium mb-1">Lien ressource</label>
                    <input type="url" name="ressource" id="ressource" value="{{ old('ressource') }}"
                        class="border rounded px-3 py-2 w-full" />
                </div>

                <div class="flex flex-col">
                    <label for="demo" class="font-medium mb-1">Lien démo</label>
                    <input type="url" name="demo" id="demo" value="{{ old('demo') }}"
                        class="border rounded px-3 py-2 w-full" />
                </div>

                <div class="flex flex-col">
                    <label for="tags" class="font-medium mb-1">Tags</label>
                    <input type="text" name="tags" id="tags" value="{{ old('tags') }}"
                        class="border rounded px-3 py-2 w-full" placeholder="Ajoutez des tags, séparés par des virgules" />
                    <small class="text-sm text-gray-500 mt-1">Séparez les tags par des virgules, ex. "React, Laravel,
                        PHP"</small>
                </div>

                <div class="flex flex-col">
                    <label for="image" class="font-medium mb-1">Image</label>
                    <input type="file" name="image" accept="image/jpeg, image/jpg, image/png, image/gif, image/svg"
                        id="image" class="border rounded px-3 py-2 w-full" />
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    @endsection
</x-app-layout>
