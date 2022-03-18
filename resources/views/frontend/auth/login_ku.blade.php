@extends('frontend.layouts.app_ku')

@section('title', __('Login'))

@section('content')
	<!-- ======================= Login ======================== -->
	<section class="middle">
		<div class="container">
		
			<div class="row justify-content-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="sec_title position-relative text-center">
						<h2 class="off_title">@lang('Login')</h2>
						<h3 class="ft-bold pt-3">@lang('Enter!')</h3>
					</div>
				</div>
			</div>
			
			<div class="row align-items-start justify-content-between">
			
				<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
				</div>
				
				<div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                    <x-forms.post :action="route('frontend.auth.login')">
							
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="small text-dark ft-medium">@lang('E-mail Address')</label>
								<input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required autofocus autocomplete="email">
							</div>
						</div>
						
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="small text-dark ft-medium">@lang('Password')</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="current-password" />
							</div>
						</div>
						
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4 ml-4">
                                    <div class="form-check">
                                        <input name="remember" id="remember" class="form-check-input" type="checkbox" {{ old('remember') ? 'checked' : '' }} />

                                        <label class="form-check-label" for="remember">
                                            @lang('Remember Me')
                                        </label>
                                    </div><!--form-check-->
                                </div>
                            </div><!--form-group-->
						</div>
						
                        @if(config('boilerplate.access.captcha.login'))
                            <div class="row">
                                <div class="col">
                                    @captcha
                                    <input type="hidden" name="captcha_status" value="true" />
                                </div><!--col-->
                            </div><!--row-->
                        @endif

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<button class="btn btn-dark" type="submit">@lang('Login')</button>
							</div>
						</div>

                        <div class="text-center">
                            @include('frontend.auth.includes.social')
                        </div>

                    </x-forms.post>
				</div>

				<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
				</div>
				
			</div>
		</div>
	</section>
	<!-- ======================= Login ======================== -->
@endsection
