<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;

class BeritaController extends Controller
{
    public function index()
    {
        return view('Layout.berita.berita', [
            'beritas' => Berita::allBeritas()
        ]);
    }
    public function show($id)
    {
        $berita = Berita::findBerita($id);
        
        if (!$berita) {
            abort(404);
        }
        
        return view('Layout.berita.beritadetail', [
            'berita' => $berita
        ]);
    }
    
}
