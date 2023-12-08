<?php
    session_start();
    if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)){
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        header('Location: ../index.html');
    }
    require('conecta.php');

    $nome_usuario = $_POST['nome_usuario'];
    $email_usuario = $_POST['email_usuario'];
    $senha_simples = $_POST['senha'];
    $senha = md5($senha_simples);


    $sql = "INSERT INTO usuarios (nome,email,senha) VALUES
    ('$nome_usuario','$email_usuario','$senha')";

    $conexao->query($sql);

    header('Location: index.php');
?>