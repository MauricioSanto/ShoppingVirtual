!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Lojas</title>
    </head>
    <body>
        <h1>Nova Loja</h1>

        <form action="{{ route('loja.store') }}" method="POST">
            @csrf
            <label for="">NOME:</label>
            <input type="text" name="nome">
                @foreach( $users as $user)
                    <option value="{{ $user->id }}">{{ $user->nome}}</option>
                @endforeach
            </input>
            <label>CATEGORIA:</label>
            <input type="text" name="categoria">

            <label>CNPJ:</label>
            <input type="text" name="cnpj" pattern="\d{14}" title="O CNPJ deve conter 14 dígitos">
           
            <button type="submit">Salvar</button>
        </form>
    </body>
</html>