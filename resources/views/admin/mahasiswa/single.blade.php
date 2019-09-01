@extends('admin.master')

@section('title', 'Dashboard')

@section('content-title', 'Detail Mahasiswa')

@section('content')
  <form action="/m/mahasiswa" method="POST" disabled>
            @csrf
            @method('PUT')
            <div class="row" disabled>
              <div class="col-sm-6" disabled>
                <h5 class="text-primary" disabled>Data Diri</h5>
                <hr>
                <div class="form-group" disabled>
                    <label>No KTP</label>
                    <input type="" class="form-control" name="no_ktp" value="{{ old('no_ktp') ? old('no_ktp') : ($mahasiswa ? $mahasiswa->no_ktp : '')  }}" disabled>
                    @if($errors->has('no_ktp'))
                        <p class="text-danger" disabled>{{ $errors->first('no_ktp') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>NIM</label>
                    <input type="" class="form-control" name="nim" value="{{ old('nim') ? old('nim') : ($mahasiswa ? $mahasiswa->nim : '')  }}" disabled>
                    @if($errors->has('nim'))
                        <p class="text-danger" disabled>{{ $errors->first('nim') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Nama</label>
                    <input type="" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : ($mahasiswa ? $mahasiswa->nama : '')  }}" disabled>
                    @if($errors->has('nama'))
                        <p class="text-danger" disabled>{{ $errors->first('nama') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Tempat Lahir</label>
                    <input type="" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') ? old('tempat_lahir') : ($mahasiswa ? $mahasiswa->tempat_lahir : '')  }}" disabled>
                    @if($errors->has('tempat_lahir'))
                        <p class="text-danger" disabled>{{ $errors->first('tempat_lahir') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : ($mahasiswa ? $mahasiswa->tanggal_lahir : '')  }}" disabled>
                    @if($errors->has('tanggal_lahir'))
                        <p class="text-danger" disabled>{{ $errors->first('tanggal_lahir') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" disabled>
                        <option value="" disabled>Pilih Jenis Kelamin</option>
                        <option value="L" 
                          {{ 
                            old('jenis_kelamin') ? 
                              (old('jenis_kelamin') == 'L' ? 
                                  'selected' : '') : 
                              ($mahasiswa ? ($mahasiswa->jenis_kelamin == 'L' ?   'selected' : '') : '') 
                          }}
                        >Laki-laki</option>
                        <option value="P" 
                          {{ 
                            old('jenis_kelamin') ? 
                              (old('jenis_kelamin') == 'P' ? 
                                  'selected' : '') : 
                              ($mahasiswa ? ($mahasiswa->jenis_kelamin == 'P' ?   'selected' : '') : '') 
                          }}
                        >Perempuan</option>
                    </select>
                    @if($errors->has('jenis_kelamin'))
                        <p class="text-danger" disabled>{{ $errors->first('jenis_kelamin') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>No Telepon</label>
                    <input type="" class="form-control" value="{{ old('no_telepon_hp') ? old('no_telepon_hp') : ($mahasiswa ? $mahasiswa->no_telepon_hp : '')  }}" name="no_telepon_hp" disabled>
                    @if($errors->has('no_telepon_hp'))
                        <p class="text-danger" disabled>{{ $errors->first('no_telepon_hp') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>No Telepon Rumah</label>
                    <input type="" class="form-control" value="{{ old('no_telepon_rumah') ? old('no_telepon_rumah') : ($mahasiswa ? $mahasiswa->no_telepon_rumah : '')  }}" name="no_telepon_rumah" disabled>
                    @if($errors->has('no_telepon_rumah'))
                        <p class="text-danger" disabled>{{ $errors->first('no_telepon_rumah') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Asal Kabupaten</label>
                    <input type="" class="form-control" name="asal_kabupaten" value="{{ old('asal_kabupaten') ? old('asal_kabupaten') : ($mahasiswa ? $mahasiswa->asal_kabupaten : '')  }}" disabled>
                    @if($errors->has('asal_kabupaten'))
                        <p class="text-danger" disabled>{{ $errors->first('asal_kabupaten') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Alamat Asal</label>
                    <textarea type="" class="form-control" name="alamat_asal" disabled>{{ old('alamat_asal') ? old('alamat_asal') : ($mahasiswa ? $mahasiswa->alamat_asal : '')  }}</textarea>
                    @if($errors->has('alamat_asal'))
                        <p class="text-danger" disabled>{{ $errors->first('alamat_asal') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Alamat Sekarang</label>
                   <textarea type="" class="form-control" name="alamat_sekarang" disabled>{{ old('alamat_sekarang') ? old('alamat_sekarang') : ($mahasiswa ? $mahasiswa->alamat_sekarang : '')  }}</textarea>
                   @if($errors->has('alamat_sekarang'))
                        <p class="text-danger" disabled>{{ $errors->first('alamat_sekarang') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Program Studi</label>
                    <input type="" class="form-control" value="{{ $mahasiswa->program_studi->nama }}" name="" disabled>
                    @if($errors->has('program_studi_id'))
                        <p class="text-danger" disabled>{{ $errors->first('program_studi_id') }}</p>
                    @endif
                </div>
            </div>
            <div class="col-sm-6" disabled>
                <h5 class="text-primary" disabled>Orang Tua</h5>
                <hr>
                <div class="form-group" disabled>
                    <label>Nama Ayah</label>
                    <input type="" class="form-control" name="nama_ayah" value="{{ old('nama_ayah') ? old('nama_ayah') : ($orang_tua ? $orang_tua->nama_ayah : '')  }}" disabled>
                    @if($errors->has('nama_ayah'))
                        <p class="text-danger" disabled>{{ $errors->first('nama_ayah') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Pekerjaan Ayah</label>
                    <input type="" class="form-control" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') ? old('pekerjaan_ayah') : ($orang_tua ? $orang_tua->pekerjaan_ayah : '')  }}" disabled>
                    @if($errors->has('pekerjaan_ayag'))
                        <p class="text-danger" disabled>{{ $errors->first('pekerjaan_ayag') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Penghasilan Ayah</label>
                    <input type="" class="form-control" name="penghasilan_ayah" value="{{ old('penghasilan_ayah') ? old('penghasilan_ayah') : ($orang_tua ? $orang_tua->penghasilan_ayah : '')  }}" disabled>
                    @if($errors->has('penghasilan_ayah'))
                        <p class="text-danger" disabled>{{ $errors->first('penghasilan_ayah') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Nama Ibu</label>
                    <input type="" class="form-control" name="nama_ibu" value="{{ old('nama_ibu') ? old('nama_ibu') : ($orang_tua ? $orang_tua->nama_ibu : '')  }}" disabled>
                    @if($errors->has('nama_ibu'))
                        <p class="text-danger" disabled>{{ $errors->first('nama_ibu') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Pekerjaan Ibu</label>
                    <input type="" class="form-control" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') ? old('pekerjaan_ibu') : ($orang_tua ? $orang_tua->pekerjaan_ibu : '')  }}" disabled>
                    @if($errors->has('pekerjaan_ibu'))
                        <p class="text-danger" disabled>{{ $errors->first('pekerjaan_ibu') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Penghasilan Ibu</label>
                    <input type="" class="form-control" name="penghasilan_ibu" value="{{ old('penghasilan_ibu') ? old('penghasilan_ibu') : ($orang_tua ? $orang_tua->penghasilan_ibu : '')  }}" disabled>
                    @if($errors->has('penghasilan_ibu'))
                        <p class="text-danger" disabled>{{ $errors->first('penghasilan_ibu') }}</p>
                    @endif
                </div>
                <div class="form-group" disabled>
                    <label>Jumlah Tanggungan</label>
                    <input type="" class="form-control" name="jumlah_tanggungan" value="{{ old('jumlah_tanggungan') ? old('jumlah_tanggungan') : ($orang_tua ? $orang_tua->jumlah_tanggungan : '')  }}" disabled>
                    @if($errors->has('jumlah_tanggungan'))
                        <p class="text-danger" disabled>{{ $errors->first('jumlah_tanggungan') }}</p>
                    @endif
                </div>
                <h5 class="text-primary mt-5" disabled>Bank</h5>
              <hr>
              <div class="form-group" disabled>
                  <label>Bank</label>
                  <input type="" class="form-control" name="nama_bank" value="{{ old('nama_bank') ? old('nama_bank') : ($bank ? $bank->nama_bank : '')  }}" disabled>
                  @if($errors->has('nama_bank'))
                      <p class="text-danger" disabled>{{ $errors->first('nama_bank') }}</p>
                  @endif
              </div>
              <div class="form-group" disabled>
                  <label>No. Rekening</label>
                  <input type="" class="form-control" name="nomor_rekening" value="{{ old('nomor_rekening') ? old('nomor_rekening') : ($bank ? $bank->nomor_rekening : '')  }}" disabled>
                  @if($errors->has('nomor_rekening'))
                      <p class="text-danger" disabled>{{ $errors->first('nomor_rekening') }}</p>
                  @endif
              </div>
              <div class="form-group" disabled>
                  <label>Atas Nama</label>
                  <input type="" class="form-control" name="atas_nama" value="{{ old('atas_nama') ? old('atas_nama') : ($bank ? $bank->atas_nama : '')  }}" disabled>
                  @if($errors->has('atas_nama'))
                      <p class="text-danger" disabled>{{ $errors->first('atas_nama') }}</p>
                  @endif
              </div>
                
              </div>
        </div>
        </form>

        @if(session('update-success'))
          <script type="text/javascript" disabled>
            Swal.fire(
              'Update Sukses',
              'data berhasil diupdate',
              'success'
            )
          </script>
        @endif
@endsection