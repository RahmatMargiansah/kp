<!DOCTYPE html>
<html>
<head>
	<!-- CSS Only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<title>Halaman Login</title>
</head>
<body class="text-dark">
	<style>
		.login-box {
			background: white;
			border: solid 1px;
			width: 500px;
			padding: 20px;
			box-sizing: border-box;
		}
		.html {
        background-image: url("home.jpg");
    	background-size: cover;
    	background-position: center center;
    	background-repeat: no-repeat;
    	width: 100%;
    	height: 100vh;
    	}
	</style>

	<div class="html">
	<div class="vh-100 d-flex justify-content-center align-items-center flex-column">
		@if(Session::has ('status'))
			<div class="alert alert-primary" role="alert">
				{{Session::get('status')}}
			</div>
		@endif
		<div class="login-box">
			<form method="post" action="">
				@csrf
				<div class="mb-3">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" required>
				</div>
				<div class="mb-3">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" required>
				</div>
				<div>
					<button class="btn btn-primary form-control">Login</button>
				</div>
				<div class="text-center">
				    <a href="forgot-password">Forgot Password?</a>
				</div>
			</form>
		</div>
	</div>
</div>

	<!-- Javascript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>