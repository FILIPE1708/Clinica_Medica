@extends('menu_principal')
@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary mt-5">
                <div class="card-header bg-primary">
                    <div class="card-title">
                        <h4 class="text-center text-white"><strong>Realizar Consulta</strong></h4>
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

                    <form action="{{route('consulta.finalizar')}}" method="post" onsubmit="return confirm('Deseja finalizar a consulta?')">

                        @csrf
                        <input type="hidden" name="consulta_id" value="{{$consulta->id ?? ''}}">

                        <input type="hidden" name="usuario_id" value="{{session('id_usuario')}}">


                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="data_consulta"><strong class="text-primary">Data da Consulta: </strong>{{date('d/m/Y', strtotime($consulta->data_consulta))}}</label>
                                <input type="hidden" name="data_consulta" value="{{$consulta->data_consulta}}">
                            </div>

                            <div class="col-md-4">
                                <label for="medico_id"><strong class="text-primary">Médico: </strong>{{$consulta->medico->nome}}</label>
                                <input type="hidden" name="medico_id" value="{{$consulta->medico_id}}">
                            </div>

                            <div class="col-md-4">
                                <label for="paciente_id"><strong class="text-primary">Paciente: </strong>{{$consulta->paciente->nome}}</label>
                                <input type="hidden" name="paciente_id" value="{{$consulta->paciente_id}}">
                            </div>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="diagnostico"><strong>Diagnóstico:</strong></label>
                            <textarea name="diagnostico" id="diagnostico" rows="4" class="form-control">{{$consulta->diagnostico ?? old('diagnostico')}}</textarea>
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
