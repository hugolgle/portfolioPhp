<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl">{{ __('Services') }}</h2>

            <div class="flex gap-4">
                @if (isset($nbDevis) && $nbDevis > 0)
                    <a href="{{ route('admin.services.devis') }}"
                        class="inline-block bg-slate-500 hover:bg-slate-700 text-white px-4 py-2 rounded">
                        Voir les devis ({{ $nbDevis }})
                    </a>
                @endif

                <a href="{{ route('admin.services.create') }}"
                    class="inline-block bg-black hover:bg-gray-800 text-white px-4 py-2 rounded">
                    Créer un service
                </a>
            </div>
        </div>
    </x-slot>

    @section('contentAdmin')
        <table class="min-w-full bg-white rounded-md">
            <thead>
                <tr>
                    <th class="py-2 px-4 text-center border-b">Titre</th>
                    <th class="py-2 px-4 text-center border-b">Prix</th>
                    <th class="py-2 px-4 text-center border-b">Options</th>
                    <th class="py-2 px-4 text-center border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td class="py-2 px-4 text-center">{{ $service->title }}</td>
                        <td class="py-2 px-4 text-center">{{ $service->price }} €</td>
                        <td class="py-2 px-4 text-center">
                            <ul class="ml-4">
                                @foreach ($service->options as $opt)
                                    <li>• {{ $opt->title }} (+{{ $opt->price }} €)</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="flex flex-col items-center">
                            <a href="{{ route('admin.services.edit', $service) }}"
                                class="cursor-pointer text-blue-600">Modifier</a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                                class="cursor-pointer" onsubmit="return confirm('Supprimer ce service ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Supprimer</button>
                            </form>
                            <form action="{{ route('admin.services.updateVisibility', $service) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="text-sm px-2 py-1 rounded {{ $service->isVisible ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $service->isVisible ? 'Visible' : 'Caché' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
</x-app-layout>
