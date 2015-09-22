<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Dmustt Online Shop</title>
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url()?>css/main.css" rel="stylesheet">
	<link href="<?php echo base_url()?>css/responsive.css" rel="stylesheet">
    <style>
	.buat_order {
	    margin-left: auto;
        margin-right: auto;
		width: 33.33333333%;	
	}
    </style>
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo base_url()?>images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +62 87 861 833 429</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> dimas@dmusttonlineshop.besaba.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo base_url()."index.php/beranda"; ?>"><img src="<?php echo base_url()?>images/shop/logo1.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="<?php echo base_url()."index.php/cart"; ?>"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="<?php echo base_url()."index.php/login"; ?>" class="active"><i class="fa fa-lock"></i>Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url()."index.php/beranda"; ?>">Beranda</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?php echo base_url()."index.php/produk"; ?>">Produk</a></li>
										<li><a href="<?php echo base_url()."index.php/cart"; ?>">Cart</a></li>
                                    </ul>
                                </li>
								<li><a href="<?php echo base_url()."index.php/kontak"; ?>">Hubungi Kami</a></li>
								<li><a href="<?php echo base_url()."index.php/pembelian"; ?>">Cara Pembelian</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Masuk ke dalam akun</h2>
						<form action="#">
							<input type="text" placeholder="Nama" />
							<input type="email" placeholder="E-mail" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Biarkan saya tetap masuk
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">ATAU</h2>
				</div>
				<?php 
					if($aktif == 1){ //aktif ketika telah login
						echo $required;
						echo "<br>";	
						echo $message;
						echo "<br>";
						echo $sukses;
						echo "<br>";
					}
					
					?>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Daftar Member Baru</h2>
						<form action="<?php echo base_url() . "index.php/login/is_login" ?>" method="post">
							<input type="text" name="username" placeholder="Username"/>
							<input type="password" name="password" placeholder="Password"/>
							<input type="text" name="nama" placeholder="Nama"/>
							<input type="date" name="tanggal" placeholder="Tanggal lahir"/>
							<span>
								<input type="radio" name="status" value="menikah"> 
								Menikah
								<input type="radio" name="status" value="belum menikah"> 
								Belum Menikah
								<input type="radio" name="status" value="janda"> 
								Janda
								<input type="radio" name="status" value="duda"> 
								Duda
							</span>
							<select name="agama">
										<option selected value="0">-- Agama --</option>
										<?php foreach($agama->result() as $religion) {?>
										<option value="<?php echo $religion->ID_AGAMA; ?>"><?php echo $religion->AGAMA; ?></option>
										<?php }?>
								</select>
							<span>
							<?php 
							$index = 1;
							foreach($hobi->result() as $hobby) {?>
								<input type="checkbox" class="checkbox" name="hobi<?php echo $index; ?>" value="<?php echo $hobby->ID_HOBI?>">
								<?php echo $hobby->HOBI?>
								<?php 
								$index++; 
								}
							    //print_r($index);
								$_SESSION['total_index'] = $index;
								?>
							</span>		
							<input type="text" name="nohp" placeholder="No. HP"/>
							<input type="text" name="email" placeholder="E-mail"/>	
							<input type="text" name="alamat" placeholder="Alamat"/>							
							<button type="submit" name="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	<footer id="footer"><!--Footer-->
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2014 Dmustt Online Shop. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="<?php echo base_url()?>js/jquery.js"></script>
	<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url()?>js/price-range.js"></script>
    <script src="<?php echo base_url()?>js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url()?>js/main.js"></script>
</body>
</html>