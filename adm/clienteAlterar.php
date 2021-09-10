<?php
include_once './cabecalho.php';
$nomeArquivoPHP = pathinfo(__FILE__);
$wArquivo = $nomeArquivoPHP['basename'];
$msg = '';
if ($_GET) {
    $wClienteID = base64_decode($_GET['id']);
    Logger('arquivo:[' . $wArquivo . ' ] - vamos tentar localizar CLIENTE id[' . $wClienteID . ']');
    $wWhere = ' WHERE id=' . $wClienteID . ' AND empresa_id=' . EMPRESA_ID;
    if ($cliente = $objCliente->selectUM('*', '', $wWhere, '', '')) {
        Logger('arquivo:[' . $wArquivo . ' ] - ok - vamos tentar localizar CLIENTE id[' . $wClienteID . ']');
    }
}
if ($_POST) {
    Logger('arquivo:[' . $wArquivo . ' ] - vamos tentar atualizar CLIENTE');
    $retorno = $objCliente->update($_POST['id'], $_POST['nome'], $_POST['cnpj'], $_POST['cpf'], $_POST['rg'], $_POST['fone1'], $_POST['fone2'], $_POST['email'], EMPRESA_ID);
    if ($retorno) {
        Logger('arquivo:[' . $wArquivo . ' ] - ok - vamos tentar atualizar CLIENTE id[' . $wClienteID . ']');
        $msg = "<div class=\"alert alert-success\">
               <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
               <strong><i class=\"ace-icon fa fa-check\"></i>Operação realizada com sucesso!</strong>
               <br>Registro editado.<br />
            </div>";
    } else {
        Logger('arquivo:[' . $wArquivo . ' ] - erro - vamos tentar atualizar CLIENTE id[' . $wClienteID . ']');
        $msg = "<div class=\"alert alert-danger\">
               <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
               <strong><i class=\"ace-icon fa fa-times\"></i>Operação não realizada, verifique com o Suporte</strong>
               <br />
             </div>";
    }
    $wWhere = ' WHERE id=' . $_POST['id'] . ' AND empresa_id=' . EMPRESA_ID;
    $cliente = $objCliente->selectUM('*', '', $wWhere, '', '');
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
                <input type="hidden" name="id" value="<?php echo $cliente->id; ?>">
                <div class="box-header with-border">
                    <h3 class="box-title">Edição de Clientes</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome Completo</label>
                            <input type="text" class="form-control" placeholder="Nome " name="nome" value="<?php echo $cliente->nome; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo $cliente->cnpj; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cliente->cpf; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>RG</label>
                            <input type="text" class="form-control" data-inputmask='"mask": "9999999999"' data-mask name="rg" value="<?php echo $cliente->rg; ?>">
                        </div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Telefone 1</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                <input class="form-control" name="fone1" id="fone1" value="<?php echo $cliente->fone1; ?>">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Telefone 2</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                <input class="form-control" name="fone2" id="fone2" value="<?php echo $cliente->fone2; ?>">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="" name="email" value="<?php echo $cliente->email; ?>">>
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