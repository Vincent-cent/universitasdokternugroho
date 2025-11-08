<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramSearchController extends Controller
{
    public function index(Request $request)
    {
        $query = Program::query();

        if ($search = $request->input('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_summary', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($category = $request->input('category')) {
            $query->where('category', $category);
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $programs = $query->orderBy('created_at', 'desc')->paginate(6)->withQueryString();

        $categories = Program::select('category')->distinct()->whereNotNull('category')->pluck('category');
        $statuses = Program::select('status')->distinct()->whereNotNull('status')->pluck('status');
        
        return view('Layout.program.program_search', compact('programs', 'categories', 'statuses'));
    }
}
