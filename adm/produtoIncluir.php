<?php
require_once './cabecalho.php';
$msg = '';
$nomeArquivoFoto = '';
if (isset($_POST)) {
    //GRAVAR A MARCA DO MODAL

    if (!empty($_POST['nomeMarca'])) {
        $wNomeMarca = $_POST['nomeMarca'];
        $retorno = $objMarca->insert($wNomeMarca);
        if (!$retorno) {
            escreve("Algo errado não esta certo, verificque com o suporte - MODAL MARCA");
        }
    }
    // GRAVAR CATEGORIA DO MODAL
    if (!empty($_POST['nomeCategoria'])) {
        $wNomeCategoria = $_POST['nomeCategoria'];
        $retorno = $objCategoria->insert($wNomeCategoria);
        if (!$retorno) {
            escreve("Algo errado não esta certo, verificque com o suporte - MODAL CATEGORIA");
        }
    }



    if (!empty($_POST['nome'])) {
        $wNome = $_POST['nome'];
        $wDescricao_1 = $_POST['descricao_1'];
        $wInf_tecnica = $_POST['inf_tecnica'];
        $wPreco = $_POST['preco'];
        $wCategoriaID = intval($_POST['categoria_id']);
        $wMarcaID = intval($_POST['marca_id']);
        $wFoto_1 = '';
        //PEGAR O DEPARTAMENTO QUE A CATEGORIA ESTA LIGADA
        if ($wCategoriaID <> 0):
            $categoria = $objCategoria->selectUM('*', '', " id=$wCategoriaID");
        endif;

        if (!empty($_FILES["foto"]["name"])) {
            $wNomeArquivo = $_FILES["foto"]["name"];
            $wNomeTemporario = $_FILES["foto"]["tmp_name"];
            $wExtensao = strtolower(substr($_FILES['foto']['name'], -4));
            $wTamanho = $_FILES["foto"]["size"];
            $wTamanhoPadrao = 1024 * 1024 * 2; // 2Mb

            if ($wTamanho < $wTamanhoPadrao) {
                // BACALHAU PARA NÃO REPETIR O NOME DO PRODUTO
                $wNovoNome = 'pro_' . uniqid(time()) . $wExtensao;
                //FAZ O UPLOAD DOS ARQUIVOS
                if (move_uploaded_file($wNomeTemporario, (DIRETORIOIMAGENS . $wNovoNome))) {
                    $wFoto_1 = $wNovoNome;
                    Logger("GRAVOU IMAGEM EM [" . DIRETORIOIMAGENS . $wNovoNome . "]");
                    $msg .= "<div class=\"alert alert-success\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
                                <strong><i class=\"ace-icon fa fa-check\"></i>Upload realizado com sucesso!</strong>
                                <br>Imagem salva.<br />
                                </div>";
                    // VAI GRAVAR NO BANCO
                    $retorno = $objProduto->insert($wNome, $wDescricao_1, $wPreco, $wFoto_1, $wCategoriaID, $wMarcaID, $wInf_tecnica);
                    if ($retorno) {
                        $msg .= "<div class=\"alert alert-success\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
                                <strong><i class=\"ace-icon fa fa-check\"></i>Upload realizado com sucesso!</strong>
                                <br>Registro incluido.<br />
                                </div>";
                    } else {
                        $msg .= "<div class=\"alert alert-warning\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
                            <strong><i class=\"ace-icon fa fa-check\"></i>Upload NÃO realizado, TAMANHO SUPERIOR AO PERMITIDO!</strong>
                            <br>Registro NÃO incluido.<br />
                            </div>";
                    }
                }
            } else { //VEM PRA CÁ CASO NÃO FAÇA UPLOAD
                $msg .= "<div class=\"alert alert-warning\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
                            <strong><i class=\"ace-icon fa fa-check\"></i>Upload NÃO realizado, TAMANHO SUPERIOR AO PERMITIDO!</strong>
                            <br>NÃO GRAVOU IMAGEM.<br />
                            </div>";
            }
        } else {
            $retorno = $objProduto->insert($wNome, $wDescricao_1, $wPreco, $wFoto_1, $wCategoriaID, $wMarcaID, $wInf_tecnica);
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
        }
    }
}
/*
  if (contaTexto($wDescricao_1) < 300) {
  //VERIFICA SE TEM CATEGORIA
  //            if ($_POST['categoria_id'] <> '') {
  // FAÇO ISSO PRA PEGAR O DEPARTAMENTO PARA INSERIR NO PRODUTO
  $auxCategoria = $objCategoria->selectUM(" WHERE cat.id=" . $_POST['categoria_id']);
  //VERIFICA SE TEM VALOR
  if ($_POST['valor'] <> '') {
  // FOTOS
  if (isset($_FILES)) {
  for ($i = 0; $i < $nroFotos; $i++) {
  //SÓ FAZ SE TIVER ARQUIVO
  if (!empty($_FILES['arquivo']['name'][$i])) {
  // Informações do arquivo enviado
  $wNomeArquivo = $_FILES["arquivo"]["name"][$i];
  $wNomeTemporario = $_FILES["arquivo"]["tmp_name"][$i];
  $wExtensao = strtolower(substr($_FILES['arquivo']['name'][$i], -4));
  $wTamanho = $_FILES["arquivo"]["size"][$i];
  $wTamanhoPadrao = 1024 * 1024 * 2; // 2Mb
  // TESTA SE O ARQUIVO ULTRAPASSOU 2MB (PADRÃO DO PHP) NÃO FAZ
  if ($wTamanho < $wTamanhoPadrao) {
  // BACALHAU PARA NÃO REPETIR O NOME DO PRODUTO
  $wNovoNome = 'pro_' . uniqid(time()) . $wExtensao;
  //FAZ O UPLOAD DOS ARQUIVOS
  if (move_uploaded_file($wNomeTemporario, (DIRETORIOIMAGENS . $wNovoNome))) {
  $nomeArquivoFoto[$i] = $wNovoNome;
  Logger("GRAVOU IMAGEM EM [" . DIRETORIOIMAGENS . $wNovoNome . "]");
  $msg .= "<div class=\"alert alert-success\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
  <strong><i class=\"ace-icon fa fa-check\"></i>Upload realizado com sucesso!</strong>
  <br>Registro incluido.<br />
  </div>";
  // VAI GRAVAR NO BANCO
  }
  } else { //VEM PRA CÁ CASO NÃO FAÇA UPLOAD
  $msg .= "<div class=\"alert alert-warning\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
  <strong><i class=\"ace-icon fa fa-check\"></i>Upload NÃO realizado, TAMANHO SUPERIOR AO PERMITIDO!</strong>
  <br>Registro NÃO incluido.<br />
  </div>";
  }
  }
  }
  }

  $retorno = $objProduto->insert($_POST['nome'], $_POST['descricao_1'], $_POST['descricao_2'], $_POST['valor'], $auxDestaque, $auxDisponivel, $_POST['categoria_id'], $_POST['marca_id'], $nomeArquivoFoto[0], $nomeArquivoFoto[1], $nomeArquivoFoto[2], $nomeArquivoFoto[3], $auxCategoria->departamento_id);
  if ($retorno) {
  $msg .= "<div class=\"alert alert-success\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
  <strong><i class=\"ace-icon fa fa-check\"></i>Operação realizada com sucesso!</strong>
  <br>Registro incluido.<br />
  </div>";
  } else {
  $msg .= "<div class=\"alert alert-danger\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
  <strong><i class=\"ace-icon fa fa-times\"></i>Operação não realizada, verifique com o Suporte</strong>
  <br />
  </div>";
  }
  } else { //VALOR
  $msg .= "<div class=\"alert alert-warning\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
  <strong><i class=\"ace-icon fa fa-check\"></i>Verifique as inconsistências!</strong>
  <br>VALOR não informado.<br />
  </div>";
  }
  //            } else { //CATEGORIA
  //                $msg .= "<div class=\"alert alert-warning\">
  //              <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
  //              <strong><i class=\"ace-icon fa fa-check\"></i>Verifique as inconsistências!</strong>
  //              <br>CATEGORIA não informado.<br />
  //           </div>";
  //            }
  } else { //DESCRICAO_1
  $msg .= "<div class=\"alert alert-warning\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button>
  <strong><i class=\"ace-icon fa fa-check\"></i>Verifique as inconsistências!</strong>
  <br>DESCRIÇÃO 1 com mais de 300 caracteres, verifique.<br />
  </div>";
  }
 */
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <?php echo $msg; ?>
        <!-- Default box -->
        <div class="box">
            <form role="form" method="post" enctype="multipart/form-data" action="">
                <div class="box-header with-border">
                    <h3 class="box-title">Inclusão de Produtos</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" placeholder="Nome " name="nome">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descrição 1</label>
                            <textarea name="descricao_1" rows="10" cols="80"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-2">
                        <label>Valor</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                            <input type="text" name="preco" id="valor" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Departamento / Categoria</label>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalCategoria">Nova Categoria</button>
                            <?php echo $objCategoria->montaSelect('categoria_id', ''); ?>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Marca </label>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalMarca">Nova Categoria</button>
                            <?php echo $objMarca->montaSelect('marca_id', ''); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-camera-retro"></i> Fotos</h4></a></li>
                                <li><a href="#tab_2" data-toggle="tab">Informações Técnicas</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="form-group">
                                        <label>Fotos do Produto</label>
                                        <label>Tamanho Máximo 2MB</label>
                                        <input type="file" name="foto">
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="form-group">
                                        <label>Informações Técnicas</label>
                                        <textarea name="inf_tecnica" rows="10" cols="80"></textarea>
                                    </div>
                                </div> <!-- /.tab-pane -->
                            </div> <!-- /.tab-content -->
                        </div> <!-- nav-tabs-custom -->
                    </div> <!-- /.col -->
                </div> <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary "><i class="fa fa-check"></i> Gravar</button>
                </div> <!-- /.box-footer-->
            </form>
        </div> <!-- /.box -->
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php
require_once './modalCategria.php';
require_once './modalMarca.php';
require_once './rodape.php';
?>