<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title><?php echo $judul; ?></title>
	<link rel="stylesheet" href="<?php echo base_url()?>css/css_other/style.css" type="text/css" media="all" />
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="#">Tabel Penjualan</a></h1>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
				<li><a href="<?php echo base_url()?>index.php/c_penjualan"><span>Input Penjualan</span></a></li>
			    <li><a href="<?php echo base_url()?>index.php/c_penjualan/tabel"  class="active"><span>Tabel Penjualan</span></a></li>
				<li><a href="<?php echo base_url()?>index.php/c_file"><span>File</span></a></li>
				<li><a href="<?php echo base_url()?>index.php/c_pegawai"><span>Lihat Gaji Pegawai</span></a></li>
				<li><a href="<?php echo base_url()?>index.php/c_mahasiswa"><span>IP Mahasiswa</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="<?php echo base_url()?>index.php/c_penjualan"><span>Input Penjualan</span></a>
			<span>&gt;</span>
			Tabel Penjualan
		</div>
		
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Tabel</h2>
					</div>
					<!-- End Box Head -->	
					<!-- Table -->
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>ID SALES</th>
								<th>TOTAL</th>
								<th>BONUS</th>
							</tr>
							<?php 
							$index = 0;
							$total_penjualan[$index] = 0;
							$bonus[$index] = 0;
							foreach($sales as $row){
								foreach($penjualan as $rows){
									if($row->ID_SALES == $rows->ID_SALES){
										$total_penjualan[$index] = $total_penjualan[$index] + $rows->JUMLAH;
									}
								} 
								if($total_penjualan[$index] < 10000000){
									$bonus[$index] = 0.05 * $total_penjualan[$index]; //bonus 5%
								} else if($total_penjualan[$index] >= 10000000){
									$bonus[$index] = 0.085 * $total_penjualan[$index]; //bonus 8.5%
								}
								?>
							<tr>
								<td><h3><?php echo $row->ID_SALES; ?></a></h3></td>
								<td><?php echo $total_penjualan[$index]; ?></td>
								<td><?php echo $bonus[$index]; ?></td>
							</tr>
							<?php
							$total_penjualan[$index] = 0;
							$index++;
							}
							?>
						</table>
						
					</div>
					<!-- Table -->
					
				</div>
				<!-- End Box -->
			</div>
			<!-- End Content -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; 2010 - CompanyName</span>
		<span class="right">
			Design by <a href="http://chocotemplates.com" target="_blank" title="The Sweetest CSS Templates WorldWide">Chocotemplates.com</a>
		</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>