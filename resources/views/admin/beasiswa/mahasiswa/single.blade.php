@extends('admin.master')

@section('title', 'Beasiswa')

@section('content-title', 'Beasiswa')

@section('content')
<hr>
<form action="{{ url('a/beasiswa/').'/'.$beasiswa->id }}" method="POST">
  @csrf
  @method('PUT')
  <div class="row">
    <div class="col-md-6">
    <h5 class="text-primary my-3">Detail Beasiswa</h5>
    <div class="form-group">
      <label>Nama</label>
      <input type="" class="form-control" name="nama" value="{{ $beasiswa->nama }}" readonly="">
    </div>
    <div class="form-group">
      <label>Donatur</label>
      <input type="" class="form-control" name="nama" value="{{ $beasiswa->donatur }}" readonly="">
    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <input type="" class="form-control" name="nama" value="{{ $beasiswa->deskripsi }}" readonly="">
    </div>
    <div class="form-group">
      <label>Tanggal Buka</label>
      <input type="date" class="form-control" name="nama" value="{{ $beasiswa->tanggal_buka }}" readonly=>
    </div>
    <div class="form-group">
      <label>Tanggal Tutup</label>
      <input type="date" class="form-control" name="tanggal_tutup" value="{{ $beasiswa->tanggal_tutup }}" readonly="">
    </div>
    <div class="form-group">
      <label>Kuota</label>
      <input type="" class="form-control" name="kuota" value="{{ old('kuota') ? old('kuota') : $beasiswa->kuota }}" readonly="">
      @if($errors->has('kuota'))
        <p class="text-danger">{{ $errors->first('kuota') }}</p>
      @endif
    </div>
    <div class="form-group">
      <label>IPK Minimal</label>
      <input type="" class="form-control" name="ipk_min" value="{{ old('ipk_min') ? old('ipk_min') : $beasiswa->ipk_min }}" readonly="">
      @if($errors->has('ipk_min'))
        <p class="text-danger">{{ $errors->first('ipk_min') }}</p>
      @endif
    </div>
    <div class="form-group">
      <label>Syarat & Ketentuan</label>
      <textarea class="form-control" name="syarat_ketentuan" readonly="">{{ old('syarat_ketentuan') ? old('syarat_ketentuan') : $beasiswa->syarat_ketentuan }}</textarea>
      @if($errors->has('syarat_ketentuan'))
        <p class="text-danger">{{ $errors->first('syarat_ketentuan') }}</p>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <h5 class="text-primary my-3">Dokumen</h5>
    <div>
      <ul>
        @foreach($beasiswa->dokumen as $d)
          <li><a href="{{ $d->url }}">{{ $d->nama }}</a></li>
        @endforeach
      </ul>
      
    </div>
    </div>
  </div>
