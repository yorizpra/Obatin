<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profil Mitra</title>
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
          <li><a href="#faq">Informtion</a></li>
          {{-- <li><a href="#contact">Contact Us</a></li> --}}

          <li class="get-started"><a href="{{ url('/masuk') }}" class="nav-item nav-link ">Masuk</a></li>
          <li class="get-started"><a href="{{ url('/register') }}" class="nav-item nav-link ">Daftar</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->



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
    <section id="#faq" class="testimonials section-bg">
      <div class="container">

        {{-- <div class="section-title">
          <h2></h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div> --}}

        <div class="owl-carousel testimonials-carousel" data-aos="fade-up">

          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/rahmayani.png" class="testimonial-img" alt="">
              <h3>Apotek Rahmayani</h3>
              <h4>Kategori : Fasilitas Kesehatan, Apotek / Apotik</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Lohbener, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat
                Indramayu, Jawa Barat, Indonesia 45252
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/leuwigede.jpeg" class="testimonial-img" alt="">
              <h3>Apotek Leuwigede </h3>
              <h4>Kategori: Fasilitas Kesehatan, Apotek / Apotik</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Leuwigede, Kec. Widasari, Kabupaten Indramayu, Jawa Barat
                Indramayu, Jawa Barat, Indonesia 45271
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

          {{-- <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/Aldini.jpg" class="testimonial-img" alt="">
              <h3>Aldini Eka Putri</h3>
              <h4>WEB Programmer</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

           <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/Arief.jpg" class="testimonial-img" alt="">
              <h3>M. Arief Rizaldy</h3>
              <h4>Mobile Programmer</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div> --}}

          {{-- <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div> --}}

        </div>

      </div>
    </section><!-- End Testimonials Section -->

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
