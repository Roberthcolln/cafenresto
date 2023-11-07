@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ $title }}</h3>
          <a href="{{ route('kegiatan.create') }}" class="btn btn-dark btn-sm" style="float: right"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
          @if ($message = Session::get('Sukses'))
          <div class="alert alert-success">
            <p class="m-0">{{ $message }}</p>
          </div>
          @endif
          <table id="example3" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Event</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="overflow-x-auto">
              @foreach ($kegiatan as $row)
              <tr>
                <td>{{ $loop->iteration }}</td>
                
                <td>{{ $row->nama_kegiatan }}</td>
                <td>{!! Str::limit($row->deskripsi_kegiatan, 100, '...') !!}</td>
                
                <td><img src="{{ asset('file/kegiatan/'.$row->gambar_kegiatan) }}" alt="" class="img-fluid" style="width:200px; height:200px; max-width:100%;"></td>
                <td><a href="{{ route('kegiatan.edit', $row->id_kegiatan) }}" class="btn btn-primary btn-xs" role="button" style="display: inline-block"><i class="fas fa-edit">Edit</i></a>
                <a href="{{ route('kegiatan.show', $row->id_kegiatan) }}" class="btn btn-warning btn-xs" style="display: inline-block"><i class="fas fa-eye"> Detail</i></a>
                  <form action="{{ route('kegiatan.destroy', $row->id_kegiatan) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" value="Button" title="Delete" class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash">Delete</i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
@endsection