<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table = 'orang_tua';
    protected $fillable = ['nim', 'nama_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pekerjaan_ibu', 'jumlah_tanggungan', 'penghasilan_ayah', 'penghasilan_ibu'];
    public $timestamps = false;
}
