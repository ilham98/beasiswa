<?php

namespace App\Http\Controllers;

use App\Rangking;
use App\RangkingJurusan;
use Illuminate\Http\Request;

class PerangkinganController extends Controller
{
    public function index() {
    	$beasiswa = \App\Beasiswa::orderBy('tanggal_tutup', 'desc')->first();
    	$id = $beasiswa->id;
    	$mahasiswa = Rangking::whereHas('mahasiswa', function($query) use($id) {
            $query->whereHas('beasiswa', function($query) use($id) {
                $query->where('beasiswa_mahasiswa.konfirmasi', 1)->where('beasiswa_id', $id);
            });
        })->where('beasiswa_id', $id)->orderBy('rangking', 'asc')->get();
        $mahasiswa_jurusan = RangkingJurusan::whereHas('mahasiswa', function($query) use($id) {
            $query->whereHas('beasiswa', function($query) use($id) {
                $query->where('beasiswa_mahasiswa.konfirmasi', 1)->where('beasiswa_id', $id);
            });
        })->where('beasiswa_id', $id)->orderBy('rangking', 'asc')->get()->groupBy('kode_jurusan');

    	return view('public.rangking.index', compact('mahasiswa', 'mahasiswa_jurusan', 'id'));
    }

    public function show() {
    	return view('public.rangking.single');
    }
}
