<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data menu';
        $menu = DB::table('menu')->orderByDesc('id_menu')->get();
        return view('menu.index', compact('menu', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah menu';
        return view('menu.create', compact('title'));
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
            'nama_menu' => 'required',
            'keterangan_menu' => 'required',
            'gambar_menu' => 'required',
            'harga_menu' => 'required',
            'stok' => 'required',
            'kategori_menu' => 'required',
            'harga_pokok' => 'required',
            'tanggal_masuk' => 'required'
        ],$messages);
        $gambar_menu = $request->file('gambar_menu');
        $namagambarmenu = 'menu'.date('Ymdhis').'.'.$request->file('gambar_menu')->getClientOriginalExtension();
        $gambar_menu->move('file/menu/',$namagambarmenu);

        $data = new Menu();
        $data->nama_menu = $request->nama_menu;
        $data->keterangan_menu = $request->keterangan_menu;
        $data->gambar_menu = $namagambarmenu;
        $data->harga_menu = $request->harga_menu;
        $data->harga_pokok = $request->harga_pokok;
        $data->stok = $request->stok;
        $data->kategori_menu = $request->kategori_menu;
        $data->tanggal_masuk = $request->tanggal_masuk;
        $data->save();
        return redirect()->route('menu.index')->with('Sukses', 'Berhasil Tambah menu');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        
        $title = 'Edit menu';
        return view('menu.edit', compact('title', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::findorfail($id);
        $namagambarmenu = $menu->gambar_menu;
        $update = [
            'nama_menu' => $request->nama_menu,
            'keterangan_menu' => $request->keterangan_menu,
            'gambar_menu' => $namagambarmenu,
            'harga_menu' => $request->harga_menu,
            'harga_pokok' => $request->harga_pokok,
            'stok' => $request->stok,
            'kategori_menu' => $request->kategori_menu,
            'tanggal_masuk' => $request->tanggal_masuk,
        ];
        if ($request->gambar_menu != ""){
            $request->gambar_menu->move(public_path('file/menu/'), $namagambarmenu);
        }   
        $menu->update($update);
        return redirect()->route('menu.index')->with('Sukses', 'Berhasil Edit Menu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::findorfail($id);
        $namagambarmenu = $menu->gambar_menu;
        $gambar_menu = public_path('file/menu/').$namagambarmenu;
        if(file_exists($gambar_menu)){
            @unlink($gambar_menu);
        }
        $menu->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus menu');
    }
}
