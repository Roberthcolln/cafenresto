<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Setting';
        $setting = Setting::first();
        return view('setting.index', compact('setting', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::findorfail($id);
        $logo = $setting->logo_setting;
        $favicon = $setting->favicon_setting;
        
        $update = [
            'instansi_setting' => $request->instansi_setting,
            'pimpinan_setting' => $request->pimpinan_setting,
            'logo_setting' => $logo,
            'favicon_setting' => $favicon,
            'tentang_setting' => $request->tentang_setting,
            'misi_setting' => $request->misi_setting,
            'visi_setting' => $request->visi_setting,
            'keyword_setting' => $request->keyword_setting,
            'alamat_setting' => $request->alamat_setting,
            'instagram_setting' => $request->instagram_setting,
            'youtube_setting' =>$request->youtube_setting,
            'email_setting' => $request->email_setting,
            'no_hp_setting' => $request->no_hp_setting,
            'maps_setting' => $request->maps_setting,
        ];
        if ($request->logo_setting != ""){
            $request->logo_setting->move(public_path('logo/'),$logo);
        }
        if ($request->favicon_setting != ""){
            $request->favicon_setting->move(public_path('favicon/'), $favicon);
        }
        $setting->update($update);
        return redirect()->back()->with('Sukses', 'Berhasil Edit Konfigurasi Website');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
