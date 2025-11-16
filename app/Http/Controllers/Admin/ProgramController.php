<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::withCount(['activities', 'collaborators'])->paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('Layout.program.program_create');
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
            'logo_path' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'hero_image_path' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'public' => 'nullable|boolean',
        ]);

        // Handle checkbox - if not checked, it won't be in the request
        $validated['public'] = $request->has('public');
        $validated['status'] = $validated['status'] ?? 'active';

        // Handle image uploads
        if ($request->hasFile('logo_path')) {
            $validated['logo_path'] = $request->file('logo_path')->store('programs', 'public');
        }
        
        if ($request->hasFile('hero_image_path')) {
            $validated['hero_image_path'] = $request->file('hero_image_path')->store('programs', 'public');
        }

        Program::create($validated);
        return redirect()->route('program.search')->with('success', 'Program created successfully.');
    }

    public function show(Program $program)
    {
        $program->load(['activities', 'collaborators']);
        return view('admin.programs.show', compact('program'));
    }

    public function edit(Program $program)
    {
        return view('Layout.program.program_edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_summary' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'status' => 'in:active,paused,archived',
            'logo_path' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'hero_image_path' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'public' => 'nullable|boolean',
        ]);

        // Handle checkbox - if not checked, it won't be in the request
        $validated['public'] = $request->has('public');

        // Handle image uploads
        if ($request->hasFile('logo_path')) {
            // Delete old logo if exists
            if ($program->logo_path) {
                \Storage::disk('public')->delete($program->logo_path);
            }
            $validated['logo_path'] = $request->file('logo_path')->store('programs', 'public');
        }
        
        if ($request->hasFile('hero_image_path')) {
            // Delete old hero image if exists
            if ($program->hero_image_path) {
                \Storage::disk('public')->delete($program->hero_image_path);
            }
            $validated['hero_image_path'] = $request->file('hero_image_path')->store('programs', 'public');
        }

        $program->update($validated);
        return redirect()->route('program.search')->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('program.search')->with('success', 'Program deleted successfully.');
    }
}
