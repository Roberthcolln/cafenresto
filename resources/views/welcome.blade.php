@extends('layouts.index')
@section('content')




<!-- About Start -->
<div class="container-xxl py-5" id="about">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6">
        <div class="row g-3">
          <div class="col-6 text-start">
            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{asset('file/about/'.$conf->gambar)}}" style="max-width: 100%;">
          </div>
          <div class="col-6 text-start">
            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{asset('file/about/'.$conf->gambar)}}" style="max-width: 100%;">
          </div>
          <div class="col-6 text-start">
            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{asset('file/about/'.$conf->gambar)}}" style="max-width: 100%;">
          </div>
          <div class="col-6 text-start">
            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{asset('file/about/'.$conf->gambar)}}" style="max-width: 100%;">
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
        <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>{{$konf->instansi_setting}}</h1>
        <p class="mb-4">{!! $konf->tentang_setting !!}</p>

        <div class="row g-4 mb-4">
          <div class="col-sm-6">
            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
              <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{$makan}}</h1>
              <div class="ps-4">
                <p class="mb-0">Special</p>
                <h6 class="text-uppercase mb-0">Makanan</h6>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
              <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{$minum}}</h1>
              <div class="ps-4">
                <p class="mb-0">Popular</p>
                <h6 class="text-uppercase mb-0">Minuman</h6>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
              <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{$chef}}</h1>
              <div class="ps-4">
                <p class="mb-0">Profesional</p>
                <h6 class="text-uppercase mb-0">Chefs</h6>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
              <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{$komen}}</h1>
              <div class="ps-4">
                <p class="mb-0">Testimonial</p>
                <h6 class="text-uppercase mb-0">Clients</h6>
              </div>
            </div>
          </div>
        </div>
        <a class="btn btn-primary py-3 px-5 mt-2" href="#service">Read More</a>
      </div>
    </div>
  </div>
</div>
<!-- About End -->

<!-- Service Start -->
<div class="container-xxl py-5" id="service">
  <div class="container">
    <div class="row g-4">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h5 class="section-title ff-secondary text-center text-primary fw-normal">Service</h5>
        <h1 class="mb-5">Our Service</h1>
      </div>
      @foreach ($layanan as $row)
      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="service-item rounded pt-3">
          <div class="p-4">
            <center><img src="{{asset('file/layanan/'.$row->gambar_layanan)}}" style="width: 50%;" alt=""></center><br>
            <center>
              <h5>{{$row->nama_layanan}}</h5>
            </center>
            <p>{!! $row->keterangan_layanan !!}</p>
          </div>
        </div>
      </div>
      @endforeach


    </div>
  </div>
</div>
<!-- Service End -->

<!-- Menu Start -->
<div class="container-xxl py-5" id="menu">
  <div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
      <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
      <h1 class="mb-5">Most Popular Items</h1>
    </div>
    <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
      <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
        <li class="nav-item">
          <a class="d-flex align-items-center text-start mx-3 pb-3 active" data-bs-toggle="pill" href="#tab-1">
            <i class="fa fa-hamburger fa-2x text-primary"></i>
            <div class="ps-3">
              <small class="text-body">Special</small>
              <h6 class="mt-n1 mb-0">Makanan</h6>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 " data-bs-toggle="pill" href="#tab-2">
            <i class="fa fa-coffee fa-2x text-primary"></i>
            <div class="ps-3">
              <small class="text-body">Popular</small>
              <h6 class="mt-n1 mb-0">Minuman</h6>
            </div>
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div id="tab-1" class="tab-pane fade show p-0 active">
          <div class="row g-4">

            @foreach ($makanan as $row)
            <div class="col-lg-6">
              <div class="d-flex align-items-center">
                <img class="flex-shrink-0 img-fluid rounded" src="{{asset('file/menu/'.$row->gambar_menu)}}" alt="" style="width: 80px;">
                <div class="w-100 d-flex flex-column text-start ps-4">
                  <h5 class="d-flex justify-content-between border-bottom pb-2">
                    <span>{{$row->nama_menu}}</span>
                    <span class="text-primary">Rp.{{ number_format($row->harga_menu) }}</span>
                  </h5>
                  <small class="fst-italic">{!! $row->keterangan_menu !!}</small>
                </div>
              </div>
            </div>
            @endforeach


          </div>
        </div>
        <div id="tab-2" class="tab-pane fade show p-0">
          <div class="row g-4">

            @foreach ($minuman as $row)
            <div class="col-lg-6">
              <div class="d-flex align-items-center">
                <img class="flex-shrink-0 img-fluid rounded" src="{{asset('file/menu/'.$row->gambar_menu)}}" alt="" style="width: 80px;">
                <div class="w-100 d-flex flex-column text-start ps-4">
                  <h5 class="d-flex justify-content-between border-bottom pb-2">
                    <span>{{$row->nama_menu}}</span>
                    <span class="text-primary">Rp.{{ number_format($row->harga_menu) }}</span>
                  </h5>
                  <small class="fst-italic">{!! $row->keterangan_menu !!}</small>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- Menu End -->


