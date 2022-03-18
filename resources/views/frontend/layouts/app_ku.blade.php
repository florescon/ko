<!DOCTYPE html>
<html lang="zxx">
	
<head>
		<meta charset="utf-8" />
		<meta name="author" content=":)" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
    	<meta name="csrf-token" content="{{ csrf_token() }}">
	    <meta name="description" content="@yield('meta_description', appName())">
        <title>{{ appName() }}</title>
		 
        <!-- Custom CSS -->
        @stack('before-styles')

	    <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="{{ asset('/ku/assetss/css/styles.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css_custom/ku.css')}}">

        <livewire:styles />

        @stack('after-styles')

    </head>
	
    <body>
	
		 <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
       <div class="preloader"></div>
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
			<div class="py-2 bg-dark">
		        @include('frontend.includes_ku.top')
			</div>

		    @include('includes.partials.read-only')
		    @include('includes.partials.logged-in-as')

	        @include('frontend.includes_ku.navigation')

			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			

            @include('includes.partials.messages')

	        @yield('content')
			
	        @include('frontend.includes_ku.footer')

	        @include('frontend.includes_ku.product-modal')
			
	        @include('frontend.includes_ku.login-modal')
						
	        @include('frontend.includes_ku.search')
						
	        @include('frontend.includes_ku.cart')

			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			
		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->

	    @stack('before-scripts')

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

	    <livewire:scripts />

	    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
	    <script>
	        $.fn.select2.defaults.set('language', '@lang('labels.general.language')');
	    </script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/es.js"></script>

	    @stack('after-scripts')

	</body>

</html>