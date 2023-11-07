<?php

namespace App\Http\Controllers;


use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = DB::table('kegiatans')
            ->get();
        $title = 'Data Event';
        return view('kegiatan.index', compact('title', 'kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatan = Kegiatan::all();
        $title = 'Tambah Event';
        return view('kegiatan.create', compact('kegiatan', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'gambar_kegiatan' => 'required:jpg, jpeg, png, gif, raw, tiff',
            'tanggal_kegiatan' => 'required',
            'jam_kegiatan' => 'required',
           
        ]);
        $file = $request->file('gambar_kegiatan');
        $namafile = 'Kegiatan' . date('Ymdhis') . '.' . $request->file('gambar_kegiatan')->getClientOriginalExtension();
        $file->move('file/kegiatan/', $namafile);

        $kegiatan = new Kegiatan();
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->deskripsi_kegiatan = $request->deskripsi_kegiatan;
        $kegiatan->gambar_kegiatan = $namafile;
        $kegiatan->tanggal_kegiatan = $request->tanggal_kegiatan;
        $kegiatan->jam_kegiatan = $request->jam_kegiatan;
        $kegiatan->biaya_kegiatan = $request->biaya_kegiatan;
        $kegiatan->slug_kegiatan = Str::slug($request->nama_kegiatan);
        $kegiatan->save();
        return redirect()->route('kegiatan.index')->with('Sukses', 'Berhasil Tambah Event');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kegiatan = DB::table('kegiatans')
            ->where('kegiatans.id_kegiatan', $id)
            ->first();
        $title = 'Detail Data Event';
        return view('kegiatan.show', compact('title', 'kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
       
        $title = 'Edit Event';
        return view('kegiatan.edit', compact('title', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $namafile = $kegiatan->gambar_kegiatan;
        $update = [

            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'gambar_kegiatan' => $namafile,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'jam_kegiatan' => $request->jam_kegiatan,
            'biaya_kegiatan' => $request->biaya_kegiatan,
            'slug_kegiatan' => Str::slug($request->nama_kegiatan),
        ];
        if ($request->gambar_kegiatan != "") {
            $request->gambar_kegiatan->move('file/kegiatan', $namafile);
        }
        $kegiatan->update($update);
        return redirect()->route('kegiatan.index')->with('Sukses', 'Berhasil Edit Event');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hapus = Kegiatan::findorfail($id);
        $namafile = $hapus->gambar_kegiatan;
        $file = ('file/kegiatan/') . $namafile;
        // cek file:
        if (file_exists($file)) {
            @unlink($file);
        }
        // delete data dri database
        $hapus->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Data Event');
    }
}
