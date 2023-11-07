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
                    <form action="{{ route('menu.update', $menu->id_menu) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="">Nama Menu <abbr title="" style="color: black">*</abbr></label>
                            <input required type="text" class="form-control" placeholder="Masukkan Nama Menu disini...." name="nama_menu" value="{{ $menu->nama_menu }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Harga Pokok <abbr title="" style="color: black">*</abbr></label>
                            <input required type="number" class="form-control" placeholder="Masukkan Harga Pokok Menu disini...." name="harga_pokok" value="{{ $menu->harga_pokok }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Harga Menu <abbr title="" style="color: black">*</abbr></label>
                            <input required type="number" class="form-control" placeholder="Masukkan Harga Menu disini...." name="harga_menu" value="{{ $menu->harga_menu }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Stok <abbr title="" style="color: black">*</abbr></label>
                            <input required type="number" class="form-control" placeholder="Masukkan Stok Menu disini...." name="stok" value="{{ $menu->stok }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Kategori Menu</label>
                            <select name="kategori_menu" id="dropdown">
                                <option></option>
                                <option @if ($menu->kategori_menu == 'Minuman') selected @endif value="Minuman">Minuman</option>
                                <option  @if ($menu->kategori_menu == 'Makanan') selected @endif value="Makanan">Makanan</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" class="form-control" value="{{ $menu->tanggal_masuk }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Gambar</label>
                            <input type="file" class="form-control" name="gambar_menu" placeholder="" accept="image/*" id="preview_gambar" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Preview Foto</label>
                            <img src="{{ asset('file/menu/'.$menu->gambar_menu) }}" alt="" style="width: 200px;" id="gambar_nodin">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan_menu" id="editor" cols="30" rows="10" class="form-control">{{ $menu->keterangan_menu }}</textarea>
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