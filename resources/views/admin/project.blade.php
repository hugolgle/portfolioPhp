@extends('layouts.admin')

@section('contentAdmin')
  <div class="relative container mx-auto">
    <h1 class="text-3xl font-bold">Gestion des Projets</h1>
    <div class="mt-6">
    <a href="{{ route('admin.project.create') }}" class="bg-blue-500 text-white p-2 rounded">Ajouter un projet</a>
    <table class="mt-4 w-full table-auto border-collapse">
      <thead>
      <tr>
        <th class="border px-4 py-2">Titre</th>
        <th class="border px-4 py-2">Objectif</th>
        <th class="border px-4 py-2">Actions</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($projects as $project)
      <tr>
      <td class="border px-4 py-2">{{ $project->title }}</td>
      <td class="border px-4 py-2">{{ $project->objectif }}</td>
      <td class="border px-4 py-2">
      <a href="{{ route('admin.project.edit', $project) }}" class="text-blue-500">Modifier</a>
      <form action="{{ route('admin.project.destroy', $project) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500">Supprimer</button>
      </form>
      </td>
      </tr>
    @endforeach
      </tbody>
    </table>
    </div>
  </div>
@endsection