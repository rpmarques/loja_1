<?php
require_once './cabecalho.php';
$msg = '';
$empresa = $objEmpresa->selectUM("*", '', '');
if ($_POST) {
    $wNome = $_POST['nome'];
    $wFone_1 = $_POST['fone_1'];
    $wFone_2 = $_POST['fone_2'];
    $wEmail = $_POST['email'];
    $wEndereco = $_POST['endereco'];
    $wCEP = $_POST['cep'];
    $wBairro = $_POST["bairro"];
    $wCidade = $_POST["cidade"];
    $wUF = $_POST["uf"];
    $wDescricao = $_POST["descricao"];
    //REDES SOCIAIS
    $wFacebook = $_POST['facebook'];
    $wInstagram = $_POST['instagram'];
    //CONFIG. EMAIL
    $wEmailSmtp = $_POST['email_smtp'];
    $wEmailSmtpPorta = $_POST['email_smtp_porta'];
    $wEmailSmtpSll = isset($_POST['email_smtp_ssl']) ? 'TRUE' : 'FALSE';
    $wEmailImap = $_POST['email_imap'];
    $wEmailImapSll = isset($_POST['email_imap_ssl']) ? 'TRUE' : 'FALSE';
    $wEmailImapPorta = $_POST['email_imap_porta'];
    $wEmailNome = $_POST['email_nome'];
    $wEmailUsuario = $_POST['email_usuario'];
    $wEmailSenha = $_POST['email_senha'];
    $retorno = $objEmpresa->update($wNome, $wEndereco, $wBairro, $wCidade, $wUF, $wEmail, $wFone_1, $wFone_2, $wCEP, $wFacebook, $wInstagram, $wDescricao, $wEmailSmtp, $wEmailSmtpPorta, $wEmailSmtpSll, $wEmailImap, $wEmailImapPorta, $wEmailImapSll, $wEmailNome, $wEmailUsuario, $wEmailSenha);

    if ($retorno) {
        $msg = "<div class=\"alert alert-success\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
                  <strong><i class=\"ace-icon fa fa-check\"></i>Operação realizada com sucesso!</strong>
                  <br>Registro alterado.<br />
               </div>";
    } else {
        $msg = "<div class=\"alert alert-danger\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
                  <strong><i class=\"ace-icon fa fa-times\"></i>Operação não realizada, verifique com o Suporte</strong>
                  <br />
                </div>";
    }
    $empresa = $objEmpresa->selectUM("*", '', '');
}
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <?php echo $msg; ?>
        <!-- Default box -->
        <div class="box">
            <form role="form" method="post" enctype="multipart/form-data" action="">
                <div class="box-header with-border">
                    <h3 class="box-title">Dados da Empresa</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nome" value="<?php echo $empresa->nome; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label >Fone 1</label>
                            <input type="text" class="form-control" name="fone_1" value="<?php echo $empresa->fone_1; ?>" id="fone1">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label >Fone 2</label>
                            <input type="text" class="form-control" name="fone_2" value="<?php echo $empresa->fone_2; ?>" id="fone2">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label >Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $empresa->email ?>">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label>Endereço</label>
                            <input type="text" class="form-control" name="endereco" value="<?php echo $empresa->endereco ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>CEP</label>
                            <input type="text" class="form-control" name="cep" value="<?php echo $empresa->cep ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Bairro</label>
                            <input type="text" class="form-control" name="bairro" value="<?php echo $empresa->bairro ?>">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" class="form-control" name="cidade" value="<?php echo $empresa->cidade ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>UF</label>
                            <?php echo selectEstados('uf', $empresa->uf); ?>
                        </div>
                    </div>
                </div> <!-- /.box-body -->
                <div class="box-header with-border">
                    <h3 class="box-title">Descrição</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome</label>
                            <textarea name="descricao" rows="10" cols="80"><?php echo $empresa->descricao ?></textarea>
                        </div>
                    </div>
                </div> <!-- /.box-body -->
                <div class="box-header with-border">
                    <h3 class="box-title">Configurações de Email</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>SMTP</label>
                            <input type="text" class="form-control" name="email_smtp" value="<?php echo $empresa->email_smtp; ?>">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label>Porta</label>
                            <input type="text" class="form-control" name="email_smtp_porta" value="<?php echo $empresa->email_smtp_porta; ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label> Requer SSL</label><br>
                            <input type="checkbox"  name="email_smtp_ssl" value="TRUE" <?php echo $empresa->email_smtp_ssl ? 'checked = "on"' : '' ?>>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>IMAP</label>
                            <input type="text" class="form-control" name="email_imap" value="<?php echo $empresa->email_imap; ?>">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label>Porta</label>
                            <input type="text" class="form-control" name="email_imap_porta" value="<?php echo $empresa->email_imap_porta; ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label> Requer SSL</label><br>
                            <input type="checkbox"  name="email_imap_ssl" value="TRUE"  <?php echo $empresa->email_imap_ssl ? 'checked = "on"' : '' ?>>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label> Nome para Exibição</label><br>
                            <input type="text" class="form-control" name="email_nome" value="<?php echo $empresa->email_nome; ?>">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Usuario</label><br>
                            <input type="text" class="form-control" name="email_usuario" value="<?php echo $empresa->email_usuario; ?>">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Senha</label><br>
                            <input type="text" class="form-control" name="email_senha" value="<?php echo $empresa->email_senha; ?>">
                        </div>
                    </div>
                </div> <!-- /.box-body -->
                <div class="box-header with-border">
                    <h3 class="box-title">Descrição</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome</label>
                            <textarea name="descricao" rows="10" cols="80"><?php echo $empresa->descricao ?></textarea>
                        </div>
                    </div>
                </div> <!-- /.box-body -->
                <div class="box-header with-border">
                    <h3 class="box-title">Redes Sociais</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" class="form-control" name="facebook" value="<?php echo $empresa->facebook; ?>">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Instagram</label>
                            <input type="text" class="form-control" name="instagram" value="<?php echo $empresa->instagram; ?>">
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
<?php
require_once './rodape.php';
?>