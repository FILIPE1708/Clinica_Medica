@extends('menu_principal')
@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary mt-5">
                <div class="card-header bg-primary">
                    <div class="card-title">
                        <h4 class="text-center text-white"><strong>Médicos</strong></h4>
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
                            <table class="table table-bordered table-hover table-striped table-responsive-sm minhaTabela">
                                <thead  class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Remuneração</th>
                                    <th>Email</th>
                                    <th>Jornada De Trabalho</th>
                                    <th>Especialização</th>
                                    <th>CRM</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($medicos as $medico)
                                    <tr>
                                        <td>{{$medico->id}}</td>
                                        <td>{{$medico->nome}}</td>
                                        <td>{{$medico->remuneracao}}</td>
                                        <td>{{$medico->email}}</td>
                                        <td>{{$medico->jornTrab}}</td>
                                        <td>{{$medico->especializacao}}</td>
                                        <td>{{$medico->crm}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('medico.editar', $medico->id)}}" class="btn btn-info text-white btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Editar dados do médico"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <form action="{{route('medico.excluir', $medico->id)}}" method="get" onsubmit="return confirm('Deseja excluir o médico {{$medico->nome}}?')">
                                                    <button type="submit" class="btn btn-danger btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Deletar médico"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
