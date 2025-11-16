<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        'type' => 'required|in:organization,university,foundation,individual',
        'description' => 'nullable|string',
        'website' => 'nullable|url',
        'logo_path' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'verified' => 'boolean',
    ]);

    $validated['slug'] = Str::slug($validated['name']);

    if ($request->hasFile('logo_path')) {
        $validated['logo_path'] = $request->file('logo_path')->store('collaborators', 'public');
    }

    Collaborator::create($validated);

    return redirect()->route('collaborator.search')->with('success', 'Collaborator added successfully!');
}

public function update(Request $request, Collaborator $collaborator)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:collaborators,name,' . $collaborator->id,
        'type' => 'required|in:organization,university,foundation,individual',
        'description' => 'nullable|string',
        'website' => 'nullable|url',
        'logo_path' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'verified' => 'boolean',
    ]);

    $validated['slug'] = Str::slug($validated['name']);

    if ($request->hasFile('logo_path')) {
        $validated['logo_path'] = $request->file('logo_path')->store('collaborators', 'public');
    }

    $collaborator->update($validated);

    return redirect()->route('collaborator.search')->with('success', 'Collaborator updated successfully!');
}


    public function edit(Collaborator $collaborator)
    {
        return view('admin.collaborators.edit', compact('collaborator'));
    }


    public function destroy(Collaborator $collaborator)
    {
        $collaborator->delete();

        return redirect()->route('collaborators.index')
            ->with('success', 'Collaborator deleted successfully!');
    }
}
