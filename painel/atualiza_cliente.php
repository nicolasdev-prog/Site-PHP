<?php
    session_start();
    if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)){
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        header('Location: ../index.html');
    }
    require('conecta.php');

    $id_cliente = $_GET['id']; //Pega da URL

    $nome_cliente_novo = $_POST['nome_cliente_novo'];
    $email_cliente_novo = $_POST['email_cliente_novo'];
    $cidade_novo = $_POST['cidade_novo'];

    var_dump($nome_cliente_novo);

    $sql = "UPDATE cadastro SET nome_cliente = '$nome_cliente_novo', email_cliente = '$email_cliente_novo', cidade = '$cidade_novo'
    WHERE id_cliente = '$id_cliente' ";

    $conexao->query($sql);

    header('Location: index.php');

?>