<!DOCTYPE html>
	<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		},false);
		function hideURLbar(){ window.scrollTo(0,1); }
	</script>
	<link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}" >
	<link href="{{ asset('admin/assets/css/style.css') }}" rel='stylesheet' type='text/css' />
	<link href="{{ asset('admin/assets/css/style-responsive.css') }}" rel="stylesheet"/>
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ asset('admin/assets/css/font.css')}}" type="text/css"/>
	<link href="{{ asset('admin/assets/css/font-awesome.css') }}" rel="stylesheet"> 
	<script src="{{ asset('admin/assets/js/jquery2.0.3.min.js') }}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Sign In Now</h2>
	@if (Session::has('error'))
		<div class="alert alert-danger alert-block">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<strong>{{ Session::get('error') }}</strong>
		</div>
	@endif
	<form action="{{ route('postlogin') }}" method="post">
		@csrf
		<input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
		<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
		<!-- <span><input type="checkbox" />Remember Me</span> -->
		<div class="clearfix"></div>
		<input type="submit" value="Sign In" name="login">
	</form>
	<p>Do not Have an Account ?<br/>Please contact admin to get an account.<br/><a href="#">info.deercreative@gmail.com</a></p>
</div>
</div>
<script src="{{ asset('admin/assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.scrollTo.js') }}"></script>
</body>
</html>
