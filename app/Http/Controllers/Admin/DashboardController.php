<?php

namespace App\Http\Controllers\Admin;

use App\Rangking;
use App\RangkingJurusan;
use App\Beasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
    	$beasiswa = Beasiswa::orderBy('tanggal_tutup', 'desc')->first();     
    	$id = $beasiswa->id;
    	$kuota = $beasiswa->kuota;
    	$pendaftar = $beasiswa->mahasiswa;
    	$mahasiswa_r = Rangking::whereHas('mahasiswa', function($query) use($id) {
            $query->whereHas('beasiswa', function($query) use($id) {
                $query->where('beasiswa_mahasiswa.konfirmasi', 1)->where('beasiswa_id', $id);
            });
        })->where('beasiswa_id', $id)->orderBy('rangking', 'asc')->get();
        $mahasiswa_r_jurusan = RangkingJurusan::whereHas('mahasiswa', function($query) use($id) {
            $query->whereHas('beasiswa', function($query) use($id) {
                $query->where('beasiswa_mahasiswa.konfirmasi', 1)->where('beasiswa_id', $id);
            });
        })->where('beasiswa_id', $id)->orderBy('rangking', 'asc')->get()->groupBy('kode_jurusan');
        $chart = DB::table('beasiswa_mahasiswa')
                     ->select(DB::raw('jurusan.kode, jurusan.nama, COUNT(jurusan.kode) c'))
                     ->join('program_studi', 'program_studi.kode', '=', 'beasiswa_mahasiswa.kode_program_studi')
                     ->join('jurusan', 'jurusan.kode', '=', 'program_studi.kode_jurusan')
                     ->where('beasiswa_id', $id)
                     ->groupBy('jurusan.kode')
                     ->get();
    	return view('admin.dashboard', compact('kuota', 'pendaftar', 'beasiswa', 'mahasiswa_r', 'mahasiswa_r_jurusan', 'id', 'chart'));
    }
}
