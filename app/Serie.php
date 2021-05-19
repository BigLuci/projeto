<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{

    protected $table = 'series';
    protected $fillable = ['nome'];
    use SoftDeletes;

    public function Temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
    

    // ele nao salva quando foi criado
    // public $timestamps = false;
}