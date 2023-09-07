<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
</head>
<body>
	
	<h2 style="text-align: center">Laporan Detail {{$teknisi->name}} Nik {{$teknisi->nik}}</h2>
		
	<center>
	<img src="{{('storage/photo/'.$teknisi->image)}}" width="500px">
	</center>



	<table border="1" style="border-collapse: collapse; margin: auto">
		<thead>
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
		</thead>
		<tbody>
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
		</tbody>
	</table>
</div>
</body>
</html>