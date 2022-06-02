@extends('menu_principal')
@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary mt-5">
                <div class="card-header bg-primary">
                    <div class="card-title">
                        <h4 class="text-center text-white"><strong>Recepcionistas</strong></h4>
                    </div>
                </div>

                <div class="card-body text-black-50">

                    <div class="row">
                        <div class="col-md-12 mt-2 d-flex justify-content-center">
                            @if(old('nome'))
                                <div class="alert alert-success text-center" role="alert">
                                    Recepcionista {{old('nome')}} cadastrado com sucesso!!
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
                                    <th>PIS</th>
                                    <th>CPF</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recepcionistas as $recepcionista)
                                    <tr>
                                        <td>{{$recepcionista->id}}</td>
                                        <td>{{$recepcionista->nome}}</td>
                                        <td>{{$recepcionista->remuneracao}}</td>
                                        <td>{{$recepcionista->email}}</td>
                                        <td>{{$recepcionista->jornTrab}}</td>
                                        <td>{{$recepcionista->pis}}</td>
                                        <td>{{$recepcionista->cpf}}</td>
                                        <td>
                                            <a href="" class="btn btn-info text-white btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Editar dados do recepcionista"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a href="{{route('medico.listar', $recepcionista->id)}}" id="excluir" class="btn btn-danger btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Deletar recepcionista"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                    <script>
                                        document.querySelector('#excluir').addEventListener('click', function (event) {
                                            var confirmado = confirm('Deseja excluir o recepcionista {{$recepcionista->nome}}?');

                                            if (confirmado === false){
                                                event.preventDefault();
                                            }
                                        });
                                    </script>
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
