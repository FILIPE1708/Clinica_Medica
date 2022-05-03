<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('form_login');
    }

    public function logar()
    {
       return redirect()->route('inicio');
    }
}
