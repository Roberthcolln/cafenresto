<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Tim';
        $team = DB::table('team')
        ->orderByDesc('id_team')
        ->get();
        return view('team.index', compact('title', 'team'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Tim';
        return view('team.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_team' => 'required',
            'facebook_team' => 'required',
            'instagram_team' => 'required',
            'jabatan_team' => 'required',
            'foto_team' => 'required',
        ]);
        $foto_team = $request->file('foto_team');
        $namafototeam = 'Team'.date('Ymdhis').'.'.$request->file('foto_team')->getClientOriginalExtension();
        $foto_team->move('file/team/',$namafototeam);
        
        $team = new Team();
        $team->nama_team = $request->nama_team;
        $team->jabatan_team = $request->jabatan_team;
        $team->foto_team = $namafototeam;
        $team->facebook_team = $request->facebook_team;
        $team->instagram_team = $request->instagram_team;
        $team->save();

        return redirect()->route('team.index')->with('Sukses', 'Berhasil Tambah Team');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $team = Team::find($id);
        $title = 'Edit Team';
        return view('team.edit', compact('team', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $team = Team::find($id);
        $namafototeam = $team->foto_team;
        $update = [
            'nama_team' => $request->nama_team,
            'jabatan_team' => $request->jabatan_team,
            'foto_team' => $namafototeam,
            'facebook_team' => $request->facebook_team,
            'instagram_team' => $request->instagram_team,
        ];
        if ($request->foto_team != ""){
            $request->foto_team->move(public_path('file/team/'), $namafototeam);
        }   
        $team->update($update);
        return redirect()->route('team.index')->with('Sukses', 'Berhasil Update Team');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        $namafototeam = $team->foto_team;
        $fototeam = public_path('file/team/').$namafototeam;
        if(file_exists($fototeam)){
            @unlink($fototeam);
        }
        $team->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Team');
    }
}
