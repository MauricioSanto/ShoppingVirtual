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
                        <li class="nav-item" >
                            <a class="btn btn-outline-success" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @if (session('success'))
            <div>{{ session('success') }}</div>
        @endif

        <!-- Div for Categories in Card Format -->
      
        <div class="container mt-5">
           
            @foreach ($lojas as $loja)
                <ul>
                    <li class="carousel__item"  style="list-style-type: none">
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="{{ asset('storage/'. $loja->logo) }}" class="card-img-top"  width="80%" height="30%"  margin: 0 auto>
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $loja->nome }}</h5>
                                    <h5 class="card-title">{{ $loja->categoria }}</h5>
                                    <h5 class="card-title">{{ $loja->cnpj }}</h5>
                                    <form action="{{ route('loja.destroy', $loja->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <img src='https://img.icons8.com/?size=100&id=57061&format=png&color=000000' width='35' height='35'>Excluir</img>
                                        </button>
                        
                                    </form>

                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            @endforeach
                
        </div>
           
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
