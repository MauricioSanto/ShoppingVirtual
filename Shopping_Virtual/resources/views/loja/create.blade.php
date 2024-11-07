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
            <label>NOME:</label>
            <input type="text" name="nome">
            <label>CATEGORIA:</label>
            <input type="text" name="categoria">
            <label>CNPJ:</label>
            <input type="number" name="cnpj">
           
            <button type="submit">Salvar</button>
        </form>
    </body>
</html>