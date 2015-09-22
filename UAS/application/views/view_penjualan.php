<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title><?php echo $judul; ?></title>
	<link rel="stylesheet" href="<?php echo base_url()?>css/css_other/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="<?php echo base_url()?>tinymce/tiny_mce.js"></script> 
	<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.7.2.min.js" charset="utf-8"></script>
<script type="text/javascript">                        
 tinyMCE.init({                                   
 // General options                                  
 mode : "textareas",                                   
 theme : "advanced",                          
 });                       
 </script> 
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="#">penjualan</a></h1>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="<?php echo base_url()?>index.php/c_penjualan" class="active"><span>Input Penjualan</span></a></li>
			    <li><a href="<?php echo base_url()?>index.php/c_penjualan/tabel"><span>Tabel Penjualan</span></a></li>
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
			<a href="<?php echo base_url()?>index.php/c_penjualan" class="active"><span>Input Penjualan</span></a>
			<span>&gt;</span>
			Penjualan
		</div>
		<!-- End Small Nav -->
		<?php if(!empty($aktif) && $aktif == '1'){ ?>
		<div class="msg msg-ok">
			
			<p><strong><?php echo $notifikasi; ?></strong></p>
		</div>
		<?php } ?>
		
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<div class="box">
				<!-- Box Head -->
					<div class="box-head">
						<h2>Input Penjualan</h2>
					</div>	
					<form method="post" action="<?php echo base_url() . "index.php/c_penjualan/simpan_penjualan"?>">
						<!-- Form -->
						<div class="form">
								<p>
									<label>ID SALES</label>
									<br>
									<input type="text" name="id_sales" required="required" placeholder="ID SALES" class="field size1" />
								</p>
								<p>
								<label>PENJUALAN KE</label>
								<br>
								<input type="text" name="penjualan_ke" required="required" placeholder="PENJUALAN KE" class="field size1" />
								</p>
								<p>
									<label>JUMLAH</label>
									<br>
									<input type="text" name="jumlah" required="required" placeholder="JUMLAH" class="field size1" />
								</p>
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="submit" name="submit" class="button" value="submit" />
						</div>
						<!-- End Form Buttons -->
					</form>
					</div>
					<!-- End Box Head -->
				</div>
				

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