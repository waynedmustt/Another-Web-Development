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
			     <li><a href="<?php echo base_url()?>index.php/c_penjualan"><span>Input Penjualan</span></a></li>
			    <li><a href="<?php echo base_url()?>index.php/c_penjualan/tabel"><span>Tabel Penjualan</span></a></li>
				<li><a href="<?php echo base_url()?>index.php/c_file" class="active"><span>File</span></a></li>
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
		<?php if(!empty($aktif) && $aktif == '1' && $download == 1){ ?>
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
				<?php if($aktif == 0) {?>
				<div class="box">
				<!-- Box Head -->
					<div class="box-head">
						<h2>Input Penjualan</h2>
					</div>	
					<form method="post" action="<?php echo base_url() . "index.php/c_file/upload"?>" enctype="multipart/form-data">
						<!-- Form -->
						<div class="form">
								<p>
									<label>FILE</label>
									<br>
									<input type="file" name="file" required="required" class="field size1" />
								</p>
								<p>
								<label>KETERANGAN</label>
								<br>
								<input type="keterangan" name="keterangan" required="required" placeholder="KETERANGAN" class="field size1" />
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
					<a href="<?php echo base_url() . "index.php/c_file/display"?>">Lihat File</a>
					<?php } else if ($aktif == 1) { ?>
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>ID FILE</th>
								<th>FILE</th>
								<th>KETERANGAN</th>
							</tr>
							<?php foreach($file as $row){ ?>
							<tr>
								<td><h3><?php echo $row->ID_FILE; ?></a></h3></td>
								<td><a href="<?php echo base_url()."index.php/c_file/download/".$row->FILE;?>">download File</a></td>
								<td><?php echo $row->KETERANGAN; ?></td>
							</tr>
					<?php } ?>
					
					<a href="<?php echo base_url() . "index.php/c_file"?>">Upload File</a>
					</table>
				<?php	}
					?> 
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