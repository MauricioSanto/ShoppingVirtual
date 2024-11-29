<!DOCTYPE html>

<html>
    <head>
        <title>Shopping Virtual</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            /* Define altura mínima para garantir que os cards fiquem com o mesmo tamanho */
            .card-card {
            width: 150px;
            height: 200px ;
            border: 1px solid #ccc;
            border-radius: 8px;
            display: flex;
            flex-direction: column; /* Alinha os filhos verticalmente */
            justify-content: space-between; /* Distribui o conteúdo */
            justify-content: center; /* Alinha verticalmente */
            align-items: center; /* Alinha horizontalmente */
            background-color: #F0FFFF;
            
            }
            .card{
                height: 80%;
            }

            
            /* Garante que o conteúdo do card se expanda igualmente */
            .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
           
            }
            .navbar {
            background-color: rgba(0, 0, 255, 0.1); /* cor branca com 80% de opacidade */
            transition: background-color 0.4s ease;
            }

            /* Define navbar completamente transparente */
            .navbar-transparent {
            background-color:rgba(0, 0, 255, 1);
            }

            /* Adiciona espaçamento no topo para o conteúdo não ficar atrás da navbar */
            body {
            padding-top: 70px; /* ajusta conforme a altura da navbar */
           
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
            .card-container {
            display: flex; /* Alinha os cards horizontalmente */
            gap: 20px; /* Espaçamento entre os cards */
            justify-content: center; /* Centraliza os cards horizontalmente */
            flex-wrap: wrap; /* Faz com que os cards se ajustem em várias linhas caso o espaço seja pequeno */
            
            }
            .card-img-top{
                object-fit: cover
            }
            .footer {
                background-color:  rgba(0, 0, 255, 1);
                color: white;
                padding: 2px 0;
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
             
                
               
            }

            .footer h5 {
                color: #fff;
                font-weight: bold;
                margin-bottom: 15px;
            }

            .footer ul {
                list-style-type: none;
                padding: 0;
            }

            .footer ul li {
                margin-bottom: 10px;
            }

            .footer ul li a {
                color: #ddd;
                text-decoration: none;
            }

            .footer ul li a:hover {
                color: #fff;
            }

            .footer .col-md-4 {
                margin-bottom: 20px;
            }

            .footer .text-center p {
                font-size: 14px;
                margin-top: 15px;
            }
           
        </style>
    </head>
    <body>
        

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark navbar-transparent ">
            <div class="container">
               
                <!--<a class="navbar-brand" href="{{ url('/') }}">Minha Loja</a>-->
                <img src="{{ asset('storage/icones/SENAI.png') }}" alt="SENAI" width="150" height="50">
             
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
        
        <h5>Produtos da Loja</h5>
        <div class="card-container ">
        
            @foreach ($produtos as $produto )
                @csrf
                <div class="row">
                    
                    <div class="col-md-6">
                        <section>
                            <a href="{{ route('produto.show', $produto->id) }}">
                                <div class="card-card" >
                                    
                                    <img src="{{ asset('storage/'. $produto->imagem) }}"   class="rounded-circle" alt="{{ $produto -> nome }}" style="max-width: 40%; height: auto;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $produto->nome}}</h5>
                                        
                                    </div>
                                
                                    <div>
                                        <form action="{{ route('produto.destroy', $produto->id) }}" method="POST" class="btn btn-danger" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                    
                                    
                                
                                </div>

                            </a>
                        </section>
                       
                                    
                    </div>
                </div>
              
            @endforeach
            
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <!-- Seção de links rápidos -->
                    <div class="col-md-4">
                        <h5>Links Rápidos</h5>
                        <ul>
                            
                            <li><a href="">Home</a></li>
                            <li><a href="">Sobre</a></li>
                            <li><a href="">Contato</a></li>
                            
                        </ul>
                    </div>
                    <!-- Seção de redes sociais -->
                    <div class="col-md-4">
                        <h5>Redes Sociais</h5>
                        <a href="https://www.instagram.com" target="_blank"><img src="{{ asset('storage/icones/instagram.png') }}" alt="Instagram" width="30" height="30"></a>
                        <a href="https://www.facebook.com" target="_blank"><img src="{{ asset('storage/icones/facebook.png') }}" alt="Facebook" width="30" height="30"></a>
                        <a href="https://www.whatsapp.com" target="_blank"><img src="{{ asset('storage/icones/whatsapp.png') }}" alt="WhatsApp" width="30" height="30"></a>
                    </div>
                    <!-- Seção de copyright -->
                    <div class="col-md-4 text-center">
                        <p>&copy; {{ date('Y') }} Shopping Virtual. Todos os direitos reservados.</p>
                    </div>
                </div>
            </div>
        </footer>
           
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
