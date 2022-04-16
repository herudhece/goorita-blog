<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->paginate(5);
        return view('index',[
            'berita' => $berita,
            'title' => 'Home Berita'
        ]);
    }


    public function detail($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        return view('berita-detail',[
            'berita' => $berita,
            'title' => 'Berita'
        ]);
    }
}
