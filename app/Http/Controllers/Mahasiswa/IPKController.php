<?php

namespace App\Http\Controllers\Mahasiswa;

use Auth;
use App\IPK;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IPKController extends Controller
{
    public function index() {
    	$ipk = Auth::user()->mahasiswa->ipk->all();
    	return view('mahasiswa.ipk.index', compact('ipk'));
    }

    public function update(Request $request) {
    	$nim = Auth::user()->mahasiswa->nim;
    	IPK::where('nim', $nim)->delete();
        try {
           foreach($request->ipk as $key => $i) {
                if(($i <= 0 || $i > 4) && $i != null) {
                    throw new \Exception("IPK harus lebih dari 0 dan kurang dari 4", 1);         
                }
                if($key > 1) {
                    if($request->ipk[$key-1] == null) {

                       return redirect(url()->previous());
                    }  
                }

                IPK::create([
                    'nim' => $nim,
                    'nilai' => $i,
                    'semester' => $key
                ]);
            } 
        } catch (\Exception $e) {

            return redirect(url()->previous())->with('error', $e->getMessage());
        }
    	
    	return redirect(url()->previous());
    }
}
