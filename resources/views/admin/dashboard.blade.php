<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    @section('contentAdmin')
        <div class="py-8 px-4 max-w-6xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Vues</h3>
                    <p class="mt-2 text-3xl font-bold text-blue-600">1 234</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Projets</h3>
                    <p class="mt-2 text-3xl font-bold text-green-600">12</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Messages</h3>
                    <p class="mt-2 text-3xl font-bold text-red-600">5</p>
                </div>
            </div>

            <div class="mt-10 bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Historique des visites</h3>
                <div class="h-64 bg-gray-100 flex items-center justify-center text-gray-400">
                    Graphique à venir
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
