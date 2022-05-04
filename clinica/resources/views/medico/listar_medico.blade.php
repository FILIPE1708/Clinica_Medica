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

                        <div class="col-md-12">
                            <table class="table table-bordered table-hover table-striped table-responsive-sm">
                                <thead  class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Remuneração</th>
                                    <th>Email</th>
                                    <th>Jornada De Trabalho</th>
                                    <th>PIS</th>
                                    <th>CPF</th>
                                    <th>Especialização</th>
                                    <th>CRM</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Filipe Cavalcante</td>
                                    <td>8.000</td>
                                    <td>filipe@clinica.com</td>
                                    <td>8:00</td>
                                    <td>341.17551.42-7</td>
                                    <td>000.000.000-00</td>
                                    <td>Clínico geral</td>
                                    <td>0000-0BR</td>
                                    <td>
                                        <a href="" class="btn btn-info text-white btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Editar dados do recepcionista"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="" class="btn btn-danger btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Deletar recepcionista"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Mateus Silva</td>
                                    <td>7.000</td>
                                    <td>mateus@clinica.com</td>
                                    <td>8:30</td>
                                    <td>326.85652.08-2</td>
                                    <td>111.111.111-11</td>
                                    <td>Cirurgião</td>
                                    <td>1111-1BR</td>
                                    <td>
                                        <a href="" class="btn btn-info text-white btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Editar dados do recepcionista"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="" class="btn btn-danger btn-sm ml-lg-1 mt-1"  data-toggle="tooltip" data-placement="bottom" title="Deletar recepcionista"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
