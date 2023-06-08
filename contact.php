<?php
	include("header.php");
?>
		<section class="page-header" style="">
			<div class="container">
				<center>
					<h1 style="font-size:40px;">إتصل بنا</h1>
				</center>
			</div>
		</section>
		<!-- /PAGE HEADER -->
		<section>
			<div class="container" style="    border: solid 2px #61704a;">				
				<div class="row" style="margin-top:20px">
					<center>
						<h3 style=""><strong><em>لخدمتكم وإرضائك</em></strong></h3>
						<h3>من أجل مساعدتكم بخصوص أية أسئلة أومتابعة قد تكون لديكم</h3>
						<h3>: هناك العديد من الطرق التي تمكنك من الوصول إلينا</h3>
					</center>
					<hr>
					<!-- INFO -->
					<div class="col-md-4 col-sm-4">
						<center><h3 style="">بالزيارة المباشرة إلى عين المكان</h3></center>
						<div id="map2" class="height-400 ">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d820.4803479246999!2d-1.9048527118753198!3d34.65668810193005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd787ca6f5f113fd%3A0x4107b28da12ffe3b!2sRue+Al+Houria%D8%8C+Oujda!5e0!3m2!1sfr!2sma!4v1560166151968!5m2!1sfr!2sma" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
						</div>
					</div>
					<!-- /INFO -->
					<!-- FORM -->
					<div class="col-md-8 col-sm-8">
						<center>
							<h3 style="">أرسل لنا رسالة</h3>
						</center>
						<form action="php/contact.php" method="post" enctype="multipart/form-data">
							<fieldset>
								<input type="hidden" name="action" value="contact_send">
								<div class="row" dir="rtl">
									<div class="form-group">
										<div class="col-md-6">
											<label for="contact:phone">الهاتف</label>
											<input type="text" value="" class="form-control" name="contact[phone]" id="contact:phone">
										</div>
										<div class="col-md-6">
											<label for="contact:name">الإسم الكامل</label>
											<input required="" type="text" value="" class="form-control" name="contact[name][required]" id="contact:name">
										</div>
									</div>
								</div>
								<div class="row" dir="rtl">
									<div class="form-group">
										<div class="col-md-6">
											<label for="contact:email">البريد الإلكتروني</label>
											<input required="" type="email" value="" class="form-control" name="contact[email][required]" id="contact:email">
										</div>
										<div class="col-md-6">
											<label for="contact:subject">الموضوع</label>
											<input required="" type="text" value="" class="form-control" name="contact[subject][required]" id="contact:subject">
										</div>
									</div>
								</div>
								<div class="row" dir="rtl">
									<div class="form-group">
										<div class="col-md-12">
											<label for="contact:message">الرسالة</label>
											<textarea required="" maxlength="10000" rows="8" class="form-control" name="contact[message]" id="contact:message"></textarea>
										</div>
									</div>
								</div>
						</fieldset>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-primary" style="float:right"><i class="fa fa-check"></i> أرسل الرسالة</button>
								</div>
							</div>
						</form>
					</div>
					<!-- /FORM -->				
					<!-- INFO -->
					<div class="col-md-6 col-sm-6" dir="rtl">
						<hr>
						<p>
							<span class="block" style="font-size:20px"><i class="fa fa-phone"></i> الهاتف : 0660389183 </span>
							<span class="block" style="font-size:20px"><i class="fa fa-envelope"></i>البريد الإلكتروني : contact@groupe-alhakim.com </span>
						</p>
					</div>
					<!-- /INFO -->
				</div>
			</div>
		</section>
<?php
	include("footer.php")
?>