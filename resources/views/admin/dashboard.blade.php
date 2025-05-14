<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    @section('contentAdmin')
        <div class="py-8 px-4 max-w-6xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Visites</h3>
                    <p class="mt-2 text-3xl font-bold text-blue-600">{{ $visitsTotal }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Visites aujourd'hui</h3>
                    <p class="mt-2 text-3xl font-bold text-purple-600">{{ $visitsToday }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Visiteurs uniques</h3>
                    <p class="mt-2 text-3xl font-bold text-yellow-600">{{ $visitsUnique }}</p>
                </div>
                @if (isset($nbDevis) && $nbDevis > 0)
                    <a href="{{ route('admin.services.devis') }}"
                        class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                        <h3 class="text-lg font-semibold">Devis</h3>
                        <p class="mt-2 text-3xl font-bold text-green-600">{{ $nbDevis }}</p>
                    </a>
                @endif
                <a href="{{ route('admin.messages') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold">Messages non-lus</h3>
                    <p class="mt-2 text-3xl font-bold text-yellow-600">{{ $nbMessages }}</p>
                </a>
            </div>

            <div class="mt-10 bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Historique des visites (7 derniers jours)</h3>
                <canvas id="visitsChart" class="w-full h-64"></canvas>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const data = @json($visitsPerDay);
                        const labels = Object.keys(data);
                        const counts = Object.values(data);

                        new Chart(document.getElementById('visitsChart'), {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Visites',
                                    data: counts,
                                    fill: true,
                                    tension: 0.3
                                }]
                            },
                            options: {
                                scales: {
                                    x: {
                                        title: {
                                            display: true,
                                            text: 'Date'
                                        }
                                    },
                                    y: {
                                        beginAtZero: true,
                                        title: {
                                            display: true,
                                            text: 'Nombre de visites'
                                        }
                                    }
                                },
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>
        </div>
    @endsection
</x-app-layout>
