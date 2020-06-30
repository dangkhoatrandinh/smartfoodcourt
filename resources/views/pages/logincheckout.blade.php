@extends('layout2')
<link rel="shortcut icon" href="../frontend/images/ico/favicon.ico">
<link rel="apple-touch-icon" href="../frontend/images/ico/apple-touch-icon">
@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{URL::to('/login')}}" method="post">
							{{csrf_field()}}
							<input type="email" placeholder="Email Address" name="customer_email"/>
							<input type="password" placeholder="Password" name="customer_password"/>
							<span>
								<div class="clearfix"></div>
								@if(session()->has('check_sign'))
								<div class = "eror">
								<strong>Thông báo: </strong>
								<?php
								$noti = Session::get('check_sign');
								if ($noti) {
								echo $noti;
								Session::put('check_sign',null);
								} 
								?>
			</div>
			@endif
			<div class="clearfix"></div>		
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Sign up!</h2>
						<form action="{{URL::to('/signup')}}" method="post">
							{{csrf_field()}}
							<input type="text" placeholder="Name" name="customer_name" />
							<input type="email" placeholder="Email Address" name="customer_email"/>
							<input type="text" placeholder="Phone number" name="customer_phone"/>
							<input type="password" placeholder="Password" name="customer_password"/>
							<button type="submit" class="btn btn-default">Sign up</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form--> 
@endsection