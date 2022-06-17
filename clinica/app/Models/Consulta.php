<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $table = 'consultas';
    public $timestamps = false;
    protected $guarded = array('id');

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'usuario_id');
    }

    public function medico()
    {
        return $this->belongsTo('App\Models\Medico', 'medico_id');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Models\Paciente', 'paciente_id');
    }
}
