<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
        'cv' => 'nullable|file|mimes:pdf|max:10240',
        'bio' => 'nullable|string',
        'photo' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:10240',
        'numero' => 'nullable|string',
        'email' => 'nullable|email',
        'localisation' => 'nullable|string',
        ]);

        $about = About::first();

        if (!$about) {
            $about = new About();
        }

        $about->update($request->only([
        'bio',
        'numero',
        'email',
        'localisation',
        ]));

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv', 'public');
            $about->cv = $cvPath;
        }

        if ($request->hasFile('photo')) {
            if ($about->photo) {
                $oldPhotoPath = public_path('storage/' . $about->photo);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            $photoPath = $request->file('photo')->store('photos', 'public');
            $about->photo = $photoPath;
        }

        $about->save();

        return redirect()->route('admin.about')->with('success', 'Informations mises à jour.');
    }
}
