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
            <form action="cadastra_usuario.php" method="POST" class="p-3">
            <div class="card-header">
                <h2 class="card-title text-primary font-weight-bold">Inserir novo usuario no sistema</h2>
            </div>
                <div class="mb-3">
                    <label for="nome_usuario" class="form-label">Nome do Usuário</label>
                    <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" required>
                </div>

                <div class="mb-3">
                    <label for="email_usuario" class="form-label">Email do Usuário</label>
                    <input type="email" class="form-control" id="email_usuario" name="email_usuario" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar Novo Usuário</button>
            </form>
        </div>
    </div>
</div>

<?php

require('conecta.php');

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se os campos obrigatórios estão vazios
    if (empty($_POST['nome_usuario']) || empty($_POST['email_usuario']) || empty($_POST['senha'])) {
        // Manipule o caso em que os campos obrigatórios não estão preenchidos
        echo "Todos os campos são obrigatórios. Por favor, preencha todos os campos obrigatórios.";
        // Você pode redirecionar de volta ao formulário ou exibir uma mensagem de erro conforme necessário
    } else {
        // Processe os dados do formulário, pois todos os campos obrigatórios estão preenchidos
        // Adicione seu código aqui para inserir os dados no banco de dados ou realizar outras ações

        // Verificação de duplicatas
        $nome_usuario = $_POST['nome_usuario'];
        $email_usuario = $_POST['email_usuario'];

        // Verifique se já existe um usuário com o mesmo nome de usuário ou e-mail
        $sql_duplicate_check = "SELECT * FROM usuarios WHERE nome_usuario = ? OR email_usuario = ?";
        $stmt = $conexao->prepare($sql_duplicate_check);
        $stmt->bind_param("ss", $nome_usuario, $email_usuario);
        $stmt->execute();
        $result_duplicate_check = $stmt->get_result();

        if ($result_duplicate_check->num_rows > 0) {
            echo "Já existe um usuário com o mesmo nome de usuário ou e-mail. Por favor, escolha informações exclusivas.";
            // Você pode redirecionar de volta ao formulário ou exibir uma mensagem de erro conforme necessário
        } else {
            // Todos os checks passaram, continue com a inserção no banco de dados
            // Adicione seu código para inserir dados no banco de dados aqui
        }

        // Feche a declaração preparada
        $stmt->close();
    }
}
?>



<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
