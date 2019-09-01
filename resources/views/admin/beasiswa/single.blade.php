@extends('admin.master')

@section('title', 'Beasiswa')

@section('content-title', 'Beasiswa')

@section('content')
<div class="my-3 col-md-6"> 
  <div class="card bg-primary">
    <div class="card-body">
      <div><span style="font-size: 40px">{{ $mahasiswa_daftar_count }}</span> mahasiswa telah mendaftar.</div>
      <div><span style="font-size: 40px">{{ $mahasiswa_diterima_count }}</span>/ {{ $beasiswa->kuota }} mahasiswa telah diterima.</div>
      <a href="{{ url()->current() }}/mahasiswa" class="btn btn-light mt-2">Lihat Mahasiswa</a>
    </div>
  </div>
</div>
<form action="{{ url('a/beasiswa/').'/'.$beasiswa->id }}" method="POST">
  @csrf
  @method('PUT')
  <div class="col-md-6">
    <div class="form-group">
      <label>Nama</label>
      <input type="" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : $beasiswa->nama }}">
      @if($errors->has('nama'))
        <p class="text-danger">{{ $errors->first('nama') }}</p>
      @endif
    </div>
    <div class="form-group">
      <label>Donatur</label>
      <input type="" class="form-control" name="donatur" value="{{ old('donatur') ? old('donatur') : $beasiswa->donatur }}">
      @if($errors->has('donatur'))
        <p class="text-danger">{{ $errors->first('donatur') }}</p>
      @endif
    </div>
    <div class="form-group">
      <label>Jurusan</label>
      <input type="" class="form-control" value="{{ $jurusan }}">
    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <input type="" class="form-control" name="deskripsi" value="{{ old('deskripsi') ? old('deskripsi') : $beasiswa->donatur }}">
      @if($errors->has('deskripsi'))
        <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
      @endif
    </div>
    <div class="form-group">
      <label>Tanggal Buka</label>
      <input type="date" class="form-control" name="tanggal_buka" value="{{ old('tanggal_buka') ? old('tanggal_buka') : $beasiswa->tanggal_buka }}">
      @if($errors->has('tanggal_buka'))
        <p class="text-danger">{{ $errors->first('tanggal_buka') }}</p>
      @endif
    </div>
    <div class="form-group">
      <label>Tanggal Tutup</label>
      <input type="date" class="form-control" name="tanggal_tutup" value="{{ old('tanggal_tutup') ? old('tanggal_tutup') : $beasiswa->tanggal_tutup }}">
      @if($errors->has('tanggal_tutup'))
        <p class="text-danger">{{ $errors->first('tanggal_tutup') }}</p>
      @endif
    </div>
    <div class="form-group">
      <label>Kuota</label>
      <input type="" class="form-control" name="kuota" value="{{ old('kuota') ? old('kuota') : $beasiswa->kuota }}">
      @if($errors->has('kuota'))
        <p class="text-danger">{{ $errors->first('kuota') }}</p>
      @endif
    </div>
    <div class="form-group">
      <label>IPK</label>
      <input type="" class="form-control" name="ipk_min" value="{{ old('ipk_min') ? old('ipk_min') : $beasiswa->ipk_min }}">
      @if($errors->has('ipk_min'))
        <p class="text-danger">{{ $errors->first('ipk_min') }}</p>
      @endif
    </div>
    <div class="form-group">
      <label>Syarat & Ketentuan</label>
      <input type="" class="form-control" name="syarat_ketentuan" value="{{ old('syarat_ketentuan') ? old('syarat_ketentuan') : $beasiswa->syarat_ketentuan }}">
      @if($errors->has('syarat_ketentuan'))
        <p class="text-danger">{{ $errors->first('syarat_ketentuan') }}</p>
      @endif
    </div>
    <div class="form-group d-flex justify-content-end">
      <a href="{{ url()->current() }}/dokumen" class="btn btn-primary">Tambah Lampiran</a>
      <a href="{{ url()->current() }}/edit" class="ml-2 btn btn-success">Edit</a>
    </div>
  </div>
</form>
<form id="delete-form" method="POST" action="{{ url('a/beasiswa/').'/'.$beasiswa->id }}">
  @csrf
  @method('DELETE')
</form>
<script type="text/javascript">
  var del = document.getElementById('delete-button');
  var deleteForm = document.getElementById('delete-form');
  del.addEventListener('click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Anda yakin ingin menghapus?',
        text: "Data yang telah dihapus tidak dapat dikembalikan",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batalkan'
      }).then((result) => {
        if (result.value) {
          deleteForm.submit();
        }
      });
  });
  

</script>
@if(session('update-success'))
  <script>
    Swal.fire('Sukses', 'Data berhasil diupdate', 'success');
  </script>
@endif
@endsection