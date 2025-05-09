@extends('layouts.admin')

@section('contentAdmin')
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
        <h1 class="text-2xl font-bold mb-4">Modifier le projet</h1>
        <form action="{{ route('admin.project.update', $project) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Titre -->
            <div class="flex flex-col">
                <label for="title" class="font-medium mb-1">Titre du projet</label>
                <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}"
                    class="border rounded px-3 py-2 w-full" />
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="flex flex-col">
                <label for="description" class="font-medium mb-1">Description</label>
                <textarea name="description" id="description" rows="4" class="border rounded px-3 py-2 w-full">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Ressource -->
            <div class="flex flex-col">
                <label for="ressource" class="font-medium mb-1">Lien ressource</label>
                <input type="url" name="ressource" id="ressource" value="{{ old('ressource', $project->ressource) }}"
                    class="border rounded px-3 py-2 w-full" />
                @error('ressource')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Démo -->
            <div class="flex flex-col">
                <label for="demo" class="font-medium mb-1">Lien démo</label>
                <input type="url" name="demo" id="demo" value="{{ old('demo', $project->demo) }}"
                    class="border rounded px-3 py-2 w-full" />
                @error('demo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tags -->
            <div class="flex flex-col">
                <label for="tags" class="font-medium mb-1">Tags (séparés par des virgules)</label>
                <input type="text" name="tags" id="tags" value="{{ old('tags', $project->tags) }}"
                    class="border rounded px-3 py-2 w-full" placeholder="Ex : React, Laravel, PHP" />
                @error('tags')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image -->
            <div class="flex flex-col">
                <label for="image" class="font-medium mb-1">Image</label>
                <input type="file" name="image" id="image" class="border rounded px-3 py-2 w-full" />
                @if ($project->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="Image du projet"
                            class="w-32 h-32 object-cover rounded-md">
                    </div>
                @endif
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Bouton -->
            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
@endsection
