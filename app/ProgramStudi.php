<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
	protected $primaryKey = 'kode';
    protected $table = 'program_studi';
    public $incrementing = false;
   	public $timestamps = false;

   	public function jurusan() {
   		return $this->belongsTo('App\Jurusan', 'kode_jurusan', 'kode');
   	}
}
