<?php

namespace App\Http\Controllers\Export;

use App\Beasiswa;
use App\Rangking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class PerangkinganController extends Controller
{
    public function export($id) {
    	$mahasiswa = Rangking::with('mahasiswa')->where('beasiswa_id', $id)->orderBy('rangking', 'asc')->get();
    	$beasiswa = Beasiswa::find($id);
    	 $pdf = PDF::loadView('export.perangkingan', compact('mahasiswa', 'beasiswa', 'id'))->setPaper('A4', 'landscape');
 
        // return $pdf->download('laporan-penelitian.pdf');
        return $pdf->stream();
    }
}
