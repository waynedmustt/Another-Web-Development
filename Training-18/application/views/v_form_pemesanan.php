<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pemesanan | Dmustt Online Shop</title>
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url()?>css/main.css" rel="stylesheet">
	<link href="<?php echo base_url()?>css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
   <style>
	.buat_order {
	    margin-left: auto;
        margin-right: auto;
		width: 25%;	
	}
	.summary {
	    margin-left: auto;
        margin-right: auto;
		width: 50%;	
	}
    </style>
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

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url()."index.php/beranda"; ?>">Beranda</a></li>
				  <li class="active">Pemesanan</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Pemesanan</h2>
			</div>

			<div class="shopper-informations">
				<div class="row">
					<div class="buat_order">
						<div class="shopper-info">
							<p>Identitas Pembeli</p>
							<?php $total_harga = $_GET['ttl']; ?>
							<form action="<?php echo base_url()."index.php/pesan"; ?>" method="post">
								<input type="text" name ="nama" required="required" placeholder="Nama">
								<input type="text" name ="alamat" required="required" placeholder="Alamat Lengkap beserta Kota dan Kode pos">
								<select name="pilih_pembayaran" required="required">
										<option selected>-- Pembayaran --</option>
										<option value="Bank BCA">Bank BCA</option>
										<option value="Bank BRI">Bank BRI</option>
										<option value="Paypal">Paypal</option>
								</select>
								<br></br>
								<input type="text" name ="email" required="required" placeholder="E-mail">
								<input type="text" name ="total" required="required" value="<?php echo number_format($total_harga,2,",","."); ?>" readonly="true">
								<button type="submit" name="pesan" class="btn btn-primary">Pesan</button>
							</form>
							<a class="btn btn-primary" href="<?php echo base_url()."index.php/cart"; ?>">Kembali ke Shopping Cart</a>
						</div>
					</div>				
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
					<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah</td>
							<td class="total">Subtotal</td>
						</tr>
					</thead>
					<tbody>
					<?php
					$index = 0;	
					$jumlah_harga = 0;
					$total_barang = 0;
					$subtotal = array();
					foreach($_SESSION['data'] as $rows)
					{			   
				    ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo base_url($_SESSION['data'][$index][0]->GAMBAR);  ?>"/></a>
							</td>
							<td class="cart_description">
								<h4> <?php	echo $_SESSION['data'][$index][0]->NAMA_BARANG; ?></h4>
								<p> <?php echo $_SESSION['data'][$index][0]->ID_BARANG; ?></p>
							</td>
							<td class="cart_price">
								<p><?php	echo number_format($_SESSION['data'][$index][0]->HARGA,2,",","."); ?></p>
							</td>
							<td class="cart_quantity">
							<div class="cart_quantity_button">
								<?php echo $_SESSION['jumlah'][$index]; ?>
						     </div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php $subtotal[$index] = intval($_SESSION['data'][$index][0]->HARGA) * intval($_SESSION['jumlah'][$index]); 	
										echo number_format($subtotal[$index],2,",","."); ?></p>
							</td>
						</tr>
						<?php 
						$jumlah_harga = $jumlah_harga + intval($_SESSION['data'][$index][0]->HARGA) * intval($_SESSION['jumlah'][$index]);
					    $total_barang = $total_barang + intval($_SESSION['jumlah'][$index]);
					    $index++;
						}?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<p></p>
			</div>
			<div class="row">
				<div class="summary">
					<div class="total_area">
						<ul>
							<li>Total Barang<span><?php echo $total_barang;?></span></li>
							<li>Shipping Cost <span>-</span></li>
							<li>Total <span><?php echo number_format($jumlah_harga,2,",","."); ?></span></li>
						</ul>
					</div>
				</div>
				Catatan: Data yang tidak valid tidak akan diproses lebih lanjut
			</div>
		</div>
	</section><!--/#do_action-->

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
    <script src="<?php echo base_url()?>js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url()?>js/main.js"></script>
</body>
</html>