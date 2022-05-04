<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecepcionistaController extends Controller
{
    public function novo()
    {
        return view('recepcionista.cadastro_recepcionista');
    }

    public function listar()
    {
        return view('recepcionista.listar_recepcionista');
    }
}
