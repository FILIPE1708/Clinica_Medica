@extends('menu_principal')
@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary mt-5">
                <div class="card-header bg-primary">
                    <div class="card-title">
                        <h4 class="text-center text-white"><strong>{{isset($recepcionista->id) ? 'Editar Recepcionista' : 'Cadastrar Recepcionista'}}</strong></h4>
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

                    <form action="{{isset($recepcionista->id) ? route('recepcionista.alterar') : route('recepcionista.cadastrar')}}" method="post">

                        @csrf
                        <input type="hidden" name="id_recepcionista" value="{{$recepcionista->id ?? ''}}">

                        <div class="row">
                            <div class="col-md-5">
                                <label for="nome"><strong>Nome:</strong></label>
                                <input type="text" id="nome" name="nome" class="form-control" value="{{$recepcionista->nome ?? old('nome')}}" >
                            </div>

                            <div class="col-md-5">
                                <label for="email"><strong>Email:</strong></label>
                                <input type="email" id="email" name="email" class="form-control" value="{{$recepcionista->email ?? old('email')}}">
                            </div>

                            <div class="col-md-2">
                                <label for="remuneracao"><strong>Remuneração:</strong></label>
                                <input type="text" id="remuneracao" name="remuneracao" class="form-control" value="{{$recepcionista->remuneracao ?? old('remuneracao')}}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="telefone"><strong>Telefone:</strong></label>
                                <input type="text" id="telefone" name="telefone" class="form-control" value="{{$recepcionista->telefone ?? old('telefone')}}">
                            </div>

                            <div class="col-md-4">
                                <label for="jornTrab"><strong>Jornada De Trabalho:</strong></label>
                                <input type="time" id="jornTrab" name="jornTrab" class="form-control" value="{{$recepcionista->jornTrab ?? old('jornTrab')}}">
                            </div>

                            <div class="col-md-4">
                                <label for="pis"><strong>PIS:</strong></label>
                                <input type="text" id="pis" name="pis" class="form-control" value="{{$recepcionista->pis ?? old('pis')}}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-5">
                                <label for="cpf"><strong>CPF:</strong></label>
                                <input type="text" id="cpf" name="cpf" class="form-control" value="{{$recepcionista->cpf ?? old('cpf')}}">
                            </div>

                            <div class="col-md-5">
                                <label for="rg"><strong>RG:</strong></label>
                                <input type="text" id="rg" name="rg" class="form-control" value="{{$recepcionista->rg ?? old('rg')}}">
                            </div>

                            <div class="col-md-2">
                                <label for="cep"><strong>CEP:</strong></label>
                                <input type="text" id="cep" name="cep" class="form-control" value="{{$recepcionista->cep ?? old('cep')}}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="logradouro"><strong>Logradouro:</strong></label>
                                <input type="text" id="logradouro" name="logradouro" class="form-control" value="{{$recepcionista->logradouro ?? old('logradouro')}}">
                            </div>

                            <div class="col-md-3">
                                <label for="bairro"><strong>Bairro:</strong></label>
                                <input type="text" id="bairro" name="bairro" class="form-control" value="{{$recepcionista->bairro ?? old('bairro')}}">
                            </div>

                            <div class="col-md-3">
                                <label for="cidade"><strong>Cidade:</strong></label>
                                <input type="text" id="cidade" name="cidade" class="form-control" value="{{$recepcionista->cidade ?? old('cidade')}}">
                            </div>

                        </div>

                        <div class="row mt-3 d-flex justify-content-center">
                            <div class="col-md-3">
                                <label for="numero"><strong>Numero:</strong></label>
                                <input type="text" id="numero" name="numero" class="form-control" value="{{$recepcionista->numero ?? old('numero')}}">
                            </div>

                            <div class="col-md-3">
                                <label for="estado"><strong>Estado:</strong></label>
                                <input type="text" id="estado" name="estado" class="form-control" value="{{$recepcionista->estado ?? old('estado')}}">
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
@endsection
