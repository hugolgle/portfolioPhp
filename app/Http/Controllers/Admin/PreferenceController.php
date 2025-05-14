<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Preference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function show()
    {
        $preference = Preference::firstOrNew([]); // pour trouver le premier modèle qui correspond à certaines contraintes
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

        $preference = Preference::firstOrCreate(
            ['id' => 1],
            [
                'site_title' => 'Default Site Title',
                'site_description' => 'Description du site par défaut',
                'seo_keywords' => 'site, portfolio, Laravel',
            ]
        );

        if ($request->hasFile('favicon')) {
            $path = $request->file('favicon')->store('favicons', 'public');
            $preference->favicon = basename($path);
        }

        $preference->update([
            'site_title' => $data['site_title'],
            'site_description' => $data['site_description'],
            'seo_keywords' => $data['seo_keywords'],
        ]);

        return back()->with('success', 'Préférences mises à jour');
    }
}
