<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index() {
    	$berita = Berita::orderBy('created_at', 'desc')->get();
    	return view('public.berita.index', compact('berita'));
    }

    public function show($id) {
    	$berita = Berita::find($id);
    	return view('public.berita.single', compact('berita'));
    }
}
