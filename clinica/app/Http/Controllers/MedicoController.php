<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function novo()
    {
        return view('medico.cadastro_medico');
    }

    public function cadastrar(Request $request)
    {
        $request->validate([
            'nome'  => 'required',
            'email'=> 'required',
            'remuneracao' => 'required|numeric',
            'jornTrab'  => 'required|date_format:H:i',
            'pis'  => 'string|min:14|max:14',
            'cpf'  => 'string|min:14|max:14',
            'crm'  => 'required',
            'especializacao'  => 'required',
            'cep'  => 'string|min:9|max:9',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade'=> 'required',
            'numero'  => 'required',
            'estado'  => 'required'
        ]);

        return redirect()->route('medico.listar')->withInput();
    }

    public function listar()
    {
        return view('medico.listar_medico');
    }
}
