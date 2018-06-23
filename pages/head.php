<?php
include_once('func/DbFunctions.php');
$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
$fun = new DbFunctions();
// get data
$kts = $fun->getKategori();
$mns = $fun->getMenu();
?>
<!DOCTYPE html>
<html>
<head>	
	<title><?=$fun->getPref("title")?></title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- bs -->
	<link href="<?=$basepath?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?=$basepath?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link href="<?=$basepath?>assets/css/font-awesome.css" rel="stylesheet"> 
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="<?=$basepath?>assets/js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>  
	<!-- header -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="<?=$basepath?>"><?=$fun->getPref("nama_toko")?></a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Hubungi kami : <?=$fun->getPref("no_telp")?></li>          
				</ul>
			</div>
			<div class="w3l_search">
				<form action="#" method="post">
					<input type="search" name="Search" placeholder="Cari Produk" required="">
					<button type="submit" class="btn btn-default search" aria-label="Left Align">
						<i class="fa fa-search" aria-hidden="true"> </i>
					</button>
					<div class="clearfix"></div>
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //header -->
	<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<?php foreach($mns as $mn) :?>
							<?php if($mn['hc'] == 0) :?>
								<li class="active"><a href="<?=$basepath.$mn['menu_link']?>" class="act"><?=$mn['menu_name']?></a></li> 
							<?php else : ?>

								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$mn['menu_name']?><b class="caret"></b></a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="row">
											<div class="multi-gd-img">
												<ul class="multi-column-dropdown">
													<?php $mncs = $fun->getMenu($mn['id']); ?>
													<?php foreach($mncs as $mc) :?>
														<li><a href="<?=$basepath.$mc['menu_link']?>"><?=$mc['menu_name']?></a></li>
													<?php endforeach; ?>
												</ul>
											</div>
										</div>
									</ul>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>            
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //endnav -->
	<!-- content -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?=$basepath?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<?php foreach($r as $rr): ?>
					<li class="active"><?=$rr?></li>
				<?php endforeach?>
			</ol>
		</div>
	</div>
	<div class="products">		
		<div class="container">						
			<!-- produk -->
			<div class="col-md-8 col-md-push-4 products-right">
