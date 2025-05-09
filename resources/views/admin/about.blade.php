@extends('layouts.admin')

@section('contentAdmin')
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">À propos</h1>
    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data" id="aboutForm">
    @csrf
    @method('PUT')

    @foreach ($about as $item)
    <div class="mb-4">
      <label>CV (PDF)</label>
      <input type="file" name="cv" accept="application/pdf" disabled>
    </div>

    <div class="mb-4">
      <label class="capitalize">Bio</label>
      <textarea name="bio" class="w-full border px-4 py-2" disabled>{{ old('bio', $item->bio) }}</textarea>
    </div>

    <div class="mb-4">
      <label>Photo de profil (image)</label>
      <input type="file" name="photo" accept="image/*" disabled>
    </div>

    <div class="mb-4">
      <label class="capitalize">Numero</label>
      <input type="number" name="numero" class="w-full border px-4 py-2" value="{{ old('numero', $item->numero) }}"
      disabled>
    </div>

    <div class="mb-4">
      <label class="capitalize">E-mail</label>
      <input type="email" name="email" class="w-full border px-4 py-2" value="{{ old('email', $item->email) }}"
      disabled>
    </div>

    <div class="mb-4">
      <label class="capitalize">Localisation</label>
      <input type="text" name="localisation" class="w-full border px-4 py-2"
      value="{{ old('localisation', $item->localisation) }}" disabled>
    </div>
    @endforeach

    <div class="flex gap-4 mt-4">
      <button type="button" id="editBtn" onclick="toggleEdit()" class="bg-yellow-500 text-white px-4 py-2 rounded">
      Modifier
      </button>
      <button type="submit" id="saveBtn" class="bg-green-500 text-white px-4 py-2 rounded hidden">
      OK
      </button>
    </div>
    </form>

    <script>
    let formInitialValues = {};
    let isEditing = false;

    window.onload = () => {
      // Enregistrer les valeurs initiales des champs input et textarea
      document.querySelectorAll('#aboutForm input, #aboutForm textarea').forEach(input => {
      formInitialValues[input.name] = input.value;
      });
    };

    function toggleEdit() {
      const inputs = document.querySelectorAll('#aboutForm input, #aboutForm textarea');
      const saveBtn = document.getElementById('saveBtn');
      const editBtn = document.getElementById('editBtn');

      isEditing = !isEditing;
      inputs.forEach(input => input.disabled = !isEditing);
      editBtn.textContent = isEditing ? 'Annuler' : 'Modifier';

      if (!isEditing) {
      // Réinitialiser les valeurs aux valeurs initiales
      inputs.forEach(input => input.value = formInitialValues[input.name]);
      saveBtn.classList.add('hidden');
      } else {
      saveBtn.classList.remove('hidden');
      }
    }

    // Vérifier les modifications et afficher le bouton "OK" si des changements ont eu lieu
    document.querySelectorAll('#aboutForm input, #aboutForm textarea').forEach(input => {
      input.addEventListener('input', () => {
      const modified = Array.from(document.querySelectorAll('#aboutForm input, #aboutForm textarea')).some(input => {
        return input.value !== formInitialValues[input.name];
      });
      document.getElementById('saveBtn').classList.toggle('hidden', !modified);
      });
    });
    </script>

  @endsection