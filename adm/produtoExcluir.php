<?php
include_once './cabecalho.php';
$msg = '';
if ($_GET) {
    $wID = intval(base64_decode($_GET['id']));
    $produto = $objProduto->selectUM('*', '', "id=$wID");
}
if ($_POST) {
    $wID = intval($_POST['id']);
    $produto = $objProduto->selectUM('id,foto_1', '', "id=$wID");
    $retorno = $objProduto->delete($wID);
    if (!empty($produto->foto_1)) {
        escreve("tem imagem, vai apagar");
        $retIMG = $objProduto->deleteIMG($produto->foto_1);
    } else {
        escreve("NÃO tem imagem");
    }
    if ($retorno) {
        $msg = "<div class = \"alert alert-success\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
                  <strong><i class=\"ace-icon fa fa-check\"></i>Operação realizada com sucesso!</strong>
                  <br>Registro EXCLUÍDO.<br />
               </div>";
    } else {
        $msg = "<div class=\"alert alert-danger\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
                  <strong><i class=\"ace-icon fa fa-times\"></i>Operação não realizada, verifique com o Suporte</strong>
                  <br />
                </div>";
    }
    $produto = $objProduto->selectUM('*', '', "id=$wID");
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <?php
        echo $msg;
        if (!empty($produto)):
            ?>
            <!-- Default box -->
            <div class="box">
                <form role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $produto->id; ?>">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edição de Produtos</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control"  name="nome" value="<?php echo $produto->nome; ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descrição 1 </label>
                                <p>Até 270 caracteres</p>
                                <textarea  name="descricao_1" rows="10" cols="80" maxlength="300"><?php echo $produto->descricao_1; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label>Valor</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input type="text" name="preco" id="valor" class="form-control" value="<?php echo $produto->preco; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Categoria</label>
                                <?php echo $objCategoria->montaSelect('categoria_id', $produto->categoria_id); ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Marca</label>
                                <?php echo $objMarca->montaSelect('marca_id', $produto->marca_id); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Informações Técnicas</label>
                                <textarea name="inf_tecnica" rows="10" cols="80"><?php echo $produto->inf_tecnica; ?></textarea>
                            </div>
                        </div> <!-- /.col -->
                    </div> <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-danger "><i class="fa fa-trash-o"></i> Excluir</button>
                    </div> <!-- /.box-footer-->
                </form>
            </div> <!-- /.box -->
        <?php endif; ?>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php include_once './rodape.php'; ?>