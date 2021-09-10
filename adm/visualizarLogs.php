<?php
include_once './cabecalho.php';
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
               try {
                   ace.settings.check('breadcrumbs', 'fixed')
               } catch (e) {
               }
            </script>
        </div>
        <div class="page-content">
            <div class="row">
                <div class="page-header">
                    <h1>
                        SGIM
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Logs de Acessos
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="col-xs-12">
                    <form method="post">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="col-xs-12">
                            <label class="control-label bolder blue">Selecione uma data</label>
                            <select class="select2" name="arquivo" id="condpgt_id" data-placeholder="Escolha uma Data ...">
                                <option value="">&nbsp;</option>
                                <?php
                                $pasta = './logs/';
                                if (is_dir($pasta)) {
                                   foreach (glob("$pasta*.txt") as $arquivo) {
                                      echo '<option value="' . $arquivo . '">' . str_replace('-', '/', substr($arquivo, -12, -4)) . '</option>';
                                   }
                                }
                                ?>
                            </select>
                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="submit">
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                        Carregar
                                    </button>
                                </div>
                            </div>
                    </form>
                    <?php if($_POST) {?>
                       <textarea rows="20" readonly="on">
                          <?php $log = fopen($_POST['arquivo'], 'r');
                              while (!feof($log)){
                                 $linha = fgets($log, 4096);
                                 echo $linha.'<br>';
                              }?>
                       </textarea>
                    <?php } ?>
                    <!-- PAGE CONTENT ENDS -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<?php include_once './rodape.php'; ?>