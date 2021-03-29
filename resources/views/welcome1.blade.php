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
          <li class="active"><a href="{{url('/')}}">Home</a></li>
          {{-- <li><a href="#features">App Features</a></li>
          <li><a href="#gallery">Gallery</a></li> --}}
          {{-- <li><a href="#pricing">Home</a></li> --}}
          <li><a href="{{url('/profil')}}">Information</a></li>
          {{-- <li><a href="#contact">Contact Us</a></li> --}}

          <li class="get-started"><a href="{{ url('/masuk') }}" class="nav-item nav-link ">Masuk</a></li>
          <li class="get-started"><a href="{{ url('/register') }}" class="nav-item nav-link ">Daftar Konsumen</a></li>
          <li class="get-started"><a href="{{ url('/mitra/register') }}" class="nav-item nav-link ">Daftar Mitra</a></li>

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
            <br>

        </div>
        {{ $obat->links() }}
    </div>




    </section><!-- End App Features Section -->

    <!-- ======= Details Section ======= -->
  <!-- End Details Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        {{-- <div class="section-title">
          <h2>Gallery</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div> --}}

        {{-- <div class="owl-carousel gallery-carousel" data-aos="fade-up">
          <a href="assets/img/gallery/gallery-1.png" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/gallery-1.png" alt=""></a>
          <a href="assets/img/gallery/gallery-2.png" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/gallery-2.png" alt=""></a>
          <a href="assets/img/gallery/gallery-3.png" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/gallery-3.png" alt=""></a>
          <a href="assets/img/gallery/gallery-4.png" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/gallery-4.png" alt=""></a>
          <a href="assets/img/gallery/gallery-5.png" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/gallery-5.png" alt=""></a>
          <a href="assets/img/gallery/gallery-6.png" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/gallery-6.png" alt=""></a>
          <a href="assets/img/gallery/gallery-7.png" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/gallery-7.png" alt=""></a>
          <a href="assets/img/gallery/gallery-8.png" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/gallery-8.png" alt=""></a>
          <a href="assets/img/gallery/gallery-9.png" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/gallery-9.png" alt=""></a>
          <a href="assets/img/gallery/gallery-10.png" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/gallery-10.png" alt=""></a>
          <a href="assets/img/gallery/gallery-11.png" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/gallery-11.png" alt=""></a>
          <a href="assets/img/gallery/gallery-12.png" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/gallery-12.png" alt=""></a>
        </div> --}}

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Testimonials Section ======= -->


    <!-- ======= Pricing Section ======= -->






  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter" data-aos="fade-up">

    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">


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
