<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function novo()
    {
        return view('paciente.cadastro_paciente');
    }

    public function cadastrar(Request $request)
    {
        $request->validate([
            'nome'  => 'required',
            'telefone'=> 'required',
            'alergias'=> 'required',
            'peso'  => 'required|numeric',
            'altura'  => 'required|numeric',
            'tipo_sangue' => 'required',
            'cpf'  => 'string|min:14|max:14',
            'cep'  => 'string|min:9|max:9',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade'=> 'required',
            'numero'  => 'required',
            'estado'  => 'required'
        ]);

        $params = $request->except('_token');
        $paciente = Paciente::create($params);
        $request->session()->flash('mensagem', "Paciente {$paciente->nome} cadastrado com sucesso!!");

        return redirect()->route('paciente.listar');
    }

    public function listar(Request $request)
    {
        $pacientes = Paciente::all();
        $mensagem = $request->session()->get('mensagem');
        return view('paciente.listar_paciente', compact('pacientes', 'mensagem'));
    }

    public function editar($id)
    {
        $paciente = Paciente::find($id);
        return view('paciente.cadastro_paciente', compact('paciente'));
    }

    public function alterar(Request $request)
    {
        $request->validate([
            'nome'  => 'required',
            'telefone'=> 'required',
            'alergias'=> 'required',
            'peso'  => 'required|numeric',
            'altura'  => 'required|numeric',
            'tipo_sangue' => 'required',
            'cpf'  => 'string|min:14|max:14',
            'cep'  => 'string|min:9|max:9',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade'=> 'required',
            'numero'  => 'required',
            'estado'  => 'required'
        ]);

        $params = $request->except('_token');
        $paciente = Paciente::find($params['id_paciente']);
        $paciente->update($params);
        $request->session()->flash('mensagem', "Paciente {$paciente->nome} editado com sucesso!!");

        return redirect()->route('paciente.listar');
    }

    public function excluir(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();
        $request->session()->flash('mensagem', "Paciente {$paciente->nome} excluido com sucesso!! ");

        return redirect()->route('paciente.listar');
    }
}
