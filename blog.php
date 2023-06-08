<?php
	include("header.php");
?>
		<section class="page-header" style="">
			<div class="container">
				<center><h1 style="font-size:40px;">أنشطة</h1></center>
			</div>
		</section>
		<section>
			<div class="container">
				<div class="row" style="margin-top:20px">
				<?php $list = select("SELECT id,title,content,img,data_pub,visibility FROM activity WHERE visibility = 1");
                    for ($i=0; $i < count($list); $i++) {?>
					<div class="blog-post-item col-md-6 col-sm-6" style="min-height: 500px !important;margin: 0;padding-bottom: 0px;">
						<figure class="margin-bottom-20">
							<img class="img-responsive" src="apps/.asset/upload/._imgs/<?php echo  $list[$i][3]; ?>" style="height:400px">
						</figure>
						<h2 class="text-right"><a href="#"><?php echo  $list[$i][1]; ?></a></h2>
						<ul class="blog-post-info list-inline" style="margin: 0;padding-bottom: 0px;">
							<li>
								<a href="blog.php">
									<i class="fa fa-clock-o"></i> 
									<span class="font-lato"><?php echo $list[$i][4];?></span>
								</a>
							</li>
						</ul>
						<p class="text-right" style="padding-bottom: 0px;min-height: 100px !important;"><?php echo  $list[$i][2]; ?></p>
					</div>
					<?php } if(count($list) == 0)
                        echo '<h2 style="margin: 0 0 20px 0;font-size: 35px;">نعتذر  ...!   لا يوجد نشاط حاليا </h2>';?>
				</div>
			</div>
		</section>
<?php
	include("footer.php");
?>