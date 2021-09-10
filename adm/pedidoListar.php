<?php
include_once './cabecalho.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Pedidos</h3>
            </div>
            <div class="box-body">
                <table id="tabela" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Situação</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <input type="checkbox" class="minimal" checked="on" disabled="" rea>
                        <?php
                        $wSaida = '';
                        $wLista = $objCarrinho->select();
                        foreach ($wLista as $linhaDB) {
                           echo '<tr>
                                    <td>' . formataData($linhaDB->datac) . '</td>
                                    <td>' . $linhaDB->nome_cli . '</td>
                                    <td>' . formataMoeda($linhaDB->valor_liquido) . '</td>
                                    <td> SITUAÇÃO </td>
                                    <td>
                                       <a class="btn btn-primary btn-xs" href="carrinhoVisualizar.php?id=' . base64_encode($linhaDB->chave) . '">
                                          <i class="fa fa-edit"></i> Editar </a> 
                                       <a class="btn btn-danger btn-xs"  href="carrinhoExcluir.php?id=' . base64_encode($linhaDB->chave) . '">
                                          <i class="fa fa-eraser"></i> Exluir </a>
                                    </td>
                           </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div> <!-- /.box-body -->
        </div> <!-- /.box -->
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php include_once './rodape.php'; ?>