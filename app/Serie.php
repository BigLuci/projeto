<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{

    protected $table = 'series';
    protected $fillable = ['nome'];
    use SoftDeletes;
    

    // ele nao salva quando foi criado
    // public $timestamps = false;
}