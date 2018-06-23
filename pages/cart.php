<?php
include 'pages/head.php';
?>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Produk</th>
        <th>harga</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="isitabelcart">

    </tbody>
  </table>
</div>
<div style="margin-bottom: 5%;">
  <span>
    <button class="btn btn-xs" id="clear">Clear <span class="glyphicon glyphicon-remove"></span></button>
  </span>
  <span class="pull-right">
    <button class="btn btn-xs" id="display"><span class="glyphicon glyphicon-refresh"></span></button>
    <button class="btn btn-xs btn-success" id="next">Checkout <span class="glyphicon glyphicon-arrow-right" style="color: white"></span></button>
  </span>
</div>
<?php include 'pages/foot.php'; ?>
<script type="text/javascript">
  var displayButton = document.querySelector('#display');
  var clearButton = document.querySelector('#clear');
  displayButton.addEventListener('click', function () {
    tampil();
  });
  clearButton.addEventListener('click', function () {
    clear();
  });
  request.onsuccess = function () {
    db = request.result;
    tampil();
  };
</script>