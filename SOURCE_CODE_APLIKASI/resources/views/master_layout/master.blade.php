<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Anton|Bangers|Monoton|PT+Sans|Righteous|Shadows+Into+Light|Shrikhand|Spirax" rel="stylesheet">
	<style>
		body{
		font-family: arial;
		}
		footer{
			font-family: arial;
		}
		@media print{
			footer{
				display: none;
			}
			navbar{
				display: none;
			}
			#tgl{
				display: none;
			}
		}
	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a href="{{ url('/home') }}" class="navbar-brand d-flex align-items-center" style="font-weight: 700; font-size: 1.25rem;">
		<img src="{{ asset('logo.png') }}" alt="Logo" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover; margin-right: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
		<span>LaraParkir</span>
	</a>

	<div class="collapse navbar-collapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a href="{{ url('/home') }}" class="nav-link">Dashboard <span class="sr-only"></span></a>
			</li>
			@if (Auth::user()->level == "User")
			<li class="nav-item">
				<a href="{{ url('/transaksi/kendaraan_masuk') }}" class="nav-link" role="button">Input Parkir</a>
			</li>
			@endif
			@if (Auth::user()->level == "Admin")
			<li class="nav-item dropdown">
			<a href="#" class="nav-link dropdown-toggle" id="laporan" data-toggle="dropdown" role="button">Laporan
			</a>
			<div class="dropdown-menu">
				<a href="{{ url('/laporan/LaporanParkiranKeluar') }}" class="dropdown-item">Laporan Parkir</a>
				<a href="{{ url('/laporan/LaporanParkiranTanggal') }}" class="dropdown-item">Laporan Parkir Per-Tanggal</a>
			</div>
			
			</li>
			<li class="nav-item">
				<a href="{{ url('/pegawai/DataPegawai') }}" class="nav-link">Data Pegawai <span class="fa fa-user"></span></a>
			</li>
			<li class="nav-item">
				<a href="{{ url('/tarif/TarifParkir') }}" class="nav-link">Kelola Tarif <span class="fa fa-money"></span></a>
			</li>
			@endif
		</ul>
		<a href="" class="nav-link" style="color:white;margin-right:1%">{{ Auth::user()->nama_user }} ({{ Auth::user()->level }})</a>
		<form action="{{ route('logout') }}" method="post">
				{{ csrf_field() }}
			<button type="submit" class="btn btn-outline-danger">Logout <span class=""></span></button>
		</form>
	</div>
</nav>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			@yield('content')
		</div>
	</div>
</div>

<footer class="text-center py-3 mt-4" style="font-size: 12px; color: #64748b; font-family: sans-serif; border-top: 1px solid #e2e8f0;">
	Didukung oleh <a href="https://fokuskonten.my.id" target="_blank" style="color: #2563eb; font-weight: 600; text-decoration: none;">FokusKonten</a> &bull; Solusi Aset Digital Terpercaya
</footer>


<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script src="{{  asset('js/jquery.dataTables.min.js')}}"></script>	
<script src="{{  asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
	$('#jenis_kendaraan').on('change',function(e){
		var jenis = $('#jenis_kendaraan').val();
		$.ajax({
			type : 'get',
			url : '{!! URL::to('/transaksi/find_tarif') !!}',
			data : {'jenis_kendaraan':jenis},
			dataType : 'json',
			success : function(data){
				$('#tarifs').val(data.tarif);
			},
			error:function(){

			}
		});
	});

	$('#bayar').keyup(function(){
		var bayar = $('#bayar').val();
		var total = $('#total').val()
		var kembali = bayar - total;
		$('#kembalian').val(kembali);
	});
	
    $('#example').DataTable();

	// $('#selesai').click(function(){
	// 	var bayar = $('#bayar').val();
	// 	var total = $('#total').val(); 
	// 	var id = $('#id').val();
	// 	if (bayar < total) {
	// 		alert('Uang Bayar Kurang!');document.location.href='/ParkirSelesai/'.id;
	// 	}
	// });
</script>	
</body>
</html>