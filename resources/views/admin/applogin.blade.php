<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name=viewport content="initial-scale=1, minimum-scale=1, width=device-width">
<title>Welcome to Physiotrax</title>
<link rel="stylesheet" href="{{ asset('admin_assets/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/css/todc-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/css/theme/color_1.css') }}" id="theme">
<link href='http://fonts.googleapis.com/css?family=Roboto:300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ asset('admin_assets/css/custom-styles.css') }}">
<link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<!--[if lt IE 9]>
		<script src="{{ asset('admin_assets/js/ie/html5shiv.js') }}"></script>
		<script src="{{ asset('admin_assets/js/ie/respond.min.js') }}"></script>
	<![endif]-->
</head>
<body>
<!--<header class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="dashboard1.html">Ebro Admin</a>
			</div>
			<div class="pull-right">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#" class="login_toggle">Log In</a></li>
					<li><a href="#" class="register_toggle">Sign Up</a></li>
					<li><a href="#">Help</a></li>
				</ul>
			</div>
		</div>
    </header>-->

<div class="login_wrapper">
	@yield('content')
</div>
<script src="{{ asset('admin_assets/js/jquery.min.js') }}"></script> 
<!-- jquery cookie --> 
<script src="{{ asset('admin_assets/js/jquery_cookie.min.js') }}"></script> 
<script src="{{ asset('admin_assets/js/lib/parsley/parsley.min.js') }}"></script> 
<script>
		$(function() {
			
			//* validation
			function validate() {
				
			
			$('#login_form').parsley({
				errors: {
					classHandler: function ( elem, isRadioOrCheckbox ) {
						if(isRadioOrCheckbox) {
							return $(elem).closest('.form_sep');
						}
					},
					container: function (element, isRadioOrCheckbox) {
						if(isRadioOrCheckbox) {
							return element.closest('.form_sep');
						}
					}
				}
			});
			}
			
			
			
			
			// set theme from cookie
			if($.cookie('ebro_color') != undefined) {
				$('#theme').attr('href','css/theme/'+$.cookie('ebro_color')+'.css');
			}
			
		});
	</script>
</body>
</html>