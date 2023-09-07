<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<title>WEB LAPORAN TEKNISI DIGITALISASI | @yield('tittle')</title>

	<!-- CSS Only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container-fluid">
		    		<a class="navbar-brand">LAPORAN TEKNISI</a>
		    <ul class="nav nav-pills me-auto mb-2 mb-lg-0">
  				<li class="nav-item">
    				<a class="nav-link active" aria-current="page" href="/manager">Detail Laporan</a>
  				</li>
  			</ul>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="/logout">Logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container">
	@yield('content')
	</div>

	<!-- Javascript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>