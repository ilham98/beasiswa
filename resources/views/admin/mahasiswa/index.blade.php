@extends('admin.master')

@section('content')
	<div>
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>NIM</th>
					<th>Jurusan</th>
					<th>Program Studi</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($mahasiswa as $key => $m)
					<tr>
						<td>{{ ($mahasiswa->currentpage()-1) * $mahasiswa->perpage() + $key + 1 }}</td>
						<td>{{ $m->nama }}</td>
						<td>{{ $m->nim }}</td>
						<td>{{ $m->program_studi->jurusan->nama }}</td>
						<td>{{ $m->program_studi->nama }}</td>
						<td><a href="{{ url()->current().'/'.$m->nim }}">Lihat Detail</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{ $mahasiswa->links() }}
	</div>
@endsection