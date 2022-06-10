<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermeiro extends Model
{
    use HasFactory;

    protected $table = 'enfermeiros';
    public $timestamps = false;
    protected $guarded = array('id');
}
