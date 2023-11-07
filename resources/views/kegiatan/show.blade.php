@extends('layouts.admin')
@section('content')
<div class="kegiatan">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <!-- <h3 class="card-title">{{ $title }} </h3> -->
                <a href="{{ route('kegiatan.index') }}" class="btn btn-warning" style="float: right;"><i class="fas fa-backward"></i> Kembali</a>
            </div>
            <div class="card-body table table-responsive">
                <table class="table">
                    
                    
                    <tr>
                        <th style="width: 30%;">Nama Event </th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $kegiatan->nama_kegiatan }} </td>
                    </tr>
                   
                    <tr>
                        <th style="width: 30%;">Deskripsi</th>
                        <th style="width: 20px;">:</th>
                        <td>{!! $kegiatan->deskripsi_kegiatan !!}</td>
                    </tr>

                    <tr>
                        <th style="width: 30%;">Waktu </th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $kegiatan->tanggal_kegiatan }} || {{$kegiatan->jam_kegiatan}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Biaya Pendaftaran Event</th>
                        <th style="width: 20px;">:</th>
                        <td>Rp.{{ number_format($kegiatan->biaya_kegiatan) }}</td>
                    </tr>
                    
                    <tr>
                        <th style="width: 30%;">Banner Event </th>
                        <th style="width: 20px;">:</th>
                        <td><img src="{{ asset('file/kegiatan/'.$kegiatan->gambar_kegiatan) }}" alt="" style="width: 100px;"></td>
                    </tr>
                    

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection