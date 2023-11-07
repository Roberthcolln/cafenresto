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
                    <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-2">
                            <label for="">Nama <abbr title="" style="color: black">*</abbr></label>
                            <input type="text" class="form-control" placeholder="Masukkan nama disini...." name="nama_team" value="{{ old('nama_team') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Divisi Team</label>
                            <select name="divisi_team" id="dropdown">
                                <option></option>
                                <option>Programmer</option>
                                <option>UI/ UX Design</option>
                                <option>Lainnya ..</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Jabatan</label>
                            <input type="text" name="jabatan_team" class="form-control" value="{{ old('jabatan_team') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Akun Facebook</label>
                            <input type="text" name="facebook_team" class="form-control" value="{{ old('facebook_team') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Akun Instagram</label>
                            <input type="text" name="instagram_team" class="form-control" value="{{ old('instagram_team') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Foto <abbr title="" style="color: black">*</abbr> </label>
                            <input id="inputImg" type="file" accept="image/*" name="foto_team" class="form-control">
                            <img class="d-none w-25 h-25 my-2" id="previewImg" src="#" alt="Preview image">
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