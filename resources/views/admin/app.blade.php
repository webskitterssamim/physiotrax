<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Welcome to Physiotrax</title>
		
		<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		
	<!-- bootstrap framework-->
		<link rel="stylesheet" href="{{ asset('admin_assets/bootstrap/css/bootstrap.min.css')}}">
	<!-- todc-bootstrap -->
		<link rel="stylesheet" href="{{ asset('admin_assets/css/todc-bootstrap.min.css')}}">
	<!-- font awesome -->        
		<link rel="stylesheet" href="{{ asset('admin_assets/css/font-awesome/css/font-awesome.min.css')}}">
	<!-- flag icon set -->        
		<link rel="stylesheet" href="{{ asset('admin_assets/img/flags/flags.css') }}">
	<!-- retina ready -->
		<link rel="stylesheet" href="css/retina.css">	
	
	<!-- aditional stylesheets -->
        <!-- fullcalendar -->
			<link rel="stylesheet" href="{{ asset('admin_assets/js/lib/fullcalendar/fullcalendar.css') }}">
		<!-- linecons -->        
			<link rel="stylesheet" href="{{ asset('admin_assets/css/linecons/style.css') }}">

	<!-- ebro styles -->
		<link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">
	<!-- ebro theme -->
		<link rel="stylesheet" href="{{ asset('admin_assets/css/theme/color_1.css') }}" id="theme">
		
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="{{ asset('admin_assets/css/ie.css') }}">
		<script src="{{ asset('admin_assets/js/ie/html5shiv.js') }}"></script>
		<script src="{{ asset('admin_assets/js/ie/respond.min.js') }}"></script>
		<script src="{{ asset('admin_assets/js/ie/excanvas.min.js') }}"></script>
	<![endif]-->
 
<!-- custom fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ asset('admin_assets/css/custom-styles.css') }}">
<link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
			
	</head>
	<body class="boxed sidebar_narrow patternNone">
		
		<div id="wrapper_all">
			<header id="top_header">
				<div class="container">
				  <div class="row">
					<div class="col-xs-6 col-sm-8"> <a href="{{URL::route('adm_dashboard')}}" class="logo_main" title="PhysioTrax"><img src="{{ asset('admin_assets/images/logo.png') }}" width="331" height="91" alt="logo"></a> </div>
				  </div>
				</div>
			</header>						
			<nav id="top_navigation" class="text_nav">
				<div class="container">
					<ul id="text_nav_h" class="clearfix j_menu top_text_nav">
						<li class="{{Helpers::isActiveRoute('adm_dashboard')}}" ><a href="{{URL::route('adm_dashboard')}}">Dashboard</a></li>
						<li class="{{Helpers::isActiveRoute('sitesettings')}}
									{{Helpers::isActiveRoute('sitesettings_edit')}}" >
									<a href="{{URL::route('sitesettings')}}" >Site Settings</a>
						</li>
						<li class="{{Helpers::isActiveRoute('adm_excercise_create')}}
								{{Helpers::isActiveRoute('adm_excercises')}}
								{{Helpers::isActiveRoute('adm_excercise_edit')}}
								">
								<a href="javascript:;">Exercises</a>
								<ul>
								<li>
									<a href="{{URL::route('adm_excercise_create')}}">New Excercise Setup</a>
								</li>
								<li>
									<a href="{{URL::route('adm_excercises')}}">Excerciese List</a>
								</li>
							</ul>
						</li>
						<li class="{{Helpers::isActiveRoute('adm_usages')}}">
							<a href="{{URL::route('adm_usages')}}">Site usage per Provider</a>
						</li>						
						<li class="{{Helpers::isActiveRoute('adm_providers')}}
								{{Helpers::isActiveRoute('adm_provider_create')}}
								{{Helpers::isActiveRoute('adm_provider_edit')}}
								"><a href="javascript:;">Providers</a>
							<ul>
								<li><a href="{{URL::route('adm_provider_create')}}">New Provider Setup</a></li>
								<li><a href="{{URL::route('adm_providers')}}">Providers List</a></li>
							</ul>
						</li>
						<li class="{{Helpers::isActiveRoute('adm_clinician_create')}}
								{{Helpers::isActiveRoute('adm_clinicians')}}
								{{Helpers::isActiveRoute('adm_clinician_edit')}}
								"> 
							<a href="javascript:;">Clinicians</a>
							<ul>
								<li>
									<a href="{{URL::route('adm_clinician_create')}}">New Clinician Setup</a>
								</li>
								<li>
									<a href="{{URL::route('adm_clinicians')}}">Clinicians List</a>
								</li>
							</ul>
						</li>
						<li class="{{Helpers::isActiveRoute('adm_clinic_create')}}
								{{Helpers::isActiveRoute('adm_clinics')}}
								{{Helpers::isActiveRoute('adm_clinic_edit')}}
								"> 
							<a href="javascript:;">Clinics</a>
							<ul>
								<li>
									<a href="{{URL::route('adm_clinic_create')}}">New Clinic Setup</a>
								</li>
								<li>
									<a href="{{URL::route('adm_clinics')}}">Clinics List</a>
								</li>
							</ul>
						</li>
						<!--<li class="{{Helpers::isActiveRoute('cms')}}
								{{Helpers::isActiveRoute('cms_create')}}
								{{Helpers::isActiveRoute('cms_edit')}}
								"> 
							<a href="javascript:;">CMS</a>
							<ul>
								<li>
									<a href="{{URL::route('cms_create')}}">New CMS Setup</a>
								</li>
								<li>
									<a href="{{URL::route('cms')}}">CMS List</a>
								</li>
							</ul>
						</li>-->
						<li>
							<a href="javascript:;"> <i class="fa fa-sign-out"> &nbsp;  &nbsp;</i></a>
								<ul>
									<li>
										<a href="{{URL::route('adm_change_password')}}">Change Password</a>
									</li>
									<li>
										<a href="{{URL::route('adm_logout')}}">Logout</a>
									</li>
								</ul>
						</li>
					</ul>					
				</div>					
			</nav>
				
			<!-- mobile navigation -->
			<nav id="mobile_navigation"></nav>
			 
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					@yield('content')
				</div>
			    <nav id="sidebar">
				<ul id="icon_nav_v" class="side_ico_nav">
					<li class="{{Helpers::isActiveRoute('adm_dashboard')}}"><a href="{{URL::route('adm_dashboard')}}" title="Dashboard"><i class="icon-home"></i></a></li>
					<li class="{{Helpers::isActiveRoute('sitesettings')}}"><a href="{{URL::route('sitesettings')}}" title="Site Settings"><i class="icon-gear"></i></a></li>
					<li class="{{Helpers::isActiveRoute('adm_excercise_create')}}
								{{Helpers::isActiveRoute('adm_excercises')}}
								{{Helpers::isActiveRoute('adm_excercise_edit')}}
								">
								<a href="{{URL::route('adm_excercises')}}" title="Excercises"><i class="icon-run"></i></a>
					</li>
					<li  class="{{Helpers::isActiveRoute('adm_usages')}}">
						<a href="{{URL::route('adm_usages')}}" title="Site Usage Per Provider"><i class="icon-edit"></i></a>
					</li>					
					<li class="{{Helpers::isActiveRoute('adm_providers')}}
								{{Helpers::isActiveRoute('adm_provider_create')}}
								{{Helpers::isActiveRoute('adm_provider_edit')}}
								">
						<a href="{{URL::route('adm_providers')}}" title="Providers"><i class="icon-group"></i></a>
					</li>
					<li class="{{Helpers::isActiveRoute('adm_clinician_create')}}
								{{Helpers::isActiveRoute('adm_clinicians')}}
								{{Helpers::isActiveRoute('adm_clinician_edit')}}
								"><a href="{{URL::route('adm_clinicians')}}" title="Clinicians"><i class="fa  fa-user-md"></i></a></li>
					<li class="{{Helpers::isActiveRoute('adm_clinic_create')}}
								{{Helpers::isActiveRoute('adm_clinics')}}
								{{Helpers::isActiveRoute('adm_clinic_edit')}}
								"><a href="{{URL::route('adm_clinics')}}" title="Clinics"><i class="fa fa-hospital-o"></i></a></li>
				</ul>
			</nav>
			</section>
			<div id="footer_space"></div>
		</div>

        <footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 alignCenter"> &copy;{{date('Y')}}  <a href="{{URL::to('/')}}">Physiotrax.com</a> All Rights Reserved</div>
    </div>
  </div>
