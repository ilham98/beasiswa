<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Normalisasi extends Model
{
    protected $table = 'normalisasi';
    protected $fillable = ['kriteria_id', 'nim', 'beasiswa_id', 'nilai'];
    public $timestamps = false;

    public function kriteria() {
    	return $this->belongsTo('App\kriteria', 'kriteria_id', 'id');
    }
}
