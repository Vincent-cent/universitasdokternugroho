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
                'beritas' => Berita::where('title', 'like', '%' . $search . '%')
                    ->orderBy('published_at', 'desc')
                    ->paginate(15)
                    ->appends(['search' => $search]),
                'search' => $search
            ]);
        } else {
            return view('Layout.berita.berita', [
                'beritas' => Berita::orderBy('published_at', 'desc')->paginate(15),
                'search' => null
            ]);
        }
    }

    public function show($id)
    {
        $berita = Berita::find($id);
        return view('Layout.berita.beritadetail', compact('berita'));
    }
}
