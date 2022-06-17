@extends('menu_principal')
@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary mt-5">
                <div class="card-header bg-primary">
                    <div class="card-title">
                        <h4 class="text-center text-white"><strong>{{isset($consulta->id) ? 'Editar Consulta' : 'Agendar Consulta'}}</strong></h4>
                    </div>
                </div>

                <div class="card-body text-black-50">

                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger text-center" role="alert">
                            {{$error}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach

                    <form action="{{isset($consulta->id) ? route('consulta.alterar') : route('consulta.cadastrar')}}" method="post">

                        @csrf
                        <input type="hidden" name="consulta_id" value="{{$consulta->id ?? ''}}">

                        <input type="hidden" name="usuario_id" value="{{session('id_usuario')}}">

                        <div class="row">
                            <div class="col-md-6">
                                <label for="medico_id"><strong>Selecione o Médico:</strong></label>
                                <select id="medico_id" name="medico_id" class="form-control">
                                    @if(isset($consulta->medico_id))
                                        <option value="{{$consulta->medico->id}}">{{$consulta->medico->nome}}</option>

                                        @foreach($medicos as $m)
                                            @if($consulta->medico->nome != $m->nome)
                                                <option value="{{$m->id}}">{{$m->nome}}</option>
                                            @endif
                                        @endforeach

                                    @else
                                        @foreach($medicos as $m)
                                            <option value="{{$m->id}}">{{$m->nome}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="paciente_id"><strong>Selecione o Paciente:</strong></label>
                                <select id="paciente_id" name="paciente_id" class="form-control">
                                    @if(isset($consulta->paciente_id))
                                        <option value="{{$consulta->paciente->id}}">{{$consulta->paciente->nome}}</option>

                                        @foreach($pacientes as $p)
                                            @if($consulta->paciente->nome != $p->nome)
                                                <option value="{{$p->id}}">{{$p->nome}}</option>
                                            @endif
                                        @endforeach

                                    @else
                                        @foreach($pacientes as $p)
                                                <option value="{{$p->id}}">{{$p->nome}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3 d-flex justify-content-center">
                            <div class="col-md-4">
                                <label for="data_consulta"><strong>Data da Consulta:</strong></label>
                                <input type="date" id="data_consulta" name="data_consulta" class="form-control" value="{{$consulta->data_consulta ?? old('data_consulta')}}">
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-2 mt-3 ">
                                <button type="submit" class="btn btn-primary ml-md-4">Salvar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-2 d-flex justify-content-center">
                    @if(isset($mensagem))
                        <div class="alert alert-success text-center" role="alert">
                            <strong>{{$mensagem}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="container">
            <nav class="nav nav-tabs">
                <a href="#tab1" class="nav-link active" data-toggle="tab">Em andamento</a>
                <a href="#tab2" class="nav-link" data-toggle="tab">Finalizado</a>
            </nav>

            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <div class="col-md-12 mt-3">
                        <table class="table table-bordered table-hover table-striped table-responsive-sm minhaTabela">
                            <thead  class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Data</th>
                                <th>Paciente</th>
                                <th>Medico</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($consultas as $consulta)
                                @if($consulta->finalizado == false)
                                    <tr>
                                        <td>{{$consulta->id}}</td>
                                        <td>{{date('d/m/Y', strtotime($consulta->data_consulta))}}</td>
                                        <td>{{$consulta->paciente->nome}}</td>
                                        <td>{{$consulta->medico->nome}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('consulta.editar', $consulta->id)}}" class="btn btn-info text-white btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Editar consulta"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <a href="{{route('consulta.realizar', $consulta->id)}}" class="btn btn-warning text-white btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Realizar consulta"><i class="fa fa-clipboard" aria-hidden="true"></i></a>
                                                <form action="{{route('consulta.excluir', $consulta->id)}}" method="get" onsubmit="return confirm('Deseja excluir a consulta do paciente {{$consulta->paciente->nome}} no dia {{date('d/m/Y', strtotime($consulta->data_consulta))}}?')">
                                                    <button type="submit" class="btn btn-danger btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Deletar consulta"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane" id="tab2">
                    <div class="col-md-12 mt-3">
                        <table class="table table-bordered table-hover table-striped table-responsive-sm minhaTabela">
                            <thead  class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Data</th>
                                <th>Paciente</th>
                                <th>Medico</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($consultas as $consulta)
                                @if($consulta->finalizado == true)
                                    <tr>
                                        <td>{{$consulta->id}}</td>
                                        <td>{{date('d/m/Y', strtotime($consulta->data_consulta))}}</td>
                                        <td>{{$consulta->paciente->nome}}</td>
                                        <td>{{$consulta->medico->nome}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('consulta.detalhes', $consulta->id)}}" class="btn btn-success text-white btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Detalhes da consulta"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
