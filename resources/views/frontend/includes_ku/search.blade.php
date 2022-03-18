			<!-- Search -->
			<div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="Search">
				<div class="rightMenu-scroll">
					<div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
						<h4 class="cart_heading fs-md ft-medium mb-0">@lang('Search Products')</h4>
						<button onclick="closeSearch()" class="close_slide"><i class="ti-close"></i></button>
					</div>
						
					<div class="cart_action px-3 py-4">
                        <form action="{{ route('frontend.shop.index') }}" class="form m-0 p-0" method="get">
                            <div class="form-group">
                                <input type="text" name="searchTermShop" id="searchTermShop" class="form-control" placeholder="{{ __('Search') }}..." autocomplete="off">
                            </div>
                        </form>
					</div>
					
				</div>
			</div>
