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
<!-- cart script -->
<script src="<?=$basepath?>sekrip.js"></script>
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