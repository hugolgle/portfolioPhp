<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Préférences SEO et Titre du Site') }}
        </h2>
    </x-slot>

    @section('contentAdmin')
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
            <form method="POST" action="{{ route('admin.preferences.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Titre du Site</label>
                        <input type="text" name="site_title" value="{{ old('site_title', $preference->site_title) }}"
                            class="mt-1
                            block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500
                            sm:text-sm"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description du Site</label>
                        <textarea name="site_description"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('site_description', $preference->site_description ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Favicon (PNG, JPG)</label>
                        <input type="file" name="favicon" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-500 border-gray-300 rounded-md focus:ring-indigo-500">
                        @if ($preference && $preference->favicon)
                            <img src="{{ asset('storage/favicons/' . $preference->favicon) }}" alt="Favicon"
                                class="mt-2 w-16 h-16">
                        @endif
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mots-clés SEO</label>
                        <input type="text" name="seo_keywords"
                            value="{{ old('seo_keywords', $preference->seo_keywords ?? '') }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded-md hover:bg-black/80 transition">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    @endsection
</x-app-layout>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
