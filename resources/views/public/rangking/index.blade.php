@extends('home-master')

@section('content')
	<section id="call-to-action">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title text-center">Perangkingan</h3>
            <table class="table mt-3 text-white">
              <thead>
                <tr>
                  <th>Rangking</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>Prodi</th>
                  <th>IPK</th>             
                </tr>
              </thead>
              <tbody>
                @foreach($mahasiswa as $key => $m)
                  <tr>
                    <td>{{ $m->rangking }}</td>
                    <td>{{ $m->nim }}</td>
                    <td>{{ $m->mahasiswa->nama }}</td>
                    <td>{{ $m->mahasiswa->program_studi->jurusan->nama }}</td>
                    <td>{{ $m->mahasiswa->program_studi->nama }}</td>
                    <td>{{ $m->mahasiswa->beasiswa()->where('beasiswa_id', $id)->first()->pivot->ipk_t }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <h4 class="mt-5 text-white text-center">Perangkingan Per Jurusan</h4>
            @foreach($mahasiswa_jurusan as $key => $mj)
              <div class="h3 text-white">{{ $key }}</div>
              <div>
                <table class="table mt-3 text-white">
              <thead>
                <tr>
                  <th>Rangking</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>Prodi</th>
                  <th>IPK</th>             
                </tr>
              </thead>
              <tbody>
                @foreach($mj as $key => $m)
                  <tr>
                    <td>{{ $m->rangking }}</td>
                    <td>{{ $m->nim }}</td>
                    <td>{{ $m->mahasiswa->nama }}</td>
                    <td>{{ $m->mahasiswa->program_studi->jurusan->nama }}</td>
                    <td>{{ $m->mahasiswa->program_studi->nama }}</td>
                    <td>{{ $m->mahasiswa->beasiswa()->where('beasiswa_id', $id)->first()->pivot->ipk_t }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
              </div>
            @endforeach
          </div>
        </div>

      </div>
    </section>
@endsection