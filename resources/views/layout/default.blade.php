
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Bogota Restaurant</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('alantis-lite-master/back/img/icon.ico')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('atlantis-lite-master/back/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['atlantis-lite-master/back/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('atlantis-lite-master/back/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('atlantis-lite-master/back/css/atlantis.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('atlantis-lite-master/back/css/demo.css')}}">
</head>
<body>
	<div class="wrapper">
		{{-- header --}}
		@include('includes.header')
		{{-- end header --}}

		<!-- Sidebar -->
		@include('includes.sidebar')
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">

				@yield('content')

			</div>

			{{-- footer --}}
			{{-- @include('includes.footer') --}}
			
		</div>
		
	</div>
	
	{{-- js --}}
	@include('includes.js')
</body>
</html>