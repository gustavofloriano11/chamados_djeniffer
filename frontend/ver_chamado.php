<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamados Pendentes</title>
</head>
<body>
    
</body>
</html>

<?php

    include '../backend/db.php';

    $query = "SELECT * FROM chamado INNER JOIN cliente 
    ON id_cliente = cliente.id LEFT JOIN colaborador
    ON id_colaborador = colaborador.id
    WHERE id_cliente = cliente.id
    ORDER BY chamado.id"; 

    $result = $conn->query($query);

    if($result -> num_rows > 0){ ?>
        <table border = 1px>
        <tr>
            <th>Código do Chamado</th>
            <th>Cliente</th>
            <th>Colaborador</th>
            <th>Problema</th>
            <th>Nível do Chamado</th>
            <th>Status do Chamado</th>
            <th>Data de Abertura</th>
            <th>Ações</th>
        </tr> <?php
        while($row = $result -> fetch_assoc()){ ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['nome_cliente'] ?></td>
            <td><?php echo $row['nome_colaborador'] ?></td>
            <td><?php echo $row['descricao'] ?></td>
            <td><?php echo $row['criticidade'] ?></td>
            <td><?php echo $row['status_chamado'] ?></td>
            <td><?php echo $row['data_abertura'] ?></td>
            <td>
                <a href="atualizar.php?id=<?php echo $row['id']?>">Atualizar</a> |
                <a href="deletar.php?id=<?php echo $row['id']?>">Deletar</a>
            </td>
        </tr>
<?php   } ?>
        </table>
        <br>
        <a href="index.html"><button>Voltar</button></a>
<?php }