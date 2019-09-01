@extends('admin.master')

@section('title', 'Beasiswa')

@section('content-title', 'Beasiswa')

@section('content')
	<div class="d-flex justify-content-end">
		<a href="{{ url('a/beasiswa/tambah') }}" class="btn btn-success text-white">Tambah Beasiswa</a>
	</div>
	<table class="table mt-3">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Donatur</th>
				<th>Tanggal Buka</th>
				<th>Tanggal Tutup</th>
				<th>Kuota</th>
				<th>M. daftar</th>
				<th>M. diterima</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($beasiswa as $key => $b)
				<tr>
					<td>{{ ($beasiswa->currentpage()-1) * $beasiswa->perpage() + $key + 1 }}</td>
					<td>{{ $b->nama }}</td>
					<td>{{ $b->donatur }}</td>
					<td>{{ $b->tanggal_buka }}</td>
					<td>{{ $b->tanggal_tutup }}</td>
					<td>{{ $b->kuota }}</td>
					<td>{{ $b->mahasiswa->count() }}</td>
					<td>{{ $b->mahasiswa()->where('beasiswa_mahasiswa.status', 2)->count() }}</td>
					<td><a href="/a/beasiswa/{{ $b->id }}/edit">Edit</a> | <a href="/a/beasiswa/{{ $b->id }}">Detail</a> | <a href="/a/beasiswa/{{ $b->id }}/perangkingan">Lihat Perangkingan</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $beasiswa->links() }}
	@if(session()->has('insert-success'))
		<script>
			Swal.fire('Sukses', 'Data berhasil ditambahkan', 'success');
		</script>
	@endif
@endsection