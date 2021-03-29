<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Print Struct</title>
	<link rel="stylesheet" href="{/buatprint/css/app.css}">
</head>
<body>
	<div class="col-12 mt-3">
		<div class="card">
            <img src="assets/img/logo1.png" width="200px" alt="">
            <h3>Apotek Rahmayani</h3>
			<h5>Jalan Raya Lohbener Lama No.08</h5>
			<table class="table">
				<tr>
					<td>Nama Pelanggan</td>
					<td>:</td>
					<td>{{ Auth::guard('konsumen')->user()->name }}</td>
				</tr>
				<tr>
					<td>No Transaksi</td>
					<td>:</td>
					<td>{{ $pesanan->id }}</td>
				</tr>
				<tr>
					<td>Tanggal Pembelian</td>
					<td>:</td>
					<td>{{ $pesanan->tanggal }}</td>
				</tr>
				{{-- <tr>
					<td>Nama Pembeli</td>
					<td>:</td>
					<td>{{ $transaksi_barang->nama_pembeli }}</td>
				</tr> --}}
			</table>
			<h5>-------------------------------------------------------------------------------------------------------------------------------</h5>
			<div>
			  <table>
				<thead>
						<tr>
							<td>No          |</td>
							<td>Nama Obat	|</td>
							<td>Jumlah Beli	|</td>
							<td>Harga	    |</td>
							<td>Jumlah Harga|</td>
						</tr>
					</thead>
					<tbody>
						@foreach($pesanan_detail as $key => $pd)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$pd->obatku->nama_obat}}</td>
                                <td>{{$pd->jumlah}} /pak</td>
                                <td align="left">Rp.{{number_format($pd->obatku->harga)}}</td>
                                <td align="left">Rp.{{number_format($pd->jumlah_total)}}</td>
							</tr>
						@endforeach
						<tr>
							<td colspan="3"></td>
							<td style="font-size: 14px;"><strong><p>Total Harga</p></strong></td>
                            <td style="font-size: 14px;">Rp. {{number_format($pesanan->jumlah_harga+$pesanan->kode)}}</td>

						{{-- <tr>
							<td colspan="3"></td>
							<td style="font-size: 14px;"><strong>Uang Bayar</strong></td>
							<td style="font-size: 14px;"><strong>@currency($->uang_bayar)</strong></td>
						</tr>
						<tr>
							<td colspan="3"></td>
							<td style="font-size: 14px;"><strong>Kembali</strong></td>
							<td style="font-size: 14px;"><strong>@currency($transaksi_barang->uang_bayar - $transaksi_barang->jumlah_harga)</strong></td>
						</tr> --}}
					</tbody>
				</table>
			<h5>-------------------------------------------------------------------------------------------------------------------------------</h5>
            <table>
				<h4 >Terima Kasih :)</h4>
			</table>


			</div>
		</div>
	</div>
	<script src="/buatprint/js/app.js"></script>
</body>
</html>
