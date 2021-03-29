@extends('Mitra.mitra')
@section('content')

			<div class="dashboard-cards"> 
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image red">
						<i class="material-icons dp48">import_export</i>
						</div>
						<div class="card-stacked red">
						<div class="card-content">
						<h3>{{ $obat->count() }}</h3> 
						</div>
						<div class="card-action">
						<!-- <strong>REVENUE</strong> -->
						</div>
						</div>
						</div>
	 
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image orange">
						<i class="material-icons dp48">shopping_cart</i>
						</div>
						<div class="card-stacked orange">
						<div class="card-content">
						<!-- <h3>36,540</h3>  -->
						</div>
						<div class="card-action">
						<!-- <strong>SALES</strong> -->
						</div>
						</div>
						</div> 
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
							<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image blue">
						<i class="material-icons dp48">equalizer</i>
						</div>
						<div class="card-stacked blue">
						<div class="card-content">
						<!-- <h3>24,225</h3>  -->
						</div>
						<div class="card-action">
						<!-- <strong>PRODUCTS</strong> -->
						</div>
						</div>
						</div> 
						 
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
					<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image green">
						<i class="material-icons dp48">supervisor_account</i>
						</div>
						<div class="card-stacked green">
						<div class="card-content">
						<!-- <h3>88,658</h3>  -->
						</div>
						<div class="card-action">
						<!-- <strong>VISITS</strong> -->
						</div>
						</div>
						</div> 
						 
                    </div>
                </div>
			   </div>

@endsection
