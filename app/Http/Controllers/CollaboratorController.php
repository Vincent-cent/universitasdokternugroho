<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaborator;
class CollaboratorController extends Controller
{
    public function show($slug)
    {
        $collaborator = Collaborator::where('slug', $slug)
            ->with(['programs' => function ($query) {
                $query->where('public', true)
                      ->orderBy('created_at', 'desc');
            }])
            ->firstOrFail();

        return view('collaborator_detail', compact('collaborator'));
    }}
