<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestion des projets') }}
            </h2>
            <a href="{{ route('admin.project.create') }}"
                class="inline-block bg-black hover:bg-black/80 transition text-white px-4 py-2 rounded">Ajouter un
                projet</a>
        </div>
    </x-slot>
    @section('contentAdmin')
        <table class="min-w-full bg-white rounded-md">
            <thead>
                <tr>
                    <th class="py-2 px-4 text-center border-b">Titre</th>
                    <th class="py-2 px-4 text-center border-b">Description</th>
                    <th class="py-2 px-4 text-center border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="py-2 px-4 text-center">{{ $project->title }}</td>
                        <td class="py-2 px-4 text-center w-1/2">{{ $project->description }}</td>
                        <td class="flex flex-col py-2 px-4 text-center">
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
</x-app-layout>
