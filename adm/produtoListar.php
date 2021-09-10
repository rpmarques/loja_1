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
                <h3 class="box-title">Listagem de Produtos</h3>
            </div>
            <div class="box-body">
                <table id="tabela" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $wCampos = 'id,nome,preco';
                        Logger('vamos procurar os produtos');
                        $produtos = $objProduto->select($wCampos, '', '');
                        foreach ($produtos as $linhaDB) :
                            ?>
                            <tr>
                                <td><?php echo $linhaDB->id; ?></td>
                                <td><?php echo $linhaDB->nome; ?></td>
                                <td><?php echo formataMoeda($linhaDB->preco) ?></td>
                                <td>
                                    <a class="btn btn-success btn-xs" href="produtoAlterarPreco.php?id=<?php echo base64_encode($linhaDB->id) ?>">
                                        <i class="fa fa-dollar"></i> Alterar Preço </a>
                                    <a class="btn btn-primary btn-xs" href="produtoAlterar.php?id=<?php echo base64_encode($linhaDB->id) ?>">
                                        <i class="fa fa-edit"></i> Editar </a>
                                    <a class="btn btn-danger btn-xs"  href="produtoExcluir.php?id=<?php echo base64_encode($linhaDB->id) ?>">
                                        <i class="fa fa-eraser"></i> Exluir </a>
                                </td>
                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>
                </table>
            </div> <!-- /.box-body -->
        </div> <!-- /.box -->
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php include_once './rodape.php'; ?>