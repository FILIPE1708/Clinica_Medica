<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function novo(Request $request)
    {
        $perfis = Perfil::all();
        $usuarios = Usuario::all();
        $mensagem = $request->session()->get('mensagem');
        return view('usuario.criar_usuario', compact('perfis', 'usuarios', 'mensagem'));
    }

    public function cadastrar(Request $request)
    {
        $request->validate([
            'nome_usuario'  => 'required',
            'email'=> 'required',
            'senha'=> 'required',
            'perfil_id'=> 'required',
        ]);

        $params = $request->except('_token');
        $usuario = Usuario::create($params);
        $request->session()->flash('mensagem', "Usuário {$usuario->nome_usuario} cadastrado com sucesso!!");

        return redirect()->route('usuario.novo');
    }

    public function editar($id)
    {
        $usuario = Usuario::find($id);
        $perfis = Perfil::all();
        $usuarios = Usuario::all();
        return view('usuario.criar_usuario',  compact('usuario', 'perfis', 'usuarios'));
    }

    public function alterar(Request $request)
    {
        $request->validate([
            'nome_usuario'  => 'required',
            'email'=> 'required',
            'senha'=> 'required',
            'perfil_id'=> 'required',
        ]);

        $params = $request->except('_token');
        $usuario = Usuario::find($params['id_usuario']);
        $usuario->update($params);
        $request->session()->flash('mensagem', "Usuário {$usuario->nome_usuario} editado com sucesso!!");

        return redirect()->route('usuario.novo');
    }

    public function excluir(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        $request->session()->flash('mensagem', "Usuário {$usuario->nome_usuario} excluido com sucesso!!");

        return redirect()->route('usuario.novo');
    }
}
