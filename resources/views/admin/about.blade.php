<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('À propos') }}
            </h2>
        </div>
    </x-slot>

    @section('contentAdmin')
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
            <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data" id="aboutForm">
                @csrf @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    {{-- CV --}}
                    <div class="flex flex-col">
                        <label class="font-medium mb-2">CV (PDF)</label>
                        <input type="file" name="cv" accept="application/pdf" class="border rounded px-3 py-2"
                            onchange="previewCV(event)">
                        <!-- Canvas pour aperçu PDF -->
                        <canvas id="cvCanvas" style="display:none; cursor:pointer;"
                            class="mt-2 w-72 h-auto object-cover rounded"
                            onclick="window.open(currentCV, '_blank')"></canvas>
                    </div>

                    {{-- Bio --}}
                    <div class="flex flex-col">
                        <label class="font-medium mb-2">Bio</label>
                        <textarea name="bio" class="border rounded px-3 py-2 h-32">{{ old('bio', $about->bio ?? '') }}</textarea>
                    </div>

                    {{-- Photo --}}
                    <div class="flex flex-col">
                        <label class="font-medium mb-2">Photo de profil</label>
                        <input type="file" name="photo" accept="image/*" class="border rounded px-3 py-2"
                            onchange="previewPhoto(event)">
                        @if (isset($about) && $about->photo)
                            <img id="photoPreview" src="{{ asset('storage/' . $about->photo) }}"
                                class="mt-2 h-auto w-32 object-cover rounded" style="display: block;">
                        @else
                            <img id="photoPreview" class="mt-2 h-32 w-32 object-cover rounded" style="display: none;">
                        @endif
                    </div>

                    {{-- Numéro --}}
                    <div class="flex flex-col">
                        <label class="font-medium mb-2">Numéro</label>
                        <input type="number" name="numero" value="{{ old('numero', $about->numero ?? '') }}"
                            class="border rounded px-3 py-2">
                    </div>

                    {{-- E-mail --}}
                    <div class="flex flex-col">
                        <label class="font-medium mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $about->email ?? '') }}"
                            class="border rounded px-3 py-2">
                    </div>

                    {{-- Localisation --}}
                    <div class="flex flex-col">
                        <label class="font-medium mb-2">Localisation</label>
                        <input type="text" name="localisation"
                            value="{{ old('localisation', $about->localisation ?? '') }}" class="border rounded px-3 py-2">
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-4">
                    <button type="submit" id="saveBtn"
                        class="bg-black text-white px-4 py-2 rounded hover:bg-black/80 transition">
                        OK
                    </button>
                </div>
            </form>
        </div>

        <!-- Charger PDF.js -->
        <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
        <script>
            let formInitial = {};
            let editing = false;
            let currentCV = '';

            window.addEventListener('load', () => {
                document.querySelectorAll('#aboutForm input, #aboutForm textarea')
                    .forEach(i => formInitial[i.name] = i.value);

                @if (isset($about) && $about->cv)
                    renderPDFThumbnail("{{ asset('storage/' . $about->cv) }}");
                @endif
            });

            function previewPhoto(event) {
                const [file] = event.target.files;
                if (file) {
                    const img = document.getElementById('photoPreview');
                    img.src = URL.createObjectURL(file);
                    img.style.display = 'block';
                }
            }

            function renderPDFThumbnail(fileUrl) {
                currentCV = fileUrl;
                const canvas = document.getElementById('cvCanvas');
                const ctx = canvas.getContext('2d');

                pdfjsLib.getDocument(fileUrl).promise.then(pdf => {
                    pdf.getPage(1).then(page => {
                        const viewport = page.getViewport({
                            scale: 1
                        });
                        canvas.width = viewport.width;
                        canvas.height = viewport.height;
                        canvas.style.display = 'block';
                        page.render({
                            canvasContext: ctx,
                            viewport
                        });
                    });
                });
            }

            function previewCV(event) {
                const [file] = event.target.files;
                if (file?.type === 'application/pdf') {
                    const url = URL.createObjectURL(file);
                    renderPDFThumbnail(url);
                }
            }
        </script>
    @endsection
</x-app-layout>
