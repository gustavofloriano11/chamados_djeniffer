
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
</head>
<body>
    <h2>Registre um Colaborador:</h2>
    <form method="POST" action="../backend/create/create_colaborador.php">
        <label name="nome">Nome Completo:</label>
        <input type="text" name="nome">
        <br>
        <br>
        <label name="email">E-mail:</label>
        <input type="text" name="email">
        <br>
        <br>
        <label name="telefone">Telefone:</label>
        <input type="text" name="telefone" placeholder="11911111111">
        <br>
        <br>
        <button>Enviar</button>
    </form>
    <br>
    <a href="index.html"><button>Voltar</button></a>
</body>
</html>