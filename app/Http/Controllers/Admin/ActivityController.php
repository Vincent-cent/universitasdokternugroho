<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Program;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::with('program')->paginate(10);
        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        $programs = Program::pluck('title', 'id');
        return view('admin.activities.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:activities,slug',
            'summary' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'status' => 'in:planned,ongoing,completed,archived',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'public' => 'boolean',
        ]);

        Activity::create($validated);
        return redirect()->route('activities.index')->with('success', 'Activity created successfully.');
    }

    public function show(Activity $activity)
    {
        $activity->load(['program', 'collaborators']);
        return view('admin.activities.show', compact('activity'));
    }

    public function edit(Activity $activity)
    {
        $programs = Program::pluck('title', 'id');
        return view('admin.activities.edit', compact('activity', 'programs'));
    }

    public function update(Request $request, Activity $activity)
    {
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'status' => 'in:planned,ongoing,completed,archived',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'public' => 'boolean',
        ]);

        $activity->update($validated);
        return redirect()->route('activities.index')->with('success', 'Activity updated successfully.');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activities.index')->with('success', 'Activity archived successfully.');
    }
}
