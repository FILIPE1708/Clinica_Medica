@extends('menu_principal')
@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary mt-5">
                <div class="card-header bg-primary">
                    <div class="card-title">
                        <h4 class="text-center text-white"><strong>Agendar Consulta</strong></h4>
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

                        @if(old('data_consulta'))
                            <div class="alert alert-success text-center" role="alert">
                                Consulta cadastrada para {{date('d/m/Y', strtotime(old('data_consulta')))}} com sucesso!!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                    <form action="{{route('consulta.cadastrar')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="medico_id"><strong>Selecione o Médico:</strong></label>
                                <select id="medico_id" name="medico_id" class="form-control">
                                    <option value="">Médico teste</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="paciente_id"><strong>Selecione o Paciente:</strong></label>
                                <select id="paciente_id" name="paciente_id" class="form-control">
                                    <option value="">Paciente teste</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3 d-flex justify-content-center">
                            <div class="col-md-4">
                                <label for="data_consulta"><strong>Data da Consulta:</strong></label>
                                <input type="date" id="data_consulta" name="data_consulta" class="form-control">
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
