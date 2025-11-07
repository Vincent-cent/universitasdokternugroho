<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    public function index()
    {
        $collaborators = Collaborator::paginate(10);
        return view('admin.collaborators.index', compact('collaborators'));
    }

    public function create()
    {
        return view('admin.collaborators.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:collaborators,name',
            'slug' => 'required|string|unique:collaborators,slug',
            'type' => 'required|in:organization,university,foundation,individual,government',
            'description' => 'nullable|string',
            'website' => 'nullable|url',
            'verified' => 'boolean',
        ]);

        Collaborator::create($validated);
        return redirect()->route('collaborators.index')->with('success', 'Collaborator created successfully.');
    }

    public function show(Collaborator $collaborator)
    {
        $collaborator->load(['programs', 'activities']);
        return view('admin.collaborators.show', compact('collaborator'));
    }

    public function edit(Collaborator $collaborator)
    {
        return view('admin.collaborators.edit', compact('collaborator'));
    }

    public function update(Request $request, Collaborator $collaborator)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:collaborators,name,' . $collaborator->id,
            'type' => 'required|in:organization,university,foundation,individual,government',
            'description' => 'nullable|string',
            'website' => 'nullable|url',
            'verified' => 'boolean',
        ]);

        $collaborator->update($validated);
        return redirect()->route('collaborators.index')->with('success', 'Collaborator updated successfully.');
    }

    public function destroy(Collaborator $collaborator)
    {
        $collaborator->delete();
        return redirect()->route('collaborators.index')->with('success', 'Collaborator archived successfully.');
    }
}
