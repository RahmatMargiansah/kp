@extends('layouts.managermainlayout')

@section('tittle')

@section('content')

<div class="my-3 d-flex justify-content-center">
	<h2>Halaman Detail {{$teknisi->name}} Nik {{$teknisi->nik}}</h2>
</div>
		@csrf

<div class="my-3 d-flex justify-content-center">
	<img src="{{asset('storage/photo/'.$teknisi->image)}}" alt="" width="500px">
</div>
				

<div class="box">
	<div class="my-3 d-flex justify-content-center">
		<a href="/export-pdf/{{$teknisi->id}}" class="btn btn-secondary">Print</a>
	</div>
	<table class="table table-striped">
		<tr>
			<th>Nik</th>
			<th>Nama</th>
			<th>Tipe Work Order</th>
			<th>Kategory</th>
			<th>Action</th>
			<th>No Spbu</th>
			<th>Alamat Spbu</th>
			<th>Tanggal Laporan</th>
			<th>Keterangan</th>
		</tr>
		<tr>
			<td>{{$teknisi->nik}}</td>
	  		<td>{{$teknisi->name}}</td>
	  		<td>{{$teknisi->wo}}</td>
	  		<td>{{$teknisi->kategory}}</td>
	  		<td>{{$teknisi->action}}</td>
	  		<td>{{$teknisi->spbu}}</td>
		  	<td>{{$teknisi->alamat_spbu}}</td>
		  	<td>{{$teknisi->tanggal_laporan}}</td>
			<td>{{$teknisi->keterangan}}</td>
		</tr>
	</table>
	
</div>
@endsection