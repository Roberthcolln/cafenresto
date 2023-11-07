@extends('layouts.index')
@section('content')
<section class="generic-banner" style="background: url({{ asset('file/kegiatan/'.$listkegiatan->gambar_kegiatan) }}) center; background-size: cover;">	
	<div class="container">
		<div class="row height align-items-center justify-content-center">
			<div class="col-lg-10">
				<div class="generic-banner-content">
					<h1 class="text-white">{{$listkegiatan->nama_kegiatan}}</h1>
				</div>							
			</div>
		</div>
	</div>
</section>		
<!-- End banner Area -->

<!-- About Generic Start -->
<div class="main-wrapper">


<!-- Start Generic Area -->
<section class="about-generic-area section-gap">
	<div class="container border-top-generic">
		<h3 class="about-title mb-30">{{$listkegiatan->berita_kegiatan}}</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="img-text">
					<p>{!! $listkegiatan->deskripsi_kegiatan !!}</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Generic Start -->		



@endsection