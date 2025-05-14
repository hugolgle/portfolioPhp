<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'ressource' => 'nullable|url',
        'demo' => 'nullable|url',
        'tags' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        Project::create([
        'title' => $validated['title'],
        'description' => $validated['description'] ?? null,
        'ressource' => $validated['ressource'] ?? null,
        'demo' => $validated['demo'] ?? null,
        'tags' => $validated['tags'] ?? null,
        'image' => $imagePath,
        ]);

        return redirect()->route('admin.project')->with('success', 'Projet ajouté avec succès!');
    }

    public function edit(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'ressource' => 'nullable|url',
        'demo' => 'nullable|url',
        'tags' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.project')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.project')->with('success', 'Projet supprimé avec succès.');
    }
}
