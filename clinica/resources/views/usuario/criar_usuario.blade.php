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

                    @if(isset($usuario->id))
                        <div class="d-flex justify-content-start">
                            <a href="{{route('usuario.novo')}}" class="btn btn-danger btn-md ml-lg-1 mt-1 mb-2"  data-toggle="tooltip" data-placement="bottom" title="Cancelar">&times;</a>
                        </div>
                        @endif

                    <form action="{{isset($usuario->id) ? route('usuario.alterar') :route('usuario.cadastrar')}}" method="post">

                        @csrf
                        <input type="hidden" name="id_usuario" value="{{$usuario->id ?? ''}}">

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
                                <input type="password" id="senha" name="senha" class="form-control" value="{{$usuario->senha ?? ''}}">
                            </div>

                            <div class="col-md-6">
                                <label for="perfil_id"><strong>Perfil:</strong></label>
                                <select id="perfil_id" name="perfil_id" class="form-control">
                                    @if(isset($usuario->perfil->id))
                                        <option value="{{$usuario->perfil->id}}">{{$usuario->perfil->tipo}}</option>

                                        @foreach($perfis as $p)
                                            @if($usuario->perfil->tipo != $p->tipo)
                                                <option value="{{$p->id}}">{{$p->tipo}}</option>
                                            @endif
                                        @endforeach

                                    @else
                                        @foreach($perfis as $p)
                                            <option value="{{$p->id}}">{{$p->tipo}}</option>
                                        @endforeach
                                    @endif
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


        <div class="col-md-12">
            <table class="table table-bordered table-hover table-striped table-responsive-sm" id="minhaTabela">
                <thead  class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Perfil</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->nome_usuario}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->perfil->tipo}}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('usuario.editar', $usuario->id)}}" class="btn btn-info text-white btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Editar dados do usuário"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <form action="{{route('usuario.excluir', $usuario->id)}}" method="get" onsubmit="return confirm('Deseja excluir o usuário {{$usuario->nome_usuario}}?')">
                                    <button type="submit" class="btn btn-danger btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Deletar usuário"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
@endsection
