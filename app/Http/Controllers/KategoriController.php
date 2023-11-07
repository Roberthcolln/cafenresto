<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data kategori';
        $kategori = DB::table('kategori')->orderByDesc('id_kategori')->get();
        return view('kategori.index', compact('kategori', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah kategori';
        return view('kategori.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
        ];
        $request->validate([
            'kategori_menu' => 'required',
        ]);

        $data = new Kategori();
        $data->kategori_menu = $request->kategori_menu;
        $data->save();
        return redirect()->route('kategori.index')->with('Sukses', 'Berhasil Tambah kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        $title = 'Edit kategori';
        return view('kategori.edit', compact('kategori', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findorfail($id);
        $update = [
            'kategori_menu' => $request->kategori_menu,
        ];
        $kategori->update($update);
        return redirect()->route('kategori.index')->with('Sukses', 'Berhasil Edit kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findorfail($id);
        $kategori->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus kategori');
    }
}
