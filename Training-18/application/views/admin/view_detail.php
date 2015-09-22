<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title><?php echo $judul; ?></title>
	<link rel="stylesheet" href="<?php echo base_url()?>css/css_other/style.css" type="text/css" media="all" />
</head>
<?php 
if(!isset($_SESSION['username'])){ 
    echo "Anda belum login!";
	redirect("c_barang/admin");
 }
?>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="#">Tabel Barang</a></h1>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="<?php echo base_url()?>index.php/c_barang/is_login"><span>Beranda</span></a></li>
			    <li><a href="<?php echo base_url()?>index.php/c_barang/display" class="active"><span>Tabel Barang</span></a></li>
				<li><a href="<?php echo base_url()?>index.php/c_barang/order"><span>Yang sudah dipesan</span></a></li>
				<li><a href="<?php echo base_url()?>index.php/c_barang/pemesanan"><span>Pemesanan</span></a></li>
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
			<a href="<?php echo base_url()?>index.php/c_barang/is_login">Beranda</a>
			<span>&gt;</span>
			Tabel Barang
		</div>
		
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<div class="box">
				<!-- Box Head -->
					<div class="box-head">
						<h2>Detail Barang</h2>
					</div>	
						<!-- Form -->
						<div class="form">
						<?php 
							foreach($detail_brg->result() as $row){
							?>
								<p>
									<label>ID BARANG :</label><?php echo $row->ID_BARANG; ?>
								</p>
								<p>
									<label>NAMA BARANG :</label><?php echo $row->NAMA_BARANG; ?>
								</p>
								<p>
									<label>GAMBAR :</label><img src="<?php echo base_url($row->GAMBAR);  ?>"/>
								</p>
								<?php if(!empty($row->GAMBAR1)){?>
								<p>
									<label>GAMBAR1 :</label><img src="<?php echo base_url($row->GAMBAR1);  ?>"/>
								</p>
								<?php }?>
								<?php if(!empty($row->GAMBAR2)){?>
								<p>
									<label>GAMBAR2 :</label><img src="<?php echo base_url($row->GAMBAR2);  ?>"/>
								</p>
								<?php }?>
								<?php if(!empty($row->GAMBAR3)){?>
								<p>
									<label>GAMBAR3 :</label><img src="<?php echo base_url($row->GAMBAR3);  ?>"/>
								</p>
								<?php }?>
								<p>
									<label>HARGA :</label><?php echo $row->HARGA; ?>
								</p>
								<p>
									<label>STOK :</label><?php echo $row->STOK; ?>
								</p>
								<p>
									<label>DEKSRIPSI :</label><?php echo $row->DESKRIPSI; ?>
								</p>
								<?php }?>	
						</div>
						<!-- End Form -->

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