<?php
try {
	include("header.php");
?>				
		<section class="page-header" style="">
			<div class="container">
				<center>
					<h1 style="font-size:40px;">صور المؤسسة</h1>
				</center>
			</div>
		</section>
		<section style="    border-bottom: rgba(0,0,0,0.1) 0px solid;   margin-top:30px">  
			<div class="container">
				<div class="col-md-12 col-sm-12" style="    margin-top: -50px;"><!-- left text -->
					<center>
						<h3 style="margin: 0 0 20px 0;font-size: 35px;"> مجموعة مدارس الحكيم</h3>
						<h4 style="margin: 0 0 20px 0;">أولي - إبتدائي - ثانوي إعدادي</h4>
					</center>	
				</div><!-- /left text -->																	
				<div class="masonry-gallery columns-4 clearfix lightbox" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}' >
				<?php
					$list = select("SELECT link FROM galerie WHERE visibility = 1");
					for ($i=0; $i < count($list); $i++) {
						echo '<a class="image-hover" href="apps/.asset/upload/._imgs/'.$list[$i][0].'" style="width: 285px;">'.
						'<img src="apps/.asset/upload/._imgs/'.$list[$i][0].'" alt="Groupe scolaire alhakim" title="Groupe scolaire alhakim" style="width:280px;height:200px !important;margin:5px;">'.
					'</a>';
					}
					if(count($list) == 0)
						echo '<h2 style="margin: 0 0 20px 0;font-size: 35px;">نعتذر  ...!   لا يوجد صورة حاليا </h2>';
				?>	
				</div>
			</div>
		</section>
<?php
	include("footer.php");
} catch (\Throwable $th) {

}
?>