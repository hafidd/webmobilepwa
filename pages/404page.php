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
  <div class="products">
    <div class="container">           
      <!-- produk -->
      <div class="col-md-8 col-md-push-4 products-right">
        Halaman tidak ditemukan
      </div>
      <!-- /produk -->
      <!-- kategori -->
      <div class="col-md-4 col-md-pull-8 products-left">
        <div class="categories">
          <h2>Kategori</h2>
          <ul class="cate">
            <?php foreach ($kts as $kt) : ?>
              <li><i class="fa fa-arrow-right" aria-hidden="true"></i><?=$kt['kat_nama']?></li>
              <ul>
                <?php $kcs = $fun->getKategori($kt['id']); ?>
                <?php foreach ($kcs as $kc) : ?>       
                  <li><a href="<?=$basepath.'kategori/'.$kc['id'].'/'.$kc['kat_link']?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><?=$kc['kat_nama']?></a></li>
                <?php endforeach ?>
              </ul>
            <?php endforeach ?>
          </ul>
        </div>
        <br/>
        <div class="categories">
          <h2>Kosong</h2>
          <p class="text-center">Coming Soon</p>
        </div>
      </div>
      <!-- /kategori -->
      <div class="clearfix"> </div>   
    </div>
  </div>
  <!-- content -->
  <!-- //footer -->
  <div class="footer">
    <div class="footer-copy">
      <div class="container">
        <p>&copy; <?= date('Y'). ' ' .$fun->getPref("kelompok")?></a></p>
      </div>
    </div>
  </div>  
  <!-- //footer --> 
  <!-- Bootstrap Core JavaScript -->
  <script src="<?=$basepath?>assets/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', function() {
        navigator.serviceWorker.register('sw.js').then(function(registration) {
            // Registration was successful
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
          }, function(err) {
            // registration failed :(
            console.log('ServiceWorker registration failed: ', err);
          });
      });
    }
  </script>
</body>
</html>