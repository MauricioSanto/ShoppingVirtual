<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Virtual</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>


        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!--<a class="navbar-brand" href="{{ url('/') }}">Minha Loja</a>-->
                <img src="{{ asset('storage/icones/SENAI.png') }}" alt="SENAI" width="100" height="30">
                <!-- Social Media Links -->
                <div class="ml-auto">
                    <a href="https://www.instagram.com" target="_blank">
                        <img src="{{ asset('storage/icones/instagram.png') }}" alt="Instagram" width="30" height="30">
                    </a>
                    <a href="https://www.facebook.com" target="_blank">
                        <img src="{{ asset('storage/icones/facebook.png') }}" alt="Facebook" width="30" height="30">
                    </a>
                    <a href="https://www.whatsapp.com" target="_blank">
                        <img src="{{ asset('storage/icones/whatsapp.png') }}" alt="WhatsApp" width="30" height="30">
                    </a>
                </div>

                <!-- User and Store Owner Access Buttons -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <!-- Botão para lojista -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('loja.create') }}">Acesso do Lojista</a>
                        </li>
                        <!-- Botão para usuário -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Acesso do Usuário</a>
                        </li>
                        <!-- Botões de login e cadastro -->
                        <li class="nav-item">
                            <a class="btn btn-outline-primary" href="{{ route('register') }}">Cadastrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-success" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Div for Categories in Card Format -->
        <!--<div class="card-deck">
            <div class="card">
            <img class="card-img-top" src=".../100px200/" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title">Título do card</h5>
                <p class="card-text">Este é um card mais longo com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este conteúdo é um pouco maior.</p>
                <p class="card-text"><small class="text-muted">Atualizados 3 minutos atrás</small></p>
            </div>
        </div>-->
        <div class="container mt-5">
            <h2 class="text-center mb-4">Lojas</h2>
            <div class="row">
                @foreach ($lojas as $loja)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/icones/SENAI.png') }}" class="card-img-top" alt="{{ $loja->nome }}" width="100" height="30">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $loja->nome }}</h5>
                                <h5 class="card-title">{{ $loja->categoria }}</h5>
                                <h5 class="card-title">{{ $loja->cnpj }}</h5>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
           
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
