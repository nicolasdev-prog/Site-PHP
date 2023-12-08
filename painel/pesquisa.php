<?php
    session_start();
    if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)){
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        header('Location: ../index.html');
    }
    require('conecta.php');
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

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title text-primary font-weight-bold">Pesquisa de clientes</h2>
            </div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite uma inicial do nome do cliente...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" onclick="buscarClientes()">
                            <i class="fa fa-search"></i> Pesquisar
                        </button>
                    </div>
                </div>
                <div id="resultado"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function buscarClientes() {
        var nome = document.getElementById('nome').value;
        $.ajax({
            type: 'post',
            url: 'pesquisa_cliente.php',
            data: {
                nome: nome
            },
            success: function (response) {
                document.getElementById('resultado').innerHTML = response;
            }
        });
    }
</script>

<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
