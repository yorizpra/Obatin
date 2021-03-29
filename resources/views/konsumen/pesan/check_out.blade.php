<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Keranjang Obat</title>
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>

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
       $notif = \App\DetailPesanan::where('id_pemesanan', $pesanan->id)->count();



    }
    ?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top  header-transparent ">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <img class="navbar-brand waves-effect waves-dark" src="{{asset('assets/img/logo1.png') }}" width="250px" alt="">


      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
            <li ><a href="{{url('/resep')}}">Unggahan Resep</a></li>

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
                      <li class="breadcrumb-item">Check Out</li>

                    </ol>
                  </nav>
            </div>

    <div class="col-md-12 mt-3">
       <div class="card">
           <div class="card-body">
               <div class="row">
                   <div class="col-md-8">

                       <h4><i class="fa fa-shopping-cart"></i>Check Out</h4>
                       @if(!empty($pesanan))
                       <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat </th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$pesanan_detail->obatku->nama_obat}}</td>
                                <td>{{$pesanan_detail->jumlah}} /pak</td>
                                <td align="left">Rp.{{number_format($pesanan_detail->obatku->harga)}}</td>
                                <td align="left">Rp.{{number_format($pesanan_detail->jumlah_total)}}</td>
                                <td>
                                    <form action="{{url('/check-out/')}}/{{$pesanan_detail->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="Apakah Andah Yakin Ingin Menghapus ?"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                                <tr>
                                    <td colspan="4" align="right"> <strong>Total Harga</strong>
                                        <td>Rp. {{ number_format($pesanan->jumlah_harga)}}</td>
                                    </td>
                                    {{-- <td>
                                        <a href="{{url('konfirmasi-check-out')}}" class="btn btn-success"><i class="fa fa-shopping-cart">Check Out</i></a>
                                    </td> --}}
                                </tr>
                        </tbody>
                    </table>

                       {{-- <img src="{{ url('/gambar_obat/'.$obat->gambar) }}" style="width: 200px" class="card-img-top" alt="..."> --}}
                   </div>

                   <div class="col-md-4">
                    <h4>Metode Pembayaran</h4>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>
                                <form action="{{ url('/konfirmasi-check-out/')}}/{{$pesanan->id}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                        <input type="text" name="id_konsumen" class="form-control" value="{{(Auth::guard('konsumen')->user()->name)}}">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="alamat" id="" cols="30" class="form-control" rows="10" placeholder="alamat"></textarea>
                                            </div>
                                        <select name="metodepembayaran" class="form-control">
                                         <option value="Transfer">Transfer</option>
                                         <option value="Cash On Dilevery">Cash On Dilevery</option>
                                        </select>

                                        <button type="submit" class="btn btn-danger mt-3"><i class="fa fa-shopping-cart"></i>Check Out</button>

                                </form>
                                </td>
                            </tr>
                        </thead>

                    </table>
                    @endif
                 </div>
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

    {{-- <div class="footer-newsletter" data-aos="fade-up">
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
    </div> --}}

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
  <script src="{{asset('ssets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  @include('sweet::alert')
</body>

</html>
