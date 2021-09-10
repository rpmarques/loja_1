<?php
include_once './cabecalho.php';
$msg = '';
//$objEmpresa = Empresa::getInstance(Conexao::getInstance());
//$empresa = $objEmpresa->selectUM();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <?php echo $msg; ?>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>
            </div>
            <div class="box-body">
                AQUI TRAZ A AGENDA DO DIA, DE CONTAS À PAGAR, RECEBER, E ATENDIMENTOS
                <?php
                if (empty($empresa)) {
                    echo "<br><br>VAI PRA FORM DE CADASTRO DA EMPRESA";
                } else {
                    echo "<br><br>TA 100%";
                }
                ?>
            </div> <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div> <!-- /.box-footer-->
        </div> <!-- /.box -->
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php include_once './rodape.php'; ?>