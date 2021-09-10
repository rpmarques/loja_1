<?php
require_once './cabecalho.php';
$msg = '';
if ($_GET) {
    $wID = intval(base64_decode($_GET['id']));
    $categoria = $objCategoria->selectUM('*', '', " id=$wID");
}
if ($_POST) {
    $wID = intval($_POST['id']);
    $wNome = $_POST['nome'];
    $retorno = $objCategoria->update($wNome, $wID);
    if ($retorno) {
        $msg = "<div class=\"alert alert-success\">
               <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
               <strong><i class=\"ace-icon fa fa-check\"></i>Operação realizada com sucesso!</strong>
               <br>Registro incluido.<br />
            </div>";
    } else {
        $msg = "<div class=\"alert alert-danger\">
               <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
               <strong><i class=\"ace-icon fa fa-times\"></i>Operação não realizada, verifique com o Suporte</strong>
               <br />
             </div>";
    }
    $categoria = $objCategoria->selectUM('*', '', " id=$wID");
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <?php
        echo $msg;
        ?>
        <!-- Default box -->
        <div class="box">
            <form role="form" method="post" >
                <input type="hidden" name="id" value="<?php echo $categoria->id; ?>">
                <div class="box-header with-border">
                    <h3 class="box-title">Alteração de Categoria</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome </label>
                            <input type="text" class="form-control" placeholder="Nome " name="nome" value="<?php echo $categoria->nome; ?>">
                        </div>
                    </div>
                </div> <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i> Alterar</button>
                </div> <!-- /.box-footer-->
            </form>
        </div> <!-- /.box -->
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php require_once './rodape.php'; ?>