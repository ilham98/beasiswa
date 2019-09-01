<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rangking extends Model
{
    protected $table = 'rangking';
    protected $fillable = ['nilai', 'rangking', 'nim', 'beasiswa_id'];
    public $timestamps = false;

    public function mahasiswa() {
    	return $this->belongsTo('App\Mahasiswa', 'nim', 'nim') ;
    }
}
