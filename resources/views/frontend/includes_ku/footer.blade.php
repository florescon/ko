<!-- ============================ Footer Start ================================== -->
<footer class="dark-footer skin-dark-footer style-2">
	<div class="footer-middle">
		<div class="container">
			<div class="row">
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
					<div class="footer_widget">
						<img src="{{ asset('/img/kodomi.png') }}" class="img-footer small mb-2" alt="" />
						
						<div class="address mt-3">
							{{ setting('site_address') }}	
						</div>
						<div class="address mt-3">
							{{ setting('site_phone') }}<br>{{ setting('site_email') }}
						</div>
						<div class="address mt-3">
							<ul class="list-inline">
								<li class="list-inline-item"><a href="{{ setting('site_facebook') }}" target="_blank"><i class="lni lni-facebook-filled"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="lni lni-twitter-filled"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="lni lni-youtube"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="lni lni-instagram-filled"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
					<div class="footer_widget">
						<h4 class="widget_title">@lang('Supports')</h4>
						<ul class="footer-menu">
							<li><a href="#">@lang('Contact Us')</a></li>
							<li><a href="#">@lang('About Us')</a></li>
						</ul>
					</div>
				</div>
								
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
					<div class="footer_widget">
						<h4 class="widget_title">@lang('Company')</h4>
						<ul class="footer-menu">
							<li><a href="#">@lang('Login')</a></li>
						</ul>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
					<div class="footer_widget">
						<h4 class="widget_title">@lang('Subscribe')</h4>
						<div class="foot-news-last">
							<div class="input-group">
							  <input type="text" class="form-control" placeholder="{{ __('Email Address') }}">
								<div class="input-group-append">
									<button type="button" class="input-group-text b-0 text-light"><i class="lni lni-arrow-right"></i></button>
								</div>
							</div>
						</div>
						<div class="address mt-3">
							<h5 class="fs-sm text-light">@lang('Secure Payments')</h5>
							<div class="scr_payment"><img src="{{ asset('/ku/assetss/img/card.png') }}" class="img-fluid" alt="" /></div>
						</div>
					</div>
				</div>
					
			</div>
		</div>
	</div>
	
	<div class="footer-bottom">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12 col-md-12 text-center">
					<p class="mb-0">© {{ date('Y') }} {{ __(appName()) }}.</p>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- ============================ Footer End ================================== -->
