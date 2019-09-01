<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Mahasiswa;
use App\Beasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeasiswaMahasiswaController extends Controller
{
    public function index($id) {
    	$beasiswa = Beasiswa::find($id);
    	$mahasiswa = $beasiswa->mahasiswa()->where('beasiswa_mahasiswa.konfirmasi', 1)->paginate(20);
    	return view('admin.beasiswa.mahasiswa.index', compact('mahasiswa'));
    }

    public function show($id, $nim) {
        $program_studi = \App\ProgramStudi::all();
        $beasiswa = Beasiswa::find($id);
        $this->beasiswa_id = Beasiswa::find($id)->id;
        $jurusan = $beasiswa->jurusan->map(function($j) {
            return $j->nama;
        })->all();
        $data_diri = null;
        $orang_tua = null;
        $bank = null;
        $apa_sudah_diajukan = Mahasiswa::find($nim)->whereHas('beasiswa', function($query)  {
                $query->where('beasiswa.id', $this->beasiswa_id); 
        })->exists();
        $dokumen_mahasiswa = $beasiswa->dokumen_mahasiswa()->where('mahasiswa.nim', $nim)->whereNotIn('dokumen_mahasiswa.tipe', [8, 9, 10])->get();
        $dokumen_mahasiswa_admin = $beasiswa->dokumen_mahasiswa()->where('mahasiswa.nim', $nim)->whereIn('dokumen_mahasiswa.tipe', [8, 9, 10])->get();
        if($apa_sudah_diajukan) {
            $mahasiswa = Mahasiswa::find($nim)->beasiswa()->where('beasiswa.id', $id)->first();
            $data_diri = $mahasiswa->pivot;
        }
        return view('admin.beasiswa.mahasiswa.single', compact('beasiswa', 'jurusan', 'program_studi', 'apa_sudah_diajukan', 'data_diri', 'dokumen_mahasiswa', 'dokumen_mahasiswa_admin'));
    }

    public function update($id, $nim, Request $request) {
        $beasiswa = Beasiswa::find($id);
        $beasiswa->mahasiswa()->sync([$nim => ['status' => $request->status]]);
        if(!$beasiswa->mahasiswa()->where('mahasiswa.nim', $nim)->first()->pivot->tanggal_terima_berkas) {
            $beasiswa->mahasiswa()->sync([$nim => ['tanggal_terima_berkas' => date('Y-m-d')]]);
        }
        return redirect(url()->previous());
    }

        public function dokumen_store($id, $nim, Request $request) {
        $mahasiswa = Mahasiswa::find($nim);
        $request->validate([
            'tipe' => 'required',
            'file' => 'required|mimes:pdf'
        ]);
        if($mahasiswa->dokumen_mahasiswa()->where(['dokumen_mahasiswa.tipe' => $request->tipe, 'beasiswa_id' => $id ])->exists())
            return redirect(url()->previous());
        $file = $this->fileHandler($request->file);
        $body = [
            'tipe' => $request->tipe,
            'url' => $file['path']
        ];

        $mahasiswa->dokumen_mahasiswa()
            ->attach([$id => $body]);
        return redirect(url()->previous());
    }

    public function dokumen_delete($id, $nim, $tipe, Request $request) {
         $mahasiswa = Mahasiswa::find($nim);
         $mahasiswa->dokumen_mahasiswa()
            ->wherePivot('tipe', $tipe)
            ->wherePivot('beasiswa_id', $id)
            ->detach();
        return redirect(url()->previous());
    }

    public function fileHandler($file, $directory = 'dokumen_mahasiswa') {
        $originalName = $file->getClientOriginalName();
        $arrayOfName = explode('.', $originalName);
        $name = uniqid().'.'.$arrayOfName[count($arrayOfName)-1];
        $path = '/uploads/'.$directory.'/'.$name;
        // $path = $directory;
        Storage::disk('public_uploads')->putFileAs($directory, $file, $name);
        return [ 'path' => $path,  'name' => $name];
    }
}
