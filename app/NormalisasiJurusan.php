<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NormalisasiJurusan extends Model
{
    protected $table = 'normalisasi_jurusan';
    protected $fillable = ['kriteria_id', 'nim', 'beasiswa_id', 'nilai', 'kode_jurusan'];
    public $timestamps = false;

    public function kriteria() {
    	return $this->belongsTo('App\kriteria', 'kriteria_id', 'id');
    }
}
