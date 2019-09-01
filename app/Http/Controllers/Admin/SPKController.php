<?php

namespace App\Http\Controllers\Admin;

use App\Beasiswa;
use App\Normalisasi;
use App\Perangkingan;
use Illuminate\Http\Beasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SPKController extends Controller
{
    public function index() {
    	$beasiswa = Beasiswa::all();
    	return view('admin.spk.index', compact('beasiswa'));
    }
}
