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
		<!-- End Small Nav -->
		<?php if(!empty($aktif) && $aktif == '1'){ ?>
		<div class="msg msg-ok">
			
			<p><strong><?php echo $notifikasi; ?></strong></p>
		</div>
		<?php } else if(!empty($aktif) && $aktif == '2'){?>
		<!-- Message Error -->
		<div class="msg msg-error">
			<p><strong><?php echo $notifikasi; echo "<br>"; echo $upload_failed;?></strong></p>
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
						<h2>Input Data Barang</h2>
					</div>	
					<form method="post" action="<?php echo base_url() . "index.php/c_barang/simpan_barang"?>" enctype="multipart/form-data">
						<!-- Form -->
						<div class="form">
								<p>
									<label>ID BARANG </label>
									<br>
									<input type="text" name="id_barang" required="required" placeholder="Kode Barang" class="field size1" value="" />
								</p>
								<p>
									<label>NAMA BARANG</label>
									<br>
									<input type="text" name="nama_barang" required="required" placeholder="Nama Barang" class="field size1" />
								</p>
								<p>
									<label>GAMBAR</label>
									<br>
									<input type="file" name="gambar" required="required" class="field size1" />

								</p>
								<p>
									<label>GAMBAR ke-1 (Optional)</label>
									<br>
									<input type="file" name="gambar1" class="field size1" />

								</p>
								<p>
									<label>GAMBAR ke-2 (Optional)</label>
									<br>
									<input type="file" name="gambar2" class="field size1" />

								</p>
								<p>
									<label>GAMBAR ke-3 (Optional)</label>
									<br>
									<input type="file" name="gambar3" class="field size1" />

								</p>
								<p>
								<label>TIPE BARANG</label>
								<br>
								<select name="tipe_barang" required="required" class="field size1">
										<option selected>-- Tipe Barang --</option>
										<?php foreach($jenis_barang->result() as $tipe_barang){?>
											<option value="<?php echo $tipe_barang->ID_JENIS_BARANG; ?>"><?php echo $tipe_barang->NAMA_JENIS_BARANG; ?></option>
										<?php }?>
										</select>
								</p>
								<p>
									<label>HARGA</label>
									<br>
									<input type="text" name="harga" required="required" placeholder="Harga" class="field size1" />
								</p>
								<p>
								<label>DEKSRIPSI</label>
								<br>
								<textarea name="deskripsi" class="field size1" style="resize:none;"></textarea>
								</p>
								<p>
									<label>STOK</label>
									<br>
									<input type="text" name="stok" required="required" placeholder="Stok" class="field size1" />

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