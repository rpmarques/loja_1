<?php
require_once './cabecalho.php';
$msg = '';
$wID = intval(base64_decode($_GET['id']));
$produto = $objProduto->selectUM('id,nome,preco,preco_antigo', '', " id=$wID");
if ($_POST):
    //$retorno = $objProduto->atualizaPreco($wID, $_POST['preco']);
    $retorno = $objProduto->atualizaPreco($wID, $produto->preco, $_POST['preco']);
    if ($retorno) {
        $msg = "<div class=\"alert alert-success\">
               <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
               <strong><i class=\"ace-icon fa fa-check\"></i>Operação realizada com sucesso!</strong>
               <br>Preço alterado.<br />
            </div>";
    } else {
        $msg = "<div class=\"alert alert-danger\">
               <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
               <strong><i class=\"ace-icon fa fa-times\"></i>Operação não realizada, verifique com o Suporte</strong>
               <br />
             </div>";
    }
    $produto = $objProduto->selectUM('id,nome,preco,preco_antigo', '', " id=$wID");
endif;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <?php echo $msg; ?>
        <!-- Default box -->
        <div class="box">
            <form role="form" method="post" enctype="multipart/form-data" action="">
                <input type="hidden" name="id" value="<?php echo $produto->id; ?>">
                <div class="box-header with-border">
                    <h3 class="box-title">Alteração de Preços</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control input-lg" placeholder="Nome " name="nome" value="<?php echo $produto->nome; ?>" disabled="off">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label>Preço Atual</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                            <input type="text" name="preco_antigo" id="valor_antigo" class="form-control " value="<?php echo formataMoeda($produto->preco); ?>" disabled="on"/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label>Novo Preço</label>
                        <div class="input-group">
                            <span class="input-group-addon "><i class="fa fa-dollar"></i></span>
                            <input type="text" name="preco" id="valor" class="form-control" />
                        </div>
                    </div>
                </div> <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success "><i class="fa fa-check"></i> Atualizar Preços</button>
                </div> <!-- /.box-footer-->
            </form>
        </div>
        <br>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Últimas 10 alterações de preços</h3>
            </div>
            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Data da Alteração</th>
                        <th>Preço Antigo</th>
                        <th>Preco Atual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $produtos = $objProduto->ultimasAlteracoesPrecos('*', '', " produto_id=$produto->id", " id DESC LIMIT 10");
                    foreach ($produtos as $linhaDB) :
                        ?>
                        <tr>
                            <td><?php echo formataData($linhaDB->data_cad); ?></td>
                            <td><?php echo 'R$ ' . formataMoeda($linhaDB->preco_antigo); ?></td>
                            <td><?php echo 'R$ ' . formataMoeda($linhaDB->preco_atual); ?></td>
                        </tr>
                    <?php endforeach;
                    ?>
                </tbody>
            </table>
        </div> <!-- /.box -->
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php
require_once './rodape.php';
?>