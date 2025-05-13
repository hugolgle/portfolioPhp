<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Devis') }}
        </h2>
    </x-slot>

    @section('contentAdmin')
        <table class="min-w-full bg-white rounded-md">
            <thead>
                <tr>
                    <th class="py-2 px-4 text-center border-b">Date</th>
                    <th class="py-2 px-4 text-center border-b">Nom</th>
                    <th class="py-2 px-4 text-center border-b">Email</th>
                    <th class="py-2 px-4 text-center border-b">Montant</th>
                    <th class="py-2 px-4 text-center border-b">Services</th>
                    <th class="py-2 px-4 text-center border-b">Options</th>
                    <th class="py-2 px-4 text-center border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devis as $dev)
                    @php
                        $total = collect($dev->services)->reduce(function ($carry, $svc) {
                            $svcTotal = $svc['price'] + collect($svc['options'] ?? [])->sum('price');
                            return $carry + $svcTotal;
                        }, 0);
                    @endphp
                    <tr>
                        <td class="py-2 px-4 text-center">
                            {{ $dev->created_at->format('d/m/Y') }}
                        </td>
                        <td class="py-2 px-4 text-center">{{ $dev->client_name }}</td>
                        <td class="py-2 px-4 text-center">{{ $dev->client_email }}</td>
                        <td class="py-2 px-4 text-center">{{ number_format($total, 2, ',', ' ') }} €</td>
                        <td class="py-2 px-4 text-center">
                            {{ implode(', ', collect($dev->services)->pluck('title')->all()) }}
                        </td>
                        <td class="py-2 px-4 text-center">
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
                        <td class="py-2 px-4 text-center">
                            <form action="{{ route('admin.devis.destroy', $dev) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
</x-app-layout>
