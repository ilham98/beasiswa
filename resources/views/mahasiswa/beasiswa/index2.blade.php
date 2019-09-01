@extends('mahasiswa.master')

@section('title', 'Beasiswa')

@section('content-title', 'Beasiswa')

@section('content')
	@if($beasiswa->count() > 0)
	<table class="table mt-3">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Donatur</th>
				<th>Tanggal Buka</th>
				<th>Tanggal Tutup</th>
				<th>Kuota</th>
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
					<td><a href="/m/beasiswa/{{ $b->id }}">Lihat Detail</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@else
		<div>Tidak ada beasiswa yang diajukan.</div>
	@endif
	{{ $beasiswa->links() }}
	@if(session()->has('insert-success'))
		<script>
			Swal.fire('Sukses', 'Data berhasil ditambahkan', 'success');
		</script>
	@endif
@endsection