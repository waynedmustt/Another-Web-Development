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
			<h1><a href="#">IP Mahasiswa</a></h1>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
				<li><a href="<?php echo base_url()?>index.php/c_penjualan"><span>Input Penjualan</span></a></li>
			    <li><a href="<?php echo base_url()?>index.php/c_penjualan/tabel"><span>Tabel Penjualan</span></a></li>
				<li><a href="<?php echo base_url()?>index.php/c_file"><span>File</span></a></li>
				<li><a href="<?php echo base_url()?>index.php/c_pegawai"><span>Lihat Gaji Pegawai</span></a></li>
				<li><a href="<?php echo base_url()?>index.php/c_mahasiswa" class="active"><span>IP Mahasiswa</span></a></li>
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
			IP Mahasiswa
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
								<th>NIM</th>
								<th>NAMA</th>
								<th>IP</th>
							</tr>
							<?php 
							if ( ! isset($parts[1])) {
							   $parts[1] = null;
							}
							$index = 0;
							$total_nilai[$index] = 0;
							$IP[$index] = 0;
							$indeks[$index] = 0;
							$id_matkul[$index] = 0;
							$nim[$index] = 0;
							$total_sks = 0;
							
							//menghitung total sks
							foreach($matkul as $rows){
								$total_sks = $total_sks + $rows->SKS;
							}
							
							//menghitung IP
							foreach($mhs as $baris_mhs){
								foreach($matkul as $baris_mata_kuliah){
									foreach($nilai as $baris_nilai){
										if($baris_mhs->NIM == $baris_nilai->NIM){ //untuk menentukan SKS per matkul
											$id_matkul[$index] = $baris_nilai->ID_MATKUL;
											
											//menentukan nilai int setiap indeks
											if($baris_nilai->INDEKS == 'A'){
												$indeks[$index] = 4;
											} else if($baris_nilai->INDEKS == 'AB'){
												$indeks[$index] = 3.5;
											} else if($baris_nilai->INDEKS == 'B'){
												$indeks[$index] = 3;
											} else if($baris_nilai->INDEKS == 'C'){
												$indeks[$index] = 2;
											} else if($baris_nilai->INDEKS == 'D'){
												$indeks[$index] = 1;
											}
											if($id_matkul[$index] == $baris_mata_kuliah->ID_MATKUL){ //mengambil SKS per matkul
												$total_nilai[$index] = $total_nilai[$index] + ($indeks[$index] * $baris_mata_kuliah->SKS);
											}
										}
									}
										
								}
								$IP[$index] = $total_nilai[$index] / $total_sks;
								?>
							<tr>
								<td><h3><?php echo $baris_mhs->NIM; ?></a></h3></td>
								<td><?php echo $baris_mhs->NAMA; ?></td>
								<td><?php echo $IP[$index]; ?></td>
							</tr>
							<?php
							$IP[$index] = 0;
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