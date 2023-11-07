<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Berita';
        $berita = DB::table('berita')
        ->join('galeri', 'berita.id_galeri', 'galeri.id_galeri')
        ->get();
        return view('berita.index', compact('title', 'berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $galeri = Galeri::all();
        $berita = Berita::all();
        $title = 'Tambah Berita';
        return view('berita.create', compact('title','berita', 'galeri'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute wajib diisi!!!',
        ];

        $request->validate([
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'id_galeri' => 'required',
            'gambar_berita' => 'required: jpg, jpeg, png, tfif, jfif, raw, gif, ai, psd',
        ], $message);
        $gambar_berita = $request->file('gambar_berita');
        $namagambarberita = 'Berita'.date('Ymdhis').'.'.$request->file('gambar_berita')->getClientOriginalExtension();
        $gambar_berita->move('file/berita/',$namagambarberita);

        $berita = new Berita();
        $berita->judul_berita = $request->judul_berita;
        $berita->isi_berita = $request->isi_berita;
        $berita->id_galeri = $request->id_galeri;
        $berita->gambar_berita = $namagambarberita;
        $berita->slug_berita = Str::slug($request->judul_berita); 
        $berita->tanggal_berita = Carbon::now();
        $berita->save();
        return redirect()->route('berita.index')->with('Sukses', 'Berhasil Tambah Berita');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $berita = Berita::findorfail($id);
        $galeri = Galeri::all();
        $title = 'Edit Berita';
        return view('berita.edit', compact('berita', 'galeri', 'title' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findorfail($id);
        $namagambarberita = $berita->gambar_berita;
        $update = [
            'judul_berita' => $request->judul_berita, 
            'isi_berita' => $request->isi_berita, 
            'id_galeri' => $request->id_galeri, 
            'gambar_berita' => $namagambarberita,
            'tanggal_berita' => $berita->tanggal_berita,
            'slug_berita' => $berita->slug_berita,  
        ];
        if ($request->gambar_berita != ""){
            $request->gambar_berita->move(public_path('file/berita/'), $namagambarberita);
        }   
        $berita->update($update);
        return redirect()->route('berita.index')->with('Sukses', 'Berhasil Edit Berita');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        $namafileberita = $berita->gambar_berita;
        $file_berita = public_path('file/berita/').$namafileberita;
        if(file_exists($file_berita)){
            @unlink($file_berita);
        }
        $berita->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Berita');
    }
}
