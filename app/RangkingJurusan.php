<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RangkingJurusan extends Model
{
    protected $table = 'rangking_jurusan';
    protected $fillable = ['nilai', 'rangking', 'nim', 'beasiswa_id', 'kode_jurusan'];
    public $timestamps = false;

     public function mahasiswa() {
    	return $this->belongsTo('App\Mahasiswa', 'nim', 'nim') ;
    }
}