<!-- Reservation Start -->
<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s" id="booking">
  <div class="row g-0">
    <div class="col-md-6">
      <div class="video">
        <a type="button" class="btn-play" href="http://www.youtube.com/watch?v=0O2aH4XLbto" >
          <span></span>
        </a>
      </div>
    </div>
    <div class="col-md-6 bg-dark d-flex align-items-center">
      <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
        <h1 class="text-white mb-4">Book A Table Online</h1>
        @if ($message = Session::get('Sukses'))
        <div class="alert alert-success">
          <p class="m-0">{{ $message }}


          </p>

        </div>
        @endif
        <form action="{{route ('home.store')}}" method="post">
          @csrf
          @method('POST')
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                <label for="nama">Nama</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal">
                <label for="tanggal">Tanggal</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="time" class="form-control" name="jam" id="jam" placeholder="Jam">
                <label for="jam">Jam</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="number" class="form-control" name="jumlah_orang" id="jumlah_orang" placeholder="Jumlah Orang">
                <label for="jumlah_orang">Jumlah Orang</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Telepon">
                <label for="no_hp">Telepon</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <textarea class="form-control" placeholder="Special Request" name="masukan" id="masukan" style="height: 100px"></textarea>
                <label for="masukan">Reservasi Khusus</label>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- 16:9 aspect ratio -->
        <div class="ratio ratio-16x9">
          <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Reservation Start -->


<!-- Team Start -->
<div class="container-xxl pt-5 pb-3" id="team">
  <div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
      <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
      <h1 class="mb-5">Our Master Chefs</h1>
    </div>
    <div class="row g-4">
      @foreach ($tim as $row)
      <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="team-item text-center rounded overflow-hidden">
          <div class="rounded-circle overflow-hidden m-4">
            <img class="img-fluid" src="{{asset('file/team/'.$row->foto_team)}}" alt="">
          </div>
          <h5 class="mb-0">{{$row->nama_team}}</h5>
          <small>{{$row->jabatan_team}}</small>
          <div class="d-flex justify-content-center mt-3">
            <a class="btn btn-square btn-primary mx-1" href="https://www.facebook.com/{{ $row->facebook_team }}"><i class="fab fa-facebook-f"></i></a>
            <!-- <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a> -->
            <a class="btn btn-square btn-primary mx-1" href="https://instagram.com/{{ $row->instagram_team }}"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- Team End -->

<!-- ======= Gallery Section ======= -->
<div class="container-xxl pt-5 pb-3" id="gallery">
  <div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
      <h5 class="section-title ff-secondary text-center text-primary fw-normal">Gallery</h5>
      <h1 class="mb-5">Our Gallery</h1>
    </div>

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-0">
        @foreach ($galerix as $row)
        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="{{asset ('file/galeri/'.$row->foto_galeri)}}" class="gallery-lightbox" data-gall="gallery-item">
              <img src="{{asset ('file/galeri/'.$row->foto_galeri)}}" style="max-width: 100%;" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </div>
</div>



<!-- Contact Start -->
<div class="container-xxl py-5" id="contact">
  <div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
      <h5 class="section-title ff-secondary text-center text-primary fw-normal">Contact Us</h5>
      <h1 class="mb-5">Contact For Any Query</h1>
    </div>
    <div class="row g-4">
      <div class="col-12">
        <div class="row gy-4">
          <div class="col-md-4">
            <center>
              <h5 class="section-title ff-secondary fw-normal text-start text-primary">Kontak</h5>
            </center>
            <center>
              <p><i class="fa fa-phone text-primary me-2"></i>{{$konf->no_hp_setting}}</p>
            </center>
          </div>
          <div class="col-md-4">
            <center>
              <h5 class="section-title ff-secondary fw-normal text-start text-primary">Lokasi</h5>
            </center>
            <center>
              <p><i class="fa fa-map-marker text-primary me-2"></i>{{$konf->alamat_setting}}</p>
            </center>
          </div>
          <div class="col-md-4">
            <center>
              <h5 class="section-title ff-secondary fw-normal text-start text-primary">E-mail</h5>
            </center>
            <center>
              <p><i class="fa fa-envelope-open text-primary me-2"></i>{{$konf->email_setting}}</p>
            </center>
          </div>
        </div>
      </div>
      <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
        <iframe class="position-relative rounded w-100 h-100" src="{{$konf->maps_setting}}" frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
      <div class="col-md-6">
        <div class="wow fadeInUp" data-wow-delay="0.2s">

          <form action="{{route ('komentar.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="row g-3">
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Your Name">
                  <label for="name">Your Name</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" placeholder="Leave a message here" name="masukan" id="masukan" style="height: 150px"></textarea>
                  <label for="message">Message</label>
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100 py-3" type="submit">Send a Comment</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Contact End -->
<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s" id="testimonial">
  <div class="container">
    <div class="text-center">
      <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
      <h1 class="mb-5">Our Clients Say!!!</h1>
    </div>
    @if ($message = Session::get('Sukses'))
    <div class="alert alert-success">
      <p class="m-0">{{ $message }}


      </p>

    </div>
    @endif
    <div class="owl-carousel testimonial-carousel">
      @foreach ($komentar as $row)
      <div class="testimonial-item bg-transparent border rounded p-4">
        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
        <p>{!! $row->masukan !!}</p>
        <div class="d-flex align-items-center">
          <img class="img-fluid flex-shrink-0 rounded-circle" src="web/img/client.png" style="width: 50px; height: 50px;">
          <div class="ps-3">
            <h5 class="mb-1">{{$row->nama}}</h5>
            <!-- <small>Profession</small> -->
          </div>
        </div>
      </div>
      @endforeach


    </div>
  </div>
</div>
<!-- Testimonial End -->

@endsection