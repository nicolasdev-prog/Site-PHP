<?php
session_start();

// Verifica se o usuário está logado
if ((!isset($_SESSION['id']) || !isset($_SESSION['nome']) || !isset($_SESSION['email']))) {
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    header('Location: ../index.html');
}

require('conecta.php');

// Inclui o cabeçalho
include_once('cabecalho.php');

// Inicializa variáveis de dados do cliente (caso esteja na página de edição)
$id_cliente = $nome_cliente = $email_cliente = $cidade = "";

if (isset($_GET['id'])) {
    $id_cliente = $_GET['id'];

    $sql = "SELECT * FROM cadastro WHERE id_cliente = $id_cliente";
    $consulta = $conexao->query($sql);

    while ($dados = $consulta->fetch_assoc()) {
        $id_cliente = $dados['id_cliente'];
        $nome_cliente = $dados['nome_cliente'];
        $email_cliente = $dados['email_cliente'];
        $cidade = $dados['cidade'];
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
            <form action="atualiza_cliente.php?id=<?php echo $id_cliente; ?>" method="POST" class="p-3">
                <div class="mb-3">
                    <label for="nome_cliente" class="form-label">Nome do Cliente</label>
                    <input type="text" class="form-control" id="nome_cliente" name="nome_cliente_novo" value="<?php echo $nome_cliente; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email_cliente" class="form-label">Email do cliente</label>
                    <input type="email" class="form-control" id="email_cliente" name="email_cliente_novo" value="<?php echo $email_cliente; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="cidade" class="form-label">Cidade do cliente</label>
                    <input type="text" class="form-control" id="cidade" name="cidade_novo" value="<?php echo $cidade; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
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
