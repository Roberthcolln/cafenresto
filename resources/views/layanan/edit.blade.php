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
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('layanan.update', $layanan->id_layanan) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="">Nama Layanan <abbr title="" style="color: black">*</abbr></label>
                            <input required type="text" class="form-control" placeholder="Masukkan Judul layanan disini...." name="nama_layanan" value="{{ $layanan->nama_layanan }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan_layanan" id="editor" cols="30" rows="10" class="form-control">{{ $layanan->keterangan_layanan }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Gambar</label>
                            <input type="file" class="form-control" name="gambar_layanan" placeholder="" accept="image/*" id="preview_gambar" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Preview Foto</label>
                            <img src="{{ asset('file/layanan/'.$layanan->gambar_layanan) }}" alt="" style="width: 200px;" id="gambar_nodin">
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
@section('script')
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
    }
        })
        .catch( error => {
            console.error( error );
        } );
  </script>
  <script>
      CKEDITOR.replace( 'editor', {
          filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
          filebrowserUploadMethod: 'form'
      });
  </script>
@endsection