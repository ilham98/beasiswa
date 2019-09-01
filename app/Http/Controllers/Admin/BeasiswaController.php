<?php

namespace App\Http\Controllers\Admin;
use App\Beasiswa;
use App\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeasiswaController extends Controller
{
    public function index() {
        $beasiswa = Beasiswa::orderBy('tanggal_buka', 'desc')->paginate(20);
    	return view('admin.beasiswa.index', compact('beasiswa'));
    }

    public function create() {
        $jurusan = Jurusan::all();
    	return view('admin.beasiswa.create', compact('jurusan'));
    }

    public function show($id) {
        $beasiswa = Beasiswa::find($id);
        $mahasiswa_daftar_count = $beasiswa->mahasiswa->count();
        $mahasiswa_diterima_count = $beasiswa->mahasiswa()->where('beasiswa_mahasiswa.status', 2)->get()->count();
        $jurusan = implode(', ', $beasiswa->jurusan->map(function($j) {
            return $j->nama;
        })->all());
        $jurusan = $jurusan == '' ? 'Semua Jurusan' : '';
        return view('admin.beasiswa.single', compact('beasiswa', 'jurusan', 'mahasiswa_daftar_count', 'mahasiswa_diterima_count'));
    }

    public function edit($id) {
        $jurusan = Jurusan::all();
        $beasiswa = Beasiswa::find($id);
        $checked_jurusan = $beasiswa->jurusan->map(function($j) {
            return $j->kode;
        })->all();
    	return view('admin.beasiswa.edit', compact('beasiswa', 'jurusan', 'checked_jurusan'));
    }

    public function store(Request $request) {
    	$request->validate([
    		'nama' => 'required',
    		'donatur' => 'required',
    		'deskripsi' => 'required',
    		'tanggal_buka' => 'required|date|after:yesterday',
    		'tanggal_tutup' => 'required|date|after_or_equal:tanggal_buka',
    		'kuota' => 'required|integer|min:0',
    		'ipk_min' => 'required|numeric|max:4|min:0',
    		'syarat_ketentuan' => 'required'
    	]);

        $beasiswa = Beasiswa::create($request->all());
        $jurusan = $beasiswa->jurusan()->attach($request->jurusan);
        return redirect('/a/beasiswa/'.$beasiswa->id)->with('insert-success', 1);
    }

    public function update($id, Request $request) {
        $request->validate([
            'nama' => 'required',
            'donatur' => 'required',
            'deskripsi' => 'required',
            'tanggal_buka' => 'required|date|after:yesterday',
            'tanggal_tutup' => 'required|date|after_or_equal:tanggal_buka',
            'kuota' => 'required|integer|min:0',
            'ipk_min' => 'required|numeric|max:4|min:0',
            'syarat_ketentuan' => 'required'
        ]);

        $beasiswa = Beasiswa::find($id);
        $beasiswa->update($request->all());
        $beasiswa->jurusan()->sync($request->jurusan);
        return redirect('/a/beasiswa/'.$beasiswa->id.'/edit')->with('update-success', 1);
    }

    public function destroy($id) {
        $beasiswa = Beasiswa::find($id);
        $beasiswa->delete();

        return redirect('/a/beasiswa');
    }
}
