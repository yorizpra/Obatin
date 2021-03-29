<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$obat->nama_obat}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/obatin.png') }}" rel="icon">

  <link href="{{asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link href="{{asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/icofont/icofont.min.css" rel=') }}"stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet" />
  <link href="{{asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css') }}" rel="stylesheet">

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
    $notif = \App\Detailpesanan::where('id_pemesanan', $pesanan->id)->count();



 }
 ?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top  header-transparent ">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <img class="navbar-brand waves-effect waves-dark" src="{{asset('assets/img/logo1.png') }}" width="250px" alt="">

        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>

          {{-- <li><a href="#features">App Features</a></li>
          <li><a href="#gallery">Gallery</a></li> --}}
          {{-- <li><a href="#pricing">Home</a></li> --}}
          <li><a href="{{url('/resep')}}">Unggahan Resep</a></li>

          <li><a href="{{url('history')}}">Riwayat Pemesanan</a></li>
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
  {{-- <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
          <div>
            <h1>Jasa Pemesanan dan Pembelian Obat</h1>

          </div>
        </div>
        <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
          <img src="assets/img/obatin.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero --> --}}

  <main id="main">

    <!-- ======= App Features Section ======= -->
      <section id="features" class="features">
      <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
            <a href="{{url('/konsumen/index')}}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12 mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/konsumen/index')}}">Home</a></li>
                      <li class="breadcrumb-item">{{$obat->nama_obat}}</li>

                    </ol>
                  </nav>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ url('/gambar_obat/'.$obat->gambar) }}" style="width: 350px" class="card-img-top" alt="...">
                            </div>
                            <div class="col-md-7">
                                <h3>{{$obat->nama_obat}}</h3>
                                <table class="table ">
                                    <thead>

                                            <tr>
                                                <td> <strong>Harga</strong></td>
                                                <td>:</td>
                                                <td>RP. {{number_format($obat->harga)}}</td>
                                            </tr>
                                            <tr>
                                                <td> <strong>Deskripsi</strong> </td>
                                                <td>:</td>
                                                <td>{{$obat->deskripsi_obat}}</td>
                                            </tr>
                                            <tr>
                                                <td> <strong>Stok</strong> </td>
                                                <td>:</td>
                                                <td>{{$obat->stok}}</td>
                                            </tr>
                                            <tr>
                                                <td> <strong>Keterangan</strong> </td>
                                                <td>:</td>
                                                <td>{{$obat->keterangan}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Indikasi</strong></td>
                                                <td>:</td>
                                                <td>{{$obat->indikasi}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Komposisi</strong></td>
                                                <td>:</td>
                                                <td>{{$obat->komposisi}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Dosis</strong></td>
                                                <td>:</td>
                                                <td>{{$obat->dosis}}</td>
                                            </tr>

                                            <tr>
                                                <td><strong>Jumlah Pesanan</strong></td>
                                                <td>:</td>
                                                <td>
                                                    <form action="{{ url('/pesan-checkout/')}}/{{$obat->id}}" method="post">
                                                        @csrf
                                                    <input type="number" name="jumlah_pesan" class="form-control" required >
                                                    <button type="submit" class="btn btn-danger mt-3"><i class="fa fa-shopping-cart"></i> Masukan Ke Keranjang</button>
                                                </form>
                                                </td>
                                            </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                    {{-- <button type="submit" class="btn btn-danger"><i class="fa fa-shopping-cart"></i> Masukan Ke Keranjang</button> --}}
                                                    </td>
                                                </tr>


                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



      </div>
    </section><!-- End App Features Section -->

    <!-- ======= Details Section ======= -->

    <!-- ======= Gallery Section ======= -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter" data-aos="fade-up">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Kritik Dan saran</h4>
            <p>Kritik dan Saran mengenai Aplikasi Obatin</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Send">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">
{{--
          <div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up">
            <h3>Appland</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="100">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="300">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div> --}}

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
  <script src="{{asset('ssets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @include('sweet::alert')
</body>

</html>
