	<!-- Footer -->
	<footer class="footer">
		<!-- Footer Top -->
		@if(isset($brand_profile))
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 text-center pt-4">

					<p style="font-size: 18px; color: #fff;">
						{{$brand_profile->user->email}} <i class="fa fa-envelope"></i>
					</p>
				</div>
				<div class="col-md-4 text-center pt-4">
					<p style="font-size: 18px; color: #fff;">
						{{$brand_profile->whatsapp_no}} <i class="fa fa-phone"></i>
					</p>
				</div>
				<div class="col-md-4 text-center pt-4">
					<p style="font-size: 18px; color: #fff;">
						{{$brand_profile->brandaddresses['0']->address}} <i class="fa fa-map-marker"></i>
					</p>
				</div>
			</div>
		</div>
		@endif
		<!-- /Footer Top -->
		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="container-fluid">
				<!-- Copyright -->
				<div class="copyright">
					<div class="row">
						<div class="col-6 text-right">
							<div class="copyright-text">
								<p class="mb-0">&copy; כל הזכויות שמורות לדוסיז צרכנות ויזמות בע''מ</p>

							</div>
						</div>
						<div class="col-6 text-left">
							<div class="copyright-text">
								<p class="mb-0"></p>
							</div>
						</div>
					</div>
				</div>
				<!-- /Copyright -->
				
			</div>
		</div>
		<!-- /Footer Bottom -->
		
	</footer>
	<!-- /Footer -->
	</div>
			
	 