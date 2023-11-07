@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <a href="{{ route('galeri.create') }}" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus">Tambah</i></a>
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('Sukses'))
                    <div class="alert alert-success">
                        <p>{{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </p>
                    </div>
                    @endif
                    <table class="table table-bordered" id="example2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Galeri</th>
                                <th>Jenis</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galeri as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_galeri }}</td>
                                    <td>
                                        @if ($row->jenis_galeri == 'Banner')
                                            <span class="badge badge-success">Banner</span>
                                        @else
                                            <span class="badge badge-warning">Galeri</span>
                                        @endif
                                    </td>
                                    <td>{!! Str::limit($row->jenis_galeri, 100, '...') !!}</td>
                                    <td><img src="{{ asset('file/galeri/'.$row->foto_galeri) }}" alt="{{ $row->nama_galeri }}" style="width: 100px; height: 100px;"></td>
                                    <td>
                                        <a href="{{ route('galeri.edit', $row->id_galeri) }}" class="btn btn-primary btn-xs" style="display: inline-block"><i class="fas fa-edit">Edit</i></a>
                                        <form action="{{ route('galeri.destroy', $row->id_galeri) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash">Delete</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection