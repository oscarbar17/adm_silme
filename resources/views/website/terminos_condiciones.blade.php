<!doctype html>
<html lang="es" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="{{env('APP_NAME')}}">
		<meta name="author" content="">
		<meta name="keywords" content="">

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

		<!-- SIDE-MENU CSS -->
		<link href="{{asset('assets/css/closed-sidemenu.css')}}" rel="stylesheet">

		<!--PERFECT SCROLL CSS-->
		<link href="{{asset('assets/plugins/p-scroll/perfect-scrollbar.css')}}" rel="stylesheet"/>

		<!-- CUSTOM SCROLL BAR CSS-->
		<link href="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

		<!--- FONT-ICONS CSS -->
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet"/>

		<!-- SIDEBAR CSS -->
		<link href="{{asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

		<!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('assets/colors/color1.css')}}" />

		<!-- INTERNAL SWEET ALERT CSS -->
		<link href="{{asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet" />

		<!-- INTERNAL GALLERY CSS -->
		<link href="{{asset('assets/plugins/gallery/gallery.css')}}" rel="stylesheet">

		<style>
			.error{
				color:red
			}
		</style>
	</head>

	<body class="app sidebar-mini">

		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /GLOBAL-LOADER -->

		<!-- PAGE -->
		<div class="page">
			<div class="page-main">

				<!--APP-SIDEBAR-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar">
					<div class="side-header">
						<a class="header-brand1" href="{{route('home_admin.index')}}">
							<img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
							<img src="{{asset('assets/images/brand/logo-1.png')}}" class="header-brand-img toggle-logo" alt="logo">
							<img src="{{asset('assets/images/brand/logo-2.png')}}" class="header-brand-img light-logo" alt="logo">
							<img src="{{asset('assets/images/brand/logo-3.png')}}" class="header-brand-img light-logo1" alt="logo">
						</a><!-- LOGO -->
					</div>
					<ul class="side-menu">
                        
					</ul>
				</aside>
				<!--/APP-SIDEBAR-->

				<!-- App-Header -->
				<div class="app-header header">
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand d-md-none" href="{{route('home_admin.index')}}">
								<img src="{{asset('assets/images/brand/logo-3.png')}}" class="header-brand-img mobile-icon" alt="logo">
								<img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo mobile-logo" alt="logo">
							</a>
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M21 11.01L3 11v2h18zM3 16h12v2H3zM21 6H3v2.01L21 8z"/></svg>
							</a><!-- sidebar-toggle-->
							<div class="d-flex ml-auto header-right-icons header-search-icon">
								<button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
									aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
									<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" class="navbar-toggler-icon"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
								</button>
								<div class="dropdown d-none d-lg-flex">
									<a class="nav-link icon full-screen-link nav-link-bg">
										<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" class="fullscreen-button"><path d="M0 0h24v24H0V0z" fill="none"/><circle cx="12" cy="12" opacity=".3" r="3"/><path d="M7 12c0 2.76 2.24 5 5 5s5-2.24 5-5-2.24-5-5-5-5 2.24-5 5zm8 0c0 1.65-1.35 3-3 3s-3-1.35-3-3 1.35-3 3-3 3 1.35 3 3zM3 19c0 1.1.9 2 2 2h4v-2H5v-4H3v4zM3 5v4h2V5h4V3H5c-1.1 0-2 .9-2 2zm18 0c0-1.1-.9-2-2-2h-4v2h4v4h2V5zm-2 14h-4v2h4c1.1 0 2-.9 2-2v-4h-2v4z"/></svg>
									</a>
								</div><!-- FULL-SCREEN -->
								<div class="dropdown profile-1">
									<a href="#" data-toggle="dropdown" class="nav-link pl-2 pr-2  leading-none d-flex">
										<span>
											<img src="{{asset('assets/images/users/admin.png')}}" alt="profile-user" class="avatar  mr-xl-3 profile-user brround cover-image">
										</span>
										<div class="text-center mt-1 d-none d-xl-block">
											<h6 class="text-dark mb-0 fs-13 font-weight-semibold"></h6>
										</div>
									</a>
								</div>
								<!-- SIDE-MENU -->
							</div>
						</div>
					</div>
				</div>
				<!-- responsive-navbar -->
				<div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-md-none bg-white">
					<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
						<div class="d-flex order-lg-2 ml-auto">
							<div class="dropdown d-sm-flex">
								<a href="#" class="nav-link icon" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
								</a>
								<div class="dropdown-menu header-search dropdown-menu-left">
									<div class="input-group w-100 p-2">
										<input type="text" class="form-control " placeholder="Search....">
										<div class="input-group-append ">
											<button type="button" class="btn btn-primary ">
												<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
											</button>
										</div>
									</div>
								</div>
							</div><!-- SEARCH -->
							<div class="dropdown d-md-flex">
								<a class="nav-link icon full-screen-link nav-link-bg">
									<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" class="fullscreen-button"><path d="M0 0h24v24H0V0z" fill="none"/><circle cx="12" cy="12" opacity=".3" r="3"/><path d="M7 12c0 2.76 2.24 5 5 5s5-2.24 5-5-2.24-5-5-5-5 2.24-5 5zm8 0c0 1.65-1.35 3-3 3s-3-1.35-3-3 1.35-3 3-3 3 1.35 3 3zM3 19c0 1.1.9 2 2 2h4v-2H5v-4H3v4zM3 5v4h2V5h4V3H5c-1.1 0-2 .9-2 2zm18 0c0-1.1-.9-2-2-2h-4v2h4v4h2V5zm-2 14h-4v2h4c1.1 0 2-.9 2-2v-4h-2v4z"/></svg>
								</a>
							</div><!-- FULL-SCREEN -->
							<div class="dropdown d-md-flex notifications">
								<a class="nav-link icon" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z" opacity=".3"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg>
									<span class="pulse1 bg-success"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<div class="notifications-menu">
										<a class="dropdown-item d-flex pb-4" href="#">
											<span class="avatar mr-3 br-3 align-self-center avatar-md cover-image bg-primary brround">
												<i class="fe fe-mail"></i></span>
											<div>
												<span class="font-weight-bold"> Commented on your post </span>
												<div class="small text-muted d-flex">
													3 hours ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-4" href="#">
											<span class="avatar avatar-md br-3 mr-3 align-self-center cover-image bg-secondary brround">
												<i class="fe fe-download"></i>
											</span>
											<div>
												<span class="font-weight-bold"> New file has been Uploaded </span>
												<div class="small text-muted d-flex">
													5 hour ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-4" href="#">
											<span class="avatar avatar-md br-3 mr-3 align-self-center cover-image bg-warning brround">
												<i class="fe fe-user"></i>
											</span>
											<div>
												<span class="font-weight-bold"> User account has Updated</span>
												<div class="small text-muted d-flex">
													20 mins ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-4" href="#">
											<span class="avatar avatar-md br-3 mr-3 align-self-center cover-image bg-info brround">
												<i class="fe fe-shopping-cart"></i>
											</span>
											<div>
												<span class="font-weight-bold"> New Order Recevied</span>
												<div class="small text-muted d-flex">
													1 hour ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-4" href="#">
											<span class="avatar avatar-md br-3 mr-3 align-self-center cover-image bg-danger brround">
												<i class="fa fa-commenting-o"></i>
											</span>
											<div>
												<span class="font-weight-bold"> 3 New Comments</span>
												<div class="small text-muted d-flex">
													1 day ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-4" href="#">
											<span class="avatar avatar-md br-3 mr-3 align-self-center cover-image bg-success brround">
												<i class="fe fe-server"></i>
											</span>
											<div>
												<span class="font-weight-bold">Server Rebooted</span>
												<div class="small text-muted d-flex">
													2 hour ago
												</div>
											</div>
										</a>
									</div>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item text-center">View all Notification</a>
								</div>
							</div><!-- NOTIFICATIONS -->
							<div class="dropdown d-md-flex message">
								<a class="nav-link icon text-center" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
									<span class="nav-unread badge badge-danger badge-pill pulse">3</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<div class="message-menu">
										<a class="dropdown-item d-flex pb-3" href="#">
											<span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('assets/images/users/1.jpg')}}"></span>
											<div>
												<strong>Madeleine</strong> Hey! there I' am available....
												<div class="small text-muted">
													3 hours ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-3" href="#">
											<span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('assets/images/users/12.jpg')}}"></span>
											<div>
												<strong>Anthony</strong> New product Launching...
												<div class="small text-muted">
													5 hour ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-3" href="#">
											<span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('assets/images/users/4.jpg')}}"></span>
											<div>
												<strong>Olivia</strong> New Schedule Realease......
												<div class="small text-muted">
													45 mintues ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-3" href="#">
											<span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('assets/images/users/15.jpg')}}"></span>
											<div>
												<strong>Sanderson</strong> New Schedule Realease......
												<div class="small text-muted">
													2 days ago
												</div>
											</div>
										</a>
									</div>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item text-center">See all Messages</a>
								</div>
							</div><!-- MESSAGE-BOX -->
							<div class="dropdown d-md-flex country-selector">
								<a href="#" class="d-flex nav-link icon leading-none" data-toggle="dropdown" aria-expanded="true">
									<img src="{{asset('assets/images/flags/us_flag.jpg')}}" alt="img" class="mr-2 align-self-center">
									<div>
										<strong class="text-dark fs-13">English</strong>
									</div>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<a href="#" class="dropdown-item d-flex pb-3">
										<img src="{{asset('assets/images/flags/french_flag.jpg')}}" alt="flag-img" class="avatar  mr-3 align-self-center">
										<div>
											<strong>French</strong>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<img src="{{asset('assets/images/flags/germany_flag.jpg')}}" alt="flag-img" class="avatar  mr-3 align-self-center">
										<div>
											<strong>Germany</strong>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<img src="{{asset('assets/images/flags/italy_flag.jpg')}}" alt="flag-img" class="avatar  mr-3 align-self-center">
										<div>
											<strong>Italy</strong>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<img src="{{asset('assets/images/flags/russia_flag.jpg')}}" alt="flag-img" class="avatar  mr-3 align-self-center">
										<div>
											<strong>Russia</strong>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<img src="{{asset('assets/images/flags/spain_flag.jpg')}}" alt="flag-img" class="avatar  mr-3 align-self-center">
										<div>
											<strong>Spain</strong>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div><!-- End responsive-navbar -->
				<!-- App-Header -->

                <!--app-content open-->
				<div class="app-content">
					<div class="side-app">
                        <!-- PAGE-HEADER -->
                            <div class="page-header">
                                
                            </div>
                            <!-- PAGE-HEADER END -->
                            <!-- ROW-1 OPEN -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div style="text-align: justify">
                                    <p><strong>POLÍTICA DE PRIVACIDAD</strong></p>

                                    <p>Última actualización: <br>29 de Marzo de 2022</p>
                                    <p>Silme Agro S.A de C.V</p>
                                    
                                    <p>El presente Política de Privacidad establece los términos en que Sime Agro usa y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compañía está comprometida con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.</p>
                                    <p><strong>Información que es recogida</strong></p>
                                    <p>Nuestro sitio web podrá recoger información personal por ejemplo: Nombre,&nbsp; información de contacto como&nbsp; su dirección de correo electrónica e información demográfica. Así mismo cuando sea necesario podrá ser requerida información específica para procesar algún pedido o realizar una entrega o facturación.</p>
                                    <p>Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros productos y servicios. &nbsp;Es posible que sean enviados correos electrónicos periódicamente a través de nuestro sitio con ofertas especiales, nuevos productos y otra información publicitaria que consideremos relevante para usted o que pueda brindarle algún beneficio, estos correos electrónicos serán enviados a la dirección que usted proporcione y podrán ser cancelados en cualquier momento.</p>
                                    <p><strong>Uso de la información recogida</strong></p>
                                    <p>Sime Agro está altamente comprometido para cumplir con el compromiso de mantener su información segura. Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista ningún acceso no autorizado.</p>
                                    <p>Una cookie se refiere a un fichero que es enviado con la finalidad de solicitar permiso para almacenarse en su ordenador, al aceptar dicho fichero se crea y la cookie sirve entonces para tener información respecto al tráfico web, y también facilita las futuras visitas a una web recurrente. Otra función que tienen las cookies es que con ellas las web pueden reconocerte individualmente y por tanto brindarte el mejor servicio personalizado de su web.</p>
                                    <p><strong>Cookies</strong></p>
                                    <p>Nuestro sitio web emplea las cookies para poder identificar las páginas que son visitadas y su frecuencia. Esta información es empleada únicamente para análisis estadístico y después la información se elimina de forma permanente. Usted puede eliminar las cookies en cualquier momento desde su ordenador. Sin embargo las cookies ayudan a proporcionar un mejor servicio de los sitios web, estás no dan acceso a información de su ordenador ni de usted, a menos de que usted así lo quiera y la proporcione directamente noticias. Usted puede aceptar o negar el uso de cookies, sin embargo la mayoría de navegadores aceptan cookies automáticamente pues sirve para tener un mejor servicio web. También usted puede cambiar la configuración de su ordenador para declinar las cookies. Si se declinan es posible que no pueda utilizar algunos de nuestros servicios.</p>
                                    <p><strong>Enlaces a Terceros</strong></p>
                                    <p>Este sitio web pudiera contener en laces a otros sitios que pudieran ser de su interés. Una vez que usted de clic en estos enlaces y abandone nuestra página, ya no tenemos control sobre al sitio al que es redirigido y por lo tanto no somos responsables de los términos o privacidad ni de la protección de sus datos en esos otros sitios terceros. Dichos sitios están sujetos a sus propias políticas de privacidad por lo cual es recomendable que los consulte para confirmar que usted está de acuerdo con estas.</p>
                                    <p><strong>Control de su información personal</strong></p>
                                    <p>En cualquier momento usted puede restringir la recopilación o el uso de la información personal que es proporcionada a nuestro sitio web.&nbsp; Cada vez que se le solicite rellenar un formulario, como el de alta de usuario, puede marcar o desmarcar la opción de recibir información por correo electrónico. &nbsp;En caso de que haya marcado la opción de recibir nuestro boletín o publicidad usted puede cancelarla en cualquier momento.</p>
                                    <p>Esta compañía no venderá, cederá ni distribuirá la información personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con un orden judicial.</p>
                                    <p>Sime Agro Se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.</p>
                                    </div> 
                                </div>
                            </div>
                        </div>  
					</div>
				</div>
				<!-- CONTAINER END -->
            </div>


			<!-- MODALS -->
				<!-- MESSAGE MODAL -->
				<div class="modal" id="modal-medium" tabindex="-1" role="dialog"  aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content" id="modal-medium-content">

						</div>
					</div>
				</div>
				<!-- MESSAGE MODAL CLOSED -->
				<!-- MESSAGE MODAL -->
				<div class="modal" id="modal-large" tabindex="-1" role="dialog"  aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" id="modal-large-content">

						</div>
					</div>
				</div>
				<!-- MESSAGE MODAL CLOSED -->
			<!-- MODALS CLOSED-->

			<!-- FOOTER -->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 text-center">
							<a href="" target="__blank">{{env('APP_NAME')}}</a>
						</div>
					</div>
				</div>
			</footer>
			<!-- FOOTER END -->
		</div>

		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		<!-- JQUERY JS -->
		<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>

		<!-- SPARKLINE JS-->
		<script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>

		<!-- CHART-CIRCLE JS-->
		<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

		<!-- RATING STARJS -->
		<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!-- EVA-ICONS JS -->
		<script src="{{asset('assets/iconfonts/eva.min.js')}}"></script>

		<!-- INTERNAL CHARTJS CHART JS -->
		<!--<script src="{{asset('assets/plugins/chart/Chart.bundle.js')}}"></script>-->
		<script src="{{asset('assets/plugins/chart/utils.js')}}"></script>

		<!-- INTERNAL PIETY CHART JS -->
		<script src="{{asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
		<script src="{{asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>

		<!-- SIDE-MENU JS-->
		<script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

		<!-- PERFECT SCROLL BAR js-->
		<script src="{{asset('assets/plugins/p-scroll/perfect-scrollbar.min.js')}}"></script>
		<script src="{{asset('assets/plugins/sidemenu/sidemenu-scroll.js')}}"></script>

		<!-- CUSTOM SCROLLBAR JS-->
		<script src="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!-- SIDEBAR JS -->
		<script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>

		<!-- INTERNAL APEXCHART JS -->
		<!--
		<script src="{{asset('assets/js/apexcharts.js')}}"></script>
		-->
		<!--INTERNAL  INDEX JS -->
		<!--
		<script src="{{asset('assets/js/index1.js')}}"></script>
		-->
		<!-- CUSTOM JS -->
		<script src="{{asset('assets/js/custom.js')}}"></script>

        <!-- INTERNAL  DATA TABLE JS-->
        <script src="{{asset('js/datatable-lang.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/datatable.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

		<script src="{{asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>

		<!-- INTERNAL DATEPICKER JS-->
		<script src="{{asset('assets/plugins/date-picker/spectrum.js')}}"></script>
		<script src="{{asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>
		<script src="{{asset('assets/plugins/input-mask/jquery.maskedinput.js')}}"></script>

		<!-- INTERNAL SWEET-ALERT JS -->
		<script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>

		<script src="{{asset('assets/plugins/validate/jquery.validate.js')}}"></script>

		<!-- INTERNAL GALLERY JS -->
		<script src="{{asset('assets/plugins/gallery/picturefill.js')}}"></script>
        <script src="{{asset('assets/plugins/gallery/lightgallery.js')}}"></script>
		<script src="{{asset('assets/plugins/gallery/lightgallery-1.js')}}"></script>
        <script src="{{asset('assets/plugins/gallery/lg-pager.js')}}"></script>
        <script src="{{asset('assets/plugins/gallery/lg-autoplay.js')}}"></script>
        <script src="{{asset('assets/plugins/gallery/lg-fullscreen.js')}}"></script>
        <script src="{{asset('assets/plugins/gallery/lg-zoom.js')}}"></script>
        <script src="{{asset('assets/plugins/gallery/lg-hash.js')}}"></script>
        <script src="{{asset('assets/plugins/gallery/lg-share.js')}}"></script>

		<script>

			$(document).on("click", ".btn-action-modal", function(e){
				//e.preventDefault();
				var route = $(this).attr('href');
				var target = $(this).data('target');

				$(target + "-content").load(route);
			});
		</script>
        @stack('scripts')

	</body>
</html>
