@extends('layouts.index')
@section('content')

<!-- Start review Area -->
<section class="review-area section-gap" id="review">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10">Order Menu</h1>
                    <!-- <p>Who are in extremely love with eco friendly system.</p> -->
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="form-floating pb-2">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" placeholder="Nama" name="nama_pelanggan">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <label for="nohp">Nomor Telepon</label>
                    <input type="number" class="form-control" id="nohp" placeholder="08xxxxx" name="no_hp">
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating pb-2">
                    <label for="subject">Nomor Meja</label>
                    <input type="number" class="form-control" id="subject" placeholder="Nomor Meja" name="no_meja">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group mb-2">
                    <label for="">Nama Menu</label><br>
                    <h3 style="color : white;">{{ $pesan->nama_menu }}</h3>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating pb-2">
                    <label for="subject">Porsi</label>
                    <input type="number" class="form-control" id="subject" placeholder="Porsi" name="porsi">
                </div>
            </div>
            <!-- Start menu Area -->
<section class="menu-area section-gap" id="menu">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10">Menu in Kafe Garasi</h1>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
        </div>						
        <div class="row">
            <div class="col-lg-6 mb-5">
                <div class="menu-content pb-20 col-lg-6">
                    <div class="title text-center">
                        <h3 class="mb-10">Makanan</h3>
                    </div>
                </div>
                @foreach($makanan as $row)
                <div class="card mb-3" style="box-shadow: 0px 10px 30px 0px rgba(182, 136, 52, 0.2);border-radius: 10px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="{{asset('file/menu/'. $row->gambar_menu)}}" alt="..." style="width: 100%; height: 100%; border-radius: 5px">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <p class="float-right" style="color: #b68834; font-size: 18px; font-weight: 600;">
                            Rp. {{number_format($row->harga_menu)}}
                        </p>
                        <h5 class="card-title">{{$row->nama_menu}}</h5>
                        <p class="card-text">{!! $row->keterangan_menu !!}</p>
                        <a href="#" class="order-btn">Order</a>
                    </div>
                    </div>
                </div>
                </div>

                @endforeach
            </div>
            <div class="col-lg-6">
                <div class="menu-content pb-20 col-lg-6">
                    <div class="title text-center">
                        <h3 class="mb-10">Minuman</h3>
                    </div>
                </div>
                @foreach($minuman as $row)
                <div class="card mb-3" style="box-shadow: 0px 10px 30px 0px rgba(182, 136, 52, 0.2);border-radius: 10px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="{{asset('file/menu/'. $row->gambar_menu)}}" alt="..." style="width: 100%; height: 100%; border-radius: 5px;">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <p class="float-right" style="color: #b68834; font-size: 18px; font-weight: 600;">
                            Rp. {{number_format($row->harga_menu)}}
                        </p>
                        <h5 class="card-title">{{$row->nama_menu}}</h5>
                        <p class="card-text">{!! $row->keterangan_menu !!}</p>
                        <a href="{{url('pesan', $row->id_menu)}}" class="order-btn">Order</a>
                    </div>
                    </div>
                </div>
                </div>
                @endforeach
            </div>															
        </div>	
    </div>
</section>
<!-- End menu Area -->
            <div class="col-12 pt-2">
                <button class="click-btn btn btn-default mt-1" type="submit" style="background-color: #FEE8B0; color: black; border-radius: 0; border-top-left-radius: 0px; border-bottom-left-radius: 0px; padding: 8px 12px; border-radius: 5px; width: 100%;">Order</button>
            </div>
        </div>		
        <!-- <div class="row">
            <div class="col-lg-6 col-md-6 single-review">
                <img src="img/r1.png" alt="">
                <div class="title d-flex flex-row">
                    <h4>lorem ipusm</h4>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>								
                    </div>
                </div>
                <p>
                    Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                </p>
            </div>	
            <div class="col-lg-6 col-md-6 single-review">
                <img src="img/r2.png" alt="">
                <div class="title d-flex flex-row">
                    <h4>lorem ipusm</h4>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>								
                    </div>
                </div>
                <p>
                    Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                </p>
            </div>	
        </div> -->
        <!-- <div class="row counter-row">
            <div class="col-lg-3 col-md-6 single-counter">
                <h1 class="counter">2536</h1>
                <p>Happy Client</p>
            </div>
            <div class="col-lg-3 col-md-6 single-counter">
                <h1 class="counter">7562</h1>
                <p>Total Projects</p>
            </div>
            <div class="col-lg-3 col-md-6 single-counter">
                <h1 class="counter">2013</h1>
                <p>Cups Coffee</p>
            </div>
            <div class="col-lg-3 col-md-6 single-counter">
                <h1 class="counter">10536</h1>
                <p>Total Submitted</p>
            </div>																		
        </div> -->
    </div>	
</section>
<!-- End review Area -->


@endsection