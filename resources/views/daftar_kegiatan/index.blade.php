@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <form action="{{ route('daftar_kegiatan.index') }}" method="get">
        <div class="row mb-5">
          <div class="col-sm-2">
            <label for=""> Filter Kegiatan</label>
            <select name="keyword" id="sub-dd" class="form-control">
              <option value="" id=""></option>
              @foreach ($select as $row)
              <option value="{{ $row->id_kegiatan }}">{{($row->nama_kegiatan)}}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary mt-4">Search</button>
        </div>
      </form>
      <div class="card">
        <!-- <div class="card-header">
          <a href="{{ route('daftar_kegiatan.create') }}" class="btn btn-dark btn-sm" style="float: right"><i class="fas fa-plus"></i> Tambah</a>
        </div> -->
        <div class="card-body">
          @if ($message = Session::get('Sukses'))
          <div class="alert alert-success">
            <p class="m-0">{{ $message }}</p>
          </div>
          @endif
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Nama Peserta</th>
                <th>Telepon</th>
                <th>Tanggal Kegiatan</th>
                <th>Biaya Kegiatan</th>
                <th>Bukti Pendaftaran</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="overflow-x-auto">
              @foreach ($daftar_kegiatan as $row)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->nama_kegiatan }}</td>
                <td>
                  {{ $row->nama }}

                </td>
                <td>{{ $row->no_tlp }}</td>
                <td>{{ Carbon\Carbon::parse($row->tanggal_kegiatan)->isoFormat('dddd,D MMMM Y') }} <br><span class="badge badge-info">{{$row->jam_kegiatan }}</span> </td>
                <td>Rp. {{ number_format($row->biaya_kegiatan) }}</td>
                <td><img src="{{ asset('file/daftar_kegiatan/'.$row->bukti_pendaftaran) }}" alt="" class="img-fluid" style="width:200px; height:200px; max-width:100%;"></td>
                <td>
                  <!-- <a href="{{ route('daftar_kegiatan.edit', $row->id_daftar_kegiatan) }}" class="btn btn-primary btn-xs" role="button" style="display: inline-block"><i class="fas fa-edit">Edit</i></a> -->
                  <form action="{{ route('daftar_kegiatan.destroy', $row->id_daftar_kegiatan) }}" method="POST" style="display: inline-block">
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