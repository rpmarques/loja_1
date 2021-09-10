<?php
include_once './cabecalho.php';
$nomeArquivoPHP = pathinfo(__FILE__);
$wArquivo = $nomeArquivoPHP['basename'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Listagem de Clientes</h3> <a href="./clienteIncluir.php"><i class="fa fa-plus"> INCLUIR </i></a>
            </div>
            <div class="box-body">
                <table id="tabela" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone 1</th>
                            <th>Telefone 2</th>
                            <th>Email</th>
                            <th >Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        Logger('arquivo:[' . $wArquivo . ' ] - vamos tentar listar CLIENTE ');
                        $wSaida = '';
                        $wWhere = ' WHERE empresa_id=' . EMPRESA_ID;
                        if ($wLista = $objCliente->select('*', '', $wWhere, '', '')) {
                            Logger('arquivo:[' . $wArquivo . ' ] - ok - vamos tentar listar CLIENTE ');
                            foreach ($wLista as $linhaDB) {
                                echo '<tr>'; //início linha
                                echo '<td>' . $linhaDB->nome . '</td>';
                                echo '<td>' . $linhaDB->fone1 . '</td>';
                                echo '<td>' . $linhaDB->fone2 . '</td>';
                                echo '<td>' . $linhaDB->email . '</td>';
                                echo '<td>';
                                echo '<a class = "btn btn-primary btn-xs" href = "clienteAlterar.php?id=' . base64_encode($linhaDB->id) . '"><i class = "fa fa-edit"></i> Editar </a> ';
                                echo '<a class = "btn btn-danger btn-xs" href = "clienteExcluir.php?id=' . base64_encode($linhaDB->id) . '"><i class = "fa fa-eraser"></i> Exluir </a>';
                                echo '</td>';
                                echo '</tr>'; // FIM LINHA
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div> <!-- /.box-body -->
        </div> <!-- /.box -->
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php include_once './rodape . php'; ?>