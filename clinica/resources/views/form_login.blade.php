<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style01.css')}}">
    <title>Login</title>

</head>
<body>

<div class="container-fluid mt-2 mb-2">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">

            <div class="card" id="box">

                <div class="row">
                    <div class="col-md-5 d-md-flex d-none">
                        <img src="{{asset('image/sist_med.png')}}" class="img-fluid"/>
                    </div>

                    <div class="col-md-7 d-flex align-items-center">
                        <div class="card-body text-black">

                            @if(session('error'))
                                <div class="alert alert-danger text-center" role="alert">
                                    {{session('error')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{route('logar')}}" method="post">
                                @csrf

                                <h5 class="pb-3">Entre em sua conta</h5>

                                <div class="mb-4">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"/>
                                </div>

                                <div class="mb-4">
                                    <label for="senha">Senha</label>
                                    <input type="password" id="senha" name="senha" class="form-control form-control-lg" />
                                </div>

                                <div class="mt-2 mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
