
			<!-- ======================= Product Detail ======================== -->
			<section class="middle">
				<div class="container">
					<div class="row">
					
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
							<div class="sp-loading"><img src="{{ asset('/ku/assetss/img/loading.gif') }}" alt=""><br>LOADING IMAGES</div>
							<div class="sp-wrap">
								<a href="{{ asset('/storage/' . $origPhoto) }}"><img src="{{ asset('/storage/' . $origPhoto) }}" onerror="this.onerror=null;this.src='/img/ga/not0.png';" alt=""></a>
								@foreach($model->pictures as $pict)
									<a href="{{ asset('/storage/' . $pict->picture) }}"><img src="{{ asset('/storage/' . $pict->picture) }}" alt=""></a>
								@endforeach
							</div>
						</div>
						
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
							<div class="prd_details">
								
								<div class="prt_01 mb-1"><span class="text-purple bg-light-purple rounded py-1">{{ optional($model->line)->name }}</span></div>
								<div class="prt_02 mb-3">
									<h2 class="ft-bold mb-1">{{ $model->name }}</h2>
									<div class="text-left">
										<div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
											@for ($i = 0; $i < rand(4,5); $i++)
												<i class="fas fa-star filled"></i>
											@endfor
											@if($i === 4)
												<i class="fas fa-star"></i>
											@endif
										</div>
										<div class="elis_rty"><span class="ft-medium text-muted line-through fs-md mr-2">${{ $model->price*((100+10))/100 }}</span><span class="ft-bold theme-cl fs-lg mr-2">${{ $model->price }}</span></div>
									</div>
								</div>
								
								<div class="prt_03 mb-4">
									<p>{{ $model->description }}</p>
								</div>

								<livewire:frontend.shop.shop-parameters-component :product="$product_id"/>
							
								<div class="prt_05 mb-4">
									<div class="form-row mb-7">
										<div class="col-12 col-lg-auto">
											<!-- Quantity -->
											<select class="mb-2 custom-select">
											  <option value="1" selected="">1</option>
											  <option value="2">2</option>
											  <option value="3">3</option>
											  <option value="4">4</option>
											  <option value="5">5</option>
											</select>
										</div>
										<div class="col-12 col-lg">
											<!-- Submit -->
											<button type="submit" class="btn btn-block custom-height bg-dark mb-2">
												<i class="lni lni-shopping-basket mr-2"></i>@lang('Add to Cart') 
											</button>
										</div>
								  </div>
								</div>
								
								<div class="prt_06">
									<p class="mb-0 d-flex align-items-center">
									  <span class="mr-4">@lang('Share'):</span>
									  <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2" href="#!">
										<i class="fab fa-twitter position-absolute"></i>
									  </a>
									  <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2" href="#!">
										<i class="fab fa-facebook-f position-absolute"></i>
									  </a>
									</p>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ======================= Product Detail End ======================== -->
			
			<!-- ======================= Product Description ======================= -->
			<section class="middle">
				<div class="container">
					<div class="row align-items-center justify-content-center">
						<div class="col-xl-11 col-lg-12 col-md-12 col-sm-12">
							<ul class="nav nav-tabs b-0 d-flex align-items-center justify-content-center simple_tab_links mb-4" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="description-tab" href="#description" data-toggle="tab" role="tab" aria-controls="description" aria-selected="true">@lang('Description')</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" href="#information" id="information-tab" data-toggle="tab" role="tab" aria-controls="information" aria-selected="false">@lang('Additional information')</a>
								</li>
							</ul>
							
							<div class="tab-content" id="myTabContent">
								
								<!-- Description Content -->
								<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
									<div class="description_info">
										@if($model->advanced()->exists())
											{!! clean($model->advanced->description) ?? '' !!}
										@endif
									</div>
								</div>
								
								<!-- Additional Content -->
								<div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
									<div class="additionals">
										@if($model->advanced()->exists())
											@if($model->advanced->description)
												{!! clean($model->advanced->description) ?? '' !!}
												<br>
											@endif
											@if($model->advanced->information)
												{!! clean($model->advanced->information) ?? '' !!}
												<br>
											@endif
											@if($model->advanced->extra)
												{!! clean($model->advanced->extra) ?? '' !!}
												<br>
											@endif
											@if($model->advanced->dimensions)
												{!! clean($model->advanced->dimensions) ?? '' !!}
												<br>
											@endif
											@if($model->advanced->standards)
												{!! clean($model->advanced->standards) ?? '' !!}
												<br>
											@endif
										@endif
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ======================= Product Description End ==================== -->
			

