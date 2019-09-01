@extends('master')

@section('title', 'Mahasiswa')

@section('content-title', 'Mahasiswa')

@section('sidebar')
	<ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/m/beasiswa">
                <i class="nav-icon icon-drop"></i> Beasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/m/beasiswa-yang-diajukan">
                <i class="nav-icon icon-drop"></i> Beasiswa Yg Diajukan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/m/ipk">
                <i class="nav-icon icon-drop"></i> IPK</a>
            </li>
          </ul>
@endsection
