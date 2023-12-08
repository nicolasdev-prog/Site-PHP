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
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <!--/.col-->
            <div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Table</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="bootstrap-data-table-export" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>EMAIL</th>
                            <th>CIDADE</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM cadastro";
                        $consulta = $conexao->query($sql);
                        while ($dados = $consulta->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $dados['id_cliente'] . "</td>";
                            echo "<td>" . $dados['nome_cliente'] . "</td>";
                            echo "<td>" . $dados['email_cliente'] . "</td>";
                            echo "<td>" . $dados['cidade'] . "</td>";
                            ?>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="form_atualiza_cliente.php?id=<?php echo $dados['id_cliente']; ?>" class="btn btn-warning btn-sm btn-block">
                                        <i class="fa fa-edit"></i> Atualizar
                                    </a>
                                    <!-- Adicionado uma margem entre os botões -->
                                    <div class="mt-2"></div>
                                    <!-- Modal Trigger Button -->
                                    <button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#apagarModal<?php echo $dados['id_cliente']; ?>">
                                        <i class="fa fa-trash"></i> Apagar
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="apagarModal<?php echo $dados['id_cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="apagarModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="apagarModalLabel">Confirmação</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Tem certeza que deseja apagar?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <a href="apaga_cliente.php?id=<?php echo $dados['id_cliente']; ?>" class="btn btn-danger">Apagar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                </div>
                            </td>
                            <?php
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

            <!--/.col-->
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Fim Painel Direito -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>



    
</body>

</html>
