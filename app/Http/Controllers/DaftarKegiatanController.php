<?php

namespace App\Http\Controllers;
use App\Models\DaftarKegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DaftarKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $daftar_kegiatan = DB::table('daftar_kegiatans')
            ->join('kegiatans', 'daftar_kegiatans.id_kegiatan', 'kegiatans.id_kegiatan')
            ->where('daftar_kegiatans.id_kegiatan', '=', $request->keyword)
            ->get();
        $select = DB::table('kegiatans')->get();
        $title = 'Data Pendaftaran Kegiatan';
        return view('daftar_kegiatan.index', compact('title', 'daftar_kegiatan', 'select'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatan = Kegiatan::all();
        
        $title = 'Tambah Daftar Kegiatan';
        return view('daftar_kegiatan.create', compact('kegiatan',  'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'id' => 'required|unique:daftar_kegiatans'
        //    ]);
        $file = $request->file('bukti_pendaftaran');
        $namafile = 'Kegiatan' . date('Ymdhis') . '.' . $request->file('bukti_pendaftaran')->getClientOriginalExtension();
        $file->move('file/daftar_kegiatan/', $namafile);
        
        $data = new DaftarKegiatan();
        $data->nama = $request->nama;
        $data->no_tlp = $request->no_tlp;
        $data->bukti_pendaftaran = $namafile;
        $data->id_kegiatan = $request->id_kegiatan;
        $data->save();
        return redirect()->back()->with('Sukses', 'Pendaftaran Sukses !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarKegiatan $daftar_kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarKegiatan $daftar_kegiatan)
    {

        $kegiatan = Kegiatan::all();
        
        $title = 'Edit Daftar Kegiatan';
        return view('daftar_kegiatan.edit', compact('kegiatan', 'title', 'daftar_kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarKegiatan $daftar_kegiatan)
    {
        $namafile = $daftar_kegiatan->bukti_pendaftaran;
        $update = [

            'id_kegiatan' => $request->id_kegiatan,
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'bukti_pendaftaran' => $namafile,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'biaya_kegiatan' => $request->biaya_kegiatan,
        ];

        $daftar_kegiatan->update($update);
        return redirect()->route('daftar_kegiatan.index')->with('Sukses', 'Berhasil Edit Kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hapus = DaftarKegiatan::findorfail($id);
        // delete data dri database
        $hapus->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Batal Data Daftar Kegiatan');
    }
}
