<?php
include_once './cabecalho.php';
$msg = '';
if ($_POST) {
    $wNome = $_POST['nome'];
    $retorno = $objMarca->insert($wNome);
    if ($retorno) {
        Logger('conseguimos inserir uma marca');
        $msg = "<div class=\"alert alert-success\">
               <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
               <strong><i class=\"ace-icon fa fa-check\"></i>Operação realizada com sucesso!</strong>
               <br>Registro incluido.<br />
            </div>";
    } else {
        Logger('não conseguimos inserir uma marca');
        $msg = "<div class=\"alert alert-danger\">
               <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
               <strong><i class=\"ace-icon fa fa-times\"></i>Operação não realizada, verifique com o Suporte</strong>
               <br />
             </div>";
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <?php echo $msg; ?>
        <!-- Default box -->
        <div class="box">
            <form role="form" method="post">
                <div class="box-header with-border">
                    <h3 class="box-title">Inclusão de Marca</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome </label>
                            <input type="text" class="form-control" placeholder="Nome " name="nome">
                        </div>
                    </div>
                </div> <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary "><i class="fa fa-check"></i> Gravar</button>
                </div> <!-- /.box-footer-->
            </form>
        </div> <!-- /.box -->
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php include_once './rodape.php'; ?>