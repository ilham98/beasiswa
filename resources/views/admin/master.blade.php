@extends('master')

@section('title', 'Mahasiswa')

@section('content-title', 'Mahasiswa')

@section('sidebar')
	<ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="/a/dashboard">
        <i class="nav-icon icon-speedometer"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/a/mahasiswa">
        <i class="nav-icon icon-drop"></i> Mahasiswa</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/a/beasiswa">
        <i class="nav-icon icon-drop"></i> Beasiswa</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/a/berita">
        <i class="nav-icon icon-drop"></i> Berita</a>
    </li>
  </ul>
@endsection
