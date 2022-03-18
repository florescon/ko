<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
    <head>
        <meta charset="utf-8" />
        <title>{{ appName() }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('meta_description', appName())">
        <meta content="Themezhub" name="author" />
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <!-- Bootstrap css -->
        <link href="{{ asset('/ku/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="{{ asset('/ku/assets/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Main css File -->
        <link href="{{ asset('/ku/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/ku/assetss/css/styles.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body>

        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">

        @include('includes.partials.read-only')
        @include('includes.partials.logged-in-as')
        @include('includes.partials.messages')

            <div class="container">
                <!-- Logo container-->
                <a class="logo" href="{{ url('/') }}"><img src="{{ asset('/img/logo22.png') }}" alt="" /></a>
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>
        
                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu">
                        <li class="has-submenu">
                            <a href="#products">@lang('Products')</a>
                        </li>
                        <li class="has-submenu">
                            <a href="#categories">@lang('Categories')</a>
                        </li>
                        <li class="has-submenu">
                            <a href="#contact">@lang('Contact')</a>
                        </li>

                        @guest
                            <li class="has-submenu">
                                <a href="{{ route('frontend.auth.login') }}" class="text-danger medium">@lang('Login')</a>
                            </li>
                        @else
                            <li class="has-submenu">
                                <a href="{{ route('admin.dashboard') }}" class="text-success medium">@lang('Administration')</a>
                            </li>
                            <li class="has-submenu">
                                <a href="#" role="button" class="text-danger medium" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    @lang('Logout')
                                    <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                                </a>
                            </li>
                        @endguest
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->

        <!-- Home Start -->
        <section class="bg-half-170 heros-banner border-bottom d-table w-100" id="home">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7">
                        <div class="title_heading">
                            <h1 class="font-weight-bold text-primary">{{ appName() }}</h1>
                            <h4 class="heading font-weight-bold mb-3">@lang('We Built') <span class="element text-primary" data-elements="para tu identidad, cualquier prenda"></span></h4>
                            <p class="para-desc text-muted">
                                En <span class="text-primary font-weight-bold">{{ appName() }}</span> tenemos servicios de diseño, bordado, ponchado y serigrafía en batas, camisas, overoles, mandiles, pantalones, chamarras, pants, gorras y chalecos...
                            </p>
                        
                            <div class="mt-4 pt-2"> 
                                <a href="#products" class="btn btn-primary rounded mouse-down mr-2 mb-2">@lang('View products')</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <img src="{{ asset('/ku/assets/img/home.png') }}" class="img-fluid mover" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Products -->
        <section class="section middle" id="products">
            <div class="container">
            
                <div class="row align-items-center rows-products">
                    

                    @foreach($products as $product)
                    <!-- Single -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                        <div class="product_grid card b-0">
                            @if($product->created_at->gt(\Carbon\Carbon::now()->subMonth()))
                                <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">@lang('New')</div>
                            @endif
                            <div class="card-body p-0">
                                <div class="shop_thumb position-relative">
                                    <a class="card-img-top d-block overflow-hidden" href="{{ route('frontend.shop.show', $product->slug) }}"><img class="card-img-top" src="{{ asset('/storage/' . $product->file_name) }}" alt="{{ $product->name }}" onerror="this.onerror=null;this.src='/img/ga/not0.png';"></a>
                                    <div class="product-hover-overlay d-flex align-items-center justify-content-between">
                                        <div class="edlio"><a href="{{ route('frontend.shop.show', $product->slug) }}" class="text-underline fs-sm ft-bold">@lang('Show more')</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer b-0 p-0 pt-2 bg-white d-flex align-items-start justify-content-between">
                                <div class="text-left">
                                    <div class="text-left">
                                        <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                            @for ($i = 0; $i < rand(4,5); $i++)
                                                <i class="fas fa-star filled"></i>
                                            @endfor
                                            @if($i === 4)
                                                <i class="fas fa-star"></i>
                                            @endif
                                        </div>
                                        <h5 class="fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">{{ $product->name }}</a></h5>
                                        <div class="elis_rty"><span class="ft-bold text-dark fs-sm">${{ $product->price }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="position-relative text-center">
                            <a href="{{ route('frontend.shop.index') }}" class="btn stretched-link borders">@lang('Explore more')<i class="lni lni-arrow-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

        <!-- Start Categories -->
        <section class="section pt-0" id="categories">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title mb-4 text-center">
                            <h4 class="title text-uppercase font-weight-bold">@lang('Categories')</h4>
                        </div>
                    </div>  
                </div><!--end row-->

                <div class="row">

                    @foreach($lines as $line)
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="key-feature d-flex align-items-center p-3 rounded shadow bg-white">
                            <a href="{{ route('frontend.shop.index', ['lineName' => (string)$line->slug]) }}" id="lineName" class="d-block">
                                <div class="icon text-center rounded-pill mr-3">
                                    <img src="{{ asset('/storage/' . $line->file_name) }}" class="img-fluid" width="40" alt="" />
                                </div>
                                <div class="content">
                                    <h4 class="title mb-0">{{ $line->name }}</h4>
                                </div>
                            </a>
                        </div>
                    </div><!--end col-->
                    @endforeach
                 
                </div>
            </div><!--end container-->
        </section>
        <!--end section-->
        <!-- End Categories -->


        <!-- Features Demos -->
        <section class="section" id="contact">

                <div class="container">
                
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="sec_title position-relative text-center">
                                <h2 class="off_title">@lang('Contact Us')</h2>
                                <h3 class="ft-bold pt-3">@lang('Get In Touch')</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row align-items-start justify-content-between">
                    
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="card-wrap-body mb-4">
                                <h4 class="ft-medium mb-3 theme-cl">@lang('Address')</h4>
                                <p>
                                    {{ setting('site_address') }}
                                </p>
                                <p class="lh-1"><span class="text-dark ft-medium">Email:</span> {{ setting('site_email') }}</p>
                            </div>
                            
                            <div class="card-wrap-body mb-3">
                                <h4 class="ft-medium mb-3 theme-cl">@lang('Make a Call')</h4>
                                <h6 class="ft-medium mb-1">@lang('Customer Care'):</h6>
                                <p class="mb-2">{{ setting('site_phone') }}</p>
                            </div>
                            
                            <div class="card-wrap-body mb-3">
                                <h4 class="ft-medium mb-3 theme-cl">@lang('Drop A Mail')</h4>
                                <p class="lh-1 text-dark">{{ setting('site_email') }}</p>
                            </div>
                        </div>
                        
                        <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                            <form class="row">
                                    
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="small text-dark ft-medium">@lang('Your Name') *</label>
                                        <input type="text" class="form-control" placeholder="{{ __('Your Name') }}">
                                    </div>
                                </div>
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="small text-dark ft-medium">@lang('Your Email') *</label>
                                        <input type="text" class="form-control" placeholder="{{ __('Your Email') }}">
                                    </div>
                                </div>
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="small text-dark ft-medium">@lang('Subject')</label>
                                        <input type="text" class="form-control" placeholder="{{ __('Type Your Subject') }}">
                                    </div>
                                </div>
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="small text-dark ft-medium">@lang('Message')</label>
                                        <textarea class="form-control ht-80"></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-dark">@lang('Send Message')</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        
                    </div>
                </div>

        </section>

        <!-- Footer Start -->
        <footer class="footer footer-bar">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <p class="mb-0">© {{ date('Y') }} {{ appName() }}. @lang('Design with') <i class="mdi mdi-heart text-danger"></i></p>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer>
        <!-- Footer End -->

        <!-- Back to top -->
        <a href="#" class="back-to-top rounded text-center" id="back-to-top"> 
            <i data-feather="chevron-up" class="icons d-inline-block"></i>
        </a>
        <!-- Back to top -->
        
        <!-- javascript -->
        <script src="{{ asset('/ku/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/ku/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/ku/assets/js/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('/ku/assets/js/scrollspy.min.js') }}"></script>
        <!-- Icon -->
        <script src="{{ asset('/ku/assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('/ku/assets/js/unicons.js') }}"></script>
        <!-- Main Js -->
        <!-- TYPED -->
        <script src="{{ asset('/ku/assets/js/typed.js') }}"></script>
        <script src="{{ asset('/ku/assets/js/typed.init.js') }}"></script>
        <!-- Main Js -->
        <script src="{{ asset('/ku/assets/js/app.js') }}"></script>


        <script src="{{ asset('/ku/assetss/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/ku/assetss/js/popper.min.js') }}"></script>
        <script src="{{ asset('/ku/assetss/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/ku/assetss/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('/ku/assetss/js/slick.js') }}"></script>
        <script src="{{ asset('/ku/assetss/js/slider-bg.js') }}"></script>
        <script src="{{ asset('/ku/assetss/js/lightbox.js') }}"></script> 
        <script src="{{ asset('/ku/assetss/js/smoothproducts.js') }}"></script>
        <script src="{{ asset('/ku/assetss/js/snackbar.min.js') }}"></script>
        <script src="{{ asset('/ku/assetss/js/jQuery.style.switcher.js') }}"></script>
        <script src="{{ asset('/ku/assetss/js/custom.js') }}"></script>
        <!-- ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== --> 

        <script>
            function openWishlist() {
                document.getElementById("Wishlist").style.display = "block";
            }
            function closeWishlist() {
                document.getElementById("Wishlist").style.display = "none";
            }
        </script>
        
        <script>
            function openCart() {
                document.getElementById("Cart").style.display = "block";
            }
            function closeCart() {
                document.getElementById("Cart").style.display = "none";
            }
        </script>

        <script>
            function openSearch() {
                document.getElementById("Search").style.display = "block";
            }
            function closeSearch() {
                document.getElementById("Search").style.display = "none";
            }
        </script>       

    </body>

</html>