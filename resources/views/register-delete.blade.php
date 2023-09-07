@extends('layouts.adminmainlayout')

@section('tittle')

@section('content')

	<div class="mt-5">
			<h2>Yakin ingin menghapus data : {{$user->name}}, {{$user->email}}<h2>

		<form style="display: inline-block" action="/register-destroy/{{$user->id}}" method="post">
			@csrf
			@method('delete')
			<button class="btn btn-danger">Hapus</button>
		</form>

			<a href="/user" class="btn btn-primary">Batal</a>
	</div>

@endsection


	
