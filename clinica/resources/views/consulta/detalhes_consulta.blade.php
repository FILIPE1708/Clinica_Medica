@extends('menu_principal')
@section('conteudo')

    <div class="card border-primary mt-5">
        <div class="card-header bg-primary">
            <div class="card-title">
                <h4 class="text-center text-white"><strong>Detalhes da consulta do paciente {{$consulta->paciente->nome}}</strong></h4>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item border-0">
                            <strong>Data da consulta:</strong> {{date('d/m/Y', strtotime($consulta->data_consulta))}}
                        </li>

                        <li class="list-group-item border-0">
                            <strong>Médico:</strong> {{$consulta->medico->nome}}
                        </li>

                        <li class="list-group-item border-0">
                            <strong>Diagnóstico:</strong> {{$consulta->diagnostico}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
