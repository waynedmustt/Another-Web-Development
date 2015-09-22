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
			<h1><a href="#">Tabel Order</a></h1>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="<?php echo base_url()?>index.php/c_barang/is_login"><span>Beranda</span></a></li>
			    <li><a href="<?php echo base_url()?>index.php/c_barang/display"><span>Tabel Barang</span></a></li>
				<li><a href="<?php echo base_url()?>index.php/c_barang/order"><span>Yang sudah dipesan</span></a></li>
				<li><a href="<?php echo base_url()?>index.php/c_barang/pemesanan" class="active"><span>Pemesanan</span></a></li>
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
			Tabel Order
		</div>
		<!-- End Small Nav -->
		<?php if(!empty($aktif) && $aktif == '1'){ ?>
		<div class="msg msg-ok">
			
			<p><strong><?php echo $ketemu; ?></strong></p>
		</div>
		<?php } else if(!empty($aktif) && $aktif == '2'){?>
		<!-- Message Error -->
		<div class="msg msg-error">
			<p><strong><?php echo $tidak_ketemu; ?></strong></p>
		</div>
		<?php } ?>
		
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Tabel Order</h2>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>ID Pemesanan</th>
								<th>Nama Pemesan</th>		
								<th>Alamat Pemesan</th>			
								<th>Tanggal Pemesanan</th>
								<th>Tipe Pembayaran</th>
								<th>e-mail</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php 
							foreach($pemesanan->result() as $row){
							?>
							<tr>
								<td><h3><?php echo $row->ID_PEMESANAN; ?></a></h3></td>
								<td><?php echo $row->NAMA; ?></td>
								<td><?php echo $row->ALAMAT; ?></td>
								<td><?php echo $row->TANGGAL_PEMESANAN; ?></td>
								<td><?php echo $row->TIPE_PEMBAYARAN; ?></td>
								<td><?php echo $row->E_MAIL; ?></td>
								<td>
								<?php if($row->PEMBAYARAN == 1){ ?>
								<form method="post" action="<?php echo base_url()."index.php/c_barang/confirmation_belum/".$row->ID_PEMESANAN;?>"">
								<input type="submit" name="submit" class="button" value="Belum Membayar" />
								</form>
								<?php }
								else {?>
								<form method="post" action="<?php echo base_url()."index.php/c_barang/confirmation/".$row->ID_PEMESANAN;?>"">
								<input type="submit" name="submit" class="button" value="Sudah Membayar" />
								</form>
								<?php }?>
								
								</td>
							</tr>
							<?php }?>
						</table>
						
						<!-- Pagging -->
						<div class="pagging">
						</div>
						<!-- End Pagging -->
						
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