</footer>
        
	<!-- jQuery -->
		<script src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>
	<!-- bootstrap framework -->
		<script src="{{ asset('admin_assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- jQuery resize event -->
		<script src="{{ asset('admin_assets/js/jquery.ba-resize.min.js') }}"></script>
	<!-- jquery cookie -->
		<script src="{{ asset('admin_assets/js/jquery_cookie.min.js') }}"></script>
	<!-- retina ready -->
		<script src="{{ asset('admin_assets/js/retina.min.js') }}"></script>
	<!-- tinyNav -->
		<script src="{{ asset('admin_assets/js/tinynav.js') }}"></script>
	<!-- sticky sidebar -->
		<script src="{{ asset('admin_assets/js/jquery.sticky.js') }}"></script>
	<!-- Navgoco -->
		<script src="{{ asset('admin_assets/js/lib/navgoco/jquery.navgoco.min.js') }}"></script>
	<!-- jMenu -->
		<script src="{{ asset('admin_assets/js/lib/jMenu/js/jMenu.jquery.js') }}"></script>
	<!-- typeahead -->
        <script src="{{ asset('admin_assets/js/lib/typeahead.js/typeahead.min.js') }}"></script>
        <script src="{{ asset('admin_assets/js/lib/typeahead.js/hogan-2.0.0.js') }}"></script>
	
		<script src="{{ asset('admin_assets/js/ebro_common.js') }}"></script>


		<!-- jQueryUi -->
			<script src="{{ asset('admin_assets/js/lib/jquery_ui/jquery-ui-1.10.3.custom.min.js') }}"></script>
		<!-- charts -->
			<script src="{{ asset('admin_assets/js/lib/flot/jquery.flot.min.js') }}"></script>
			<script src="{{ asset('admin_assets/js/lib/flot/jquery.flot.time.min.js') }}"></script>
			<script src="{{ asset('admin_assets/js/lib/flot/jquery.flot.tooltip.min.js') }}"></script>
			<script src="{{ asset('admin_assets/js/lib/flot/jquery.flot.resize.min.js') }}"></script>
		<!-- fullcalendar -->
			<script src="{{ asset('admin_assets/js/lib/fullcalendar/fullcalendar.js') }}"></script>
			
			<script src="{{ asset('admin_assets/js/pages/ebro_dashboard2.js') }}"></script>


	<!--[if lte IE 9]>
		<script src="{{ asset('admin_assets/js/ie/jquery.placeholder.js') }}"></script>
		<script>
			$(function() {
				$('input, textarea').placeholder();
				
				$(document).on('click','#back', function(){
					var dataLink = $(this)->attr('data-link');
					window.location = dataLink;
					console.log(dataLink);
				});
				
			});
		</script>
	<![endif]-->
	
    <!-- style switcher -->
		

	</body>
</html>