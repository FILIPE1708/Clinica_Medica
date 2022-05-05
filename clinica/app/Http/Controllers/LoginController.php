<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('form_login');
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
