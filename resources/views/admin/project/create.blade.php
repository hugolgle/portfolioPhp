@extends('layouts.admin')

@section('contentAdmin')
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
        <h1 class="text-2xl font-bold mb-4">Ajouter un projet</h1>
        <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="flex flex-col">
                <label for="title" class="font-medium mb-1">Titre du projet</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                    class="border rounded px-3 py-2 w-full" />
            </div>

            <div class="flex flex-col">
                <label for="objectif" class="font-medium mb-1">Objectif</label>
                <textarea name="objectif" id="objectif" rows="4" class="border rounded px-3 py-2 w-full">{{ old('objectif') }}</textarea>
            </div>

            <div class="flex flex-col">
                <label for="formation" class="font-medium mb-1">Formation</label>
                <input type="text" name="formation" id="formation" value="{{ old('formation') }}"
                    class="border rounded px-3 py-2 w-full" />
            </div>

            <div class="flex flex-col">
                <label for="description" class="font-medium mb-1">Description</label>
                <textarea name="description" id="description" rows="4" class="border rounded px-3 py-2 w-full">{{ old('description') }}</textarea>
            </div>

            <div class="flex flex-col">
                <label for="skills" class="font-medium mb-1">Compétences</label>
                <textarea name="skills" id="skills" rows="4" class="border rounded px-3 py-2 w-full">{{ old('skills') }}</textarea>
                <small class="text-sm text-gray-500 mt-1">
                    JSON, ex. [{"id":"skill_1","skill":"HTML"}]
                </small>
            </div>

            <div class="flex flex-col">
                <label for="ressource" class="font-medium mb-1">Ressources</label>
                <textarea name="ressource" id="ressource" rows="4" class="border rounded px-3 py-2 w-full">{{ old('ressource') }}</textarea>
                <small class="text-sm text-gray-500 mt-1">
                    JSON, ex. [{"id":"res_1","url":"http://..."}]
                </small>
            </div>

            <div class="flex flex-col">
                <label for="tags" class="font-medium mb-1">Tags</label>
                <textarea name="tags" id="tags" rows="4" class="border rounded px-3 py-2 w-full">{{ old('tags') }}</textarea>
                <small class="text-sm text-gray-500 mt-1">
                    JSON, ex. [{"id":"tech_1","name":"React"}]
                </small>
            </div>

            <div class="flex flex-col">
                <label for="image" class="font-medium mb-1">Image</label>
                <input type="file" name="image" id="image" class="border rounded px-3 py-2 w-full" />
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
@endsection
