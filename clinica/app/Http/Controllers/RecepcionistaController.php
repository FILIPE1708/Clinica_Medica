<?php

namespace App\Http\Controllers;

use App\Models\recepcionista;
use Illuminate\Http\Request;

class RecepcionistaController extends Controller
{
    public function novo()
    {
        return view('recepcionista.cadastro_recepcionista');
    }

    public function cadastrar(Request $request)
    {
        $request->validate([
            'nome'  => 'required',
            'email'=> 'required',
            'remuneracao' => 'required|numeric',
            'jornTrab'=> 'required|date_format:H:i',
            'pis'  => 'string|min:14|max:14',
            'cpf'  => 'string|min:14|max:14',
            'cep'  => 'string|min:9|max:9',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade'=> 'required',
            'numero'  => 'required',
            'estado'  => 'required'
        ]);

        $params = $request->except('_token');
        recepcionista::create($params);

        return redirect()->route('recepcionista.listar')->withInput();
    }

    public function listar()
    {
        $recepcionistas = recepcionista::all();
        return view('recepcionista.listar_recepcionista', compact('recepcionistas'));
    }
}
