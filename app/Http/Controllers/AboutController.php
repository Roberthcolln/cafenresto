<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = DB::table('about')
        ->get();
        $title = 'Data about';
        return view('about.index', compact('title', 'about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah About';
        return view('about.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required:jpg, jpeg, png, gif, raw, tiff',
            'youtube' => 'required',
        ]);
        $file = $request->file('gambar');
        $namafile = 'about'.rand().'.'.$request->file('gambar')->getClientOriginalExtension();
        $file->move('file/about/',$namafile);

        $about = new About();
        $about->judul = $request->judul;
        $about->deskripsi = $request->deskripsi;
        $about->gambar = $namafile;
        $about->youtube = $request->youtube;
        $about->save();
        return redirect()->route('about.index')->with('Sukses', 'Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $about = About::findorfail($id);
        $title = 'Edit about';
        return view('about.edit', compact('title', 'about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $about = About::findorfail($id);
        $namafile = $about->gambar;
        $update = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile,
            'youtube' => $request->youtube,
        ];
        if($request->gambar !=""){
            $request->gambar->move(public_path('file/about'), $namafile); 
        }
        $about->update($update);
        return redirect()->route('about.index')->with('Sukses', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $hapus = About::findorfail($id);
        $namafile = $hapus->gambar;
        $file = public_path('file/about/').$namafile;
        // cek file:
        if(file_exists($file)){
            @unlink($file);
        }
        // delete data dri database
        $hapus->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Data');
    }
}
