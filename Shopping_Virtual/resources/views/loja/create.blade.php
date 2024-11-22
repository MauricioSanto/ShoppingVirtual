
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Lojas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            /* Define altura mínima para garantir que os cards fiquem com o mesmo tamanho */
            .card {
            height: 80%;
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
            padding-top: 50px; /* ajusta conforme a altura da navbar */
            }
            ul {
            gap: 10px; /* Define o espaçamento entre os itens */
            padding-left: 0; /* Remove o padding padrão da ul */
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
                      
                        <li class="nav-item" >
                            <a class="btn btn-outline-success" href="{{ route('loja.index') }}">Pagina Inicial</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <p>
            <h2>Nova Loja</h2>
        </p>
       
        <form action="{{ route('loja.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="form-row">
                    
                    <label for="">NOME:</label>
                    <div class="col">
                        <input type="text" name="nome">
                            @foreach( $users as $user)
                                <option value="{{ $user->id }}">{{ $user->nome}}</option>
                            @endforeach
                        </input>
                    </div>
                    <label for="categoria_id">CATEGORIA:</label>
                    <div class="col">
                        <!-- Usando <select> para categorias -->
                        <select name="categoria_id" id="categoria_id">
                            <option value="">Selecione uma categoria</option> <!-- Opção de placeholder -->
                            @foreach( $categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                   
                
                    <label for="">LOGO:</label>
                    <div class="col">
                        <input type="file" name="logo" id="logo" accept="image/*">
                    </div>
                    <label>CNPJ:</label>
                    <div class="col">
                        <input type="text" name="cnpj" pattern="\d{14}" title="O CNPJ deve conter 14 dígitos">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    
                </div>
            </div>
        </form>
       
        

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
