<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IPK extends Model
{
    protected $table = 'ipk';
    protected $fillable = ['nim', 'nilai', 'semester'];
    public $timestamps = false;
}
