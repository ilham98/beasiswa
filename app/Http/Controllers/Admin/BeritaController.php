<?php

namespace App\Http\Controllers\Admin;
use App\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    public function index() {
        $berita = Berita::orderBy('created_at', 'desc')->paginate(20);
    	return view('admin.berita.index', compact('berita'));
    }

    public function create() {
    	return view('admin.berita.create');
    }

    public function edit($id) {
        $berita = Berita::find($id);
    	return view('admin.berita.edit', compact('berita'));
    }

    public function store(Request $request) {
    	$request->validate([
    		'judul' => 'required',
    		'isi' => 'required'
    	]);

        $berita = Berita::create($request->all());
        return redirect('/a/berita')->with('insert-success', 1);
    }

    public function update($id, Request $request) {
        $request->validate([
    		'judul' => 'required',
    		'isi' => 'required'
    	]);

        $berita = Berita::find($id);
        $berita->update($request->all());
        return redirect('/a/berita/'.$berita->id.'/edit')->with('update-success', 1);
    }

    public function destroy($id) {
        $berita = Berita::find($id);
        $berita->delete();

        return redirect('/a/berita');
    }
}
