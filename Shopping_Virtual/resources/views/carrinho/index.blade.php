<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrinho de Compras</title>
    </head>
    <body>
        <h1>Carrinho de Compras</h1>

        @if(session()->has('carrinho') && count(session('carrinho')) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('carrinho') as $produtoId => $item)
                        <tr>
                            <td>Produto {{$produtoId}}</td> <!-- Aqui você pode puxar o nome do produto do banco -->
                            <td>{{$item['quantidade']}}</td>
                            <td>
                                <form action="{{ route('carrinho.remover', $produtoId) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit">Remover</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>O seu carrinho está vazio.</p>
        @endif

        <a href="/">Voltar para as compras</a>
    </body>
</html>
