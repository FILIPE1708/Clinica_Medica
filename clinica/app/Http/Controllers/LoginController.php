<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('form_login');
    }

    public function novo()
    {
        $perfis = Perfil::all();
        return view('usuario.cadastro_usuario', compact('perfis'));
    }

    public function cadastrar(Request $request)
    {
        $params = $request->except('_token');
        $usuario = Usuario::create($params);
        $request->session()->flash('mensagem', "Usuário {$usuario->nome_usuario} cadastrado com sucesso!!");

        return redirect()->back();
    }

    public function logar(Request $request)
    {
        if ($request->email == 'filipecavalcante17@gmail.com' && $request->senha == '123456') {
            return redirect()->route('inicio');
        }

        else
            return redirect()->back()->with('error', 'Sua senha ou login estão incorretos.');
    }
}
