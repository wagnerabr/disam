<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>@yield('title')</title>
		<meta name="description" content="@yield('description')">
		@yield('canonical')

		<!-- <link href="{{ asset('assets/css/bootstrap.css/') }}" rel="stylesheet" type="text/css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="{{ asset('assets/css/style.css/') }}?v=10" rel="stylesheet" type="text/css">
		<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->
		<script src="https://kit.fontawesome.com/72fbff17f3.js" crossorigin="anonymous"></script>
		<link href="{{ asset('assets/css/magnific-popup.css/') }}" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
		<link href="{{ asset('img/favicon.ico/') }}" rel="shortcut icon">
		<link href="{{ asset('img/apple-touch-icon.png/') }}" rel="apple-touch-icon">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('assets/css/owl-carousel-min.css/') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css/') }}">
		<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
		<!-- <script>
		    // Picture element HTML5 shiv
		    document.createElement( "picture" );
		  </script>
		<script src="{{ asset('assets/js/picturefill.min.js/') }}" type="text/javascript"></script> -->

    	<!-- FIM Novos itens -->
	</head>
	<body>
		
		@include('includes._header')
	    @yield('content')
	    @include('includes._footer')
     	
		<script src="{{ asset('assets/js/jquery.js/') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/modernizr.js/') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/effects-parallax.js/') }}" type="text/javascript"></script> 
		<script src="{{ asset('assets/js/jquery.magnific-popup.min.js/') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/jquery.maskedinput-1.4.min.js/') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/owl.carousel.min.js/') }}" type="text/javascript"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		@yield('script')
		<script type="text/javascript">
			$('.box-instagram').owlCarousel({
				loop:true,
				margin:0,
				responsiveClass:true,
				dots:true,
				nav:false,
				autoplay:true,
				autoplayTimeout:3000,
				autoplayHoverPause:true,
				smartSpeed: 1000,
				responsive:{
					0:{
						items:1,
						nav:false,
						dots:false,
					},
					600:{
						items:5,
						nav:false,
						dots:true,
					},
					1000:{
						items:10,
						nav:false,
						dots:true,
					}
				}
			});

			$('#dropdownMenuLink').hover(
				  function() {
				    $('.dropdown-menu').show();
				  }, function() {
				  	$('.dropdown-menu').hide(); 
				  }
			);
			$('.dropdown-menu').mouseenter( 
				  function() {
				    $(this).show();
				  }
			).mouseleave( 
			 	  function() {
				    $(this).hide();
				  } 
		 	);
			
		</script>
		<script src="{{ asset('assets/js/move.js') }}" type="text/javascript"></script>
		<script src="https://unpkg.com/jquery-touchswipe@latest/jquery.touchSwipe.min.js"></script>
	</body>
</html>