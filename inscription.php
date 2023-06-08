<?php
	include("header.php");
?>
		<section class="page-header" style="">
			<div class="container">
					<h1 style="font-size:40px ;text-align: center;;">تسجيل</h1>
			</div>
		</section>
		<section>
			<div class="container" style="    border: solid 2px #61704a;">
				<div class="row" style="margin-top:20px">
					<center>
						<h3 style="" > التسجيل للموسم الدراسي <?php echo date('Y')+1?>-<?php echo date('Y')?></h3>
					</center>
					<hr>
					<!-- FORM -->
					<div class="col-md-12 col-sm-12">
						<form action="controller.php" method="POST" id="inscrRR">
							<fieldset>
								<input type="hidden" name="action" value="contact_send">
									<div class="row" dir="rtl">
										<div class="form-group">
											<div class="col-md-6">
												<label for="nom">الاسم العائلي</label>
												<input type="text" class="form-control" name="nom" id="nom" required>
											</div>																														
											<div class="col-md-6">
												<label for="prenom">الاسم الشخصي</label>
												<input type="text" class="form-control" name="prenom" id="prenom" required>
											</div>
										</div>
									</div>
									<div class="row" dir="rtl">
										<div class="form-group">
											<div class="col-md-6">
												<label for="adresse">العنوان</label>
												<textarea  type="text"  class="form-control" name="adresse" id="adresse" required></textarea>
											</div>
											<div class="col-md-3">
												<label for="naissance">تاريخ الازدياد</label>
												<input  type="date"  class="form-control" name="naissance" id="naissance" required>
											</div>
											<div class="col-md-3">
												<label>الجنس</label>
												<label class="radio">
													<input type="radio" value="male" name="sexe">
													<i></i>ذكر
												</label>
												<label class="radio">
													<input type="radio" value="female" name="sexe">
													<i></i>انثى
												</label>
											</div>
										</div>
									</div>
									<div class="row" dir="rtl">
										<div class="form-group">
											<div class="col-md-6">
												<label for="parent_name">الاسم العائلي لولي الامر</label>
												<input  type="text"  class="form-control" name="parent_name" id="parent_name" required>
											</div>
											<div class="col-md-6">
												<label for="parent_last_name">الاسم الشخصي لولي الامر</label>
												<input  type="text"  class="form-control" name="parent_last_name" id="parent_last_name" required>
											</div>
										</div>
									</div>
									<div class="row" dir="rtl">
										<div class="form-group">
											<div class="col-md-6">
												<label> صفة ولي الامر </label>
												<label class="radio">
													<input type="radio" value="father" name="descr_parent">
													<i></i>أب
												</label>
												<label class="radio">
													<input type="radio" value="mather" name="descr_parent">
													<i></i> ام 
												</label>
												<label class="radio">
													<input type="radio" value="other" name="descr_parent">
													<i></i> آخر 
												</label>
											</div>
											<div class="col-md-6">
												<label for="cin">رقم بطاقة التعريف</label>
												<input  type="text"  class="form-control" name="cin" id="cin">
											</div>
										</div>
									</div>
									<div class="row" dir="rtl">
										<div class="form-group">
											<div class="col-md-6">
												<label for="contact:email">البريد الإلكتروني</label>
												<input  type="email"  class="form-control" name="email" id="email" required>
											</div>
											<div class="col-md-6">
												<label for="contact:phone">الهاتف</label>
												<input type="text"  class="form-control" name="tele" id="tele" required>
											</div>	
										</div>
									</div>
									<div class="row" dir="rtl">
										<div class="form-group">
											<div class="col-md-12">
											<?php $list = select("SELECT id,libelle FROM niveau");
											for ($i=0; $i < count($list); $i++) { 
											echo '<label class="radio">'.
													'<input type="radio" value="'.$list[$i][0].'" name="niveau">'.
												'<i></i>'.$list[$i][1].'</label>';
											}?>
											</div>
										</div>
									</div>
								</div>	
							</fieldset>
							<div class="row" style="padding-bottom:2%">
								<div class="col-md-12">
									<center>
										<input type="submit" class="btn btn-primary"  value="إرسال الطلب" />
									</center>
								</div>
							</div>
						</form>
					</div>
					<!-- /FORM -->
				</div>
			</div>
		</section>
		<script>

		</script>
<?php
	include("footer.php");
?>