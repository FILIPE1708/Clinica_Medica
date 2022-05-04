<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function novo()
    {
        return view('consulta.agendar_consulta');
    }
}
