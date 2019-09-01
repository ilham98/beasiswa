@extends('admin.master')

@section('title', 'Dokumen')

@section('content-title', 'Dokumen')

@section('content')
	<form class="col-sm-6" method="POST" accept="{{ url()->current() }}" action="/a/beasiswa/{{ $id }}/dokumen" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nama</label>
			<input type="" name="nama" value="{{ old('nama') }}" class="form-control">
			@if($errors->has('nama'))
				<p class="text-danger">{{ $errors->first('nama') }}</p>
			@endif
		</div>
		<div class="form-group">
			<label>File</label>
			<br>
			<input type="file" name="file">
			@if($errors->has('file'))
				<p class="text-danger">{{ $errors->first('file') }}</p>
			@endif
		</div>
		<div class="d-flex justify-content-end">
			<input type="submit" name="" class="btn btn-primary" value="Tambah">
		</div>
		@csrf
		@method('POST')
	</form>
@endsection