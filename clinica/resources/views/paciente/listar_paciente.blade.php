@extends('menu_principal')
@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary mt-5">
                <div class="card-header bg-primary">
                    <div class="card-title">
                        <h4 class="text-center text-white"><strong>Pacientes</strong></h4>
                    </div>
                </div>

                <div class="card-body text-black-50">

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

                    <div class="row">

                        <div class="col-md-12">
                            <table class="table table-bordered table-hover table-striped table-responsive-sm" id="minhaTabela">
                                <thead  class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>Tipo de sangue</th>
                                    <th>Alergias</th>
                                    <th>Peso</th>
                                    <th>CPF</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pacientes as $paciente)
                                    <tr>
                                        <td>{{$paciente->id}}</td>
                                        <td>{{$paciente->nome}}</td>
                                        <td>{{$paciente->telefone}}</td>
                                        <td>{{$paciente->tipo_sangue}}</td>
                                        <td>{{$paciente->alergias}}</td>
                                        <td>{{$paciente->peso}}</td>
                                        <td>{{$paciente->cpf}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('paciente.editar', $paciente->id)}}" class="btn btn-info text-white btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Editar dados do paciente"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <form action="{{route('paciente.excluir', $paciente->id)}}" method="get" onsubmit="return confirm('Deseja excluir o paciente {{$paciente->nome}}?')">
                                                    <button type="submit" class="btn btn-danger btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Deletar paciente"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
