<?php

    //conexão com banco de dados com PDO

    //variavel $dsn recebe = 
    //1º o tipo do banco de dados e o nome "mysql:dbname=nome_do_banco"
    //2º o logar onde esta o servidor do banco enta nesse caso localhost ou 127.0.0.1
    $dsn = "mysql:dbname=blog;host=localhost";

    //usuario do banco
    $dbuser = "root";

    //senha do banco
    $dbpass = "";


    
    //iniciar PDO e enviar os parametros ja definidos acima
    try{
        //iniciar uma classe PDO
        $pdo = new PDO($dsn, $dbuser, $dbpass);
    



        /******************************************************************************************/
        //inserindo dados no banco
        /*
        $nome = "Silva";
        $email = "Silva@email.com";
        $senha = md5("123");

        $sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
        $sql = $pdo->query($sql); //executar a query
        */
        /******************************************************************************************/
        //atualizando dados no banco
        /*
        $sql = "UPDATE usuarios SET email = 'alexwa@email.com' WHERE email = 'alex@ig.com'";
        $sql = $pdo->query($sql); //executar a query
        */

        /******************************************************************************************/
        //remover do banco de dados
        /*
        $sql = "DELETE FROM usuarios WHERE id = 12";
        $pdo->query($sql);
        */
        
        /******************************************************************************************/

        


        //recuperar os dados do banco de dados na tabela usuarios
        $sql = "SELECT id, nome, email, senha FROM usuarios";

        //mandar a string recuperada do banco para o PDO
        $sql = $pdo->query($sql);// aqui a variavel $sql vira uma classe do metodo PDO(execulta a query)

        //verificar se veio algum resultado
        if($sql->rowCount() > 0) { //rowCount conta as linhas

            //pegar todo resultado da consulta = ($sql = "SELECT ID, NOME, EMAIL, SENHA FROM usuarios") e transformat em um array $usuario
            foreach($sql->fetchAll() as $usuario) {
                echo "Nome: ".$usuario['nome']." - E-mail: ".$usuario['email']."<br>";
            }

        } else {
            echo "Não há usuários cadastrados!";
        }


    } catch(PDOException $e) {
        echo "Erro de conexão: ".$e->getMessage();
    }




?>