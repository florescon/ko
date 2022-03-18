@extends('frontend.layouts.app_ku')

@section('title', __('Login'))

@section('content')

	<livewire:frontend.shop.shop-show-component :product="$shop"/>

	<!-- ======================= Similar Products Start ============================ -->
	<section class="middle pt-0">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="sec_title position-relative text-center">
						<h2 class="off_title">@lang('Another products')</h2>
						<h3 class="ft-bold pt-3">@lang('Related products')</h3>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="slide_items">

						@foreach($related_products as $related_product)
							<!-- single Item -->
							<div class="single_itesm">
								<div class="product_grid card b-0 mb-0">
									@if($related_product->created_at->gt(\Carbon\Carbon::now()->subMonth()))
										<div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">@lang('New')</div>
									@endif
									<div class="card-body p-0">
										<div class="shop_thumb position-relative">
											<a class="card-img-top d-block overflow-hidden" href="{{ route('frontend.shop.show', $related_product->slug) }}"><img class="card-img-top" src="{{ asset('/storage/' . $related_product->file_name) }}" alt="{{ $related_product->name }}" onerror="this.onerror=null;this.src='/img/ga/not0.png';" alt="..."></a>
										</div>
									</div>
									<div class="card-footer b-0 p-3 pb-0 d-flex align-items-start justify-content-center">
										<div class="text-left">
											<div class="text-center">
												<h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="{{ route('frontend.shop.show', $related_product->slug) }}">{{ $related_product->name }}</a></h5>
												<div class="elis_rty"><span class="ft-bold fs-md text-dark">${{ $related_product->price }}</span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
														
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<!-- ======================= Similar Products Start ============================ -->


@endsection
