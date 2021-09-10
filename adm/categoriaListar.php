<?php
require_once './cabecalho.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Listagem de Categorias</h3>
            </div>
            <div class="box-body">
                <table id="tabela" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $categorias = $objCategoria->select('*', '', '');
                        foreach ($categorias as $linhaDB) :
                            ?>
                            <tr>
                                <td><?php echo $linhaDB->nome ?></td>
                                <td>
                                    <a class="btn btn-primary btn-xs" href="categoriaAlterar.php?id=<?php echo base64_encode($linhaDB->id) ?>">
                                        <i class="fa fa-edit"></i> Editar</a>
                                    <a class="btn btn-danger btn-xs"  href="categoriaExcluir.php?id=<?php echo base64_encode($linhaDB->id) ?>">
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
<?php require_once './rodape.php'; ?>