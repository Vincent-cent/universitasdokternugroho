<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;

class BeritaController extends Controller
{
    public function index()
    {
        return view('layout.berita.berita', [
            'beritas' => Berita::allBeritas()
        ]);
    }
    public function show($id)
    {
    return view('layout.berita.beritadetail', [
        'berita' => Berita::findBerita($id)
    ]);
    }
    
}
