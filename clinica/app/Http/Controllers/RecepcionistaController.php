<?php

namespace App\Http\Controllers;

use App\Models\Recepcionista;
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
            'jornTrab'=> 'required',
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
        $recepcionista = Recepcionista::create($params);
        $request->session()->flash('mensagem', "Recepcionista {$recepcionista->nome} cadastrado com sucesso!!");

        return redirect()->route('recepcionista.listar');
    }

    public function listar(Request $request)
    {
        $recepcionistas = Recepcionista::all();
        $mensagem = $request->session()->get('mensagem');
        return view('recepcionista.listar_recepcionista', compact('recepcionistas', 'mensagem'));
    }

    public function editar($id)
    {
        $recepcionista = Recepcionista::find($id);
        return view('recepcionista.cadastro_recepcionista', compact('recepcionista'));
    }

    public function alterar(Request $request)
    {
        $request->validate([
            'nome'  => 'required',
            'email'=> 'required',
            'remuneracao' => 'required|numeric',
            'jornTrab'=> 'required',
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
        $recepcionista = Recepcionista::find($params['id_recepcionista']);
        $recepcionista->update($params);
        $request->session()->flash('mensagem', "Recepcionista {$recepcionista->nome} editado com sucesso!!");

        return redirect()->route('recepcionista.listar');
    }

    public function excluir(Request $request, $id)
    {
        $recepcionista = Recepcionista::find($id);
        $recepcionista->delete();
        $request->session()->flash('mensagem', "Recepcionista {$recepcionista->nome} excluido com sucesso!! ");

        return redirect()->route('recepcionista.listar');
    }
}
