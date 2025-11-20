<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Journal;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $alumniFeatured = Alumni::inRandomOrder()->limit(6)->get();

        $query = Alumni::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('angkatan', 'like', '%' . $search . '%');
            });
        }

        $alumnis = $query->orderBy('year_range', 'desc')->paginate(9);

        return view('Layout.alumni.alumni', compact('alumnis', 'alumniFeatured', 'search'));
    }

    public function show($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('Layout.alumni.alumnidetail', compact('alumni'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'angkatan' => 'required|string|max:255',
            'year_range' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'work_main' => 'nullable|string|max:255',
            'work_main_address' => 'nullable|string',
            'work_secondary' => 'nullable|string|max:255',
            'work_secondary_desc' => 'nullable|string',
            'about' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('images/alumni'), $photoName);
            $validated['photo'] = $photoName;
        }

        Alumni::create($validated);

        return redirect('/alumni')->with('success', 'Alumni berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('Layout.alumni.editalumni', compact('alumni'));
    }

    public function update(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'angkatan' => 'required|string|max:255',
            'year_range' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'work_main' => 'nullable|string|max:255',
            'work_main_address' => 'nullable|string',
            'work_secondary' => 'nullable|string|max:255',
            'work_secondary_desc' => 'nullable|string',
            'about' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            if ($alumni->photo && file_exists(public_path('images/alumni/' . $alumni->photo))) {
                unlink(public_path('images/alumni/' . $alumni->photo));
            }

            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('images/alumni'), $photoName);
            $validated['photo'] = $photoName;
        }

        $alumni->update($validated);

        return redirect('/alumni/' . $id)->with('success', 'Alumni berhasil diupdate!');
    }

    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);

        if ($alumni->photo && file_exists(public_path('images/alumni/' . $alumni->photo))) {
            unlink(public_path('images/alumni/' . $alumni->photo));
        }

        foreach ($alumni->journals as $journal) {
            if ($journal->image && file_exists(public_path('images/journals/' . $journal->image))) {
                unlink(public_path('images/journals/' . $journal->image));
            }
        }

        foreach ($alumni->prestasis as $prestasi) {
            if ($prestasi->image && file_exists(public_path('images/prestasi/' . $prestasi->image))) {
                unlink(public_path('images/prestasi/' . $prestasi->image));
            }
        }

        $alumni->delete();

        return redirect('/alumni')->with('success', 'Alumni berhasil dihapus!');
    }

    public function showJournal($id)
    {
        $journal = Journal::with('alumni')->findOrFail($id);
        return view('Layout.alumni.detailjournal', compact('journal'));
    }

    public function storeJournal(Request $request, $alumni_id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['alumni_id'] = $alumni_id;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/journals'), $imageName);
            $validated['image'] = $imageName;
        }

        Journal::create($validated);

        return redirect()->back()->with('success', 'Journal berhasil ditambahkan!');
    }

    public function editJournal($id)
    {
        $journal = Journal::with('alumni')->findOrFail($id);
        return view('Layout.alumni.editjournal', compact('journal'));
    }

    public function updateJournal(Request $request, $id)
    {
        $journal = Journal::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($journal->image && file_exists(public_path('images/journals/' . $journal->image))) {
                unlink(public_path('images/journals/' . $journal->image));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/journals'), $imageName);
            $validated['image'] = $imageName;
        }

        $journal->update($validated);

        return redirect('/alumni/' . $journal->alumni_id)->with('success', 'Journal berhasil diupdate!');
    }

    public function deleteJournal($id)
    {
        $journal = Journal::findOrFail($id);
        
        if ($journal->image && file_exists(public_path('images/journals/' . $journal->image))) {
            unlink(public_path('images/journals/' . $journal->image));
        }
        
        $journal->delete();

        return redirect()->back()->with('success', 'Journal berhasil dihapus!');
    }

    public function showPrestasi($id)
    {
        $prestasi = Prestasi::with('alumni')->findOrFail($id);
        return view('Layout.alumni.detailprestasi', compact('prestasi'));
    }

    public function storePrestasi(Request $request, $alumni_id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['alumni_id'] = $alumni_id;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/prestasi'), $imageName);
            $validated['image'] = $imageName;
        }

        Prestasi::create($validated);

        return redirect()->back()->with('success', 'Prestasi berhasil ditambahkan!');
    }

    public function editPrestasi($id)
    {
        $prestasi = Prestasi::with('alumni')->findOrFail($id);
        return view('Layout.alumni.editprestasi', compact('prestasi'));
    }

    public function updatePrestasi(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($prestasi->image && file_exists(public_path('images/prestasi/' . $prestasi->image))) {
                unlink(public_path('images/prestasi/' . $prestasi->image));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/prestasi'), $imageName);
            $validated['image'] = $imageName;
        }

        $prestasi->update($validated);

        return redirect('/alumni/' . $prestasi->alumni_id)->with('success', 'Prestasi berhasil diupdate!');
    }

    public function deletePrestasi($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        
        if ($prestasi->image && file_exists(public_path('images/prestasi/' . $prestasi->image))) {
            unlink(public_path('images/prestasi/' . $prestasi->image));
        }
        
        $prestasi->delete();

        return redirect()->back()->with('success', 'Prestasi berhasil dihapus!');
    }
}