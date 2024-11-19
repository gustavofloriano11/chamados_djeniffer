<?php

    include "../db.php";

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $id_cliente = $_POST['cliente'];
        $descricao = $_POST['descricao'];
        $nivel = $_POST['criticidade'];
        $status = $_POST['status'];
        $data = $_POST['data'];
        $id_colaborador = $_POST['colaborador'];

        if($id_cliente == null){
            echo('Cliente inválido!');
            ?>
            <a href="../../frontend/index.html"><button>Voltar</button></a>
            <?php die('😎')?>
<?php   }
    
        if($id_colaborador == 0){
            $query = "INSERT INTO chamado (id_cliente, descricao, criticidade, status_chamado, data_abertura)
            VALUES ($id_cliente, '$descricao', '$nivel', '$status', '$data')";
                if($conn -> query($query) === TRUE){
                    echo "Dados Enviados!";
                    header('Location: ../../frontend/index.html');
                } else{
                    echo 'Erro 💀';
                }
        } else {
            $query = "INSERT INTO chamado (id_cliente, descricao, criticidade, status_chamado, data_abertura, id_colaborador)
            VALUES ($id_cliente, '$descricao', '$nivel', '$status', '$data', $id_colaborador)";
                if($conn -> query($query) === TRUE){
                    echo "Dados Enviados!";
                    header('Location: ../../frontend/index.html');
                } else{
                    echo 'Erro 💀';
                }
        }   
    }