@extends('layouts.adminmainlayout')

@section('tittle')

@section('content')

	<div class="container">
	  	<div class="mt-5 col-8 m-auto">
	  		<form action="/admin/{{$teknisi->id}}" method="post" enctype="multipart/form-data">
	  			@csrf
	  			@method('put')
	  			<div class="mb-3">
	  				<label for="nik">Nik</label>
	  				<input type="text" class="form-control" name="nik" id="nik" value="{{$teknisi->nik}}" required>
	  			</div>
	  			<div class="mb-3">
	  				<label for="name">Nama</label>
	  				<input type="text" class="form-control" name="name" id="name" value="{{$teknisi->name}}" required>
	  			</div>
	  			<div class="mb-3">
	  				<label for="type">Tipe Work Order</label>
	  				<select name="wo" id="type" class="form-control" required>
	  					<option value="{{$teknisi->wo}}">{{$teknisi->wo}}</option>
	  					@if ($teknisi->wo == 'Gangguan')
	  						<option value="Maintenance">Maintenance</option>
	  					@else
	  						<option value="Gangguan">Gangguan</option>
	  					@endif
	  				</select>
	  			</div>
	  			<div class="mb-3">
	  				<label for="cars">Kategory:</label>
					  <select  name="kategory" id="kategory">
  						<optgroup label="Maintenance">
    					  <option value="qualitycontrol">Pembersihan Rak Server</option>
    					  <option value="ping">Test Jaringan Dilokasi</option>
  						</optgroup>
  						<optgroup label="Gangguan">
    					  <option value="server">Perangkat Server</option>
    					  <option value="jaringan">Jaringan</option>
    					  <option value="edc">EDC</option>
    					  <option value="dispenser">Dispenser</option>
    					  <option value="tankipendam">Tanki Pendam</option>
    					   <option value="petir">Petir</option>
  						</optgroup>
  					</select>
	  			</div>
	  			<div class="mb-3">
	  				<label for="spbu">Action</label>
	  				<input type="text" class="form-control" name="action" id="action" required>
	  			</div>
	  			<div class="mb-3">
	  				<label for="spbu">No Spbu</label>
	  				<input type="text" class="form-control" name="spbu" id="spbu" value="{{$teknisi->spbu}}" required>
	  			</div>
	  			<div class="mb-3">
	  				<label for="alamat">Alamat Spbu</label>
	  				<input type="text" class="form-control" name="alamat_spbu" id="alamat" value="{{$teknisi->alamat_spbu}}" required>
	  			</div>
	  			<div class="mb-3">
	  				<label for="tanggal">Tanggal Laporan</label>
	  				<input type="date" class="form-control" name="tanggal_laporan" id="tanggal" value="{{$teknisi->tanggal_laporan}}" required>
	  			</div>
	  			<div class="mb-3">
	  				<label for="keterangan">Keterangan</label>
	  				<input type="text" class="form-control" name="keterangan" id="keterangan" value="{{$teknisi->keterangan}}" required>
	  			</div>
	  			<div class="mb-3">
	  				<label for="photo">Eviden Laporan</label>
	  				<div class="input-group">
	  					<input type="file" class="form-control" id="photo" name="photo" value="{{$teknisi->image}}" required>
	  				</div>
	  			<div class="mb-3">
	  				<button class="btn btn-primary">Update</button>
	  			</div>
	  		</form>
	  	</div>
	  </div>

@endsection


