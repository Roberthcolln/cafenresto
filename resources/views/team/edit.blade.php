@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> 
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('team.update', $team->id_team) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="">Nama <abbr title="" style="color: black">*</abbr></label>
                            <input type="text" class="form-control" placeholder="Masukkan nama disini...." name="nama_team" value="{{ $team->nama_team }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Divisi Team</label>
                            <select name="divisi_team" id="dropdown">
                                <option></option>
                                <option @if ($team->divisi_team == 'Programmer') selected @endif value = "Programmer">Programmer</option>
                                <option @if ($team->divisi_team == 'UI/ UX Designer') selected @endif value="UI/ UX Designer">UI/ UX Designer</option>
                                <option  @if ($team->divisi_team == 'Lainnya ..') selected @endif value="Lainnya ..">Lainnya ..</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Jabatan</label>
                            <input type="text" name="jabatan_team" class="form-control" value="{{ $team->jabatan_team }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Akun Facebook</label>
                            <input type="text" name="facebook_team" class="form-control" value="{{ $team->facebook_team }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Akun Instagram</label>
                            <input type="text" name="instagram_team" class="form-control" value="{{ $team->instagram_team }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Gambar</label>
                            <input type="file" class="form-control" name="foto_team" placeholder="" accept="image/*" id="preview_gambar" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Preview Foto</label>
                            <img src="{{ asset('file/team/'.$team->foto_team) }}" alt="" style="width: 200px;" id="gambar_nodin">
                        </div>      
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection