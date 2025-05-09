<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Preference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function show()
    {
        $preference = Preference::first();

        return view('admin.preferences', compact('preference'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_title' => 'required|string|max:255',
            'site_description' => 'nullable|string',
            'favicon' => 'nullable|image|mimes:png,jpg,jpeg,gif,ico|max:2048',
            'seo_keywords' => 'nullable|string',
        ]);

        $preference = Preference::firstOrCreate([
            // conditions de création si aucune donnée n'existe
        ], [
            'site_title' => 'Default Site Title', // Valeur par défaut pour éviter la contrainte NOT NULL
            'site_description' => 'Description du site par défaut',
            'seo_keywords' => 'site, portfolio, Laravel',
        ]);

        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->store('favicons', 'public');
            $preference->favicon = basename($faviconPath);
        }

        $preference->update([
            'site_title' => $request->site_title,
            'site_description' => $request->site_description,
            'seo_keywords' => $request->seo_keywords,
        ]);

        return redirect()->back()->with('success', 'Préférences mises à jour');
    }
}

