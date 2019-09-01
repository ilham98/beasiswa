<?php

namespace App\Http\Controllers\Admin;

use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    public function index() {
    	$mahasiswa = Mahasiswa::paginate(20);
    	return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

     public function show($id) {
    	$mahasiswa = Mahasiswa::find($id);
    	$orang_tua = $mahasiswa->orang_tua;
        $bank = $mahasiswa->bank;
    	return view('admin.mahasiswa.single', compact('mahasiswa', 'orang_tua', 'bank'));
    }
}
