				<div class="container">
					<div class="row">
						
						<div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 hide-ipad">
							<div class="top_first"><a href="callto:(+84)0123456789" class="medium text-light">{{ setting('site_phone') }}</a></div>
						</div>
						
						<div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 hide-ipad">
							<div class="top_second text-center"><p class="medium text-light m-0 p-0">{{ appName() }}</p></div>
						</div>
						
						<!-- Right Menu -->
						<div class="col-xl-4 col-lg-4 col-md-5 col-sm-12">
							
							<!-- Account -->
			
			                @guest
								<div class="currency-selector dropdown js-dropdown float-right mr-3">
									<a href="{{ route('frontend.auth.login') }}" class="text-light medium">@lang('Login')</a>
								</div>
			                @else

								<div class="language-selector-wrapper dropdown js-dropdown float-right mr-3">
									<a class="popup-title" href="javascript:void(0)" data-toggle="dropdown" title="{{ __('Account') }}" aria-label="Account dropdown">
										<span class="hidden-xl-down medium text-light">@lang('Account'):</span>
										<span class="iso_code medium text-light">@lang('Account')</span>
										<i class="fa fa-angle-down medium text-light"></i>
									</a>
									<ul class="dropdown-menu popup-content link">
			                            @if ($logged_in_user->isUser())
											<li class="current"><a href="{{ route('frontend.user.dashboard') }}" class="dropdown-item medium text-medium"><span>@lang('Dashboard')</span></a></li>
										@endif

										<li class="current"><a href="{{ route('frontend.user.account') }}" class="dropdown-item medium text-medium"><span>@lang('My Account')</span></a></li>

										<li>
											<a href="#" role="button" class="dropdown-item medium text-medium" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
											<span>
			                                    @lang('Logout')
			                                    <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
											</span>
											</a>
										</li>
									</ul>
								</div>

	                            @if ($logged_in_user->isAdmin())
									<div class="currency-selector dropdown js-dropdown float-right mr-3">
										<a href="{{ route('admin.dashboard') }}" class="text-light medium">@lang('Administration')</a>
									</div>
	                            @endif

			                @endguest
    
						</div>
						
					</div>
				</div>
