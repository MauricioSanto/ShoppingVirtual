<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrinho de Compras</title>
    </head>
    <body>
        <h1>Carrinho de Compras</h1>

        @if(session('success'))
            <div style="color: green; font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        @if(count($produtosCarrinho) > 0)
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtosCarrinho as $item)
                        <tr>
                            <td>{{ $item['produto']->nome }}</td>
                            <td>{{ $item['produto']->descricao }}</td>
                            <td>R$ {{ number_format($item['produto']->preco, 2, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('carrinho.atualizar', $item['produto']->id) }}" method="POST">
                                    @csrf
                                    <input type="number" name="quantidade" value="{{ $item['quantidade'] }}" min="1" required>
                                    <button type="submit">Atualizar</button>
                                </form>
                            </td>
                            <td>R$ {{ number_format($item['subtotal'], 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('carrinho.remover', $item['produto']->id) }}">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Total: R$ {{ number_format($total, 2, ',', '.') }}</h2>

            <a href="{{ route('carrinho.finalizar') }}">
                <button>Finalizar Compra</button>
            </a>
        @else
            <p>Seu carrinho está vazio. Adicione produtos ao carrinho para continuar.</p>
        @endif

    </body>
</html>
