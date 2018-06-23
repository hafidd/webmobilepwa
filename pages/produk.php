<?php
include 'pages/head.php';
if(!empty($r[1])) :
  $produk = $fun->getProdukById($r[1]);
  ?>
  <div class="agile_top_brands_grids row">
    <div class="produk-img">
      <img src="<?=$basepath?>images/product_detail/<?=$produk['produk_img']?>" alt="<?=$produk['produk_img']?>" class="img-responsive">
    </div>
    <div class="produk-desc">
      <br/>
      <?=$produk['produk_desc']?>
    </div>
    <div class="produk-det">
      <br/>
      <p>Harga : Rp <?=number_format($produk['produk_harga'], 0, ',', '.')?> / <?=$produk['produk_satuan']?></p>
    </div>
    <div class="btn-addcart text-right">
      <button id="add" class='btn btn-success btn-md' onclick='tambah(<?=$produk['id']?>, <?= "\"" . $produk['produk_nama'] . "\""?>, <?=$produk['produk_harga']?>);' disabled="disabled"><span class='glyphicon glyphicon-plus'></span> Tambah ke Cart</button>
    </div>
  </div>
  <?php else : ?>
    Produk tidak ditemukan !
  <?php endif; ?>
  <?php include 'pages/foot.php'; ?>
  <script type="text/javascript">
    var addButton = document.querySelector('#add');
    request.onsuccess = function () {
      addButton.disabled = false;
      db = request.result;
    };
  </script>