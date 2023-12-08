<?php
    session_start();
    if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)){
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        header('Location: ../index.html');
    }
    require('conecta.php');
?>
<?php
    include_once('cabecalho.php');
?>
<?php

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se os campos obrigatórios estão vazios
    if (empty($_POST['nome_cliente']) || empty($_POST['email_cliente']) || empty($_POST['cidade'])) {
        // Manipule o caso em que os campos obrigatórios não estão preenchidos
        echo "Todos os campos são obrigatórios. Por favor, preencha todos os campos obrigatórios.";
        // Você pode redirecionar de volta ao formulário ou exibir uma mensagem de erro conforme necessário
    } else {
        // Processe os dados do formulário, pois todos os campos obrigatórios estão preenchidos
        // Adicione seu código aqui para inserir os dados no banco de dados ou realizar outras ações
    }
}
?>
<?php
// ... (seu código existente)

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se os campos obrigatórios estão vazios
    if (empty($_POST['nome_cliente']) || empty($_POST['email_cliente']) || empty($_POST['cidade'])) {
        // Manipule o caso em que os campos obrigatórios não estão preenchidos
        echo "Todos os campos são obrigatórios. Por favor, preencha todos os campos obrigatórios.";
        // Você pode redirecionar de volta ao formulário ou exibir uma mensagem de erro conforme necessário
    } else {
        // Processe os dados do formulário, pois todos os campos obrigatórios estão preenchidos
        // Adicione seu código aqui para inserir os dados no banco de dados ou realizar outras ações

        // Verificação de duplicatas
        $nome_cliente = $_POST['nome_cliente'];
        $email_cliente = $_POST['email_cliente'];

        // Verifique se já existe um cliente com o mesmo nome
        $sql_nome = "SELECT * FROM cadastro WHERE nome_cliente = '$nome_cliente'";
        $result_nome = $conexao->query($sql_nome);

        if ($result_nome->num_rows > 0) {
            echo "Já existe um cliente com o mesmo nome. Por favor, escolha outro nome.";
            // Você pode redirecionar de volta ao formulário ou exibir uma mensagem de erro conforme necessário
        } else {
            // Verifique se já existe um cliente com o mesmo e-mail
            $sql_email = "SELECT * FROM cadastro WHERE email_cliente = '$email_cliente'";
            $result_email = $conexao->query($sql_email);

            if ($result_email->num_rows > 0) {
                echo "Já existe um cliente com o mesmo e-mail. Por favor, escolha outro e-mail.";
                // Você pode redirecionar de volta ao formulário ou exibir uma mensagem de erro conforme necessário
            } else {
                // Todos os checks passaram, continue com a inserção no banco de dados
                // Adicione seu código para inserir dados no banco de dados aqui
            }
        }
    }
}

?>

<div class="content mt-3">
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="card">
            <form action="insere_cliente.php" method="POST" class="p-3">
                <div class="mb-3">
                    <label for="nome_cliente" class="form-label">Nome do Cliente</label>
                    <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" required>
                </div>

                <div class="mb-3">
                    <label for="email_cliente" class="form-label">Email do Cliente</label>
                    <input type="email" class="form-control" id="email_cliente" name="email_cliente" required>
                </div>

                <div class="mb-3">
                    <label for="cidade" class="form-label">Cidade do Cliente</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" required>
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
</div>


<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
