<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

<div class="d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="p-4 pt-5">
            <i class="fa fa-user-md fa-5x mb-2 text-primary d-flex justify-content-center" aria-hidden="true"></i>
            <hr class="bg-primary">
            <ul class="list-unstyled components mb-5">
                <li>
                    <a href="{{route('inicio')}}">Início</a>
                </li>
                <li>
                    <a href="#funcionarioSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Funcionário</a>
                    <ul class="collapse list-unstyled" id="funcionarioSubmenu">
                        <li>
                            <a href="{{route('recepcionista.novo')}}">Cadastrar Recepcionista</a>
                        </li>
                        <li>
                            <a href="">Lista De Recepcionistas</a>
                        </li>
                        <li>
                            <a href="">Cadastrar Médico</a>
                        </li>
                        <li>
                            <a href="">Lista De Médicos</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                </button>

            </div>
        </nav>

        @yield('conteudo')
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>