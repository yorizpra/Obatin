<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah pemesanan</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('assets/materialize/css/materialize.min.css') }}" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="{{asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{asset('assets/js/morris/morris-0.4.3.min.css') }}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{asset('assets/css/custom-styles.css') }}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{asset('assets/js/Lightweight-Chart/cssCharts.css') }}">
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
</head>

<body>

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
                            Dashboard
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Dashboard</a></li>
					  <li class="active">Data</li>
					</ol>


                    <div id="page-inner">

               <div class="row">
                   <div class="col-md-9">
                       <!-- Advanced Tables -->
                       <div class="card">
                           <div class="card-action">
                                {{$errors}}
                                <form role="form" method="post" action="{{ url('Transaksi-pesanan/store') }}">


                                @csrf
                                <div class="box-body">

                                <div class="form-group">

                                        <input type="text" name="nama_konsumen" class="form-control" placeholder="Nama Kategori Obat" >
                                        @if($errors->has('nama_konsumen'))
                                            <div class="text-danger">
                                                {{ $errors->first('nama_konsumen')}}
                                            </div>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label for="nama_obat">Nama Obat</label>
                                            <select name="nama_obat" class="form-control">
                                                <option value="">Pilih</option>
                                                    @foreach ($obat as $o)
                                                 <option value="{{ $o->id }}" >{{ $o->nama_obat }}</option>
                                                    @endforeach
                                            </select>
                                    </div>

                                    <div class="form-group">

                                        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" >
                                        @if($errors->has('jumlah'))
                                            <div class="text-danger">
                                                {{ $errors->first('jumlah')}}
                                            </div>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label for="StatusPesanan">Status Pesanan</label>
                                            <select name="StatusPesanan" class="form-control">
                                                <option value="">Pilih</option>
                                                    @foreach ($status as $st)
                                                 <option value="{{ $st->id }}" >{{ $st->nama_status }}</option>
                                                    @endforeach
                                            </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="StatusPembayaran">Status Pembayaran</label>
                                            <select name="StatusPembayaran" class="form-control">
                                                <option value="">Pilih</option>
                                                    @foreach ($status_bayar as $sb)
                                                 <option value="{{ $sb->id }}" >{{ $sb->nama_status }}</option>
                                                    @endforeach
                                            </select>
                                    </div> --}}

                            </div>
                            </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>

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



				<!-- /. ROW  -->

            <!-- /. PAGE INNER  -->
        <!-- </div> -->
        <!-- /. PAGE WRAPPER  -->
    <!-- </div>  -->
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
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


</body>

</html>
