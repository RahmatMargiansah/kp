@extends('layouts.adminmainlayout')


@section('content')
<!DOCTYPE html>
<html>
<head>
	<!-- CSS Only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<title>Halaman Register</title>
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

				@if(Session::has('status'))
					<div class="alert alert-success" role="alert">
						{{Session::get('message')}}
					</div>
				@endif

	<div class="login-box">
			<form method="post" action="" enctype="multipart/form-data">
				@csrf
				<div class="mb-3">
					<label for="nama">Nama</label>
					<input type="text" name="name" id="name" class="form-control" required>
				</div>
				<div class="mb-3">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" required>
				</div>
				<div class="mb-3">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" required>
				</div>
				<div class="mb-3">
					<label for="role">Role</label>
					<select name="role_id" id="role_id" class="form-control" required>
	  					<option value="">Pilih Salah Satu</option>
	  					<option value="1">1. ADMIN</option>
	  					<option value="2">2. USER</option>
	  					<option value="3">3. MANAGER</option>
	  				</select>
				</div>
				<div>
					<button class="btn btn-primary form-control">Register</button>
				</div>
				<div class="text-center">
					<a href="user">Kembali ke Userlist</a>
				</div>
			</form>
		</div>
	</div>

	<!-- Javascript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

@endsection