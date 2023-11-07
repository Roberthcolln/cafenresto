@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <a href="{{ route('menu.create') }}" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus">Tambah</i></a>
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('Sukses'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <table class="table table-bordered" id="example3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Stok Produk</th>
                                <th scope="col">Harga Pokok</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Tanggal Update</th>
                                <th scope="col">Kategori Menu</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_menu }}</td>
                                    <td>{!! Str::limit($row->keterangan_menu, 200, '...') !!}</td>
                                    <td><img src="{{ asset('file/menu/'.$row->gambar_menu) }}" alt="{{ $row->nama_menu }}" style="width: 50px; height: 50px;"></td>
                                    <td>{{ $row->stok}}</td>
                                    <td>Rp. {{ number_format($row->harga_pokok)}}</td>
                                    <td>Rp. {{ number_format($row->harga_menu)}}</td>
                                    <td>{{ Carbon\Carbon::parse($row->tanggal_masuk)->isoFormat('dddd,D MMMM Y') }}</td>
                                    <td>
                                        @if ($row->kategori_menu == 'Minuman')
                                            <span class="badge badge-success">Minuman</span>
                                        @else
                                            <span class="badge badge-warning">Makanan</span>
                                        @endif
                                    </td>  
                                    <td>
                                        <a href="{{ route('menu.edit', $row->id_menu) }}" class="btn btn-primary btn-xs" style="display: inline-block"><i class="fas fa-edit">Edit</i></a>
                                        <form action="{{ route('menu.destroy', $row->id_menu) }}" method="POST" style="display: inline-block">
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