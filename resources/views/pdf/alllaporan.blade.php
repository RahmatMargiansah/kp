<!DOCTYPE html>
<html>
<head>
	<title>All Laporan</title>
</head>
<body>
	<h2 style="text-align: center">Laporan Teknisi Jakarta Selatan</h2>

			<table border="1" style="border-collapse: collapse; margin: auto">
					<thead>
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
				  	</tr>
				  	</thead>
				  	<tbody>
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
				  			<center>
				  				<img src="{{('storage/photo/'.$data->image)}}" width="120px">
				  			</center>
				  		</td>
				  	</tr>
				  		@endforeach
				  	</tbody>
			</table>
</body>
</html>