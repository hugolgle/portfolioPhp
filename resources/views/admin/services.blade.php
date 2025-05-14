<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl">{{ __('Services') }}</h2>

            <div class="flex gap-4">
                @if (isset($nbDevis) && $nbDevis > 0)
                    <a href="{{ route('admin.services.devis') }}"
                        class="inline-block bg-slate-500 hover:bg-slate-700 text-white px-4 py-2 rounded transition">
                        Voir les devis ({{ $nbDevis }})
                    </a>
                @endif

                <a href="{{ route('admin.services.create') }}"
                    class="inline-block bg-black hover:bg-gray-800 text-white px-4 py-2 rounded transition">
                    Créer un service
                </a>
            </div>
        </div>
    </x-slot>

    @section('contentAdmin')
        <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Titre</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Options</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Prix</th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-600"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($services as $service)
                    <tr class="hover:bg-gray-50 group">
                        <td class="px-4 py-3 align-middle text-sm text-gray-700">{{ $service->title }}</td>
                        <td class="px-4 py-3 align-middle text-sm text-gray-700">
                            <ul class="ml-4">
                                @foreach ($service->options as $opt)
                                    <li>• {{ $opt->title }} (+{{ $opt->price }} €)</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="px-4 py-3 align-middle text-sm text-gray-700">{{ $service->price }} €</td>
                        <td class="px-4 py-3 align-middle text-center">
                            <div
                                class="inline-flex items-center justify-center space-x-3 transition opacity-0 group-hover:opacity-100">
                                <a href="{{ route('admin.services.edit', $service) }}"
                                    class="text-indigo-600 hover:text-indigo-800"><i data-lucide="pen"
                                        class="inline-block size-4"></i></a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                                    class="cursor-pointer" onsubmit="return confirm('Supprimer ce service ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        <i data-lucide="trash-2" class="inline-block size-4"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.services.updateVisibility', $service) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="text-sm rounded {{ $service->isVisible ? 'text-green-700' : 'text-red-700' }}">
                                        {!! $service->isVisible
                                            ? '<i data-lucide="eye" class="inline-block size-4"></i>'
                                            : '<i data-lucide="eye-off" class="inline-block size-4"></i>' !!}
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
