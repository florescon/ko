<div class="section d-none d-xl-block nav-border-bottom-light">
    <div class="section-1400">
        <div class="container-fluid">
            <div class="row">
                <div class="col-auto align-self-center">
                    <p class="mb-0 size-13 text-center-v color-gray"><i class="uil uil-calling size-18 mr-2 color-gray"></i> {{ setting('site_phone') }}</p>
                </div>


                <div class="col-auto align-self-center">
                    <p class="mb-0 size-13 text-center-v color-gray"><i class="uil uil-envelope-check size-18 mr-2 color-gray"></i> {{ setting('site_email') }} </p>
                </div>
                <div class="col-auto align-self-center">
                    @if(config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
                        <li class="dropdown-item dropdown-sub">
                            <x-utils.link
                                :text="__(getLocaleName(app()->getLocale()))"
                                class="mb-0 size-13 text-center-v color-gray"
                                id="navbarDropdownLanguageLink"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false" />

                            @include('includes.partials.lang')
                        </li>
                    @endif
                </div>
                <div class="col align-self-center pr-5 text-right">
                    @guest
                        <a href="{{ route('frontend.auth.login') }}" class="link size-14 animsition-link" data-hover="{{ __('Login') }}">@lang('Login')</a> 
                        <a href="{{ route('frontend.auth.register') }}" class="link size-14 ml-2 animsition-link" data-hover="{{ __('Register') }}">@lang('Register')</a>
                    @else
                        <a href="{{ route('frontend.user.account') }}" class="link size-14 animsition-link" data-hover="{{ __('My Account') }}"> @lang('My Account')</a> 
                    @endguest
                    {{-- <a href="contact-1.html" class="link size-14 ml-2 animsition-link" data-hover="Contact">@lang('Contact')</a> --}}
                    

                    <button data-toggle="modal" data-target="#modal-qr" type="button" class="btn-icon-transparent border-0 pl-4 ml-4">
                        <i class="fa fa-qrcode" aria-hidden="true"></i>
                    </button>

                </div>
                <div class="col-auto align-self-center text-right">
                    <a href="{{ setting('site_facebook') }}" class="link link-primary size-14" data-hover="F" target="_blank">
                        <i class="fa fa-facebook" aria-hidden="true" style="font-size:19px"></i>
                    </a> 
                    <a href="https://wa.me/{{ setting('site_whatsapp') }}" class="link link-success size-14 ml-2" data-hover="W" target="_blank">
                        <i class="fa fa-whatsapp" aria-hidden="true"  style="font-size:19px"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
