<?php

namespace App\Http\Controllers;

use App\Models\Enfermeiro;
use Illuminate\Http\Request;

class EnfermeiroController extends Controller
{
    public function novo()
    {
        return view('enfermeiro.cadastro_enfermeiro');
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
            'coren'  => 'required',
            'especializacao'  => 'required',
            'cep'  => 'string|min:9|max:9',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade'=> 'required',
            'numero'  => 'required',
            'estado'  => 'required'
        ]);

        $params = $request->except('_token');
        $enfermeiro = Enfermeiro::create($params);
        $request->session()->flash('mensagem', "Enfermeiro {$enfermeiro->nome} cadastrado com sucesso!!");

        return redirect()->route('enfermeiro.listar');
    }

    public function listar(Request $request)
    {
        $enfermeiros = Enfermeiro::all();
        $mensagem = $request->session()->get('mensagem');
        return view('enfermeiro.listar_enfermeiro', compact('enfermeiros', 'mensagem'));
    }

    public function editar($id)
    {
        $enfermeiro = Enfermeiro::find($id);
        return view('enfermeiro.cadastro_enfermeiro',  compact('enfermeiro'));
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
            'coren'  => 'required',
            'especializacao'  => 'required',
            'cep'  => 'string|min:9|max:9',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade'=> 'required',
            'numero'  => 'required',
            'estado'  => 'required'
        ]);

        $params = $request->except('_token');
        $enfermeiro = Enfermeiro::find($params['id_enfermeiro']);
        $enfermeiro->update($params);
        $request->session()->flash('mensagem', "Enfermeiro {$enfermeiro->nome} editado com sucesso!!");

        return redirect()->route('enfermeiro.listar');
    }

    public function excluir(Request $request, $id)
    {
        $enfermeiro = Enfermeiro::find($id);
        $enfermeiro->delete();
        $request->session()->flash('mensagem', "Enfermeiro {$enfermeiro->nome} excluido com sucesso!! ");

        return redirect()->route('enfermeiro.listar');
    }
}
