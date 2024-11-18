<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Categorias</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            /* Define altura mínima para garantir que os cards fiquem com o mesmo tamanho */
            .card {
            width: 250px;
            height: 300px;
            border: 1px solid #ccc;
            border-radius: 8px;
            display: flex;
            flex-direction: column; /* Alinha os filhos verticalmente */
            justify-content: space-between; /* Distribui o conteúdo */
            padding: 16px;
            justify-content: center; /* Alinha verticalmente */
            align-items: center; /* Alinha horizontalmente */
            background-color: #F0FFFF;
            }
            
            /* Garante que o conteúdo do card se expanda igualmente */
            .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            }
            .navbar {
            background-color: rgba(255, 255, 255, 0.8); /* cor branca com 80% de opacidade */
            transition: background-color 0.4s ease;
            }

            /* Define navbar completamente transparente */
            .navbar-transparent {
            background-color: rgba(128, 128, 128, 0.5);
            }

            /* Adiciona espaçamento no topo para o conteúdo não ficar atrás da navbar */
            body {
            padding-top: 30px; /* ajusta conforme a altura da navbar */
            }
            ul {
            gap: 10px; /* Define o espaçamento entre os itens */
            padding-left: 0; /* Remove o padding padrão da ul */
            }
            .card-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            align-self: flex-end; /* Faz o botão ficar na base do card */
            }
            .card-container{
                
                display: flex; /* Alinha os cards horizontalmente */
                gap: 20px; /* Espaçamento entre os cards */
                justify-content: center; /* Centraliza os cards horizontalmente */
                flex-wrap: wrap; /* Faz com que os cards se ajustem em várias linhas caso o espaço seja pequeno */        
            }
        </style>
    </head>
    <body>
          <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary navbar-transparent ">
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categoria.create') }}">cadastrar Categoria</a>
                        </li>
                      
                        <li class="nav-item" >
                            <a class="btn btn-outline-success" href="{{ route('loja.index') }}">Pagina Inicial</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <p>
            <h2>Categoria</h2>
        </p>
        <div class="card-container">
            
            @foreach ($categorias as $categoria )
                <div class="row">
                    <div class="col-md-6">
                        <div class="card" >
                            <img src="{{ asset('storage/'. $categoria->imagem) }}" class="rounded-circle" alt="{{ $categoria -> nome }}" style="max-width: 50%; height: auto;" />
                            
                            <div class="card-body">
                                <h5 class="card-title">{{ $categoria ->nome}}</h5>
                                <h4><form action="{{ route('categoria.destroy', $categoria->id) }}" method="POST" class="card-btn  btn-danger" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <img src='https://img.icons8.com/?size=100&id=57061&format=png&color=000000'   width='25' height='25'>Excluir</img>
                                        </button>
                                    </form>
                                </h4>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            @endforeach
            
        </div>
        
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        window.onscroll = function() {
            var navbar = document.querySelector('.navbar');
            // Se o scroll for maior que 50px, adicione a classe que faz a navbar ficar opaca
            if (window.pageYOffset > 20) {
            navbar.classList.remove('navbar-transparent');
            } else {
            navbar.classList.add('navbar-transparent');
            }
        };
    </script>
</html>
