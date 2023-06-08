			<div class="modal fade bs-example-modal-sm" tabindex="-1" id="exampleModal" role="dialog" aria-labelledby="mySmallModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="gridSystemModalLabel"></h4>
						</div>
						<div class="modal-body">
							<h1 id="msg"></h1>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">حسنا</button>
						</div>
					</div>
				</div>
			</div>
			<footer id="footer" style="background:#43495;">
			    <div class="container">
					<div class="row">
						<div class="col-md-4">
							<h4 class="letter-spacing-1">Groupe Scolaire Alhakim Oujda</h4>
							<address>
								<ul class="list-unstyled">
									<li class="footer-sprite address">
										Adresse : Quartier Alhikma, Rue Arrahma, Oujda<br>
									</li>
									<li class="footer-sprite phone">
										Téléphone : 05365-04660
									</li>
									<li class="footer-sprite email">
										<a> Email : contact@Groupe-alhakim.com</a>
									</li>
								</ul>
							</address>
							<!-- Newsletter Form -->
							<h4 class="letter-spacing-1" style="margin-top:40px">Abonnez-vous à notre <strong>Newsletter</strong></h4>
							<form class="" data-toastr-position="bottom-right">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" id="email" name="email" class="form-control required" placeholder="Entrer votre Email" required>
									<span class="input-group-btn">
										<input class="btn btn-success" type="button" style="color:#fff;background-color: #b64f6d;border-color: #b64f6d;" data-toggle="modal" data-target="#exampleModal" onclick="addclientnewsletter()" value="Souscrire"/>
									</span>
								</div>
							</form>
							<!-- /Contact Address -->
						</div>
						<div class="col-md-4">
							<h4 class="letter-spacing-1">Demander un Appel</h4>
							<form >
								<input type="text" id="nom" placeholder="Nom*" maxlength="100" class="form-control required" name="nom">
								<input type="text" id="tele" placeholder="Telephone*" class="form-control required" name="tele">
								<input type="button" value="Envoyer" style="color:#fff;background-color: #b64f6d;border-color: #b64f6d;" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" onclick="addRequestCall()">
							</form>
							<div style="">
								<h4 class="letter-spacing-1" style="margin-top:0px">Suivez nous</h4>
								<!-- Social Icons -->
								<div class="">
									<a href="index.php#" class="social-icon social-icon-border social-facebook pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>
									<a href="index.php#" class="social-icon social-icon-border social-twitter pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
										<i class="icon-twitter"></i>
										<i class="icon-twitter"></i>
									</a>
									<a href="index.php#" class="social-icon social-icon-border social-gplus pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google plus">
										<i class="icon-gplus"></i>
										<i class="icon-gplus"></i>
									</a>
									<a href="index.php#" class="social-icon social-icon-border social-linkedin pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
										<i class="icon-linkedin"></i>
										<i class="icon-linkedin"></i>
									</a>
									<a href="index.php#" class="social-icon social-icon-border social-rss pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Rss">
										<i class="icon-rss"></i>
										<i class="icon-rss"></i>
									</a>
								</div>
								<!-- /Social Icons -->
							</div>
						</div>
						<div class="col-md-4">
							<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FALHAKIM02%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
						</div>
					</div>
				</div>
				<div class="copyright">
					<div class="container">
						<ul class="pull-right nomargin list-inline mobile-block">
							<li><a href="index.php#">© 2021  Groupe Scolaire Alhakim. Tous droits réservés.</a></li>
						</ul>
					</div>
				</div>
			</footer>
			<!-- /FOOTER -->
		</div>
		<!-- /wrapper -->
		<a href="index.php" id="toTop" style="background-color: rgb(196, 81, 114);"></a>
		<script type="text/javascript">var plugin_path = 'asset/';</script>
		<script type="text/javascript" src="asset/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="asset/js/script_f.js"></script>
		<script type="text/javascript" src="asset/js/scripts.js"></script>	
		<script type="text/javascript" src="asset/js/java.js"></script> 
		<script type="text/javascript" src="asset/js/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="asset/slider.revolution/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="asset/slider.revolution/js/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="asset/js/view/demo.revolution_slider.js"></script>	 
   </body>
</html>