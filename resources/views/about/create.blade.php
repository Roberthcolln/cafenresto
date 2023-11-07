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
                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    
                    <div class="form-group mb-2">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" placeholder="Masukkan Judul disini..." name="judul" value="{{ old('judul') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" id="editor" cols="30" rows="10">{{ old('deskripsi') }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Video</label>
                        <textarea name="youtube" id="editor" cols="30" rows="10">{{ old('youtube') }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Gambar <abbr title="" style="color: black">*</abbr> </label>
                        <input id="inputImg" type="file" accept="image/*" name="gambar" class="form-control" required/>
                        <img class="d-none w-25 h-25 my-2" id="previewImg" src="#" alt="Preview image">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
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
      CKEDITOR.replace( 'editor', {
          filebrowserUploadMethod: 'form'
      });
  </script>
@endsection
@endsection