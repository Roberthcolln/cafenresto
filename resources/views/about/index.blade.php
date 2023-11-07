@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ $title }}</h3>
          <a href="{{ route('about.create') }}" class="btn btn-dark btn-sm" style="float: right"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
          @if ($message = Session::get('Sukses'))
          <div class="alert alert-success">
            <p class="m-0">{{ $message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </p>
          </div>
          @endif
          <table id="example3" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Video</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="overflow-x-auto">
              @foreach ($about as $row)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->judul }}</td>
                <td>{!! Str::limit($row->deskripsi, 100, '...') !!}</td>
                <td><img src="{{ asset('file/about/'.$row->gambar) }}" alt="" class="img-fluid" style="width:200px; height:200px; max-width:100%;"></td>
                <td>{{ $row->youtube }}</td>
                <td><a href="{{ route('about.edit', $row->id_about) }}" class="btn btn-primary btn-xs" role="button" style="display: inline-block"><i class="fas fa-edit">Edit</i></a>
                  <form action="{{ route('about.destroy', $row->id_about) }}" method="POST" style="display: inline-block">
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