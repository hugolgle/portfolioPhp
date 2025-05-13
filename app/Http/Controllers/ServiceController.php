<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Option;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function create()
    {
        $options = Option::all();
        return view('admin.services.create', compact('options'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'options' => 'required|array',
            'options.*.title' => 'required|string',
            'options.*.price' => 'required|numeric',
        ]);


        $service = Service::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'],
        ]);

        foreach ($validated['options'] as $optionData) {
            $option = Option::create([
                'title' => $optionData['title'],
                'price' => $optionData['price'],
            ]);

            $service->options()->attach($option);
        }

        return redirect()->route('admin.services');
    }


    public function updateVisibility(Service $service)
    {
        $service->isVisible = !$service->isVisible;
        $service->save();

        return redirect()->back()->with('success', 'Visibilité modifiée.');
    }

    public function edit(Service $service)
    {
        $service->load('options');
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'options' => 'array',
            'options.*.title' => 'required|string',
            'options.*.price' => 'required|numeric',
        ]);

        $service->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'],
        ]);

        $service->options()->delete();

        foreach ($request->input('options', []) as $opt) {
            if (!isset($opt['_delete'])) {
                $service->options()->create([
                    'title' => $opt['title'],
                    'price' => $opt['price'],
                ]);
            }
        }


        return redirect()->route('admin.services')->with('success', 'Service modifié.');
    }

    public function destroy(Service $service)
    {
        $service->options()->delete();
        $service->delete();

        return redirect()->route('admin.services')->with('success', 'Service supprimé.');
    }
}
