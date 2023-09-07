@extends('layouts.mainlayout')

@section('tittle')

@section('content')

	<div class="container">
		<h4>Data Laporan</h4>
			<div class="container">
				<div class="my-5">
				  <a href="teknisi-add" class="btn btn-primary">TAMBAH LAPORAN</a>
				</div>

				@if(Session::has('status'))
					<div class="alert alert-success" role="alert">
						{{Session::get('message')}}
					</div>
				@endif

				  <table class="table table-striped">
				  	<tr>
				  		<th>No</th>
				  		<th>Nik</th>
				  		<th>Nama</th>
				  		<th>Tipe Work Order</th>
				  		<th>Kategory</th>
				  		<th>Action</th>
				  		<th>No Spbu</th>
				  		<th>Alamat Spbu</th>
				  		<th>Tanggal Laporan</th>
				  		<th>Keterangan</th>
				  		<th>Eviden Laporan</th>
				  		<th>Action</th>
				  	</tr>
				  			@foreach ($teknisiList as $data)
				  	<tr>
				  		<td>{{$loop->iteration}}</td>
				  		<td>{{$data->nik}}</td>
				  		<td>{{$data->name}}</td>
				  		<td>{{$data->wo}}</td>
				  		<td>{{$data->kategory}}</td>
				  		<td>{{$data->action}}</td>
				  		<td>{{$data->spbu}}</td>
				  		<td>{{$data->alamat_spbu}}</td>
				  		<td>{{$data->tanggal_laporan}}</td>
				  		<td>{{$data->keterangan}}</td>
				  		<td>
				  		<div class="my-3">
				  			<img src="{{asset('storage/photo/'.$data->image)}}" width="50px">
				  </div>
				  		</td>
				  		<td>
				  			<a href="teknisi-edits/{{$data->id}}" class="btn btn-success">Edit</a>
				  			<a href="teknisi-delete/{{$data->id}}" class="btn btn-danger">Delete</a>
				  		</td>
				  </tr>
				  			@endforeach
				  </table>	

				  <div class="my-5">
				  	{{$teknisiList->links()}}
				  </div>
			</div>
	</div>

@endsection

	