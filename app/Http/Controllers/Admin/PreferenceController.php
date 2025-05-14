<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Preference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function show()
    {
        // Renvoie toujours un objet Preference, même si la table est vide
        $preference = Preference::firstOrNew([]);
        return view('admin.preferences', compact('preference'));
    }


    public function update(Request $request)
    {
        $data = $request->validate([
            'site_title' => 'required|string|max:255',
            'site_description' => 'nullable|string',
            'favicon' => 'nullable|image|mimes:png,jpg,jpeg,gif,ico|max:2048',
            'seo_keywords' => 'nullable|string',
        ]);

        // On récupère ou crée l'enregistrement ID=1
        $preference = Preference::firstOrCreate(
            ['id' => 1], // condition unique
            [
                'site_title' => 'Default Site Title',
                'site_description' => 'Description du site par défaut',
                'seo_keywords' => 'site, portfolio, Laravel',
            ]
        );

        // Si on upload un favicon, on le stocke
        if ($request->hasFile('favicon')) {
            $path = $request->file('favicon')->store('favicons', 'public');
            $preference->favicon = basename($path);
        }

        // Puis on met à jour les champs
        $preference->update([
            'site_title' => $data['site_title'],
            'site_description' => $data['site_description'],
            'seo_keywords' => $data['seo_keywords'],
        ]);

        return back()->with('success', 'Préférences mises à jour');
    }



}

