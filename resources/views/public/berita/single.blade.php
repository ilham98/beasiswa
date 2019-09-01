@extends('home-master')

@section('title', 'Berita')

@section('content')
	<div class="container my-3">
		<h3 class="mt-5">{{ $berita->judul }}</h3>
		<div>
			<div class="my-5">
				<div class="my-3 text-success">{{ date('Y-m-d', strtotime($berita->created_at)) }}</div>
				<div>{!! $berita->isi !!}</div>
			</div>
		</div>
	</div>
@endsection