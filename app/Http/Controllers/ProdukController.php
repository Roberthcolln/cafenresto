<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Produk';
        $produk = DB::table('produks')->orderByDesc('id_produk')->get();
        return view('produk.index', compact('title', 'produk')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Produk';
        return view('produk.create', compact('title'));
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
            'nama_produk' => 'required',
            'jumlah_produk' => 'required',
            'harga_pokok' => 'required',
            'harga_jual' => 'required',
            'tanggal_masuk' => 'required',
        ]);

        $data = new Produk();
        $data->nama_produk = $request->nama_produk;
        $data->jumlah_produk = $request->jumlah_produk;
        $data->harga_pokok = $request->harga_pokok;
        $data->harga_jual = $request->harga_jual;
        $data->tanggal_masuk = $request->tanggal_masuk;
        $data->save();
        return redirect()->route('produk.index')->with('Sukses', 'Berhasil Tambah Produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $title = 'Edit Data Produk';
        return view('produk.edit', compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $produk = Produk::findorfail($id);
        $update = [
            'nama_produk' => $request->nama_produk,
            'jumlah_produk' => $request->jumlah_produk,
            'harga_produk' => $request->harga_produk,
            'harga_jual' => $request->harga_jual,
            'tanggal_masuk' => $request->tanggal_masuk,
        ];  
        $produk->update($update);
        return redirect()->route('produk.index')->with('Sukses', 'Berhasil Edit Produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk = Produk::findorfail($id);
        $produk->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Produk');
    }
}
