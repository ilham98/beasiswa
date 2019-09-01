<?php

namespace App\Http\Controllers\Admin;

use App\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class BeasiswaDokumenController extends Controller
{
    public function index($id) {
    	$dokumen = Dokumen::where('beasiswa_id', $id)->get();
    	return view('admin.beasiswa.dokumen.index', compact('dokumen', 'id'));
    }

    public function create($id) {
    	return view('admin.beasiswa.dokumen.create', compact('id'));
    }

    public function store($id, Request $request) {
        $request->validate([
            'nama' => 'required',
            'file' => 'required|mimes:pdf'
        ]);

        $file = $this->fileHandler($request->file);
        $body = [
            'nama' => $request->nama,
            'url' => $file['path'],
            'beasiswa_id' => $id
        ];

        Dokumen::create($body);

        return redirect(url('/a/beasiswa/9/dokumen'));
    }

    public function destroy($id, $dokumen_id) {
        $dokumen = Dokumen::find($dokumen_id);
        $dokumen->delete();

        return redirect(url()->previous());
    }

    public function fileHandler($file, $directory = 'dokumen') {
        $originalName = $file->getClientOriginalName();
        $arrayOfName = explode('.', $originalName);
        $name = uniqid().'.'.$arrayOfName[count($arrayOfName)-1];
        $path = '/uploads/'.$directory.'/'.$name;
        // $path = $directory;
        Storage::disk('public_uploads')->putFileAs($directory, $file, $name);
        return [ 'path' => $path,  'name' => $name];
    }
}
