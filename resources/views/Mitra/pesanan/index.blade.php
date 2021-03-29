<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Pesanan</title>
    <link href="{{asset('assets/img/obatin.png') }}" rel="icon">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('assets/materialize/css/materialize.min.css') }}" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="{{asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{asset('assets/js/morris/morris-0.4.3.min.css') }}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{asset('assets/css/custom-styles.css') }}" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Google Fonts-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href='https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{asset('assets/js/Lightweight-Chart/cssCharts.css') }}">
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<div id="app">
        @yield('content')
    </div>
        <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
             <img class="navbar-brand waves-effect waves-dark" src="{{asset('assets/img/logo.png') }}" alt="">

		<div id="sideNav" href=""></div>
            </div>

            <ul class="nav navbar-top-links navbar-right">


                 <li><a class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user fa-fw"></i>{{ Auth::guard('mitra')->user()->name }}<span class="caret"></span></a>
                 <ul class="dropdown-menu" style="padding: 20px 10px 5px 10px; width:150px;">
                 <li><a href="{{ url('/keluar') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </ul>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="waves-effect waves-dark" href="{{url('/mitra/index') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="" class="waves-effect waves-dark"><i class="fa fa-pills"></i> Produk Obat<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/kategori/tampil') }}">Kategori</a>
                            </li>
                            <li>
                                <a href="{{ url('mitra/obat') }}">Data Obat</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ url('transaksi-pesanan') }}" class="waves-effect waves-dark"><i class="fa fa-shopping-basket"></i> Transaksi</a>
                    </li>
                    <li>
                        <a href="{{ url('upload') }}" class="waves-effect waves-dark"><i class="fas fa-file-invoice"></i>Resep Dokter</a>
                    </li>

                </ul>

            </div>

        </nav>
        <div id="page-wrapper">
		  <div class="header">
                        <h1 class="page-header">
                            Transaksi
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Dashboard</a></li>
					  <li class="active">Data</li>
					</ol>

                    </div>





            <div id="page-inner">

               <div class="row">
                   <div class="col-md-12">
                       <!-- Advanced Tables -->
                       <div class="card">

                           <div class="card-action">
                            <a href="{{url('/bukti-pembayaran')}}" class="btn btn-danger"><i class="fa fa-money-check"> Bukti Pembayaran </i></a>

                           </div>
                           <div class="card-content">
                               <div class="table-responsive">
                               <table id="datatables" class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id Pemesanan</th>
                            {{-- <th>Konsumen</th> --}}
                            <th>Jumlah Harga</th>
                            <th>Metode Pembayaran</th>
                            <th>Alamat</th>
                            <th>Tanggal</th>
                            <th>Status</th>



                            <th><center>Lihat Detail</center> </th>
                            <th><center>Option</center> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesanan as $p)
                            <tr>

                                <td>{{$p->id}}</td>
                                {{-- <td>{{$p->konsumen->name}}</td> --}}
                                <td>{{$p->jumlah_harga}}</td>
                                <td>{{$p->metodepembayaran}}</td>
                                <td>{{$p->alamat}}</td>
                                <td>{{$p->tanggal}}</td>
                                <td>
                                    @if ($p->status==1)
                                    <span class="badge" style="background-color: red">Sudah Pesan & Belum dibayar</span>

                                    @elseif($p->status==2)
                                    <span class="badge" style="background-color: green">Menunggu konfirmasi admin</span>
                                    @elseif($p->status==3)
                                    <span class="badge" style="background-color: blue">Sudah Dibayar Silahkan ambil obat ditoko</span>

                                    @endif
                                </td>
                                <td>
                                     <a href="{{url('/mitra/history/')}}/{{$p->id}}" class="btn btn-danger"><i class="fa fa-info"></i> Detail</a>
                                </td>
                                {{-- <td>{{$pd->jumlah_total}}</td> --}}

                                {{-- <td>
                                    @if ($p->statusPesanan->nama_status=="Pesanan telah Terkirim")
                                    <span class="badge" style="background-color: green">Pesanan telah Terkirim</span>
                                    @elseif($p->statusPesanan->nama_status=="Pesanan Sedang Dikemas")
                                    <span class="badge" style="background-color: red">Pesanan Sedang Dikemas</span>
                                    @elseif($p->statusPesanan->nama_status=="Pesanan Siap Diambil")
                                    <span class="badge" style="background-color: blue">Pesanan Siap Diambil</span>
                                    @elseif($p->statusPesanan->nama_status=="Pesanan telah Selesai")
                                    <span class="badge" style="background-color: orange">Pesanan telah Selesai</span>
                                    @endif
                                </td> --}}


                                {{-- <td>Rp {{ number_format($pd->jumlah_total)}}</td> --}}


                                <td>
                                    <a href="transaksi-pesanan/edit/{{ $p->id }}"class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                                    <a href="transaksi-pesanan/hapus/{{ $p->id }}"class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>

        </div>
    </div>
   </div>


</div>
</div>




        <!--  -->
        <!-- /. NAV SIDE  -->


        <footer>

        <p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p>
        </footer>

            </div>

				<!-- /. ROW  -->

            <!-- /. PAGE INNER  -->
        <!-- </div> -->
        <!-- /. PAGE WRAPPER  -->
    <!-- </div>  -->
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->



    @include('sweet::alert')

    <!-- jQuery Js -->
    <script src="{{asset('assets/js/jquery-1.10.2.js') }}"></script>

	<!-- Bootstrap Js -->
    <script src="{{asset('assets/js/bootstrap.min.js') }}"></script>

	<script src="{{asset('assets/materialize/js/materialize.min.js') }}"></script>

    <!-- Metis Menu Js -->
    <script src="{{asset('assets/js/jquery.metisMenu.js') }}"></script>
    <!-- Morris Chart Js -->
    <script src="{{asset('assets/js/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{asset('assets/js/morris/morris.js') }}"></script>


	<script src="{{asset('assets/js/easypiechart.js') }}"></script>
	<script src="{{asset('assets/js/easypiechart-data.js') }}"></script>

	 <script src="{{asset('assets/js/Lightweight-Chart/jquery.chart.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{asset('assets/js/custom-scripts.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
    <script>
    $(function () {
        $("#datatables").DataTable();
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        });
    });
    </script>
          @include('sweet::alert')
</body>

</html>
