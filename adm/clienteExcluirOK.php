<?php
include_once './cabecalho.php';
$msg="";
if ($_POST){
   $wRetorno   = $objClientes->delete($_POST["id"]);
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
                Erro ao executar tarefa. Verifique com o suporte, 
              </div>";
   }
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
          <?php echo $msg;?>
      </div> <!-- /.box -->
    </section> <!-- /.content -->
  </div> <!-- /.content-wrapper -->
  <?php  include_once './rodape.php';?>
