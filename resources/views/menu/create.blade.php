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
                    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-2">
                            <label for="">Nama Menu <abbr title="" style="color: black">*</abbr></label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Menu disini...." name="nama_menu" value="{{ old('nama_menu') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Stok <abbr title="" style="color: black">*</abbr></label>
                            <input type="number" class="form-control" placeholder="Masukkan Stok Menu disini...." name="stok" value="{{ old('stok') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Harga Pokok <abbr title="" style="color: black">*</abbr></label>
                            <input type="number" class="form-control" placeholder="Masukkan Harga Pokok Menu disini...." name="harga_pokok" value="{{ old('harga_pokok') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Harga Jual <abbr title="" style="color: black">*</abbr></label>
                            <input type="number" class="form-control" placeholder="Masukkan Harga Jual Menu disini...." name="harga_menu" value="{{ old('harga_menu') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Kategori Menu <abbr title="" style="color: black">*</abbr></label>
                            <select name="kategori_menu" id="dropdown">
                                <option></option>
                                <option>Minuman</option>
                                <option>Makanan</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan_menu" id="editor" cols="30" rows="10" class="form-control">{{ old('keterangan_menu') }}</textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Gambar <abbr title="" style="color: black">*</abbr> </label>
                            <input id="inputImg" type="file" accept="image/*" name="gambar_menu" class="form-control">
                            <img class="d-none w-25 h-25 my-2" id="previewImg" src="#" alt="Preview image">
                        </div>
                
                        <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Save</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    document.getElementById('inputImg').addEventListener('change', function() {
        // Get the file input value and create a URL for the selected image
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').setAttribute('src', e.target.result);
                document.getElementById('previewImg').classList.add("d-block");
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
</script>
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