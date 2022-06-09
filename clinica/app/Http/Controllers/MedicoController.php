<?php

namespace App\Http\Controllers;

use App\Models\Medico;
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
            'jornTrab'  => 'required',
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

        $params = $request->except('_token');
        $medico = Medico::create($params);
        $request->session()->flash('mensagem', "Médico {$medico->nome} cadastrado com sucesso!!");

        return redirect()->route('medico.listar');
    }

    public function listar(Request $request)
    {
        $medicos = Medico::all();
        $mensagem = $request->session()->get('mensagem');
        return view('medico.listar_medico', compact('medicos', 'mensagem'));
    }

    public function editar($id)
    {
        $medico = Medico::find($id);
        return view('medico.cadastro_medico',  compact('medico'));
    }

    public function alterar(Request $request)
    {
        $request->validate([
            'nome'  => 'required',
            'email'=> 'required',
            'remuneracao' => 'required|numeric',
            'jornTrab'  => 'required',
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

        $params = $request->except('_token');
        $medico = Medico::find($params['id_medico']);
        $medico->update($params);
        $request->session()->flash('mensagem', "Médico {$medico->nome} editado com sucesso!!");

        return redirect()->route('medico.listar');
    }

    public function excluir(Request $request, $id)
    {
        $medico = Medico::find($id);
        $medico->delete();
        $request->session()->flash('mensagem', "Médico {$medico->nome} excluido com sucesso!! ");

        return redirect()->route('medico.listar');
    }
}
