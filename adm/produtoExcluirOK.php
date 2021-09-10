<?php
include_once './cabecalho.php';
$objProdutos= Produtos::getInstance(Conexao::getInstance());
$msg="";
if ($_POST){
   $produto = $objProdutos->selectUM(" WHERE pro.id=".$_POST['codpro']);
   //APAGA PRODUTO BANCO
   $wRetorno = $objProdutos->delete($_POST["codpro"]);
   if ($wRetorno) {
      //APAGA IMAGENS DO DIRETÓRIO
      if (!empty($produto->foto_1)){$objProdutos->deleteIMG($produto->foto_1);}
      if (!empty($produto->foto_1)){$objProdutos->deleteIMG($produto->foto_2);}
      if (!empty($produto->foto_1)){$objProdutos->deleteIMG($produto->foto_3);}
      if (!empty($produto->foto_1)){$objProdutos->deleteIMG($produto->foto_4);}
      
      $msg = "<div class=\"alert alert-success\">
               <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
               <strong><i class=\"ace-icon fa fa-check\"></i>Operação realizada com sucesso!</strong><br>
                  Registro Excluído.
               <br />
       </div>";
   } else {
      $msg = "<div class=\"alert alert-danger\">
               <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
               <strong><i class=\"ace-icon fa fa-times\"></i>Operação não realizada, verifique com o Suporte</strong><br/>
       </div>";
   }
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <?php echo $msg; ?>
    </section> <!-- /.content -->
  </div> <!-- /.content-wrapper -->
  <?php  include_once './rodape.php';?>