	<!-- Footer -->
	<footer class="footer">
		<!-- Footer Top -->
		@if(isset($brand_profile))
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 text-center pt-4">

					<p style="font-size: 18px; color: #fff;">
						<a href='mailto:{{$brand_profile->user->email}}' style="font-size: 18px; color: #fff !important; ">{{$brand_profile->user->email}} <i class="fa fa-envelope"></i></a>
					</p>
				</div>
				<div class="col-md-4 text-center pt-4">
					<p style="font-size: 18px; color: #fff !important; ">
						<a href="https://api.whatsapp.com/send?phone={{$brand_profile->whatsapp_no ?? ''}}&amp;text=%D7%A9%D7%9C%D7%95%D7%9D%20%D7%95%D7%91%D7%A8%D7%9B%D7%94%2C%20%D7%90%D7%A0%D7%99%20%D7%A4%D7%95%D7%A0%D7%94%20%D7%90%D7%9C%D7%99%D7%9A%20%D7%9E%D7%94%D7%90%D7%AA%D7%A8%20%D7%A9%D7%9C%D7%9A%20%D7%91%D7%93%D7%95%D7%A1%D7%99%D7%96%20%D7%A6%D7%A8%D7%9B%D7%A0%D7%95%D7%AA%2C%20%D7%90%D7%A9%D7%9E%D7%97%20%D7%91%D7%91%D7%A7%D7%A9%D7%94..." style="font-size: 18px; color: #fff !important; "> {{$brand_profile->whatsapp_no ?? ''}} <i class="fa fa-phone"></i></a>
					</p>
				</div>
				<div class="col-md-4 text-center pt-4">
					<p style="font-size: 18px; color: #fff !important;">
						<a style="color: #fff !important;" href="https://maps.google.com/?q={{$brand_profile->brandaddresses['0']->address ?? ''}}">{{$brand_profile->brandaddresses['0']->address ?? ''}} <i class="fa fa-map-marker"></i></a>
					</p>
				</div>
			</div>
		</div>
		{{-- <a href="https://api.whatsapp.com/send?phone={{$brand_profile->whatsapp_no ?? ''}}" class="float" target="_blank">			   --}}
			@if(str_split($brand_profile->whatsapp_no)[0]=="+" || str_split($brand_profile->whatsapp_no)[0]=="9")
			<a href="https://api.whatsapp.com/send?phone='.{{$brand_profile->whatsapp_no}}.'&text=%D7%A9%D7%9C%D7%95%D7%9D%20%D7%95%D7%91%D7%A8%D7%9B%D7%94%2C%20%D7%90%D7%A0%D7%99%20%D7%A4%D7%95%D7%A0%D7%94%20%D7%90%D7%9C%D7%99%D7%9A%20%D7%9E%D7%94%D7%90%D7%AA%D7%A8%20%D7%A9%D7%9C%D7%9A%20%D7%91%D7%93%D7%95%D7%A1%D7%99%D7%96%20%D7%A6%D7%A8%D7%9B%D7%A0%D7%95%D7%AA%2C%20%D7%90%D7%A9%D7%9E%D7%97%20%D7%91%D7%91%D7%A7%D7%A9%D7%94..." class="float" target="_blank">

			@else
			<a href="https://api.whatsapp.com/send?phone=+972'{{$brand_profile->whatsapp_no}}'&text=%D7%A9%D7%9C%D7%95%D7%9D%20%D7%95%D7%91%D7%A8%D7%9B%D7%94%2C%20%D7%90%D7%A0%D7%99%20%D7%A4%D7%95%D7%A0%D7%94%20%D7%90%D7%9C%D7%99%D7%9A%20%D7%9E%D7%94%D7%90%D7%AA%D7%A8%20%D7%A9%D7%9C%D7%9A%20%D7%91%D7%93%D7%95%D7%A1%D7%99%D7%96%20%D7%A6%D7%A8%D7%9B%D7%A0%D7%95%D7%AA%2C%20%D7%90%D7%A9%D7%9E%D7%97%20%D7%91%D7%91%D7%A7%D7%A9%D7%94..." class="float" target="_blank">
			@endif

			<i class="fab fa-whatsapp my-float" aria-hidden="true"></i>
			<div id="float_text">זמינים עבורכם כאן!</div>
			</a>
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
			
	 