</form>
<div>
  <hr>
  <div class="col-md-12">
      @php
        $disabled = 'disabled';
      @endphp
        <form action="{{ url()->current() }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-sm-6">
                <h5 class="text-primary">Data Diri</h5>
                <hr>
                <div class="form-group">
                    <label>No KTP</label>
                    <input type="" class="form-control" name="no_ktp" value="{{ old('no_ktp') ? old('no_ktp') : ($data_diri ? $data_diri->no_ktp : '')  }}" {{ $disabled }}>
                    @if($errors->has('no_ktp'))
                        <p class="text-danger">{{ $errors->first('no_ktp') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>NIM</label>
                    <input type="" class="form-control" name="nim" value="{{ old('nim') ? old('nim') : ($data_diri ? $data_diri->nim : '')  }}" {{ $disabled }}>
                    @if($errors->has('nim'))
                        <p class="text-danger">{{ $errors->first('nim') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input {{ $disabled }} type="" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : ($data_diri ? $data_diri->nama : '')  }}">
                    @if($errors->has('nama'))
                        <p class="text-danger">{{ $errors->first('nama') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input {{ $disabled }} type="" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') ? old('tempat_lahir') : ($data_diri ? $data_diri->tempat_lahir : '')  }}">
                    @if($errors->has('tempat_lahir'))
                        <p class="text-danger">{{ $errors->first('tempat_lahir') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input {{ $disabled }} type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : ($data_diri ? $data_diri->tanggal_lahir : '')  }}">
                    @if($errors->has('tanggal_lahir'))
                        <p class="text-danger">{{ $errors->first('tanggal_lahir') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select {{ $disabled }} class="form-control" name="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" 
                          {{ 
                            old('jenis_kelamin') ? 
                              (old('jenis_kelamin') == 'L' ? 
                                  'selected' : '') : 
                              ($data_diri ? ($data_diri->jenis_kelamin == 'L' ?   'selected' : '') : '') 
                          }}
                        >Laki-laki</option>
                        <option value="P" 
                          {{ 
                            old('jenis_kelamin') ? 
                              (old('jenis_kelamin') == 'P' ? 
                                  'selected' : '') : 
                              ($data_diri ? ($data_diri->jenis_kelamin == 'P' ?   'selected' : '') : '') 
                          }}
                        >Perempuan</option>
                    </select>
                    @if($errors->has('jenis_kelamin'))
                        <p class="text-danger">{{ $errors->first('jenis_kelamin') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input {{ $disabled }} type="" class="form-control" value="{{ old('no_telepon_hp') ? old('no_telepon_hp') : ($data_diri ? $data_diri->no_telepon_hp : '')  }}" name="no_telepon_hp">
                    @if($errors->has('no_telepon_hp'))
                        <p class="text-danger">{{ $errors->first('no_telepon_hp') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>No Telepon Rumah</label>
                    <input {{ $disabled }} type="" class="form-control" value="{{ old('no_telepon_rumah') ? old('no_telepon_rumah') : ($data_diri ? $data_diri->no_telepon_rumah : '')  }}" name="no_telepon_rumah">
                    @if($errors->has('no_telepon_rumah'))
                        <p class="text-danger">{{ $errors->first('no_telepon_rumah') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Asal Kabupaten</label>
                    <input {{ $disabled }} type="" class="form-control" name="asal_kabupaten" value="{{ old('asal_kabupaten') ? old('asal_kabupaten') : ($data_diri ? $data_diri->asal_kabupaten : '')  }}">
                    @if($errors->has('asal_kabupaten'))
                        <p class="text-danger">{{ $errors->first('asal_kabupaten') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Alamat Asal</label>
                    <textarea {{ $disabled }} type="" class="form-control" name="alamat_asal">{{ old('alamat_asal') ? old('alamat_asal') : ($data_diri ? $data_diri->alamat_asal : '')  }}</textarea>
                    @if($errors->has('alamat_asal'))
                        <p class="text-danger">{{ $errors->first('alamat_asal') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Alamat Sekarang</label>
                   <textarea {{ $disabled }} type="" class="form-control" name="alamat_sekarang">{{ old('alamat_sekarang') ? old('alamat_sekarang') : ($data_diri ? $data_diri->alamat_sekarang : '')  }}</textarea>
                   @if($errors->has('alamat_sekarang'))
                        <p class="text-danger">{{ $errors->first('alamat_sekarang') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Program Studi</label>
                    <select {{ $disabled }} class="form-control" name="kode_program_studi">
                        <option value="">Pilih Program Studi</option>
                        @foreach($program_studi as $ps)
                            <option {{ 
                            old('kode_program_studi') ? 
                              (old('kode_program_studi') == $ps->kode ? 
                                  'selected' : '') : 
                              ($data_diri ? ($data_diri->kode_program_studi == $ps->kode ?   'selected' : '') : '') 
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
                    <input {{ $disabled }} type="" class="form-control" name="nama_ayah" value="{{ old('nama_ayah') ? old('nama_ayah') : ($data_diri ? $data_diri->nama_ayah : '')  }}">
                    @if($errors->has('nama_ayah'))
                        <p class="text-danger">{{ $errors->first('nama_ayah') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Pekerjaan Ayah</label>
                    <input {{ $disabled }} type="" class="form-control" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') ? old('pekerjaan_ayah') : ($data_diri ? $data_diri->pekerjaan_ayah : '')  }}">
                    @if($errors->has('nama_ayah'))
                        <p class="text-danger">{{ $errors->first('nama_ayah') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Nama Ibu</label>
                    <input  {{ $disabled }} type="" class="form-control" name="nama_ibu" value="{{ old('nama_ibu') ? old('nama_ibu') : ($data_diri ? $data_diri->nama_ibu : '')  }}">
                    @if($errors->has('nama_ibu'))
                        <p class="text-danger">{{ $errors->first('nama_ibu') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Pekerjaan Ibu</label>
                    <input {{ $disabled }} type="" class="form-control" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') ? old('pekerjaan_ibu') : ($data_diri ? $data_diri->pekerjaan_ibu : '')  }}">
                    @if($errors->has('nama_ibu'))
                        <p class="text-danger">{{ $errors->first('nama_ibu') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Penghasilan Orang Tua</label>
                    <input {{ $disabled }} type="" class="form-control" name="nama_ayah" value="{{ old('penghasilan_orang_tua') ? old('penghasilan_orang_tua') : ($data_diri ? $data_diri->penghasilan_orang_tua : '')  }}">
                    @if($errors->has('penghasilan_orang_tua'))
                        <p class="text-danger">{{ $errors->first('penghasilan_orang_tua') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Jumlah Tanggungan</label>
                    <input {{ $disabled }} type="" class="form-control" name="nama_ayah" value="{{ old('jumlah_tanggungan') ? old('jumlah_tanggungan') : ($data_diri ? $data_diri->jumlah_tanggungan : '')  }}">
                    @if($errors->has('jumlah_tanggungan'))
                        <p class="text-danger">{{ $errors->first('jumlah_tanggungan') }}</p>
                    @endif
                </div>
                <h5 class="text-primary mt-5">Bank</h5>
              <hr>
              <div class="form-group">
                  <label>Bank</label>
                  <input {{ $disabled }} type="" class="form-control" name="nama_bank" value="{{ old('nama_bank') ? old('nama_bank') : ($data_diri ? $data_diri->nama_bank : '')  }}">
                  @if($errors->has('nama_bank'))
                      <p class="text-danger">{{ $errors->first('nama_bank') }}</p>
                  @endif
              </div>
              <div class="form-group">
                  <label>No. Rekening</label>
                  <input {{ $disabled }} type="" class="form-control" name="nomor_rekening" value="{{ old('nomor_rekening') ? old('nomor_rekening') : ($data_diri ? $data_diri->nomor_rekening : '')  }}">
                  @if($errors->has('nomor_rekening'))
                      <p class="text-danger">{{ $errors->first('nomor_rekening') }}</p>
                  @endif
              </div>
              <div class="form-group">
                  <label>Atas Nama</label>
                  <input {{ $disabled }} type="" class="form-control" name="atas_nama" value="{{ old('atas_nama') ? old('atas_nama') : ($data_diri ? $data_diri->atas_nama : '')  }}">
                  @if($errors->has('atas_nama'))
                      <p class="text-danger">{{ $errors->first('atas_nama') }}</p>
                  @endif
              </div>
              <h5 class="text-primary mt-5">Akademik</h5>
              <hr>
              <div class="form-group">
                  <label>IPK</label>
                  <input {{ $disabled }} type="" class="form-control" name="ipk_t" value="{{ old('ipk_t') ? old('ipk_t') : ($data_diri ? $data_diri->ipk_t : '')  }}">
                  @if($errors->has('ipk_t'))
                      <p class="text-danger">{{ $errors->first('ipk_t') }}</p>
                  @endif
              </div>
              <div class="form-group">
                  <label>Semester</label>
                  <input {{ $disabled }} type="" class="form-control" name="semester" value="{{ old('semester') ? old('semester') : ($data_diri ? $data_diri->semester : '')  }}">
                  @if($errors->has('semester'))
                      <p class="text-danger">{{ $errors->first('semester') }}</p>
                  @endif
              </div>
                
              </div>
        </div>
            <div class="form-group d-flex justify-content-end">
              @if($disabled == '') 
              <a href="" class="btn btn-danger mr-2" id="batalkan_pengajuan_button">Batalkan Pengajuan</a>

              <a href="" class="btn btn-success mr-2" id="sinkronisasi_button">Sinkronkan Data Diri Dengan Profil</a>
                <input type="submit" value="Update" name="" class="btn btn-primary">
              @endif
            </div>
        </form>
        <form action="{{ url()->current() }}/dokumen" class="col-sm-6" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <h5 class="text-primary">Dokumen</h5>
          <div class="my-3">
            @if($dokumen_mahasiswa->count() == 0)
              Tidak ada Dokumen Yang Diupload
            @else
              <ul>
                @foreach($dokumen_mahasiswa as $dm)
                  <li><a href="{{ $dm->pivot->url }}">{{ findSyaratDokumen($dm->pivot->tipe)['nama'] }}</a> @if($disabled == '')<a class="text-danger" href="{{ url()->current() }}/dokumen/{{ $dm->pivot->tipe }}/delete"> (Hapus)</a> @endif</li>
                @endforeach
              </ul>
            @endif
          </div>
          @if($disabled == '')
          <div class="form-group">
            <input type="submit" name="" value="Tambah Dokumen" class="btn btn-primary">
          </div>
          @endif
        </form>
        <form action="{{ url()->current() }}/dokumen" class="col-sm-6" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <h5 class="text-primary">Dokumen (admin)</h5>
          <div class="my-3">
            @if($dokumen_mahasiswa_admin->count() == 0)
              Tidak ada Dokumen Yang Diupload
            @else

              <ul>
                @foreach($dokumen_mahasiswa_admin as $dm)
                  <li><a href="{{ $dm->pivot->url }}">{{ findSyaratAdminDokumen($dm->pivot->tipe)['nama'] }}</a><a class="text-danger" href="{{ url()->current() }}/dokumen/{{ $dm->pivot->tipe }}/delete"> (Hapus)</a></li>
                @endforeach
              </ul>
            @endif
          </div>
          <div class="form-group">
            <select name="tipe" class="form-control">
              <option value="">Pilih Tipe</option>
              @foreach(getSyaratAdminDokumen() as $s)
                <option value="{{ $s['id'] }}">{{ $s['nama'] }}</option>
              @endforeach
            </select>
            <br>
            <input type="file" name="file">
          </div>
          <div class="form-group">
            <input type="submit" name="" value="Tambah Dokumen" class="btn btn-primary">
          </div>
        </form>
        <hr>
        <form class="col-sm-6" action="{{ url()->current() }}" method="POST">
          <div class="form-group">
            <select class="form-control" name="status">
              <option value="">Pilih status</option>
              <option value="1" {{ $data_diri->status == 1 ? 'selected' : '' }}>Dalam Proses</option>
              <option value="2" {{ $data_diri->status == 2 ? 'selected' : '' }}>Diterima</option>
              <option value="3" {{ $data_diri->status == 3 ? 'selected' : '' }}>Tidak diterima</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update Status" name="">
          </div>
          @csrf
          @method('PUT')
        </form>
        <form id="batalkan_pengajuan_form" action="{{ url()->current() }}/ajukan" method="POST">
          @csrf
          @method('DELETE')
        </form>
        <form id="konfirmasi_form" action="{{ url()->current() }}/konfirmasi" method="POST">
          @csrf
          @method('POST')
        </form>
        
      <form id="sinkronisasi_form" action="{{ url()->current() }}/sinkronisasi" method="POST">
          @csrf
          @method('POST')
        </form>
  </div>
</div>
<form id="delete-form" method="POST" action="{{ url('a/beasiswa/').'/'.$beasiswa->id }}">
  @csrf
  @method('DELETE')
</form>

<script type="text/javascript">
  var batalkan_pengajuan_button = document.getElementById('batalkan_pengajuan_button');
  var batalkan_pengajuan_form = document.getElementById('batalkan_pengajuan_form');
  var sinkronisasi_button = document.getElementById('sinkronisasi_button');
  var sinkronisasi_form = document.getElementById('sinkronisasi_form');
  var konfirmasi_button = document.getElementById('konfirmasi_button');
  var konfirmasi_form = document.getElementById('konfirmasi_form');
  var del = document.getElementById('delete-button');
  var deleteForm = document.getElementById('delete-form');
  batalkan_pengajuan_button.addEventListener('click', function(e) {
    e.preventDefault();
    batalkan_pengajuan_form.submit();
  });
  sinkronisasi_button.addEventListener('click', function(e) {
    e.preventDefault();
    sinkronisasi_form.submit();
  });
  konfirmasi_button.addEventListener('click', function(e) {
    e.preventDefault();
    konfirmasi_form.submit();
  });
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