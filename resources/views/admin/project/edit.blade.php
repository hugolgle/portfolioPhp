@extends('layouts.admin')

@section('contentAdmin')
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold">Modifier le projet</h1>
    <form action="{{ route('admin.project.update', $project) }}" method="POST" class="mt-6">
    @csrf
    @method('PUT') <!-- Indiquer qu'il s'agit d'une requête PUT pour mettre à jour -->

    <div class="mb-4">
      <label for="title" class="block">Titre du projet</label>
      <input type="text" name="title" id="title" class="w-full border px-4 py-2"
      value="{{ old('title', $project->title) }}">
    </div>

    <div class="mb-4">
      <label for="objectif" class="block">Objectif</label>
      <textarea name="objectif" id="objectif" rows="4"
      class="w-full border px-4 py-2">{{ old('objectif', $project->objectif) }}</textarea>
    </div>

    <!-- Ajouter des champs supplémentaires si nécessaire -->

    <div class="mb-4">
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
    </div>
    </form>
  </div>
@endsection