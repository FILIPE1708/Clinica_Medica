<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function novo(Request $request)
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        $consultas = Consulta::all();
        $mensagem = $request->session()->get('mensagem');
        return view('consulta.agendar_consulta', compact('mensagem', 'medicos', 'pacientes', 'consultas'));
    }

    public function cadastrar(Request $request)
    {
        $request->validate([
            'data_consulta' => 'required|date'
        ]);

        $params = $request->except('_token');
        $consulta = Consulta::create($params);
        $request->session()->flash('mensagem', "Consulta agendada com sucessso!!");

        return redirect()->route('consulta.novo');
    }

    public function editar($id)
    {
        $consulta = Consulta::find($id);
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        $consultas = Consulta::all();
        return view('consulta.agendar_consulta', compact('consulta', 'medicos', 'pacientes', 'consultas'));
    }

    public function alterar(Request $request)
    {
        $request->validate([
            'data_consulta' => 'required|date'
        ]);

        $params = $request->except('_token');
        $consulta = Consulta::find($params['consulta_id']);
        $consulta->update($params);
        $request->session()->flash('mensagem', "Consulta editada com sucessso!!");

        return redirect()->route('consulta.novo');
    }

    public function realizar($id)
    {
        $consulta = Consulta::find($id);
        return view('consulta.realizar_consulta', compact('consulta'));
    }

    public function finalizar(Request $request)
    {
        $request->validate([
            'diagnostico' => 'required'
        ]);

        $params = $request->except('_token');
        $consulta = Consulta::find($params['consulta_id']);
        $consulta->update(['finalizado' => true]);
        $consulta->update($params);
        $request->session()->flash('mensagem', "Consulta finalizada com sucessso!!");

        return redirect()->route('consulta.novo');
    }

    public function excluir(Request $request, $id)
    {
        $consulta = Consulta::find($id);
        $consulta->delete();
        $request->session()->flash('mensagem', "Consulta excluida com sucesso!! ");

        return redirect()->route('consulta.novo');
    }

    public function detalhes($id)
    {
        $consulta = Consulta::find($id);
        return view('consulta.detalhes_consulta', compact('consulta'));
    }
}
