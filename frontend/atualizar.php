<?php 

    include("../backend/db.php");

    $id_chamado = $_GET['id'];

    $query_chamado = $conn->query("SELECT * FROM chamado WHERE id = $id_chamado");

    $query_colaborador = $conn->query("SELECT * FROM colaborador");

    $query_id_cliente = $conn->query("SELECT id_cliente FROM chamado WHERE id = $id_chamado");

    $result = $query_id_cliente->fetch_assoc();

    $row_chamado = $query_chamado->fetch_assoc();

    $id_cliente = $result['id_cliente'];

    $query_cliente = $conn->query("SELECT * FROM cliente WHERE id = $id_cliente");

    $row_cliente = $query_cliente->fetch_assoc();

    

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Chamado</title>
</head>
<body>
<h2>Insira os Dados do Problema:</h2>
    <form method="POST" action="../backend/create/update_chamado.php">
        <label for="cliente">Cliente:</label>
        <select name="cliente">
            <?php if($query_cliente -> num_rows > 0){ ?>
                <option value="<?php echo $row_cliente['id'];?>"><?php echo $row_cliente['nome_cliente']; ?></option>
<?php       } ?>
        </select>
        <br>
        <br>
        <label for="descricao">Descrição do Problema:</label>
        <textarea name="descricao">
            <?php if($query_chamado -> num_rows > 0){
                echo $row_chamado['descricao'];
            } ?>
        </textarea>
        <br>
        <br>
        <label for="criticidade">Criticidade:</label>
        <select name="criticidade">
            <option value="<?php echo $row_chamado['criticidade'] ?>">
                <?php if($query_chamado -> num_rows > 0){
                    echo $row_chamado['criticidade'];
                } ?>
            </option>
        </select>
        <br>
        <br>
        <label for="status">Status:</label>
        <select name="status">
            <option value="null">Selecione uma Opção</option>
            <option value="aberto">Aberto</option>
            <option value="andamento">Em Andamento</option>
            <option value="fechado">Fechado</option>
        </select>
        <br>
        <br>
        <label for="descricao">Colaborador:</label>
        <select name="colaborador">
            <option value="0">Selecione uma Opção</option>
            <?php if($query_colaborador -> num_rows > 0){ ?>
                <?php while($row_colaborador = $query_colaborador->fetch_assoc()){
                    ?> <option value="<?php echo $row_colaborador['id']; ?>"><?php echo $row_colaborador['nome_colaborador']; ?></option>
<?php           }?>
<?php       } ?>
        </select>
        <br>
        <br>
        <label for="data">Data de Abertura:</label>
        <input type="date" name="data">
        <br>
        <br>
        <button>Enviar</button>
    </form>
</body>
</html>