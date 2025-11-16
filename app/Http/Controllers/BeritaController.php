<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter', 'semua');

        $query = Berita::query();

        if (!Auth::check() || Auth::user()->role !== 'admin') {
            $query->where('show', true);
        } else {
            if ($filter === 'tampil') {
                $query->where('show', true);
            } elseif ($filter === 'tersembunyi') {
                $query->where('show', false);
            }
        }

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        $beritas = $query->orderBy('published_at', 'desc')->paginate(9);

        return view('Layout.berita.berita', compact('beritas', 'search', 'filter'));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        if ((!Auth::check() || Auth::user()->role !== 'admin') && !$berita->show) {
            abort(404, 'Berita tidak ditemukan');
        }

        return view('Layout.berita.beritadetail', compact('berita'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        return view('Layout.berita.tambahBerita');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'published_at' => 'nullable|date', // Ubah dari 'required' menjadi 'nullable'
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan_gambar' => 'nullable|string|max:255',
        ]);

        $validated['show'] = false;

        if (empty($validated['published_at'])) {
            $validated['published_at'] = Carbon::now();
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/berita'), $imageName);
            $validated['image'] = $imageName;
        }

        Berita::create($validated);

        return redirect('/berita')->with('success', 'Berita berhasil ditambahkan dan menunggu ACC admin!');
    }

    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        $berita = Berita::findOrFail($id);
        return view('Layout.berita.editBerita', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'published_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan_gambar' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($berita->image && file_exists(public_path('images/berita/' . $berita->image))) {
                unlink(public_path('images/berita/' . $berita->image));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/berita'), $imageName);
            $validated['image'] = $imageName;
        }

        $berita->update($validated);

        return redirect('/berita')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        $berita = Berita::findOrFail($id);

        if ($berita->image && file_exists(public_path('images/berita/' . $berita->image))) {
            unlink(public_path('images/berita/' . $berita->image));
        }

        $berita->delete();

        return redirect('/berita')->with('success', 'Berita berhasil dihapus!');
    }

    public function toggleShow($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        $berita = Berita::findOrFail($id);
        $berita->show = !$berita->show;
        $berita->save();

        $status = $berita->show ? 'ditampilkan' : 'disembunyikan';
        return redirect()->back()->with('success', "Berita berhasil {$status}!");
    }
}