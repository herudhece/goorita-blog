<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::latest()->paginate(10);
        return view('admin.berita.index',[
            'model' => $berita,
            'title' => 'Berita'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.create',[
            'title' => 'Tambah Berita'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $berita = [
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time().'.'.$file->extension();
            $destinationPath = public_path('berita-images');
            $file->move($destinationPath, $name);
            $berita['image'] = $name;
        }
        $berita['slug'] = Str::slug($request->title,'-');
        $berita['user_id'] = auth()->user()->id;
        $berita['short_description'] = Str::limit($request->description, 100);
        $berita['published_date'] = now();
        Berita::create($berita);
        return redirect('/admin/berita')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::find($id);
        return view('admin.berita.view',[
            'model' => $berita,
            'title' => 'Detail Berita'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('admin.berita.update',[
            'model' => $berita,
            'title' => 'Edit Berita'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $berita = Berita::find($id);
        $berita->title = $request->title;
        $berita->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time().'.'.$file->extension();
            $destinationPath = public_path('berita-images');
            $file->move($destinationPath, $name);
            $berita->image = $name;
        }
        $berita->user_id = auth()->user()->id;
        $berita->slug = Str::slug($request->title,'-');
        $berita->short_description = Str::limit($request->description, 100);
        $berita->published_date = now();
        $berita->save();
        return redirect('/admin/berita')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Berita::destroy($id);
        return redirect('/admin/berita')->with('success','Data berhasil dihapus');
    }
}
