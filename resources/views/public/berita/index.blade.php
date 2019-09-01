@extends('home-master')

@section('title', 'Berita')

@section('content')
	<div class="container my-3">
		<h1 class="mt-5">Berita</h1>

		<div>
			@foreach($berita as $b)
			<div class="my-5">
				<div class="btn btn-light btn-lg">{{ $b->judul }}</div>
				<div class="my-3 text-success">{{ date('Y-m-d', strtotime($b->created_at)) }}</div>
				<div>{!! str_limit($b->isi, 200) !!}</div>
				<div class="d-flex justify-content-center my-3">
					<a href="/berita/{{ $b->id }}" class="btn btn-outline-success">Lebih Lengkap</a>
				</div>
			</div>
			<hr>
			@endforeach
			
		</div>
	</div>
@endsection