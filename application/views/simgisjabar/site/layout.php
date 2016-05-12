<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">-->
    <meta name="product" content="Metro UI CSS Framework">
    <meta name="description" content="Simple responsive css framework">
    <meta name="author" content="Sergey S. Pimenov, Ukraine, Kiev">
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/login/images/logo.png">

    <link href="<?=base_url().'assets/'?>css/metro-bootstrap.css" rel="stylesheet">
    <link href="<?=base_url().'assets/'?>css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="<?=base_url().'assets/'?>css/docs.css" rel="stylesheet">
    <link href="<?=base_url().'assets/'?>js/prettify/prettify.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="<?=base_url().'assets/'?>js/jquery/jquery.min.js"></script>
    <script src="<?=base_url().'assets/'?>js/jquery/jquery.widget.min.js"></script>
    <script src="<?=base_url().'assets/'?>js/jquery/jquery.mousewheel.js"></script>
    <script src="<?=base_url().'assets/'?>js/prettify/prettify.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script>var base_url = "<?=base_url();?>";</script>
    <script src="<?=base_url().'assets/'?>js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="<?=base_url().'assets/'?>js/docs.js"></script>
    <script src="<?=base_url().'assets/'?>js/github.info.js"></script>
	<script src="<?=base_url().'assets/'?>js/map/GeoJSON.js" type="text/javascript"></script>

    <title>SIMGIS JABAR | Sistem Informasi Geografis Pertanian Propinsi Jawa Barat</title>
	
	<?php  
		$BandungProv = file_get_contents(base_url()."assets/peta/map.geojson");
		$BandungDistrik = file_get_contents(base_url()."assets/peta/map.geojson");  
	?>
	<script type="text/javascript">
		BandungProv = <?php  $BandungProv=str_replace(array("\r", "\n"), '', $BandungProv); echo($BandungProv); ?>;
		BandungDistrik = <?php  $BandungDistrik=str_replace(array("\r", "\n"), '', $BandungDistrik); echo($BandungDistrik); ?>;
	</script>
</head>
<body class="metro">
	<!-- Keperluan Map -->
	<script type="text/javascript">
		// var lat = -7.0909;
		// var lon = 107.6689;
		var lat = -6.9273;
		var lon = 107.6049;
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<script src="<?=base_url().'assets/'?>js/map/maps.js" type="text/javascript"></script>
	<script src="<?=base_url().'assets/'?>js/map/script.js" type="text/javascript"></script>
	<script src="<?=base_url().'assets/'?>js/map/highcharts/highcharts.js"></script>
	<script src="<?=base_url().'assets/'?>js/map/highcharts/modules/data.js"></script>
	<script src="<?=base_url().'assets/'?>js/map/highcharts/modules/drilldown.js"></script>
	<script src="<?=base_url().'assets/'?>js/map/datatable.js"></script>
    <script>
    	window.onload = function() {
		    if (window.google) {  
		        // GMaps Loaded  
		        //alert("Yeah!");
		    } else {
		        // GMaps not loaded
		        //alert("Doesn't Work");
				 $.Notify({
					caption: "Warning",
					content: "Google Map Tidak Dapat Dimuat<br/>Mohon Cek Koneksi Anda",
					style:{background: 'red', color: 'white'}
				});
		    }
		}
    </script>
	
	<header class="bg-dark" data-load="<?=base_url().'index.php/site/'?>layout_header"></header>
	<div id="pencarian" class="sidebar-container">
		<nav class="sidebar light">
			<ul>
				<li class="title">Filter Aset</li>
				<li>
				<div style='overflow: hidden;'>
				<div class="input-control select">
					<select id="filter_golongan">
						<option value="nol">-- Golongan Aset  --</option>
						<option value="01"> Pertanian </option>
						<option value="02"> Perikanan </option>
						<option value="03"> Peternakan </option>
						<option value="04"> Perkebunan </option>
					</select>
				</div>
				<div id="filter_bid_cont" class="input-control select">
					<select id="filter_bid" onchange="getFilKelompok()">
						<option value="nol">-- Bidang Aset  --</option>
					</select>
				</div>
<!-- 				<div id="filter_kel_cont" class="input-control select">
					<select id="filter_kel">
						<option value="nol">-- Kelompok Aset  --</option>
					</select>
				</div> -->
<!-- 				<div id="filter_sub_cont" class="input-control select">
					<select id="filter_sub">
						<option value="nol">-- Sub-Kelompok Aset  --</option>
					</select>
				</div> -->
<!-- 				<div id="filter_brg_cont" class="input-control select">
					<select id="filter_brg">
						<option value="nol">-- Barang Aset  --</option>
					</select>
				</div> -->
