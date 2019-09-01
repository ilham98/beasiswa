@extends('admin.master')

@section('title', 'Mahasiswa')

@section('content-title', 'Mahasiswa')

@section('content')
	<table class="table mt-3">
		<thead>
			<tr>
				<th>NIM</th>
				<th>Nama</th>
				<th>Jurusan</th>
				<th>Program Studi</th>
				<th>IPK</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($mahasiswa as $key => $m)
				<tr>
					<td>{{ $m->nim }}</td>
					<td>{{ $m->nama }}</td>
					<td>{{ $m->program_studi->jurusan->nama }}</td>
					<td>{{ $m->program_studi->nama }}</td>
					<td>{{ $m->pivot->ipk_t }}</td>
					<td>{{ findStatus($m->pivot->status) }}</td>
					<td><a href="{{ url()->current() }}/{{ $m->nim }}">Lihat Detail</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $mahasiswa->links() }}
	@if(session()->has('insert-success'))
		<script>
			Swal.fire('Sukses', 'Data berhasil ditambahkan', 'success');
		</script>
	@endif
@endsection