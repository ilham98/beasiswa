@extends('mahasiswa.master')

@section('title', 'Dashboard')

@section('content-title', 'Profil')

@section('content')
	<form action="/m/profil" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
	            <div class="col-sm-6">
		            <h5 class="text-primary">Data Diri</h5>
		            <hr>
		            <div class="form-group">
		                <label>No KTP</label>
		                <input type="" class="form-control" name="no_ktp" value="{{ old('no_ktp') ? old('no_ktp') : ($profil ? $profil->no_ktp : '')  }}">
		                @if($errors->has('no_ktp'))
		                    <p class="text-danger">{{ $errors->first('no_ktp') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>NIM</label>
		                <input type="" class="form-control" name="nim" value="{{ old('nim') ? old('nim') : ($profil ? $profil->nim : '')  }}">
		                @if($errors->has('nim'))
		                    <p class="text-danger">{{ $errors->first('nim') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Nama</label>
		                <input type="" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : ($profil ? $profil->nama : '')  }}">
		                @if($errors->has('nama'))
		                    <p class="text-danger">{{ $errors->first('nama') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Tempat Lahir</label>
		                <input type="" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') ? old('tempat_lahir') : ($profil ? $profil->tempat_lahir : '')  }}">
		                @if($errors->has('tempat_lahir'))
		                    <p class="text-danger">{{ $errors->first('tempat_lahir') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Tanggal Lahir</label>
		                <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : ($profil ? $profil->tanggal_lahir : '')  }}">
		                @if($errors->has('tanggal_lahir'))
		                    <p class="text-danger">{{ $errors->first('tanggal_lahir') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Jenis Kelamin</label>
		                <select class="form-control" name="jenis_kelamin">
		                    <option value="">Pilih Jenis Kelamin</option>
		                    <option value="L" 
		                      {{ 
		                        old('jenis_kelamin') ? 
		                          (old('jenis_kelamin') == 'L' ? 
		                              'selected' : '') : 
		                          ($profil ? ($profil->jenis_kelamin == 'L' ?   'selected' : '') : '') 
		                      }}
		                    >Laki-laki</option>
		                    <option value="P" 
		                      {{ 
		                        old('jenis_kelamin') ? 
		                          (old('jenis_kelamin') == 'P' ? 
		                              'selected' : '') : 
		                          ($profil ? ($profil->jenis_kelamin == 'P' ?   'selected' : '') : '') 
		                      }}
		                    >Perempuan</option>
		                </select>
		                @if($errors->has('jenis_kelamin'))
		                    <p class="text-danger">{{ $errors->first('jenis_kelamin') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>No Telepon</label>
		                <input type="" class="form-control" value="{{ old('no_telepon_hp') ? old('no_telepon_hp') : ($profil ? $profil->no_telepon_hp : '')  }}" name="no_telepon_hp">
		                @if($errors->has('no_telepon_hp'))
		                    <p class="text-danger">{{ $errors->first('no_telepon_hp') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>No Telepon Rumah</label>
		                <input type="" class="form-control" value="{{ old('no_telepon_rumah') ? old('no_telepon_rumah') : ($profil ? $profil->no_telepon_rumah : '')  }}" name="no_telepon_rumah">
		                @if($errors->has('no_telepon_rumah'))
		                    <p class="text-danger">{{ $errors->first('no_telepon_rumah') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Asal Kabupaten</label>
		                <input type="" class="form-control" name="asal_kabupaten" value="{{ old('asal_kabupaten') ? old('asal_kabupaten') : ($profil ? $profil->asal_kabupaten : '')  }}">
		                @if($errors->has('asal_kabupaten'))
		                    <p class="text-danger">{{ $errors->first('asal_kabupaten') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Alamat Asal</label>
		                <textarea type="" class="form-control" name="alamat_asal">{{ old('alamat_asal') ? old('alamat_asal') : ($profil ? $profil->alamat_asal : '')  }}</textarea>
		                @if($errors->has('alamat_asal'))
		                    <p class="text-danger">{{ $errors->first('alamat_asal') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Alamat Sekarang</label>
		               <textarea type="" class="form-control" name="alamat_sekarang">{{ old('alamat_sekarang') ? old('alamat_sekarang') : ($profil ? $profil->alamat_sekarang : '')  }}</textarea>
		               @if($errors->has('alamat_sekarang'))
		                    <p class="text-danger">{{ $errors->first('alamat_sekarang') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Program Studi</label>
		                <select class="form-control" name="kode_program_studi">
		                    <option value="">Pilih Program Studi</option>
		                    @foreach($program_studi as $ps)
		                        <option {{ 
		                        old('kode_program_studi') ? 
		                          (old('kode_program_studi') == $ps->kode ? 
		                              'selected' : '') : 
		                          ($profil ? ($profil->kode_program_studi == $ps->kode ?   'selected' : '') : '') 
		                      }} value="{{ $ps->kode }}">{{ $ps->nama }}</option>
		                    @endforeach
		                </select>
		                @if($errors->has('program_studi_id'))
		                    <p class="text-danger">{{ $errors->first('program_studi_id') }}</p>
		                @endif
		            </div>
		        </div>
		        <div class="col-sm-6">
		            <h5 class="text-primary">Orang Tua</h5>
		            <hr>
		            <div class="form-group">
		                <label>Nama Ayah</label>
		                <input type="" class="form-control" name="nama_ayah" value="{{ old('nama_ayah') ? old('nama_ayah') : ($orang_tua ? $orang_tua->nama_ayah : '')  }}">
		                @if($errors->has('nama_ayah'))
		                    <p class="text-danger">{{ $errors->first('nama_ayah') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Pekerjaan Ayah</label>
		                <input type="" class="form-control" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') ? old('pekerjaan_ayah') : ($orang_tua ? $orang_tua->pekerjaan_ayah : '')  }}">
		                @if($errors->has('pekerjaan_ayag'))
		                    <p class="text-danger">{{ $errors->first('pekerjaan_ayag') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Penghasilan Ayah</label>
		                <input type="" class="form-control" name="penghasilan_ayah" value="{{ old('penghasilan_ayah') ? old('penghasilan_ayah') : ($orang_tua ? $orang_tua->penghasilan_ayah : '')  }}">
		                @if($errors->has('penghasilan_ayah'))
		                    <p class="text-danger">{{ $errors->first('penghasilan_ayah') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Nama Ibu</label>
		                <input type="" class="form-control" name="nama_ibu" value="{{ old('nama_ibu') ? old('nama_ibu') : ($orang_tua ? $orang_tua->nama_ibu : '')  }}">
		                @if($errors->has('nama_ibu'))
		                    <p class="text-danger">{{ $errors->first('nama_ibu') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Pekerjaan Ibu</label>
		                <input type="" class="form-control" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') ? old('pekerjaan_ibu') : ($orang_tua ? $orang_tua->pekerjaan_ibu : '')  }}">
		                @if($errors->has('pekerjaan_ibu'))
		                    <p class="text-danger">{{ $errors->first('pekerjaan_ibu') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Penghasilan Ibu</label>
		                <input type="" class="form-control" name="penghasilan_ibu" value="{{ old('penghasilan_ibu') ? old('penghasilan_ibu') : ($orang_tua ? $orang_tua->penghasilan_ibu : '')  }}">
		                @if($errors->has('penghasilan_ibu'))
		                    <p class="text-danger">{{ $errors->first('penghasilan_ibu') }}</p>
		                @endif
		            </div>
		            <div class="form-group">
		                <label>Jumlah Tanggungan</label>
		                <input type="" class="form-control" name="jumlah_tanggungan" value="{{ old('jumlah_tanggungan') ? old('jumlah_tanggungan') : ($orang_tua ? $orang_tua->jumlah_tanggungan : '')  }}">
		                @if($errors->has('jumlah_tanggungan'))
		                    <p class="text-danger">{{ $errors->first('jumlah_tanggungan') }}</p>
		                @endif
		            </div>
		            <h5 class="text-primary mt-5">Bank</h5>
	            <hr>
	            <div class="form-group">
	                <label>Bank</label>
	                <input type="" class="form-control" name="nama_bank" value="{{ old('nama_bank') ? old('nama_bank') : ($bank ? $bank->nama_bank : '')  }}">
	                @if($errors->has('nama_bank'))
	                    <p class="text-danger">{{ $errors->first('nama_bank') }}</p>
	                @endif
	            </div>
	            <div class="form-group">
	                <label>No. Rekening</label>
	                <input type="" class="form-control" name="nomor_rekening" value="{{ old('nomor_rekening') ? old('nomor_rekening') : ($bank ? $bank->nomor_rekening : '')  }}">
	                @if($errors->has('nomor_rekening'))
	                    <p class="text-danger">{{ $errors->first('nomor_rekening') }}</p>
	                @endif
	            </div>
	            <div class="form-group">
	                <label>Atas Nama</label>
	                <input type="" class="form-control" name="atas_nama" value="{{ old('atas_nama') ? old('atas_nama') : ($bank ? $bank->atas_nama : '')  }}">
	                @if($errors->has('atas_nama'))
	                    <p class="text-danger">{{ $errors->first('atas_nama') }}</p>
	                @endif
	            </div>
	            	
		        	</div>
		   	</div>

            <div class="form-group d-flex justify-content-end">
                <input type="submit" value="Update" name="" class="btn btn-primary">
            </div>
        </form>
        <hr>
        <form action="{{ url()->current() }}/ktm" method="POST" enctype="multipart/form-data">
        	@if($profil->ktm_url)
	        	<div><a href="{{ $profil->ktm_url }}">Unduh KTM</a></div>
        	@else
				<div>KTM belum diupload</div>
        	@endif
        	<div class="form-group">
	        	<input type="file" name="file">
        	</div>
        	<div class="form-group">
	        	<input type="submit" class="btn btn-primary" value="Update KTM" name="">
	        </div>
	        @csrf
	        @method('PUT')
        </form>
        @if(session('update-success'))
        	<script type="text/javascript">
        		Swal.fire(
        			'Update Sukses',
        			'data berhasil diupdate',
        			'success'
        		)
        	</script>
        @endif
@endsection