<!-- 				<div class="input-control text" data-role="input-control">
					<input id="filter_reg" type="text" placeholder="No. Reg Aset">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div> -->
				<button class="search-btn" onclick="getFilter()"><i class="icon-search on-left"></i>Cari</button>
				</div>
				</li>
				<li class="title">Hasil Pencarian</li>
				<li class="result">
				<div id="search_result">
				</div>
				</li>
			</ul>
		</nav>
	</div>
	<div id="pencarianUnit" class="sidebar-container">
		<nav class="sidebar light">
			<ul>
				<li class="title">Filter Unit SKPD</li>
				<li>
				<div style='overflow: hidden;'>
				<div class="input-control text" data-role="input-control">
					<input id="filter_skpd" type="text" placeholder="Kode/Nama SKPD">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div>
				<button class="search-btn" onclick="getUnitFilter()"><i class="icon-search on-left"></i>Cari</button>
				</div>
				</li>
				<li class="title">Hasil Pencarian</li>
				<li class="result" style="max-height: 370px !important;">
				<div id="search_result2">
				</div>
				</li>
			</ul>
		</nav>
	</div>
	<!-- mengambil dari table mbidangs-->
	<div id="tematik" class="sidebar-container">
		<nav class="sidebar light">
			<ul>
				<li class="title">Kelompok Aset</li>
				<li class="stick bg-green">
					<a class="dropdown-toggle bg-hover-green" href="#"><i class="icon-layers"></i>Pertanian</a>
					<ul class="dropdown-menu" data-role="dropdown">
						<?php foreach($bidang[1]->result() as $bid){?>
							<li><a href="#" onclick="ShowTematik(1,'<?php echo $bid->bidang?>')"><?php echo $bid->nm_bidang;?></a></li>
						<?}?>
					</ul>
				</li>
				<li class="stick bg-blue">
					<a class="dropdown-toggle" href="#"><i class="icon-air"></i>Perikanan</a>
					<ul class="dropdown-menu" data-role="dropdown">
						<?php foreach($bidang[2]->result() as $bid){?>
							<li><a href="#" onclick="ShowUnits(1,'<?php echo $bid->bidang?>')"><?php echo $bid->nm_bidang;?></a></li>
						<?}?>
					</ul>
				</li>
				<li class="stick bg-orange">
					<a class="dropdown-toggle bg-hover-orange" href="#"><i class="icon-home"></i>Peternakan</a>
					<ul class="dropdown-menu" data-role="dropdown">
						<?php foreach($bidang[3]->result() as $bid){?>
							<li><a href="#" onclick="ShowTematik(1,'<?php echo $bid->bidang?>')"><?php echo $bid->nm_bidang;?></a></li>
						<?}?>
					</ul>
				</li>
				<li class="stick bg-yellow">
					<a class="dropdown-toggle bg-hover-yellow" href="#"><i class="icon-dashboard"></i>Perkebunan</a>
					<ul class="dropdown-menu" data-role="dropdown">
						<?php foreach($bidang[4]->result() as $bid){?>
							<li><a href="#"><?php echo $bid->nm_bidang;?></a></li>
						<?}?>
					</ul>
				</li>
<!-- 				<li class="stick bg-amber">
					<a class="dropdown-toggle bg-hover-amber" href="#"><i class="icon-stats"></i>Aset Tetap Lainnya</a>
					<ul class="dropdown-menu" data-role="dropdown">
						<?php foreach($bidang[5]->result() as $bid){?>
							<li><a href="#"><?php echo $bid->nm_bidang;?></a></li>
						<?}?>
					</ul>
				</li>
				<li class="stick bg-red">
					<a class="dropdown-toggle bg-hover-orange" href="#"><i class="icon-cone"></i>Konstruksi Dalam Pengerjaan</a>
					<ul class="dropdown-menu" data-role="dropdown">
						<?php foreach($bidang[6]->result() as $bid){?>
							<li><a href="#"><?php echo $bid->nm_bidang;?></a></li>
						<?}?>
					</ul>
				</li> -->
			</ul>
		</nav>
	</div>
	<div id="grafik" class="detail-sides">
		
<table>
		<tr>
			<td>dddddddddddddddddddddddddddd</td>
		</tr>
		<tr>
			<td>dddddddddddddddddddddddddddd</td>
		</tr>
				<tr>
			<td>dddddddddddddddddddddddddddd</td>
		</tr>
				<tr>
			<td>dddddddddddddddddddddddddddd</td>
		</tr>
				<tr>
			<td>dddddddddddddddddddddddddddd</td>
		</tr>
				<tr>
			<td>dddddddddddddddddddddddddddd</td>
		</tr>
</table>


	</div>
	<div id="detail1" class="detail-sides">
	</div>
	<div class="fluid-sides">
	<nav id="legends">
		<ul class="side-menu">
			<li class="title">Keterangan</li>
			<li><a href="#"><img src="<?=base_url().'assets/'?>markers/010101.png" style="width:16px;height:16px;margin-right:5px">Pertanian</a></li>
			<li><a href="#"><img src="<?=base_url().'assets/'?>markers/010102.png" style="width:16px;height:16px;margin-right:5px">Perikanan</a></li>
			<li><a href="#"><img src="<?=base_url().'assets/'?>markers/010104.png" style="width:16px;height:16px;margin-right:5px">Peternakan</a></li>
			<li><a href="#"><img src="<?=base_url().'assets/'?>markers/010103.png" style="width:16px;height:16px;margin-right:5px">Perkebunan</a></li>

		</ul>
	</nav>
	</div>
	<a href="#" id="fluid-button" class="fluid-button"><i class="icon-compass-3"></i></a>
	<!--<div id="sub-head"></div>-->
	<div id="map-area">
	</div>
</body>
</html>