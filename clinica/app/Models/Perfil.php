<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfis';
    public $timestamps = false;
    protected $guarded = array('id');

    public function usuarios()
    {
        return $this->hasMany('App\Models\Usuario', 'perfil_id', 'id');
    }
}
