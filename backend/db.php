<?php

    define("servername", "localhost");
    define("username", "root");
    define("password", ""); //depois colocar o password denovo
    define("dbname", "chamados");

    $conn = new mysqli(servername, username, password, dbname);

    if($conn->connect_error){
        die("Ops! Algum erro aconteceu!");
    }
    