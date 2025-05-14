<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestion des projets') }}
            </h2>
            <a href="{{ route('admin.project.create') }}"
                class="inline-block bg-black hover:bg-black/80 text-white px-4 py-2 rounded transition">
                Ajouter un projet
            </a>
        </div>
    </x-slot>

    @section('contentAdmin')
        <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Image</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Titre</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Description</th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-600"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($projects as $project)
                    <tr class="hover:bg-gray-50 group">
                        <td class="px-4 py-3">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                class="h-16 w-auto object-cover rounded" />
                        </td>
                        <td class="px-4 py-3 align-middle text-sm text-gray-700">
                            {{ $project->title }}
                        </td>
                        <td class="px-4 py-3 align-middle text-sm text-gray-700">
                            {{ Str::limit($project->description, 150) }}
                        </td>
                        <td class="px-4 py-3 align-middle text-center">
                            <div
                                class="inline-flex items-center justify-center space-x-3 opacity-0 transition group-hover:opacity-100">
                                <!-- Édition -->
                                <a href="{{ route('admin.project.edit', $project) }}"
                                    class="text-indigo-600 hover:text-indigo-800">
                                    <i data-lucide="pen" class="inline-block size-4"></i>
                                </a>
                                <!-- Suppression -->
                                <form action="{{ route('admin.project.destroy', $project) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Supprimer ce projet ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        <i data-lucide="trash-2" class="inline-block size-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
</x-app-layout>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
