@extends('admin.master')

@section('title', 'Perangkingan Mahasiswa')

@section('content-title', 'Perangkingan Mahasiswa')

@section('content')
	@if($mahasiswa_count != 0)
		@if($mahasiswa->count() != 0)
		<form class="d-flex justify-content-end" method="POST">
				@csrf
				@method('POST')
				<a href="/export/perangkingan/{{$id}}" target="_blank" class="btn btn-success mr-2">Unduh PDF</a>
				<input type="submit" value="Generate Ulang Perangkingan" class="btn btn-primary" name="">
			</form>
		<table class="table mt-3">
			<thead>
				<tr>
					<th>NIM</th>
					<th>Nilai</th>
					<th>Rangking</th>
				</tr>
			</thead>
			<tbody>
				@foreach($mahasiswa as $key => $m)
					<tr>
						<td><a class="btn btn-light" href="/a/beasiswa/{{ $id }}/mahasiswa/{{ $m->nim }}">{{ $m->nim }}</a></td>
						<td>{{ number_format($m->nilai, 2) }}</td>
						<td>{{ $m->rangking }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="h4 mt-5">Perangkingan Mahasiswa (per Jurusan)</div>
			@foreach($mahasiswa_jurusan as $i => $mahasiswa)
				<h5 class="mt-3 text-primary">{{ \App\Jurusan::find($i)->nama }}</h5>
				<table class="table mt-3">
					<thead>
						<tr>
							<th>NIM</th>
							<th>Nilai</th>
							<th>Rangking</th>
						</tr>
					</thead>
					<tbody>
						@foreach($mahasiswa as $key => $m)
							<tr>
								<td><a class="btn btn-light" href="/a/beasiswa/{{ $id }}/mahasiswa/{{ $m->nim }}">{{ $m->nim }}</a></td>
								<td>{{ number_format($m->nilai, 2) }}</td>
								<td>{{ $m->rangking }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endforeach
		@else
			<div class="p-3 text-center">Perangkingan belum dibuat, generate Perangkingan pada beasiswa ini dengan melakukan klik pada tombol generate dibawah.</div>
			<form class="d-flex justify-content-center" method="POST">
				@csrf
				@method('POST')
				<input type="submit" value="Generate" class="btn btn-primary" name="">
			</form>
		@endif
		@if(session()->has('insert-success'))
			<script>
				Swal.fire('Sukses', 'Data berhasil ditambahkan', 'success');
			</script>
		@endif
	@else
		<div class="p-3">
			Tidak ada mahasiswa yang terdaftar
		</div>
	@endif
@endsection