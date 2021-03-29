
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register | Obatin</title>
    <link href="{{asset('assets/img/obatin.png') }}" rel="icon">

    <!-- Icons font CSS-->
    <link href={{ asset ('login/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset ('login/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset ('login/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Main CSS-->
    <link href="{{ asset ('login/css/main.css') }}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-50 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class= "card card-2"img src="obatin.jpeg"></div>
                <div class="card-body">
                    <h2 class="title">Register Obatin Mitra</h2>
					@if(Session::has('alert'))
                <div class="alert alert-danger" align="center">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
                    <form method="post"class="login100-form validate-form" action={{ url('/mitra/add') }} method="post">
					{{ @csrf_field() }}
                        <div class="input-group" >
						<input  class="input--style-2" type="text" name="name" placeholder="masukan nama" required>
                        </div>
                        <div class="input-group" >
						<input  class="input--style-2" type="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                <input class="input--style-2"type="password" name="password" placeholder="Enter password" required>

                                </div>
                            </div>
                        </div>
                            <div class="input-group" >
                                <input  class="input--style-2" type="text" name="alamat" placeholder="masukan alamat" required>
                            </div>
                            <div class="input-group" >
                                <input  class="input--style-2" type="date" name="tanggal_lahir" required>
                            </div>
                            <div class="input-group" >
                                <input  class="input--style-2" type="text" name="noHp" placeholder="Nomer HP" required>
                            </div>
                            {{-- <div class="input-group" >
                                <input  class="input--style-2" type="text" name="no_rekening" placeholder="Nomer Rekening" required>
                            </div> --}}

                        {{-- <div class="p-t-10">
                            <button class="btn btn--radius btn--green" align="center" type="submit">Daftar</button>
                        </div> --}}
                        <div class="form-group">
                            <input type="submit" class="btn btn--radius btn--green" value="Daftar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ asset ('login/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset ('login/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset ('login/vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset ('login/vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset ('login/js/global.js') }}"></script>
    @include('sweet::alert')

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
