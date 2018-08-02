<?php
include 'pages/head.php';
?>
<div class="table-responsive" id="tabel">
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
<div class="form-group row" style="margin-bottom: 5%;" id="mail">
  <div class='col-md-2'> <label class="form-control-static">Email : </label> </div>
  <div class='col-md-5'> <input type="text" id="email" class="form-control"> </div>
  <div class='col-md-5'><span id="mailtext" class="text-warning">Isikan alamat email!</span></div>
</div>
<div style="margin-bottom: 5%;" id="btn">
  <span>
    <button class="btn btn-xs" id="clear">Clear <span class="glyphicon glyphicon-remove"></span></button>
  </span>
  <span class="pull-right">
    <button class="btn btn-xs" id="display"><span class="glyphicon glyphicon-refresh"></span></button>
    <button class="btn btn-xs btn-success" id="next">Checkout <span class="glyphicon glyphicon-arrow-right" style="color: white"></span></button>
  </span>
</div>
<div id="oke">
  <p>Terima kasih sudah melakukan pemesanan</p>
  <p>Kami akan mengirim konfirmasi selanjutnya ke email anda</p>
</div>
<?php include 'pages/foot.php';?>
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
  $(document).ready(function(){
    $("#oke").hide();
    $("#mailtext").hide();
    $("#next").click(function(){
      if($("#email").val() !== '') {        
        $("#oke").show();
        $("#mailtext, #tabel, #mail, #btn").hide();         
        clear();
      } else {
        $("#mail").addClass('has-error');
        $("#mailtext").show();
      }
    });
  });
</script>