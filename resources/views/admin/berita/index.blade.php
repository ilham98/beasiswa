@extends('admin.master')

@section('title', 'Berita')

@section('content-title', 'Berita')

@section('content')
	<div class="d-flex justify-content-end">
		<a href="{{ url('a/berita/tambah') }}" class="btn btn-success text-white">Tambah Berita</a>
	</div>
	<table class="table mt-3">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Tanggal Dibuat</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($berita as $key => $b)
				<tr>
					<td>{{ ($berita->currentpage()-1) * $berita->perpage() + $key + 1 }}</td>
					<td>{{ $b->judul }}</td>
					<td>{{ $b->created_at }}</td>
					<td><a href="/a/berita/{{ $b->id }}/edit">Edit</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $berita->links() }}
	@if(session()->has('insert-success'))
		<script>
			Swal.fire('Sukses', 'Data berhasil ditambahkan', 'success');
		</script>
	@endif
@endsection