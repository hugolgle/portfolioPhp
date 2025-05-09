@extends('layouts.admin')

@section('contentAdmin')
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
        <h1 class="text-2xl font-bold mb-4">Modifier le projet</h1>
        <form action="{{ route('admin.project.update', $project) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="flex flex-col">
                <label for="title" class="font-medium mb-1">Titre du projet</label>
                <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}"
                    class="border rounded px-3 py-2 w-full" />
            </div>

            <div class="flex flex-col">
                <label for="objectif" class="font-medium mb-1">Objectif</label>
                <textarea name="objectif" id="objectif" rows="4" class="border rounded px-3 py-2 w-full">{{ old('objectif', $project->objectif) }}</textarea>
            </div>

            {{-- Ajoutez d'autres champs si nécessaire --}}

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
@endsection
