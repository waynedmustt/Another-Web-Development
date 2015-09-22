<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Beranda | Dmustt Online Shop</title>
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
								<li><a href="<?php echo base_url()."index.php/beranda"; ?>" class="active">Beranda</a></li>
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

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-products-->
						<?php foreach($jenis_barang->result() as $tipe_barang){?>
						<div class="panel panel-default">
								<div class="panel-heading">
									<?php $tes = 0; ?>
									<h4 class="panel-title"><a href="<?php echo base_url()."index.php/kategori/barang/".$tipe_barang->ID_JENIS_BARANG; ?>"><?php echo $tipe_barang->NAMA_JENIS_BARANG; ?></a></h4>
									
								</div>
							</div>
							<?php }?>
						</div>
						
						<div class="panel-heading"><!--shipping-->
						<h2>Pembayaran</h2>
							<img src="<?php echo base_url()?>images/shop/shipping1.png" alt="" />
							
							
						</div><!--/shipping-->
						<div class="panel-heading"><!--shipping-->
						<h2>Kontak Kami</h2>
							<img src="<?php echo base_url()?>images/shop/shipping2.png" alt="" />
							
							
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Items</h2>
						<?php foreach($kategori->result() as $row) {?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo base_url($row->GAMBAR);  ?>"/>
											<h2>RP.<?php echo number_format($row->HARGA,2,",",".");?></h2>
											<p><?php echo $row->ID_BARANG;?></p>
											<p><?php echo $row->NAMA_BARANG;?></p>
											<?php if($row->STOK == 0) {
											   echo "Stok habis";
											} else {?>
											<p>STOK: <?php echo $row->STOK;?></p>
											<?php }?>
										</div>
		
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>RP.<?php echo number_format($row->HARGA,2,",",".");?></h2>
												<p><?php echo $row->NAMA_BARANG;?></p>
												<?php if($row->STOK != 0){?>
												<a href="<?php echo base_url()."index.php/cart/show_cart/".$row->ID_BARANG; ?>" class="btn btn-default add-to-cart">
												<i class="fa fa-shopping-cart"></i>Add to cart</a><br><?php }?>
												<a href="<?php echo base_url()."index.php/detail/barang/".$row->ID_BARANG; ?>" class="btn btn-default add-to-cart">
												<span class="glyphicon glyphicon-eye-open"></span> View Detail</a><br>
											</div>
										</div>
								</div>
							</div>
						</div>
						<?php }?>
					</div><!--features_items-->
					<ul class="pagination">
					<?php 
					for($i = 1; $i <= $total_pages; $i++){ ?>
					<?php	
					 if($halaman != $i){  ?>
					  <li><a href="<?php echo base_url() . "index.php/kategori/barang/".$yang_dicari;?>?page=<?php echo $i?>"><?php echo $i?></a></li> 
					 <?php }else{  ?>
					  <li><a href="<?php echo base_url() . "index.php/kategori/barang/".$yang_dicari;?>?page=<?php echo $i?>" class="active"><?php echo $i?></a></li> 
					 <?php
					 } ?>
					 <?php
					} ?>
					</ul>

				</div>
			</div>
		</div>
	</section>
	
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