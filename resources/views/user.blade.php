@extends('layouts.adminmainlayout')

@section('tittle')

@section('content')

	<div class="container">
		<h4>List User</h4>
			<div class="container">
				<div class="my-5">
				  <a href="register" class="btn btn-primary">REGISTRASI AKUN</a>
				</div>

					@if(Session::has('status'))
					  <div class="alert alert-success" role="alert">
					 	{{Session::get('message')}}
					  </div>
					@endif
				
				<table class="table table-striped">
				  	<tr>
				  		<th>No</th>
				  		<th>Nama</th>
				  		<th>Email</th>
				  		<th>Role</th>
				  		<th>Action</th>
				  	</tr>
				  	@foreach ($userList as $data)
				  	<tr>
				  			<td>{{$loop->iteration}}</td>
				  			<td>{{$data->name}}</td>
				  			<td>{{$data->email}}</td>
				  			<td>{{$data->role_id}}</td>
				  			<td>
				  				<a href="register-delete/{{$data->id}}" class="btn btn-danger">Delete Akun</a>
				  			</td>
				  	</tr>
				  	@endforeach
				</table>
			</div>
	</div>

@endsection