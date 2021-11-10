<!DOCTYPE html>
<head>
<title> Hotel | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{asset('public/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Log in</h2>
	<?php
		$message = Session::get('message');
		if($message){
			echo '<span class="text-alert">'.$message.'</span>';
			Session::put('message',null);
		}
	?>
		<form action="{{URL::to('/admin-dashboard')}}" method="POST">
			{{ csrf_field()}}
			<label>Email:</label>
			<input type="text" class="ggg" name="admin_email" placeholder="e-mail" required="">
			<label>Password:</label>
			<input type="password" class="ggg" name="admin_password" placeholder="password" required="">
			<div class="row">
				<span><input type="checkbox" />Remember account</span>
			<h6><a href="#">Forget Password?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" name="login">
			</div>
			
		</form>

</div>
</div>
<script src="{{asset('public/js/bootstrap.js')}}"></script>
<script src="{{asset('public/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/js/scripts.js')}}"></script>
<script src="{{asset('public/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
