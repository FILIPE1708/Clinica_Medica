<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medicos';
    public $timestamps = false;
    protected $guarded = array('id');

    public function consultas()
    {
        return $this->hasMany('App\Models\Consulta', 'medico_id', 'id');
    }
}
