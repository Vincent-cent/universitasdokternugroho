<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use Illuminate\Http\Request;


class BeritaController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->search;
            return view('Layout.berita.berita', [
                'pagetitle' => 'Berita',
                'mainmenu' => 'Berita',
                'beritas' => Berita::where('show', true)
                    ->where('title', 'like', '%' . $search . '%')
                    ->orderBy('published_at', 'desc')
                    ->paginate(15)
                    ->appends(['search' => $search]),
                'search' => $search
            ]);
        } else {
            return view('Layout.berita.berita', [
                'beritas' => Berita::where('show', true)
                    ->orderBy('published_at', 'desc')
                    ->paginate(15),
                'search' => null
            ]);
        }
    }

    public function show($id)
    {
        $berita = Berita::where('show', true)->find($id);
        return view('Layout.berita.beritadetail', compact('berita'));
    }

    public function create()
    {
        return view('Layout.berita.tambahberita', [
            'pagetitle' => 'Tambah Berita',
            'mainmenu' => 'Berita'
        ]);
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'author' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'keterangan_gambar' => 'nullable|string|max:255',
    ]);

    $validated['show'] = false;
    $validated['published_at'] = now();

    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/berita'), $imageName);
        $validated['image'] = $imageName;
    }

    Berita::create($validated);

    return redirect('/berita')->with('success', 'Berita berhasil ditambahkan!');
}
public function admin(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->search;
            return view('Layout.berita.adminberita', [
                'beritas' => Berita::where('title', 'like', '%' . $search . '%')
                    ->orderBy('published_at', 'desc')
                    ->paginate(15)
                    ->appends(['search' => $search]),
                'search' => $search
            ]);
        } else {
            return view('Layout.berita.adminberita', [
                'beritas' => Berita::orderBy('published_at', 'desc')->paginate(15),
                'search' => null
            ]);
        }
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('Layout.berita.editberita', compact('berita'));
    }


    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan_gambar' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($berita->image && file_exists(public_path('images/berita/' . $berita->image))) {
                unlink(public_path('images/berita/' . $berita->image));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/berita'), $imageName);
            $validated['image'] = $imageName;
        }

        $berita->update($validated);

        return redirect('/admin/berita')->with('success', 'Berita berhasil diupdate!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus gambar jika ada
        if ($berita->image && file_exists(public_path('images/berita/' . $berita->image))) {
            unlink(public_path('images/berita/' . $berita->image));
        }

        $berita->delete();

        return redirect('/admin/berita')->with('success', 'Berita berhasil dihapus!');
    }

    public function toggleShow($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->show = !$berita->show;
        $berita->save();

        return redirect('/admin/berita')->with('success', 'Status berita berhasil diubah!');
    }
}


