<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    public $timestamps = false;
    protected $guarded = array('id');

    public function perfil()
    {
        return $this->belongsTo('App\Models\Perfil', 'perfil_id');
    }
}
