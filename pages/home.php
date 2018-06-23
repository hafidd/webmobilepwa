<?php
include 'pages/head.php';
$ds = $fun->getProduk();
$x = 1;
?>
<?php foreach($ds as $data) : ?>
  <?php if($x == 1 || $x%3 == 1): ?>
    <div class="agile_top_brands_grids">
    <?php endif; ?>
    <div class="col-md-4 top_brand_left">
      <div class="hover14 column">
        <div class="agile_top_brand_left_grid">
          <div class="">            
            <a href="./produk/<?=$data['id']?>/<?=strtolower(str_replace(' ', '-', $data['produk_nama']))?>"><img src="<?=$basepath?>images/product/<?=$data['produk_img']?>" alt="<?=$data['produk_img']?>" class="img-responsive"></a>
          </div>
          <div class="agile_top_brand_left_grid1">
            <div class="snipcart-item block">
              <div class="snipcart-thumb">
                <p><?=$data['produk_nama']?></p>
                <h4>Rp <?=$data['produk_harga']?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if($x%3 == 0): ?>
      <div class="clearfix"> </div>
    </div>
  <?php endif; ?>
  <?php $x++ ?>
<?php endforeach; ?>
<!-- paging -->
<nav class="numbering">
  <ul class="pagination paging">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
<!-- /paging -->
<?php include 'pages/foot.php'; ?>