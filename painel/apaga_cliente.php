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

    $sql = "DELETE FROM cadastro WHERE id_cliente = '$id_cliente' ";

    $conexao->query($sql);

    header('Location: index.php');

    
?>