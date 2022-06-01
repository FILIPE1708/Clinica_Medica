<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recepcionista extends Model
{
    use HasFactory;

    protected $table = 'recepcionistas';
    public $timestamps = false;
    protected $guarded = array('id');
}
