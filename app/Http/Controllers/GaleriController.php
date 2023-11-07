<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Galeri';
        $galeri = DB::table('galeri')
        ->orderByDesc('id_galeri')
        ->get();
        return view('galeri.index', compact('title', 'galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Galeri';
        return view('galeri.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_galeri' => 'required',
            'foto_galeri' => 'required',
            'jenis_galeri' => 'required',
            
        ]);
        $foto_galeri = $request->file('foto_galeri');
        $namafotogaleri = 'galeri'.date('Ymdhis').'.'.$request->file('foto_galeri')->getClientOriginalExtension();
        $foto_galeri->move('file/galeri/',$namafotogaleri);
        
        $galeri = new galeri();
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->foto_galeri = $namafotogaleri;
        $galeri->jenis_galeri = $request->jenis_galeri;
        $galeri->save();

        return redirect()->route('galeri.index')->with('Sukses', 'Berhasil Tambah galeri');
    }

    /**
     * Display the specified resource.
     */
    public function show(galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(galeri $galeri)
    {
        $title = 'Edit galeri';
        return view('galeri.edit', compact('galeri', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $galeri = galeri::findorfail($id);
        $namafotogaleri = $galeri->foto_galeri;
        $update = [
            'nama_galeri' => $request->nama_galeri,
            'foto_galeri' => $namafotogaleri,
            'jenis_galeri' => $request->jenis_galeri,
        ];
        if ($request->foto_galeri != ""){
            $request->foto_galeri->move(public_path('file/galeri/'), $namafotogaleri);
        }   
        $galeri->update($update);
        return redirect()->route('galeri.index')->with('Sukses', 'Berhasil Update galeri');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $galeri = Galeri::findorfail($id);
        $namafotogaleri = $galeri->foto_galeri;
        $fotogaleri =public_path ('file/galeri/').$namafotogaleri;
        if(file_exists($fotogaleri)){
            @unlink($fotogaleri);
        }
        $galeri->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus galeri');
    }
}
