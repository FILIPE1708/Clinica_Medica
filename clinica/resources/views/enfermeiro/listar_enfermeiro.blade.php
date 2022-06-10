@extends('menu_principal')
@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary mt-5">
                <div class="card-header bg-primary">
                    <div class="card-title">
                        <h4 class="text-center text-white"><strong>Enfermeiros</strong></h4>
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
                                    <th>Remuneração</th>
                                    <th>Email</th>
                                    <th>Jornada De Trabalho</th>
                                    <th>Especialização</th>
                                    <th>COREN</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($enfermeiros as $enfermeiro)
                                    <tr>
                                        <td>{{$enfermeiro->id}}</td>
                                        <td>{{$enfermeiro->nome}}</td>
                                        <td>{{$enfermeiro->remuneracao}}</td>
                                        <td>{{$enfermeiro->email}}</td>
                                        <td>{{$enfermeiro->jornTrab}}</td>
                                        <td>{{$enfermeiro->especializacao}}</td>
                                        <td>{{$enfermeiro->coren}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('enfermeiro.editar', $enfermeiro->id)}}" class="btn btn-info text-white btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Editar dados do enfermeiro"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <form action="{{route('enfermeiro.excluir', $enfermeiro->id)}}" method="get" onsubmit="return confirm('Deseja excluir o enfermeiro {{$enfermeiro->nome}}?')">
                                                    <button type="submit" class="btn btn-danger btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Deletar enfermeiro"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
