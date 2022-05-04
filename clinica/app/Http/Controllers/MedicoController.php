<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function novo()
    {
        return view('medico.cadastro_medico');
    }

    public function listar()
    {
        return view('medico.listar_medico');
    }
}
