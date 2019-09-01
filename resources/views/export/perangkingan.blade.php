<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table {
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h2>Perangkingan</h2>
	<h5>Beasiswa: {{ $beasiswa->nama }}</h5>
	<table border="1" cellpadding="5"  style="width: 100%">
		<thead>
			<tr>
				<th>No</th>
				<th>NIM</th>
				<th>Nama</th>
				<th>Jurusan</th>
				<th>Prodi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($mahasiswa as $m)
				<tr>
					<td>{{ $m->rangking }}</td>
					<td>{{ $m->mahasiswa->nim }}</td>
					<td>{{ $m->mahasiswa->nama }}</td>
					<td>{{ $m->mahasiswa->program_studi->jurusan->nama }}</td>
					<td>{{ $m->mahasiswa->program_studi->nama }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>