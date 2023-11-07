<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\Komentar;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Reservasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatanx = DB::table('kegiatans')->first();
        $project = DB::table('project')->orderBy('id_project')->get();
        $konf = DB::table('setting')->first();
        $conf = DB::table('about')->first();
        $youtube = DB::table('about')->first();
        $galeri = DB::table('galeri')
            ->orderByDesc('id_galeri')
            ->limit(6)
            ->get();
        $partner = DB::table('partner')
            ->orderBy('kategori_partner')
            ->get();
        $tim = DB::table('team')
            ->limit(12)
            ->get();
        $client = DB::table('clients')
            ->limit(12)
            ->get();
        $makanan = DB::table('menu')
            ->where('kategori_menu', '=', 'makanan')
            ->get();
        $minuman = DB::table('menu')
            ->where('kategori_menu', '=', 'minuman')
            ->get();

        $projectx = DB::table('project')->count();
        $timx = DB::table('galeri')->count();
        $partnerx = DB::table('partner')->count();
        $menu = DB::table('menu')->get();
        $galerix = DB::table('galeri')->get();
        $kegiatan = DB::table('kegiatans')->get();

        $makan = DB::table('menu')
        ->where('kategori_menu', '=', 'makanan')
        ->count();
        $minum = DB::table('menu')
        ->where('kategori_menu', '=', 'minuman')
        ->count();
        $chef = DB::table('team')
        ->count();
        $komen = DB::table('komentar')
        ->count();
    
        $layanan = DB::table('layanan')->get();
        $komentar = DB::table('komentar')->get();
        return view('welcome', compact('komen', 'chef', 'komentar', 'layanan', 'makan','minum', 'galerix', 'partnerx', 'kegiatanx', 'projectx', 'kegiatan', 'timx', 'konf', 'partner', 'galeri', 'client', 'tim',  'project', 'menu', 'makanan', 'minuman', 'conf', 'youtube'));
    }

    

    public function detailkegiatan($slug)
    {
        $listkegiatan = DB::table('kegiatans')->where('slug_kegiatan', $slug)->first();
        $konf = DB::table('setting')->first();
        return view('detail-kegiatan', compact('konf', 'listkegiatan'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function pesan($id)
    {
        $makanan = DB::table('menu')
            ->where('kategori_menu', '=', 'makanan')
            ->get();
        $minuman = DB::table('menu')
            ->where('kategori_menu', '=', 'minuman')
            ->get();
        $pesan = DB::table('menu')->where('id_menu', $id)->first();
        return view('pesan', compact('pesan', 'makanan', 'minuman'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'no_hp' => 'required',
            'no_meja' => 'required',
            'porsi' => 'required'
        ]);
        $data = new Order();
        $data->nama_pelanggan = $request->nama_pelanggan;
        $data->id_menu = $request->id_menu;
        $data->no_hp = $request->no_hp;
        $data->no_meja = $request->no_meja;
        $data->porsi = $request->porsi;
        $data->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'jumlah_orang' => 'required',
            'masukan' => 'required'
        ]);

        $reservasi = new Reservasi();
        $reservasi->nama = $request->nama;
        $reservasi->email = $request->email;
        $reservasi->no_hp = $request->no_hp;
        $reservasi->tanggal = $request->tanggal;
        $reservasi->jam = $request->jam;
        $reservasi->jumlah_orang = $request->jumlah_orang;
        $reservasi->masukan = $request->masukan;
        $reservasi->save();
        return redirect('#booking')->with('Sukses', 'Reservasi Berhasil !!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
