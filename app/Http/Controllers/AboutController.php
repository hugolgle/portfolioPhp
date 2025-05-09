<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
  public function update(Request $request)
  {
    $request->validate([
      'cv' => 'nullable|file|mimes:pdf|max:10240', // 10MB max pour le CV
      'bio' => 'nullable|string',
      'photo' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:10240', // 10MB max pour la photo
      'numero' => 'nullable|string',
      'email' => 'nullable|email',
      'localisation' => 'nullable|string',
    ]);

    $about = About::firstOrFail();

    // Mettre à jour les autres champs
    $about->update($request->only([
      'bio',
      'numero',
      'email',
      'localisation',
    ]));

    // Gérer le téléchargement du CV
    if ($request->hasFile('cv')) {
      $cvPath = $request->file('cv')->store('cv', 'public');
      $about->cv = $cvPath;
    }

    // Gérer le téléchargement de la photo
    if ($request->hasFile('photo')) {
      // Supprimer l'ancienne photo si elle existe
      if ($about->photo) {
        $oldPhotoPath = public_path('storage/' . $about->photo);
        if (file_exists($oldPhotoPath)) {
          unlink($oldPhotoPath); // Supprimer le fichier photo existant
        }
      }

      // Stocker la nouvelle photo
      $photoPath = $request->file('photo')->store('photos', 'public');
      $about->photo = $photoPath;
    }

    $about->save();

    return redirect()->route('admin.about')->with('success', 'Informations mises à jour.');
  }


}
