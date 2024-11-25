<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produtos da Loja: {{ $loja->nome }}</title>
    </head>
    <body>
        <h1>Produtos de {{ $loja->nome }}</h1>

        @foreach($produtos as $produto)
            <div class="card">
                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}">
                <h3>{{ $produto->nome }}</h3>
                <p>{{ $produto->descricao }}</p>
                <p>R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>

                <form action="{{ route('carrinho.adicionar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                    <button type="submit">Adicionar ao Carrinho</button>
                </form>
            </div>
        @endforeach
    </body>
</html>
