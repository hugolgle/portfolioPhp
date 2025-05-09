@extends('layouts.admin')

@section('contentAdmin')
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold">Ajouter un projet</h1>
    <form action="{{ route('admin.project.store') }}" method="POST" class="mt-6" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
      <label for="title" class="block">Titre du projet</label>
      <input type="text" name="title" id="title" class="w-full border px-4 py-2" value="{{ old('title') }}">
    </div>

    <div class="mb-4">
      <label for="objectif" class="block">Objectif</label>
      <textarea name="objectif" id="objectif" rows="4" class="w-full border px-4 py-2">{{ old('objectif') }}</textarea>
    </div>

    <div class="mb-4">
      <label for="formation" class="block">Formation</label>
      <input type="text" name="formation" id="formation" class="w-full border px-4 py-2" value="{{ old('formation') }}">
    </div>

    <div class="mb-4">
      <label for="description" class="block">Description</label>
      <textarea name="description" id="description" rows="4"
      class="w-full border px-4 py-2">{{ old('description') }}</textarea>
    </div>

    <div class="mb-4">
      <label for="skills" class="block">Compétences</label>
      <textarea name="skills" id="skills" rows="4" class="w-full border px-4 py-2">{{ old('skills') }}</textarea>
      <small>Entrer les compétences sous forme de JSON (ex : [{"id":"skill_1","skill":"HTML"}])</small>
    </div>

    <div class="mb-4">
      <label for="ressource" class="block">Ressources</label>
      <textarea name="ressource" id="ressource" rows="4"
      class="w-full border px-4 py-2">{{ old('ressource') }}</textarea>
      <small>Entrer les ressources sous forme de JSON (ex : [{"id":"res_1","url":"http://example.com"}])</small>
    </div>

    <div class="mb-4">
      <label for="tags" class="block">Tags</label>
      <textarea name="tags" id="tags" rows="4" class="w-full border px-4 py-2">{{ old('tags') }}</textarea>
      <small>Entrer les tags sous forme de JSON (ex : [{"id":"tech_1","name":"React"}])</small>
    </div>

    <div class="mb-4">
      <label for="image" class="block">Image</label>
      <input type="file" name="image" id="image" class="w-full border px-4 py-2">
    </div>

    <div class="mb-4">
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter</button>
    </div>
    </form>
  </div>
@endsection