@extends('admin.master')

@section('title', 'Dokumen')

@section('content-title', 'Dokumen')

@section('content')
	<div class="d-flex justify-content-end">
		<a href="{{ url()->current() }}/tambah" class="btn btn-primary">Tambah Dokumen</a>
	</div>
	<div>
		<a href="/a/beasiswa/{{$id}}">Kembali ke beasiswa</a>
	</div>
	@if($dokumen->count() != 0)
	<table class="table mt-3">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($dokumen as $key => $d)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $d->nama }}</td>
					<td><a href="{{ $d->url }}">Unduh</a><form action="{{ url()->current() }}/{{ $d->id }}" method="POST" style="display: inline;">
						@method('DELETE')
						@csrf
						<input type="submit" class="btn btn-danger" name="" value="hapus">
					</form></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@else
		<div class="p-3">Dokumen belum ditambahkan</div>
	@endif
@endsection