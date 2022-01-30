<!doctype html>
<html lang="en" dir="ltr">
  <head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Yoha –  HTML5 Bootstrap Admin Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin dashboard html template, admin dashboard template bootstrap 4, analytics dashboard templates, best admin template bootstrap 4, best bootstrap admin template, bootstrap 4 template admin, bootstrap admin template premium, bootstrap admin ui, bootstrap basic admin template, cool admin template, dark admin dashboard, dark admin template, dark dashboard template, dashboard template bootstrap 4, ecommerce dashboard template, html5 admin template, light bootstrap dashboard, sales dashboard template, simple dashboard bootstrap 4, template bootstrap 4 admin">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/brand/favicon.ico')}}" />

		<!-- TITLE -->
		<title>{{env('APP_NAME')}}</title>

		<!-- BOOTSTRAP CSS -->
		<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/dark-style.css')}}" rel="stylesheet"/>

		<!-- INTERNAL SINGLE-PAGE CSS -->
		<link href="{{asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet" type="text/css">

		<!-- CUSTOM SCROLL BAR CSS-->
		<link href="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

		<!--- FONT-ICONS CSS -->
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet"/>

		<!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('assets/colors/color1.css')}}" />

	</head>

	<body class="app sidebar-mini dark-mode">

		

		<!-- BACKGROUND-IMAGE -->
		<div class="login-img">

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
			</div>
			<!-- /GLOABAL LOADER -->

			<!-- PAGE -->
			<div class="page">
				<div class="">
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto">
						<div class="text-center">
							<img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img" alt="">
						</div>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-6">
							<form class="login100-form validate-form" action="{{route('login.store')}}" method="POST">
							{{csrf_field()}}
								<span class="login100-form-title">
									Bienvenido
								</span>
								<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
									<input class="input100" type="text" name="email" placeholder="Usuario">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
									</span>
								</div>
								<div class="wrap-input100 validate-input" data-validate = "Password is required">
									<input class="input100" type="password" name="password" placeholder="Contraseña">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg>
									</span>
								</div>
								<div class="text-right pt-1">
									<p class="mb-0"><a href="forgot-password.html" class="text-primary ml-1">¿Olvidaste tu contraseña?</a></p>
								</div>
								@if($errors)
									@foreach($errors->all() as $error)
									<div class="alert alert-danger fade show m-b-10 login-error">
										<span class="close" data-dismiss="alert"></span>
										<span class="icon-ban"></span> {{$error}}
									</div>     
									@endforeach
									<script>
									setTimeout(function(){ $('.login-error').fadeOut(500); }, 3000);
									</script>
								@endif

								<div class="container-login100-form-btn">
									<button type="submit" class="login100-form-btn btn-primary">
										Iniciar Sesión
									</button>
								</div>
								
								
							</form>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
			<!-- End PAGE -->

		</div>
		<!-- BACKGROUND-IMAGE CLOSED -->

		<!-- JQUERY JS -->
		<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>

		<!-- SPARKLINE JS -->
		<script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>

		<!-- CHART-CIRCLE JS -->
		<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

		<!-- RATING STAR JS -->
		<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!-- EVA-ICONS JS -->
		<script src="{{asset('assets/iconfonts/eva.min.js')}}"></script>

		<!-- INPUT MASK JS -->
		<script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

		<!-- CUSTOM SCROLL BAR JS-->
		<script src="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>



		<!-- CUSTOM JS-->
		<script src="{{asset('assets/js/custom.js')}}"></script>

	</body>
</html>
