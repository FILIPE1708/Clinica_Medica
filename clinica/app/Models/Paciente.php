<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';
    public $timestamps = false;
    protected $guarded = array('id');

    public function consultas()
    {
        return $this->hasMany('App\Models\Consulta', 'paciente_id', 'id');
    }
}
