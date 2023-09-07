<!DOCTYPE html>
<html>
<head>
	<!-- CSS Only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<title>Forgot Password</title>
</head>
<body>

	<style>
		.login-box {
			border: solid 1px;
			width: 500px;
			padding: 20px;
			box-sizing: border-box;
		}
	</style>

	<div class="vh-100 d-flex justify-content-center align-items-center flex-column">
		@if ($errors->any())
		  <div class="alert alert-danger">
		  	<ul>
		  		@foreach($errors->all() as $error)
		  		  <li>{{ $error }}</li>
		  		@endforeach
		  	</ul>
		  </div>
		@endif

		@if(Session()->has ('status'))
			<div class="alert alert-success">
				{{Session()->get('status')}}
			</div>
		@endif
		
		<div class="login-box">
		  <h2>Forgot Your Password?</h2>
		    <p>Please enter your mail to password reset request</p>
			  <form action="{{ route('password.email') }}" method="post">
				@csrf
				<div class="mb-3">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" required>
				</div>
				<div>
					<button class="btn btn-primary form-control">Request Password Reset</button>
				</div>
				<div class="text-center">
				    <a href="login">Login?</a>
				</div>
			  </form>
		  </div>
	  </div>

	<!-- Javascript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>