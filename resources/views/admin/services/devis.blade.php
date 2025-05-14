<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Devis') }}
        </h2>
    </x-slot>

    @section('contentAdmin')
        <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Date</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Nom</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Email</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Montant</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Services</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Options</th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-600"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($devis as $dev)
                    @php
                        $total = collect($dev->services)->reduce(function ($carry, $svc) {
                            $svcTotal = $svc['price'] + collect($svc['options'] ?? [])->sum('price');
                            return $carry + $svcTotal;
                        }, 0);
                    @endphp
                    <tr class="hover:bg-gray-50 group">
                        <td class="px-4 py-3 align-middle text-sm text-gray-700">
                            {{ $dev->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-4 py-3 align-middle text-sm text-gray-700">{{ $dev->client_name }}</td>
                        <td class="px-4 py-3 align-middle text-sm text-gray-700">{{ $dev->client_email }}</td>
                        <td class="px-4 py-3 align-middle text-sm text-gray-700">{{ number_format($total, 2, ',', ' ') }} €
                        </td>
                        <td class="px-4 py-3 align-middle text-sm text-gray-700">
                            {{ implode(', ', collect($dev->services)->pluck('title')->all()) }}
                        </td>
                        <td class="px-4 py-3 align-middle text-sm text-gray-700">
                            @foreach ($dev->services as $svc)
                                @if (!empty($svc['options']))
                                    <strong>{{ $svc['title'] }} :</strong>
                                    <ul class="ml-4">
                                        @foreach ($svc['options'] as $opt)
                                            <li>• {{ $opt['title'] }} (+{{ number_format($opt['price'], 2, ',', ' ') }} €)
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            @endforeach
                        </td>
                        <td class="px-4 py-3 align-middle text-center opacity-0 group-hover:opacity-100 transition">
                            <form action="{{ route('admin.devis.destroy', $dev) }}" method="POST" class="inline"
                                onsubmit="return confirm('Supprimer ce devis ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">
                                    <i data-lucide="trash2" class="inline-block size-4"></i>
                                </button>
                            </form>
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
