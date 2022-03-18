<div class="">
	<!-- ======================= Shop Style 1 ======================== -->
	<section class="gray">
		<div class="container">
			
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3 text-center">
					<h1 class="ft-medium mb-3">@lang('Product Categories')</h1>
				</div>
			</div>
			
			<div class="row align-items-center justify-content-center">
				<div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
					<div class="row">
						@foreach($lines as $line)
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-3">
								<div class="cats_side_wrap text-center m-auto">
									<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 bg-white"><a href="{{ route('frontend.shop.index', ['lineName' => (string)$line->slug]) }}" id="lineName" class="d-block"><img src="{{ asset('/storage/' . $line->file_name) }}" class="img-fluid" width="40" alt="" /></a></div></div>
									<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">{{ $line->name }}</a></h6></div>
								</div>
							</div>
						@endforeach

						{{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-3">
							<div class="cats_side_wrap text-center m-auto">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 bg-white"><a href="javascript:void(0);" class="d-block"><img src="{{ asset('/ku/assetss/img/tshirt.png') }}" class="img-fluid" width="40" alt="" /></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Shirt</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-3">
							<div class="cats_side_wrap text-center m-auto">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 bg-white"><a href="javascript:void(0);" class="d-block"><img src="{{ asset('/ku/assetss/img/chaleco.png') }}" class="img-fluid" width="40" alt="" /></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Chaleco</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-3">
							<div class="cats_side_wrap text-center m-auto">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 bg-white"><a href="javascript:void(0);" class="d-block"><img src="{{ asset('/ku/assetss/img/jacket.png') }}" class="img-fluid" width="40" alt="" /></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Jacket</a></h6></div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-3">
							<div class="cats_side_wrap text-center m-auto">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 bg-white"><a href="javascript:void(0);" class="d-block"><img src="{{ asset('/ku/assetss/img/pants.png') }}" class="img-fluid" width="40" alt="" /></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Pants</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-3">
							<div class="cats_side_wrap text-center m-auto">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 bg-white"><a href="javascript:void(0);" class="d-block"><img src="{{ asset('/ku/assetss/img/industrial.png') }}" class="img-fluid" width="40" alt="" /></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Industrial</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-3">
							<div class="cats_side_wrap text-center m-auto">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 bg-white"><a href="javascript:void(0);" class="d-block"><img src="{{ asset('/ku/assetss/img/jeans.png') }}" class="img-fluid" width="40" alt="" /></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Jeans</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-3">
							<div class="cats_side_wrap text-center m-auto">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 bg-white"><a href="javascript:void(0);" class="d-block"><img src="{{ asset('/ku/assetss/img/shorts.png') }}" class="img-fluid" width="40" alt="" /></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Shorts</a></h6></div>
							</div>
						</div>
												
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-3">
							<div class="cats_side_wrap text-center m-auto">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 bg-white"><a href="javascript:void(0);" class="d-block"><img src="{{ asset('/ku/assetss/img/uniform.png') }}" class="img-fluid" width="40" alt="" /></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Uniform</a></h6></div>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ======================= Shop Style 1 ======================== -->
	
	
	<!-- ======================= Filter Wrap Style 1 ======================== -->
	<section class="py-2 br-bottom br-top">
		<div class="container">
			<div class="row align-items-center justify-content-between">
				<div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('Home')</a></li>
							<li class="breadcrumb-item active" aria-current="page">@lang('Products')</li>
						</ol>
					</nav>
				</div>
				
				<div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">
					<div class=" d-flex align-items-center justify-content-end">
						<div class=" mr-2 br-right">
							<input type="search" class="form-control" placeholder="{{ __('Search') }}" name="search" id="search" wire:model.debounce.350ms="searchTermShop" />
						</div>
					</div>
				</div>
			</div>
						
		</div>
	</section>
	<!-- ============================= Filter Wrap ============================== -->
	
	
	<!-- ======================= All Product List ======================== -->
	<section class="middle">
		<div class="container">
		
			<!-- row -->
			<div class="row align-items-center rows-products">
				
				@foreach($products as $product)
					<!-- Single -->
					<div class="col-xl-3 col-lg-4 col-md-6 col-6">
						<div class="product_grid card b-0">
							@if($product->created_at->gt(\Carbon\Carbon::now()->subMonth()))
								<div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">@lang('New')</div>
							@endif
							<div class="card-body p-0">
								<div class="shop_thumb position-relative">
									<a class="card-img-top d-block overflow-hidden" href="{{ route('frontend.shop.show', $product->slug) }}"><img class="card-img-top" src="{{ asset('/storage/' . $product->file_name) }}" alt="{{ $product->name }}" onerror="this.src='/img/ga/not0.png';"></a>
									<div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
										<div class="edlio"><a href="#" data-toggle="modal" data-target="#quickview" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Quick View</a></div>
									</div>
								</div>
							</div>
							<div class="card-footer b-0 p-0 pt-2 bg-white">
								<div class="d-flex align-items-start justify-content-between">
									<div class="text-left">
										<div class="form-check form-option form-check-inline mb-1">
											<input class="form-check-input" type="radio" name="color1" id="white" checked="">
											<label class="form-option-label small rounded-circle" for="white"><span class="form-option-color rounded-circle blc1"></span></label>
										</div>
										<div class="form-check form-option form-check-inline mb-1">
											<input class="form-check-input" type="radio" name="color1" id="blue">
											<label class="form-option-label small rounded-circle" for="blue"><span class="form-option-color rounded-circle blc2"></span></label>
										</div>
										<div class="form-check form-option form-check-inline mb-1">
											<input class="form-check-input" type="radio" name="color1" id="yellow">
											<label class="form-option-label small rounded-circle" for="yellow"><span class="form-option-color rounded-circle blc3"></span></label>
										</div>
										<div class="form-check form-option form-check-inline mb-1">
											<input class="form-check-input" type="radio" name="color1" id="pink">
											<label class="form-option-label small rounded-circle" for="pink"><span class="form-option-color rounded-circle blc4"></span></label>
										</div>
									</div>
									<div class="text-right">
										{{-- <button class="btn auto btn_love snackbar-wishlist"><i class="far fa-heart"></i></button> --}}
									</div>
								</div>
								<div class="text-left">
									<h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">{{ $product->name }}</a></h5>
									<div class="elis_rty"><span class="ft-bold text-dark fs-sm">${{ $product->price }}</span></div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				
			</div>
			<!-- row -->
			
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<nav aria-label="Page navigation example">
				    @if($products->count())
					<div class="row">
				        <div class="col-sm-9">
				        	{{ $products->links() }}
					    </div>
				        <div class="col-sm-3 text-muted text-right">
				        	{{ $products->firstItem() }} - {{ $products->lastItem() }} de {{ $products->total() }}
				        </div>
				    </div>
				    @else
					    @lang('No search results') 
				      	@if($searchTermShop)
				        	"{{ $searchTermShop }}" 
				      	@endif

				      	@if($page > 1)
				        	{{ __('in the page').' '.$page }}
				      	@endif
				    @endif
				</nav>
			</div>
			
		</div>
	</section>
	<!-- ======================= All Product List ======================== -->
	
</div>