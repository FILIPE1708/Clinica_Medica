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

    public function logar(Request $request)
    {
        if (Usuario::where('email', $request->email)->exists() && Usuario::where('senha', $request->senha)->exists()) {
            $usuario = Usuario::firstWhere('email', $request->email);
            session(['usuario' => $usuario->nome_usuario]);
            session(['perfil' => $usuario->perfil_id]);

            return view('inicio');
        }

        else
            return redirect()->back()->with('error', 'Sua senha ou login estão incorretos.');
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return view('form_login');
    }
}
