<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::withCount(['activities', 'collaborators'])->paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:programs,slug',
            'short_summary' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'status' => 'in:active,paused,archived',
            'public' => 'boolean',
        ]);

        Program::create($validated);
        return redirect()->route('programs.index')->with('success', 'Program created successfully.');
    }

    public function show(Program $program)
    {
        $program->load(['activities', 'collaborators']);
        return view('admin.programs.show', compact('program'));
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_summary' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'status' => 'in:active,paused,archived',
            'public' => 'boolean',
        ]);

        $program->update($validated);
        return redirect()->route('programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('programs.index')->with('success', 'Program archived successfully.');
    }
}
