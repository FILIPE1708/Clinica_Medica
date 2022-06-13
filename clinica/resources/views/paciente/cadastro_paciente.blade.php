@extends('menu_principal')
@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary mt-5">
                <div class="card-header bg-primary">
                    <div class="card-title">
                        <h4 class="text-center text-white"><strong>{{isset($paciente->id) ? 'Editar Paciente' : 'Cadastrar Paciente'}}</strong></h4>
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

                    <form action="{{isset($paciente->id) ? route('paciente.alterar') : route('paciente.cadastrar')}}" method="post">

                        @csrf
                        <input type="hidden" name="id_paciente" value="{{$paciente->id ?? ''}}">

                        <div class="row">
                            <div class="col-md-5">
                                <label for="nome"><strong>Nome:</strong></label>
                                <input type="text" id="nome" name="nome" class="form-control" value="{{$paciente->nome ?? old('nome')}}" >
                            </div>

                            <div class="col-md-5">
                                <label for="telefone"><strong>Telefone:</strong></label>
                                <input type="text" id="telefone" name="telefone" class="form-control" value="{{$paciente->telefone ?? old('telefone')}}">
                            </div>

                            <div class="col-md-2">
                                <label for="peso"><strong>Peso:</strong></label>
                                <input type="text" id="peso" name="peso" class="form-control" value="{{$paciente->peso ?? old('peso')}}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 mt-2">
                                <label for="alergias"><strong>Alergias:</strong></label>
                                <textarea name="alergias" id="alergias" rows="4" class="form-control">{{$paciente->alergias ?? old('alergias')}}</textarea>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="plano_saude"><strong>Plano de saúde:</strong></label>
                                <input type="text" id="plano_saude" name="plano_saude" class="form-control" value="{{$paciente->plano_saude ?? old('plano_saude')}}">
                            </div>

                            <div class="col-md-2">
                                <label for="altura"><strong>Altura:</strong></label>
                                <input type="text" id="altura" name="altura" class="form-control" value="{{$paciente->altura ?? old('altura')}}">
                            </div>

                            <div class="col-md-2">
                                <label for="tipo_sangue"><strong>Tipo de sangue:</strong></label>
                                <input type="text" id="tipo_sangue" name="tipo_sangue" class="form-control" value="{{$paciente->tipo_sangue ?? old('tipo_sangue')}}">
                            </div>

                            <div class="col-md-4">
                                <label for="cpf"><strong>CPF:</strong></label>
                                <input type="text" id="cpf" name="cpf" class="form-control" value="{{$paciente->cpf ?? old('cpf')}}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-5">
                                <label for="doencas_cronicas"><strong>Doenças Crônicas:</strong></label>
                                <input type="text" id="doencas_cronicas" name="doencas_cronicas" class="form-control" value="{{$paciente->doencas_cronicas ?? old('doencas_cronicas')}}">
                            </div>

                            <div class="col-md-5">
                                <label for="rg"><strong>RG:</strong></label>
                                <input type="text" id="rg" name="rg" class="form-control" value="{{$paciente->rg ?? old('rg')}}">
                            </div>

                            <div class="col-md-2">
                                <label for="cep"><strong>CEP:</strong></label>
                                <input type="text" id="cep" name="cep" class="form-control" value="{{$paciente->cep ?? old('cep')}}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="logradouro"><strong>Logradouro:</strong></label>
                                <input type="text" id="logradouro" name="logradouro" class="form-control" value="{{$paciente->logradouro ?? old('logradouro')}}">
                            </div>

                            <div class="col-md-3">
                                <label for="bairro"><strong>Bairro:</strong></label>
                                <input type="text" id="bairro" name="bairro" class="form-control" value="{{$paciente->bairro ?? old('bairro')}}">
                            </div>

                            <div class="col-md-3">
                                <label for="cidade"><strong>Cidade:</strong></label>
                                <input type="text" id="cidade" name="cidade" class="form-control" value="{{$paciente->cidade ?? old('cidade')}}">
                            </div>

                        </div>

                        <div class="row mt-3 d-flex justify-content-center">
                            <div class="col-md-3">
                                <label for="numero"><strong>Numero:</strong></label>
                                <input type="text" id="numero" name="numero" class="form-control" value="{{$paciente->numero ?? old('numero')}}">
                            </div>

                            <div class="col-md-3">
                                <label for="estado"><strong>Estado:</strong></label>
                                <input type="text" id="estado" name="estado" class="form-control" value="{{$paciente->estado ?? old('estado')}}">
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
