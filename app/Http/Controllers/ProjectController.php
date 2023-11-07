<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Project';
        $project = DB::table('project')->orderByDesc('id_project')->get();
        return view('project.index', compact('project', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Project';
        return view('project.create', compact('title'));
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
            'nama_project' => 'required',
            'gambar_project' => 'required',
            'keterangan_project' => 'required',
            'info_project' => 'required',
        ],$messages);
        $gambar_project = $request->file('gambar_project');
        $namagambarproject = 'Project'.date('Ymdhis').'.'.$request->file('gambar_project')->getClientOriginalExtension();
        $gambar_project->move('file/project/',$namagambarproject);

        $data = new Project();
        $data->nama_project = $request->nama_project;
        $data->gambar_project = $namagambarproject;
        $data->keterangan_project = $request->keterangan_project;
        $data->info_project = $request->info_project;
        $data->url_project = $request->url_project;
        $data->slug_project = Str::slug($request->nama_project); 
        $data->save();
        return redirect()->route('project.index')->with('Sukses', 'Berhasil Tambah Project');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $title = 'Edit Project';
        return view('project.edit', compact('project', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $project = Project::findorfail($id);
        $namagambarproject = $project->gambar_project;
        $update = [
            'nama_project' => $request->nama_project,
            'gambar_project' => $namagambarproject,
            'keterangan_project' => $request->keterangan_project,
            'info_project' => $request->info_project,
            'url_project' => $request->url_project,
            'slug_project' => Str::slug($request->nama_project),
        ];
        if ($request->gambar_project != ""){
            $request->gambar_project->move(public_path('file/project/'), $namagambarproject);
        }   
        $project->update($update);
        return redirect()->route('project.index')->with('Sukses', 'Berhasil Edit Project');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $project = Project::findorfail($id);
        $namagambarproject = $project->gambar_project;
        $gambar_project = public_path ('file/team/').$namagambarproject;
        if(file_exists($gambar_project)){
            @unlink($gambar_project);
        }
        $project->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Project');
    }
}
