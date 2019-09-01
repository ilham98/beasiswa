@extends('admin.master')

@section('title', 'Beasiswa')

@section('content-title', 'Beasiswa')

@section('content')
<form action="{{ url('a/beasiswa') }}" method="POST">
	@csrf
	@method('POST')
	<div class="col-md-6">
		<div class="form-group">
			<label>Nama</label>
			<input type="" class="form-control" name="nama" value="{{ old('nama') }}">
			@if($errors->has('nama'))
				<p class="text-danger">{{ $errors->first('nama') }}</p>
			@endif
		</div>
		<div class="form-group">
			<label>Donatur</label>
			<input type="" class="form-control" name="donatur" value="{{ old('donatur') }}">
			@if($errors->has('donatur'))
				<p class="text-danger">{{ $errors->first('donatur') }}</p>
			@endif
		</div>
		<div class="form-group">
			<label>Jurusan</label>
			<br>
			@foreach($jurusan as $j)
			<input class="ml-3" type="checkbox" name="jurusan[]" value="{{ $j->kode }}" @if(is_array(old('jurusan')) && in_array($j->kode, old('jurusan'))) checked @endif> {{ $j->nama }}

			<br>
			@endforeach
			@if($errors->has('jurusan'))
				<p class="text-danger">{{ $errors->first('jurusan') }}</p>
			@endif
		</div>
		<div class="form-group">
			<label>Deskripsi</label>
			<input type="" class="form-control" name="deskripsi" value="{{ old('deskripsi') }}">
			@if($errors->has('deskripsi'))
				<p class="text-danger">{{ $errors->first('deskripsi') }}</p>
			@endif
		</div>
		<div class="form-group">
			<label>Tanggal Buka</label>
			<input type="date" class="form-control" name="tanggal_buka" value="{{ old('tanggal_buka') }}">
			@if($errors->has('tanggal_buka'))
				<p class="text-danger">{{ $errors->first('tanggal_buka') }}</p>
			@endif
		</div>
		<div class="form-group">
			<label>Tanggal Tutup</label>
			<input type="date" class="form-control" name="tanggal_tutup" value="{{ old('tanggal_tutup') }}">
			@if($errors->has('tanggal_tutup'))
				<p class="text-danger">{{ $errors->first('tanggal_tutup') }}</p>
			@endif
		</div>
		<div class="form-group">
			<label>Kuota</label>
			<input type="" class="form-control" name="kuota" value="{{ old('kuota') }}">
			@if($errors->has('kuota'))
				<p class="text-danger">{{ $errors->first('kuota') }}</p>
			@endif
		</div>
		<div class="form-group">
			<label>IPK min</label>
			<input type="" class="form-control" name="ipk_min" value="{{ old('ipk_min') }}">
			@if($errors->has('ipk_min'))
				<p class="text-danger">{{ $errors->first('ipk_min') }}</p>
			@endif
		</div>
		<div class="form-group">
			<label>Syarat & Ketentuan</label>
			<input type="" class="form-control" name="syarat_ketentuan" value="{{ old('syarat_ketentuan') }}">
			@if($errors->has('syarat_ketentuan'))
				<p class="text-danger">{{ $errors->first('syarat_ketentuan') }}</p>
			@endif
		</div>
		<div class="form-group d-flex justify-content-end">
			<input type="submit" class="btn btn-success" value="Submit">
		</div>
	</div>
</form>
@endsection