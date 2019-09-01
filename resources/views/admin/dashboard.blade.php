@extends('admin.master')

@section('title', 'Dashboard')

@section('content-title', 'Dashboard')

@section('content')
	<p>Statistik beasiswa terbaru</p>
	<hr>
	<div class="row">
		<div class="col-md-6 text-center">
		<div class="my-3 font-weight-bold">Chart Pendaftar Perjurusan</div>
		<canvas id="myChart"></canvas>
		</div>
		<div class="col-md-6">
			<div>
			<div class="my-3 font-weight-bold text-center">Jumlah Pendaftar</div>
			<div class="card">
				<div class="card-body">
					<span style="font-size: 30px">{{ count($pendaftar) }}</span> dari {{ $kuota }} pendaftar
				</div>
			</div>
			</div>	
		</div>
		<div class="col-12">
					<table class="table mt-3">
			<thead>
				<tr>
					<th>NIM</th>
					<th>Nilai</th>
					<th>Rangking</th>
				</tr>
			</thead>
			<tbody>
				@foreach($mahasiswa_r as $key => $m)
					<tr>
						<td><a class="btn btn-light" href="/a/beasiswa/{{ $id }}/mahasiswa/{{ $m->nim }}">{{ $m->nim }}</a></td>
						<td>{{ number_format($m->nilai, 2) }}</td>
						<td>{{ $m->rangking }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="h4 mt-5">Perangkingan Mahasiswa (per Jurusan)</div>
			@foreach($mahasiswa_r_jurusan as $i => $mahasiswa_r)
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
						@foreach($mahasiswa_r as $key => $m)
							<tr>
								<td><a class="btn btn-light" href="/a/beasiswa/{{ $id }}/mahasiswa/{{ $m->nim }}">{{ $m->nim }}</a></td>
								<td>{{ number_format($m->nilai, 2) }}</td>
								<td>{{ $m->rangking }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endforeach
		</div>
	</div>
	<script type="text/javascript">
		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
		    // The type of chart we want to create
		    type: 'pie',

		    // The data for our dataset
		    data: {
		        labels: {!! json_encode($chart->map(function($c) {
                     	return $c->kode;
                     })) !!},
		        datasets: [{
		            label: 'My First dataset',
		            backgroundColor: ['#ec407a', '#2196f3', '#29b6f6', '#1de9b6', '#eeff41', '#ab47bc'],
		            borderColor: ['#ec407a', '#2196f3', '#29b6f6', '#1de9b6', '#eeff41', '#ab47bc'],
		            data: {!! json_encode($chart->map(function($c) {
                     	return $c->c;
                     })) !!}
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});
	</script>
@endsection