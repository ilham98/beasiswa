@extends('home-master')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div>
                <h4 class="mt-5 text-center">{{ __('Register') }}</h4>

                <div class="card-body">
                    <form action="/register" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label>No KTP</label>
                            <input type="" class="form-control" name="no_ktp" value="{{ old('no_ktp') }}">
                            @if($errors->has('no_ktp'))
                                <p class="text-danger">{{ $errors->first('no_ktp') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="" class="form-control" name="nim" value="{{ old('nim') }}">
                            @if($errors->has('nim'))
                                <p class="text-danger">{{ $errors->first('nim') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="" class="form-control" name="nama" value="{{ old('nama') }}">
                            @if($errors->has('nama'))
                                <p class="text-danger">{{ $errors->first('nama') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                            @if($errors->has('tempat_lahir'))
                                <p class="text-danger">{{ $errors->first('tempat_lahir') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                            @if($errors->has('tanggal_lahir'))
                                <p class="text-danger">{{ $errors->first('tanggal_lahir') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'p' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @if($errors->has('jenis_kelamin'))
                                <p class="text-danger">{{ $errors->first('jenis_kelamin') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="" class="form-control" value="{{ old('no_telepon_hp') }}" name="no_telepon_hp">
                            @if($errors->has('no_telepon_hp'))
                                <p class="text-danger">{{ $errors->first('no_telepon_hp') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>No Telepon Rumah</label>
                            <input type="" class="form-control" value="{{ old('no_telepon_rumah') }}" name="no_telepon_rumah">
                            @if($errors->has('no_telepon_rumah'))
                                <p class="text-danger">{{ $errors->first('no_telepon_rumah') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Asal Kabupaten</label>
                            <input type="" class="form-control" name="asal_kabupaten" value="{{ old('asal_kabupaten') }}">
                            @if($errors->has('asal_kabupaten'))
                                <p class="text-danger">{{ $errors->first('asal_kabupaten') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Alamat Asal</label>
                            <textarea type="" class="form-control" name="alamat_asal">{{ old('alamat_asal') }}</textarea>
                            @if($errors->has('alamat_asal'))
                                <p class="text-danger">{{ $errors->first('alamat_asal') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Alamat Sekarang</label>
                           <textarea type="" class="form-control" name="alamat_sekarang">{{ old('alamat_sekarang') }}</textarea>
                           @if($errors->has('alamat_sekarang'))
                                <p class="text-danger">{{ $errors->first('alamat_sekarang') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Program Studi</label>
                            <select class="form-control" name="kode_program_studi">
                                <option value="">Pilih Program Studi</option>
                                @foreach($program_studi as $ps)
                                    <option {{ old('kode_program_studi') == $ps->kode ? 'selected' : '' }} value="{{ $ps->kode }}">{{ $ps->nama }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kode_program_studi'))
                                <p class="text-danger">{{ $errors->first('kode_program_studi') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                           <input type="" value="{{ old('email') }}" class="form-control" name="email">
                           @if($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                           <input type="password" value="{{ old('password') }}" class="form-control" name="password">
                           @if($errors->has('password'))
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <input type="submit" value="Daftar" name="" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('document').on('ready', function() {
        console.log('mantap')
    })
</script>
@endsection
