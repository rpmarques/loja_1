<?php
include_once './cabecalho.php';
$msg = '';
if ($_GET) {
    $wID = intval(base64_decode($_GET['id']));
    $marca = $objMarca->selectUM('*', '', " id=" . $wID);
}
if ($_POST) {
    $wID = intval($_POST['id']);
    $wRetorno = $objMarca->delete($wID);
    if ($wRetorno) {
        $msg = "<div class=\"alert alert-success alert-dismissible\">
                           <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                           <h4><i class=\"icon fa fa-check\"></i> Operação realizada com sucesso</h4>
                           Registro Excluido.
                         </div>";
    } else {
        $msg = "<div class=\"alert alert-danger alert-dismissible\">
                           <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                           <h4><i class=\"icon fa fa-ban\"></i> Erro </h4>
                           Erro ao executar tarefa. Verifique com o suporte,<br>.$wRetorno
                         </div>";
    }
    $marca = $objMarca->selectUM('*', '', "  id=" . $wID);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <?php
        echo $msg;
        if (!empty($marca)) {
            ?>
            <!-- Default box -->
            <div class="box">
                <form role="form" method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $marca->id; ?>">
                    <div class="box-header with-border">
                        <h3 class="box-title">Exclusão de Marca</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nome </label>
                                <input type="text" class="form-control" placeholder="Nome " name="nome" value="<?php echo $marca->nome; ?>">
                            </div>
                        </div>
                    </div> <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-danger "><i class="fa fa-eraser"></i> Excluir</button>
                    </div> <!-- /.box-footer-->
                </form>
            </div> <!-- /.box -->
        <?php } ?>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php include_once './rodape.php'; ?>