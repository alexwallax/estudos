<?php

    //conexão com banco de dados com PDO
    $dsn = "mysql:dbname=blog;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    /************STATEMENT************/
    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass);

        $nome = 'Alex wa'; //na pratica $nome = $_POST['nome'];
        $id = 8;

        $sql = "UPDATE usuarios SET nome = :novonome WHERE id = :id";
        
        //prepara query para ser executada
        $sql = $pdo->prepare($sql); //transforma preparacao em uma classe do PDO

        $sql->bindValue(':novonome', $nome); //subistitui :novonome por $nome
        $sql->bindValue(':id', $id); //subistitui :id por $id

        //executar sql
        $sql->execute();

        echo "Usuário atualizado com sucesso!";

    } catch(PDOException $e) {
        echo "Erro de conexão: ".$e->getMessage();
    }


?>