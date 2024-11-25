<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $produto->nome }} - Detalhes</title>
    </head>
    <body>
        <h1>{{ $produto->nome }}</h1>
        <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}">
        <p>{{ $produto->descricao }}</p>
        <p>Preço: R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>

        <form action="{{ route('carrinho.adicionar') }}" method="POST">
            @csrf
            <input type="hidden" name="produto_id" value="{{ $produto->id }}">
            <button type="submit">Adicionar ao Carrinho</button>
        </form>
    </body>
</html>
