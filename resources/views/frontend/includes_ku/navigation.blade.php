<!-- Start Navigation -->
<div class="header header-light dark-text">
	<div class="container">
		<nav id="navigation" class="navigation navigation-landscape">
			<div class="nav-header">
				<a class="nav-brand" href="#">
					<img src="{{ asset('/img/logo22.png') }}" class="logo" alt="" />
				</a>
				<div class="nav-toggle"></div>
				<div class="mobile_nav">
					<ul>
						<li>
							<a href="#" onclick="openSearch()">
								<i class="lni lni-search-alt"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="nav-menus-wrapper" style="transition-property: none;">
				<ul class="nav-menu">
				
					<li><a href="{{ url('/') }}">@lang('Home')</a></li>
					
				</ul>
				
				<ul class="nav-menu nav-menu-social align-to-right">
					<li>
						<a href="#" onclick="openSearch()">
							<i class="lni lni-search-alt"></i>
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<!-- End Navigation -->
