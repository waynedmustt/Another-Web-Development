<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shopping Cart | Dmustt Online Shop</title>
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
								<li><a href="<?php echo base_url()."index.php/cart"; ?>" class="active"><i class="fa fa-shopping-cart"></i> Cart</a></li>
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
		<?php
			$index = 0;	
			$jumlah_harga = 0;
			$total_barang = 0;
			$subtotal = array();
				if(!isset($_SESSION['data']) or $_SESSION['data'] == NULL)
					{
						 ?>
					<div class="content-404">
					<span class="buat_order">
					Tidak ada barang <br>
					<h2><a href="<?php echo base_url()."index.php/beranda"; ?>">Kembali ke Beranda</a></h2></span>
				    </div>
		<?php 
					} else {
		?>
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url()."index.php/beranda"; ?>">Beranda</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
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
							<td colspan="2">Action Control</td>
						</tr>
					</thead>
					<tbody>
					<?php
					foreach($_SESSION['data'] as $rows)
					{			   
				    ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo base_url($_SESSION['data'][$index][0]->GAMBAR);  ?>"/></a>
							</td>
							<td class="cart_description">
								<h4><?php	echo $_SESSION['data'][$index][0]->NAMA_BARANG; ?></h4>
								<p><?php echo $_SESSION['data'][$index][0]->ID_BARANG; ?></p>
							</td>
							<td class="cart_price">
								<p><?php	echo number_format($_SESSION['data'][$index][0]->HARGA,2,",","."); ?></p>
							</td>
							<?php 
								if($is_jumlah == 1){ ?>
								<td class="cart_quantity">
								<div class="cart_quantity_button">
								<?php echo $_SESSION['jumlah'][$index]; ?>
								</div>
							     </td>
								<?php 
								} else {
									if($index_update == $index){ //jika sama, maka buat form
								?>
									<form action="<?php echo base_url()."index.php/cart/update_cart/".$index_update; ?>" method="post">
									<td class="cart_quantity">
								    <div class="cart_quantity_button">
									<input class="cart_quantity_input" type="text" name="jumlah" 
									value="<?php echo $_SESSION['jumlah'][$index]; ?>" autocomplete="off" size="2" />
								    </div>
									<br>
									<button type="submit" name="update" class="btn btn-default">Update</button>
							        </td>
									</form>
									<?php } else { ?>
										<td class="cart_quantity">
										<div class="cart_quantity_button">
										<?php echo $_SESSION['jumlah'][$index]; ?>
										</div>
										 </td>
									<?php			
										}
									}?>
							<td class="cart_total">
								<p class="cart_total_price"><?php $subtotal[$index] = intval($_SESSION['data'][$index][0]->HARGA) * intval($_SESSION['jumlah'][$index]); 	
										echo number_format($subtotal[$index],2,",","."); ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo base_url()."index.php/cart/clear" ?>?del=<?php echo $index?>&status=1">
								<i class="fa fa-times"></i></a>
							</td>
							<td><a href="<?php echo base_url()."index.php/cart/update_process" ?>?upt=<?php echo $index?>&status=2">
							<button type="submit" name="update" class="btn btn-default update">Update</button></a>
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
				<h3>Rincian Harga</h3>
				<p></p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Total Barang<span><?php echo $total_barang;?></span></li>
							<li>Shipping Cost <span>-</span></li>
							<li>Total <span><?php echo number_format($jumlah_harga,2,",","."); ?></span></li>
						</ul>
							<a class="btn btn-default update" href="<?php echo base_url()."index.php/beranda"; ?>">Kembali ke Beranda</a>
							<a class="btn btn-default update" href="<?php echo base_url()."index.php/cart/clear"; ?>">Kosongkan Shopping Cart</a>
							<a class="btn btn-default check_out" href="<?php echo base_url()."index.php/pemesanan"; ?>?ttl=<?php echo $jumlah_harga ?>">Pemesanan</a>
					</div>
				</div>
			</div>
		</div>
		<?php }?>
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
	<script src="<?php echo base_url()?>js/price-range.js"></script>
    <script src="<?php echo base_url()?>js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url()?>js/main.js"></script>
</body>
</html>