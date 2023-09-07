@extends('layouts.adminmainlayout')

@section('tittle')

@section('content')

	<div class="mt-5">
			<h2>Yakin ingin menghapus data : {{$teknisi->nik}}, {{$teknisi->name}}, {{$teknisi->wo}}, {{$teknisi->spbu}}, {{$teknisi->nik}}, {{$teknisi->tanggal_laporan}}</h2>

		<form style="display: inline-block" action="/admin-destroy/{{$teknisi->id}}" method="post">
			@csrf
			@method('delete')
			<button class="btn btn-danger">Hapus</button>
		</form>

			<a href="/admin" class="btn btn-primary">Batal</a>
	</div>


@endsection


	
