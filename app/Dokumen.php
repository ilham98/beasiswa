<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';
    protected $fillable = ['beasiswa_id', 'nama', 'url'];
    public $timestamps = false;
}
