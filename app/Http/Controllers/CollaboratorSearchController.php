<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaborator;

class CollaboratorSearchController extends Controller
{
    public function index(Request $request)
    {
        $query = Collaborator::query();

        if ($search = $request->input('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($type = $request->input('type')) {
            $query->where('type', $type);
        }

        if (!is_null($request->input('verified'))) {
            $query->where('verified', $request->input('verified') === '1');
        }

        $collaborators = $query->orderBy('name')->paginate(8)->withQueryString();

        $types = Collaborator::select('type')->distinct()->pluck('type');
        $isAdmin = auth()->check() && auth()->user()->role === 'admin';

        return view('collaborator_search', compact('collaborators', 'types'));
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

    $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);

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

    $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);

    if ($request->hasFile('logo_path')) {
        $validated['logo_path'] = $request->file('logo_path')->store('collaborators', 'public');
    }

    $collaborator->update($validated);

    return redirect()->route('collaborator.search')->with('success', 'Collaborator updated successfully!');
}

public function create()
{
    $collaborator = new Collaborator();
    return view('collaborator_create', compact('collaborator'));
}

public function edit(Collaborator $collaborator)
{
    return view('collaborator_edit', compact('collaborator'));
}

public function destroy(Collaborator $collaborator)
{
    $collaborator->delete();
    return redirect()->route('collaborator.search')->with('success', 'Collaborator deleted successfully!');
}


}
