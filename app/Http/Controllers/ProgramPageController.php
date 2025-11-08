<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Collaborator;

class ProgramPageController extends Controller
{
    public function index()
    {
        $featuredPrograms = Program::where('is_featured', true)
            ->latest()
            ->take(3)
            ->get();

        $latestPrograms = Program::where('is_featured', false)
            ->latest()
            ->take(6)
            ->get();

        $collaborators = Collaborator::inRandomOrder()
            ->take(6)
            ->get();

        return view('program', compact('featuredPrograms', 'latestPrograms', 'collaborators'));
    }
    public function show($slug)
{
    $program = \App\Models\Program::with(['activities', 'collaborators'])
        ->where('slug', $slug)
        ->firstOrFail();

    return view('Layout.program.program_detail', compact('program'));
}

}
