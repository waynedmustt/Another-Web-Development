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
			<h1><a href="#">Halaman Admin</a></h1>
		</div>
		<!-- End Logo + Top Nav -->
		

	</div>
</div>
<!-- End Header -->
<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
		</div>
		<!-- End Small Nav -->
		<?php if(!empty($aktif) && $aktif == '1'){?>
		<!-- Message Error -->
		<div class="msg msg-error">
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
						<h2>Admin</h2>
					</div>	
					<?php if(isset($_SESSION['username'])){
						echo "Anda Sudah Login!";
						redirect("c_barang/is_login");
					} else {?>
						<form method="post" action="<?php echo base_url() . "index.php/c_barang/admin"?>">
						<!-- Form -->
						<div class="form">
								<p>
									<label>Username </label>
									<br>
									<input type="text" name="username" class="field size1" placeholder="Username" value="" />
								</p>
								<p>
									<label>Password</label>
									<br>
									<input type="password" name="password" placeholder="Password" class="field size1" />
								</p>		
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="submit" name="submit" class="button" value="submit" />
						</div>
						<!-- End Form Buttons -->
					</form>
					<?php }?>
					</div>
					<!-- End Box Head -->
				</div>	
			<!-- End Content -->
			</div>
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