<?php

namespace App\Http\Controllers\Mahasiswa;

use Auth;
use App\Bank;
use App\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    public function index() {
    	$profil = Auth::user()->mahasiswa;
        $orang_tua = $profil->orang_tua;
        $bank = $profil->bank;
    	$program_studi = \App\ProgramStudi::all();
    	return view('mahasiswa.profil', compact('profil', 'program_studi', 'orang_tua', 'bank'));
    }

    public function update(Request $request) {
    	$mahasiswa = Auth::user()->mahasiswa;
    	$request->validate([
            'nim' => 'required|numeric|digits:8|unique:mahasiswa,nim,'.$mahasiswa->nim.',nim',
    		'no_ktp' => 'required|numeric|digits:16|unique:mahasiswa,no_ktp,'.$mahasiswa->no_ktp.',no_ktp',
    		'nama' => 'required',
    		'tanggal_lahir' => 'required|date',
    		'tempat_lahir' => 'required',
    		'jenis_kelamin' => 'required',
    		'no_telepon_hp' => 'required|numeric',
    		'no_telepon_rumah' => 'nullable|numeric',
    		'asal_kabupaten' => 'required',
    		'alamat_asal' => 'required',
			'alamat_sekarang' => 'required',
			'kode_program_studi' => 'required',
			'nomor_rekening' => 'nullable|numeric',
            'penghasilan_ayah' => 'nullable|integer',
            'penghasilan_ibu' => 'nullable|integer',
            'jumlah_tanggungan' => 'nullable|integer',
    	]);
        $has_orang_tua = $mahasiswa->orang_tua;
        $orang_tua_body = $request->only('nama_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pekerjaan_ibu', 'nim', 'penghasilan_ayah', 'penghasilan_ibu', 'jumlah_tanggungan');
    	if($has_orang_tua) {
            $has_orang_tua->update($orang_tua_body);
        } else  {
            OrangTua::create($orang_tua_body);
        }

        $has_bank = $mahasiswa->bank;
        $bank_body = $request->only('nama_bank', 'atas_nama', 'nomor_rekening', 'nim');
        if($has_bank) {
            $has_bank->update($bank_body);
        } else  {
            $bank = Bank::create($bank_body);
        }

        return redirect(url()->previous())->with('update-success', 1);
    }

    public function ktm(Request $request) {
        $request->validate([
            'file' => 'required|mimes:pdf'
        ]);

        $file = $this->fileHandler($request->file);

        Auth::user()->mahasiswa->update([
            'ktm_url' => $file['path']
        ]);

        return redirect(url()->previous()); 
    }

    public function fileHandler($file, $directory = 'ktm') {
        $originalName = $file->getClientOriginalName();
        $arrayOfName = explode('.', $originalName);
        $name = uniqid().'.'.$arrayOfName[count($arrayOfName)-1];
        $path = '/uploads/'.$directory.'/'.$name;
        // $path = $directory;
        Storage::disk('public_uploads')->putFileAs($directory, $file, $name);
        return [ 'path' => $path,  'name' => $name];
    }
}
