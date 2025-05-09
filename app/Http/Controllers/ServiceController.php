<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Option;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    // Affiche le formulaire de création
    public function create()
    {
        $options = Option::all();  // Charger toutes les options
        return view('admin.services.create', compact('options'));
    }


    // Enregistre un nouveau service
    // App\Http\Controllers\ServiceController.php

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric', // Ajouter la validation pour le prix du service
            'options' => 'required|array',
            'options.*.title' => 'required|string',
            'options.*.price' => 'required|numeric',
        ]);


        // Création du service
        $service = Service::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'],  // Ajout du prix
        ]);

        // Création des options et association au service
        foreach ($validated['options'] as $optionData) {
            $option = Option::create([
                'title' => $optionData['title'], // Utilisation de 'title'
                'price' => $optionData['price'],
            ]);

            $service->options()->attach($option);
        }

        return redirect()->route('admin.services');
    }







    public function edit(Service $service)
    {
        $service->load('options');
        return view('admin.services.edit', compact('service'));
    }

    // Met à jour le service
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'options' => 'array',
            'options.*.name' => 'required|string',
            'options.*.price' => 'required|numeric',
        ]);

        $service->update($validated);

        // Supprimer et recréer les options (simple pour commencer)
        $service->options()->delete();
        foreach ($validated['options'] as $opt) {
            $service->options()->create($opt);
        }

        return redirect()->route('admin.services')->with('success', 'Service modifié.');
    }

    // Supprime un service
    public function destroy(Service $service)
    {
        $service->options()->delete();
        $service->delete();

        return redirect()->route('admin.services')->with('success', 'Service supprimé.');
    }
}
