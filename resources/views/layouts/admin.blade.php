<?php
$konf = DB::table('setting')->first();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="content">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('logo/Screenshot (80).png') }}">
  <title>Admin | {{$konf->instansi_setting}} </title>

  <style>
    #container {
      width: 1000px;
      margin: 20px auto;
    }

    .ck-editor__editable[role="textbox"] {
      /* editing area */
      min-height: 200px;
    }

    .ck-content .image {
      /* block images */
      max-width: 80%;
      margin: 20px auto;
    }
  </style>
  @yield('css')
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  {{-- <link rel="icon" href="logo.ico"> --}}
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  {{-- <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}"> --}}
  {{-- <link rel="shortcut icon" href=""> --}}
  {{-- leaflet --}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

  <!--  Toastr  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
  <style>
    .select2 {
      width: 100% !important;
      height: 100%;
    }

    #map {
      width: 100%;
      height: 300px;
      border-radius: 10px;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route ('dashboard.index') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url ('/') }}" class="nav-link" target="_blank">Kembali Ke Website</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->name }} <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li align="center" class="well" style="">
              <a href="{{url('/')}}" class="btn btn-sm btn-dark form-control mb-1"><span class="glyphicon glyphicon-lock"></span> Website</a>
              <a href="{{ route('profile.show') }}" class="btn btn-sm btn-dark form-control mb-1"><span class="glyphicon glyphicon-lock"></span> Profile</a>
              <form method="POST" action="{{route ('logout')}}">
                @csrf
                <a href="" onclick="event.preventDefault();
              this.closest('form').submit();" class="btn btn-sm btn-danger form-control">Logout</a>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('dashboard.index') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light"><img src="{{ asset('logo/'. $konf->logo_setting) }}" style="width: 80px; align: center" alt=""></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            @if (Auth::user()->profile_photo_path != NULL)
            <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle" alt="{{ Auth::user()->name }}" style="width: 45px; height: 45px;">
            @else
            <img src="{{ asset('logo/'. $konf->logo_setting) }}" class="img-circle elevation-2" alt="KG" style="width: 45px; height: 45px">
            @endif
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{route('dashboard.index')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            {{-- Master Umum --}}
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  Master Umum
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('kategori.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori Menu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('reservasi.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Reservasi
                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{route('menu.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Menu</p>
                  </a>
                </li>
            </li>
            <li class="nav-item">
              <a href="{{route('kegiatan.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Event</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('daftar_kegiatan.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pendaftaran Event</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('team.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Chefs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('galeri.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Galeri</p>
              </a>
            </li>
          </ul>
          </li>
          {{-- Master Umum --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('setting.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Setting
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('about.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tentang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('layanan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Layanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('komentar.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Komentar & Masukan </p>
                </a>
              </li>
            </ul>
          </li>


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          Waktu Server Saat Ini:
          <p><?php $tg = date('Y-m-d');
              echo Carbon\Carbon::parse($tg)->isoFormat('dddd, D MMMM Y'); ?> <span id="clock"></span></p>
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route ('dashboard.index')}}">Home</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        @yield('content')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.1.0
      </div>
      <strong>Copyright &copy; <?php $cpy = date('Y');
                                echo $cpy; ?><a href=""> PT. Solusi Pasti Untuk Indonesia</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  {{-- <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script> --}}
  <!-- overlayScrollbars -->
  <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>

  <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <script src="{{ asset('admin/js/imageresize.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
  {{-- baca gambar --}}
  <script src="{{ asset('admin/js/gambar.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/gambar.js') }}"></script>
  <script>
    $("#preview_gambar").change(function() {
      bacaGambar(this);
    });
  </script>
  <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
  {{-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> --}}

  {{-- livesearch --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": true,
        "buttons": ["csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
      $('#example3').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
      $('#example4').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "searching": true,
        "lengthChange": true,
        "autoWidth": true,
        "responsive": true,
        "language": {
          "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
          "sEmptyTable": "Tidak ada data di database"
        }
      });
      $('#example5').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "searching": true,
        "lengthChange": true,
        "autoWidth": true,
        "responsive": true,
        "language": {
          "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
          "sEmptyTable": "Tidak ada data di database"
        }
      });
    });
  </script>
  <script>
    function showTime() {
      var a_p = "";
      var today = new Date();
      var curr_hour = today.getHours();
      var curr_minute = today.getMinutes();
      var curr_second = today.getSeconds();
      if (curr_hour < 12) {
        a_p = "AM";
      } else {
        a_p = "PM";
      }
      if (curr_hour == 0) {
        curr_hour = 24;
      }
      if (curr_hour > 24) {
        curr_hour = curr_hour - 24;
      }
      curr_hour = checkTime(curr_hour);
      curr_minute = checkTime(curr_minute);
      curr_second = checkTime(curr_second);
      document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
    }

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
    setInterval(showTime, 500);
  </script>
  <script type="text/javascript">
    $('.show_confirm').click(function(event) {
      var form = $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Yakin ingin menghapus data ini?`,
          text: "Jika di hapus maka data ini akan hilang.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });
  </script>
  @if(session("Sukses"))
  <script type="text/javascript">
    toastr.info("{{ session("
      Sukses ") }}");
  </script>
  @endif
  <script>
    $(document).ready(function() {
      $("#angka").keyup(function() {
        $(this).maskNumber({
          integer: true,
          thousand: "."
        })
      })
    })
  </script>
  <script>
    $("#dropdown").select2({
      theme: "bootstrap4",
      placeholder: "Silahkan Pilih",
    });
  </script>
  <script>
    $("#dropdown2").select2({
      theme: "bootstrap4",
      placeholder: 'Silahkan pilih',
    });
  </script>
  <script>
    $("#dropdown3").select2({
      theme: "bootstrap4",
      placeholder: 'Silahkan pilih',
    });
  </script>
  <script>
    $("#dropdown4").select2({
      theme: "bootstrap4",
      placeholder: 'Silahkan pilih',
    });
  </script>
  <script>
    $("#dropdown5").select2({
      theme: "bootstrap4",
      placeholder: 'Silahkan pilih',
    });
  </script>
  <script>
    $("#dropdown6").select2({
      theme: "bootstrap4",
      placeholder: 'Silahkan pilih',
    });
  </script>
  <script>
    $("#dropdown7").select2({
      theme: "bootstrap4",
      placeholder: 'Silahkan pilih',
    });
  </script>
  <script>
    $("#preview_gambar").change(function() {
      bacaGambar(this);
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#country-dd').on('change', function() {
        var idNegara = this.value;
        $("#state-dd").html('');
        $.ajax({
          url: "{{url('api/fetch-states')}}",
          type: "POST",
          data: {
            id_negara: idNegara,
            _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function(result) {
            $('#state-dd').html('<option value="">Select State</option>');
            $.each(result.provinsi, function(key, value) {
              $("#state-dd").append('<option value="' + value
                .id_provinsi + '">' + value.nama_provinsi + '</option>');
            });
            $('#city-dd').html('<option value="">Select City</option>');
          }
        });
      });
      $('#state-dd').on('change', function() {
        var idProvinsi = this.value;
        $("#city-dd").html('');
        $.ajax({
          url: "{{url('api/fetch-cities')}}",
          type: "POST",
          data: {
            id_provinsi: idProvinsi,
            _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function(res) {
            $('#city-dd').html('<option value="">Select City</option>');
            $.each(res.kota, function(key, value) {
              $("#city-dd").append('<option value="' + value
                .id_kota + '">' + value.nama_kota + '</option>');
            });
          }
        });
      });
    });
  </script>
  {{-- Dropdown Comm --}}
  <script>
    $(document).ready(function() {
      $('#pusat-dd').on('change', function() {
        var idPusat = this.value;
        $("#region-dd").html('');
        $.ajax({
          url: "{{url('api/fetch-region')}}",
          type: "POST",
          data: {
            id_pusat: idPusat,
            _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function(result) {
            $('#region-dd').html('<option value="">Select Region</option>');
            $.each(result.region, function(key, value) {
              $("#region-dd").append('<option value="' + value
                .id_region + '">' + value.nama_region + '</option>');
            });
            $('#chapter-dd').html('<option value="">Select Chapter</option>');
          }
        });
      });
      $('#region-dd').on('change', function() {
        var idRegion = this.value;
        $("#chapter-dd").html('');
        $.ajax({
          url: "{{url('api/fetch-chapter')}}",
          type: "POST",
          data: {
            id_region: idRegion,
            _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function(res) {
            $('#chapter-dd').html('<option value="">Select Chapter</option>');
            $.each(res.chapter, function(key, value) {
              $("#chapter-dd").append('<option value="' + value
                .id_chapter + '">' + value.nama_chapter + '</option>');
            });
          }
        });
      });
    });
  </script>

  {{-- dropdown kegiatan --}}
  <script>
    $(document).ready(function() {
      $('#kegiatan-dd').on('change', function() {
        var idKegiatan = this.value;
        $("#sub-dd").html('');
        $.ajax({
          url: "{{url('api/fetch-kegiatan')}}",
          type: "POST",
          data: {
            id_kategori_kegiatan: idKegiatan,
            _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function(result) {
            $('#sub-dd').html('<option value="">Select Sub Kategori Kegiatan</option>');
            $.each(result.sub_kategori_kegiatan, function(key, value) {
              $("#sub-dd").append('<option value="' + value
                .id_sub_kategori_kegiatan + '">' + value.nama_sub_kategori_kegiatan + '</option>');
            });
            $('#sub_sub-dd').html('<option value="">Select Sub Sub</option>');
          }
        });
      });
    });
  </script>
  @yield('script')
</body>

</html>