<?php
    session_start();
    if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)){
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        header('Location: ../index.html');
    }
    require('conecta.php');

    $nome_cliente = $_POST['nome_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $cidade = $_POST['cidade'];

    $sql = "INSERT INTO cadastro (nome_cliente,email_cliente,cidade) VALUES
    ('$nome_cliente','$email_cliente','$cidade')";

    $conexao->query($sql);

    header('Location: index.php');





?>