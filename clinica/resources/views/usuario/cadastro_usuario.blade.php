@extends('menu_principal')
@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary mt-5">
                <div class="card-header bg-primary">
                    <div class="card-title">
                        <h4 class="text-center text-white"><strong>{{isset($usuario->id) ? 'Editar Usuário' : 'Cadastrar Usuário'}}</strong></h4>
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

                    <form action="{{route('usuario.cadastrar')}}" method="post">

                        @csrf
                        <input type="hidden" name="id_recepcionista" value="{{$usuario->id ?? ''}}">

                        <div class="row">
                            <div class="col-md-6">
                                <label for="nome_usuario"><strong>Nome:</strong></label>
                                <input type="text" id="nome_usuario" name="nome_usuario" class="form-control" value="{{$usuario->nome_usuario ?? old('nome_usuario')}}" >
                            </div>

                            <div class="col-md-6">
                                <label for="email"><strong>Email:</strong></label>
                                <input type="email" id="email" name="email" class="form-control" value="{{$usuario->email ?? old('email')}}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="senha"><strong>Senha:</strong></label>
                                <input type="password" id="senha" name="senha" class="form-control" value="{{$usuario->senha ?? old('senha')}}">
                            </div>

                            <div class="col-md-6">
                                <label for="perfil_id"><strong>Perfil:</strong></label>
                                <select id="perfil_id" name="perfil_id" class="form-control">
                                    @foreach($perfis as $p)
                                        <option value="{{$p->id}}">{{$p->tipo}}</option>
                                    @endforeach
                                </select>
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

        <div class="col-md-12">
            <table class="table table-bordered table-hover table-striped table-responsive-sm" id="minhaTabela">
                <thead  class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                {{--                                    @foreach()--}}
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="d-flex">
                            <a href="" class="btn btn-info text-white btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Editar dados do recepcionista"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <form action="" method="get" onsubmit="return confirm('Deseja excluir o recepcionista {{}}?')">
                                <button type="submit" class="btn btn-danger btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Deletar recepcionista"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                {{--                                    @endforeach--}}

                </tbody>
            </table>
        </div>
@endsection
