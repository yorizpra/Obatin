<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OBATIN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/obatin.png') }}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet" />
  <link href="{{asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css') }}" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- =======================================================
  * Template Name: Appland - v2.3.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<?php
 $pesanan = \App\Pesanan::where('id_konsumen', Auth::guard('konsumen')->user()->id)->where('status', 0)->first();
 if (!empty($pesanan)) {
    $notif = \App\DetailPesanan::where('id_pemesanan', $pesanan->id)->count();



 }
 ?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top  header-transparent ">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <img class="navbar-brand waves-effect waves-dark" src="{{asset('assets/img/logo1.png') }}" width="200px" alt="">

        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li ><a href="{{url('/resep')}}">Unggahan Resep</a></li>
          {{-- <li><a href="#features">App Features</a></li>
          <li><a href="#gallery">Gallery</a></li> --}}
          {{-- <li><a href="#pricing">Home</a></li> --}}
          <li ><a href="{{url('history')}}">Riwayat Pemesanan</a></li>
          <li><a href="{{ url('check-out') }}"><i class="fa fa-shopping-cart"></i>

            @if (!empty($notif))
                 <span class="badge badge-danger">{{$notif}}</span></a></li>
            @endif

          <li><a href="{{ url('/keluar') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
          <div>
            <h1>Jasa Pemesanan dan Pembelian Obat</h1>
            <p>Aplikasi Sistem Informasi Obatin ditujukan kepada Masyarakat guna memudahkan Masyarakat dalam mencari Apotek dan mencari Obat. Serta untuk Apotek guna memudahkan Apoteker dalam melakukan Pengelolaan Transaksi, Pencatatan Nota.</p>

          </div>
        </div>
        <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
          <img src="{{asset('assets/img/obatin.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= App Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title">
          <h2>Product</h2>
          {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
        </div>
        <div class="container">
            <div class="row">
            @foreach ($obat as $o)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ url('/gambar_obat/'.$o->gambar) }}" style="width: 200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$o->nama_obat}}</h5>
                        <p class="card-text">
                            <strong>Harga : </strong> Rp.{{number_format($o->harga)}} <br>
                            <strong>Stok : </strong> {{$o->stok}} <br>
                            <strong>Keterangan : </strong> {{$o->keterangan}} <br>


                        </p>
                    <a href="{{url('/pesan/')}}/{{($o->id)}}" class="btn btn-danger" ><i class="fa fa-shopping-cart"></i>Pesan</a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

    </div>



        {{-- <div class="row no-gutters"> --}}
          {{-- <div class="col-xl-7 d-flex align-items-stretch order-2 order-lg-1">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up">
                  <i class="bx bx-receipt"></i>
                  <h4>Corporis voluptates sit</h4>
                  <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Ullamco laboris nisi</h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-images"></i>
                  <h4>Labore consequatur</h4>
                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-shield"></i>
                  <h4>Beatae veritatis</h4>
                  <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-atom"></i>
                  <h4>Molestiae dolor</h4>
                  <p>Et fuga et deserunt et enim. Dolorem architecto ratione tensa raptor marte</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                  <i class="bx bx-id-card"></i>
                  <h4>Explicabo consectetur</h4>
                  <p>Est autem dicta beatae suscipit. Sint veritatis et sit quasi ab aut inventore</p>
                </div>
              </div>
            </div>
          </div>
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/features.svg" class="img-fluid" alt="">
          </div> --}}


      </div>
    </section><!-- End App Features Section -->

    <!-- ======= Details Section ======= -->
    <section id="details" class="details">
      <div class="container">



      </div>
    </section><!-- End Details Section -->



    <!-- ======= Testimonials Section ======= -->


    <!-- ======= Pricing Section ======= -->


    <!-- ======= Frequently Asked Questions Section ======= -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">


      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-7">
            {{-- <h4 align="center">Unggah Resep</h4> --}}
           <center><img src="{{asset('assets/img/upload.png')}}" width="200" alt=""></center>
            <form action="{{url('Unggah-resep/store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

            <input type="hidden" name="id_konsumen" value="{{(Auth::guard('konsumen')->user()->id)}}" class="form-control" placeholder="">
                <div class="form-group">

                    <div class="form-group">
                        <b>Unggah Foto Resep</b><br/>
                        <input type="file" name="resep">
                    </div>

                </div>
                <div class="form-group">

                    <input type="text" name="keterangan" class="form-control" placeholder="keterangan">
                    @if($errors->has('keterangan'))
                        <div class="text-danger">
                            {{ $errors->first('keterangan')}}
                        </div>
                    @endif

                </div>

                <button type="submit" class="btn btn-danger mt-3 mb-2">Kirim</button>

            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">


        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Obatin</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/ -->
        Designed by <a href="https://bootstrapmade.com/">Kelompok 1 </a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{asset('assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js') }}"></script>
  @include('sweet::alert')

</body>

</html>
