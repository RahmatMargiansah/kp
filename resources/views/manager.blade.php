@extends('layouts.managermainlayout')

@section('tittle')

@section('content')

<h4>Data Laporan</h4>
		<div class="my-5">
					<div class="my-3 col-12 col-sm-8 col-md-5">
						<form action="" method="get">
						  <div class="input-group mb-3">
    			            <input type="text" class="form-control" name="keyword" placeholder="Search">
    			            <button class="input-group-text btn btn-primary">Search</button>
						  </div>
						</form>
					</div>
				</div>

				<form method="GET" action="/filter">
					<div class="row pb-3">
						<div class="col-md-3">
							<label>Dari tanggal: </label>
							<input type="date" name="start_date" class="form-control">
						</div>
						<div class="col-md-3">
							<label>Sampai tanggal: </label>
							<input type="date" name="end_date" class="form-control">
						</div>
						<div class="col-md-1 pt-4">
							<button type="submit" class="btn btn-primary">Filter</button>
						</div>
					</div>
				</form>
		
			<div class="container">
				@if(Session::has('status'))
					<div class="alert alert-success" role="alert">
						{{Session::get('message')}}
					</div>
				@endif
				<div class="my-3 d-flex justify-content-end">
					<a href="/export-pdf" class="btn btn-secondary">Print Laporan</a>
				</div>
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
				  				<a href="/managerviewdetaillaporan/{{$data->id}}" class="btn btn-primary">Detail Laporan</a>
				  			</td>
				  	</tr>
				  			@endforeach
				  </table>	

				  <div class="my-5">
				  	{{$teknisiList->withQueryString()->links()}}
				  </div>
			</div>
	</div>

@endsection