@extends('home-master')

@section('title', 'Beranda')

@section('content')
      <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-content">
      <h2>Beasiswa<br> <span>Politeknik Negeri Samarinda</span></h2>
    </div>

    <div id="intro-carousel" class="owl-carousel" >
      <div class="item" style="background-image: url('img/intro-carousel/1.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/2.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/3.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/4.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/5.jpg');"></div>
    </div>

  </section><!-- #intro -->

  <main id="main">
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Berita</h2>
        </div>

        <div class="row">
          @foreach($berita as $b)
            <div class="col-lg-6 mt-3">
              <div class="berita-single">
                <h4 class="title"><a href="">{{ $b->judul }}</a></h4>
                <p class="description">{!! str_limit($b->isi, 100) !!}...</p>
              </div>
            </div>
          @endforeach

        </div>

        </div>

      </div>
    </section>
    <section id="call-to-action" class="mt-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-9 text-center text-lg-left mt-3">
            <h3 class="cta-title text-center">Perangkingan</h3>
            <table class="table text-white">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                </tr>
              </thead>
              <tbody>
                @foreach($mahasiswa as $m)
                <tr>
                  <td>{{ $m->rangking }}</td>]
                  <td>{{ $m->nim }}</td>
                  <td>{{ $m->mahasiswa->nama }}</td>
                  <td>{{ $m->mahasiswa->program_studi->jurusan->nama }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-center">
              <a href="/perangkingan">Lihat Lebih Lengkap</a>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->
    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Call To Action Section
    ============================-->
  </main>
@endsection