<?php
    session_start();
    if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)){
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        header('Location: ../index.html');
    }
    require('conecta.php');

    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
    
        $sql = "SELECT * FROM cadastro WHERE nome_cliente LIKE '$nome%'";
        $result = $conexao->query($sql);
    
        //AQUI PRECISA FORMATAR A  TABELA PARA APRESENTAR NO MESMO FORMATO DA PAGINA INDEX.PHP
        if ($result->num_rows > 0) {
            echo "<table id=\"bootstrap-data-table-export\" class=\"table table-striped table-bordered\">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Cidade</th>
                        </tr>
                    </thead>
                    <tbody>";
    
            while ($row = $result->fetch_assoc()) {
                echo "
                    <tr>
                        <td>" . $row['id_cliente'] . "</td>
                        <td>" . $row['nome_cliente'] . "</td>
                        <td>" . $row['email_cliente'] . "</td>
                        <td>" . $row['cidade'] . "</td>
                    </tr>";
            }
    
            echo "
            </tbody>
            </table>";
        } else {
            echo "Nenhum resultado encontrado.";
        }
    }
?>

<!-- MODELO DE TABELA UTILIZADO NA PAGINA INDEX.PHP
<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>$320,800</td>
        </tr>                                            
    </tbody>
</table> -->