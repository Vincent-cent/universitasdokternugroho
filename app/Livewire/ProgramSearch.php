<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Program;
use Illuminate\Support\Facades\Gate;

class ProgramSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';
    public $status = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()    { $this->resetPage(); }
    public function updatingCategory()  { $this->resetPage(); }
    public function updatingStatus()    { $this->resetPage(); }

    public function clearFilters()
    {
        $this->search = '';
        $this->category = '';
        $this->status = '';
        $this->resetPage();
    }

    public function deleteProgram($programId)
    {
        // Admin Check
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            session()->flash('error', 'You do not have permission to delete programs.');
            return;
        }

        $program = Program::find($programId);
        if ($program) {
            $title = $program->title;
            $program->delete();
            session()->flash('success', "Program '{$title}' has been deleted successfully.");
        } else {
            session()->flash('error', 'Program not found.');
        }
    }

    public function editProgram($programId)
    {
        // Admin Check
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            session()->flash('error', 'You do not have permission to edit programs.');
            return;
        }

        $program = Program::find($programId);
        if ($program) {
            return redirect()->route('programs.edit', $program);
        } else {
            session()->flash('error', 'Program not found.');
        }
    }

    public function render()
    {
        $query = Program::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('short_summary', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->category) $query->where('category', $this->category);
        if ($this->status)   $query->where('status', $this->status);

        $programs = $query->orderBy('created_at', 'desc')->paginate(6);

        $categories = Program::whereNotNull('category')->distinct()->pluck('category');
        $statuses   = Program::whereNotNull('status')->distinct()->pluck('status');

        return view('livewire.program-search', compact('programs', 'categories', 'statuses'));
    }
}