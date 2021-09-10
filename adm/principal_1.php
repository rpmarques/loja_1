<?php
include_once './cabecalho.php';
//CONTAS À PAGAR EM ABERTO COM O VENCIMENTO ATÉ HOJE
//$objContasPagar = ContasPagar::getInstance(Conexao::getInstance());
//$listaContaPagar = $objContasPagar->select(" WHERE ctp.data_venc <='" . date('Y-m-d') . "'");
//$wSaidaCTP = '';
//foreach ($listaContaPagar as $linhaDB) {
//   $auxDataPG = formataData($linhaDB->data_pg) == '00/00/0000' ? '' : formataData($linhaDB->data_pg);
//   $auxParcela = $linhaDB->nro_parcela === '0' ? '' : $linhaDB->nro_parcela . '/' . $linhaDB->total_parcelas;
//   $auxValorPG = formataMoeda($linhaDB->valor_pg) === '0,00' ? '' : formataMoeda($linhaDB->valor_pg);
//   $wSaidaCTP .= '<tr>
//                  <td>' . $linhaDB->nro_doc . '</td>
//                  <td>' . $auxParcela . '</td>
//                  <td>' . formataData($linhaDB->data_mov) . '</td>
//                  <td>' . formataData($linhaDB->data_venc) . '</td>
//                  <td>' . formataMoeda($linhaDB->valor) . '</td>
//                  <td>' . $auxValorPG . '</td>
//                  <td>' . $auxDataPG . '</td>
//                  <td>' . $linhaDB->fornecedor_id . ' - ' . $linhaDB->nome_fornec . '</td>
//                  <td>';
//   if ($linhaDB->nro_parcela <> '0') {
//      $wSaidaCTP .= ' <a class="btn btn-primary btn-minier" href="contasPagarQuitar.php?id=' . base64_encode($linhaDB->id) . '"><i class="fa fa-edit"></i> Baixar Título </a> 
//                                <a class="btn btn-warning btn-minier"  href="contasPagarExcluirQuitacao.php?id=' . base64_encode($linhaDB->id) . '"><i class="fa fa-eraser"></i> Exluir Quitação</a>';
//   }
//   $wSaidaCTP .= '<a class="btn btn-danger btn-minier"  href="contasPagarExcluir.php?id=' . base64_encode($linhaDB->id) . '"><i class="fa fa-eraser"></i> Exluir</a>
//                  </td>
//              </tr>';
//}
//
////CONTAS À RECEBER PARA HOJE
//$objContasReceber = ContasReceber::getInstance(Conexao::getInstance());
//$listaContaReceber = $objContasReceber->select(" WHERE ctr.data_venc <='" . date('Y-m-d') . "'");
//$wSaidaCTR = '';
//foreach ($listaContaReceber as $linhaDB) {
//   $auxDataPG = formataData($linhaDB->data_pg) == '00/00/0000' ? '' : formataData($linhaDB->data_pg);
//   $auxParcela = $linhaDB->nro_parcela === '0' ? '' : $linhaDB->nro_parcela . '/' . $linhaDB->total_parcelas;
//   $wSaidaCTR .= '<tr>
//                  <td>' . $linhaDB->nro_doc . '</td>
//                  <td>' . $auxParcela . '</td>
//                  <td>' . formataData($linhaDB->data_mov) . '</td>
//                  <td>' . formataMoeda($linhaDB->valor) . '</td>
//                  <td>' . formataMoeda($linhaDB->valor_pg) . '</td>
//                  <td>' . $auxDataPG . '</td>
//                  <td>' . $linhaDB->cliente_id . ' - ' . $linhaDB->nome_cli . '</td>
//                  <td>';
//   if ($linhaDB->nro_parcela <> '0') {
//      $wSaidaCTR .= '<a class="btn btn-primary btn-minier" href="contasReceberQuitar.php?id=' . base64_encode($linhaDB->id) . '"><i class="fa fa-edit"></i> Baixar Título </a> 
//                                   <a class="btn btn-warning btn-minier"  href="contasReceberExcluirQuitacao.php?id=' . base64_encode($linhaDB->id) . '"><i class="fa fa-eraser"></i> Exluir Quitação</a>';
//   }
//   $wSaidaCTR .= '<a class="btn btn-danger btn-minier"  href="contasReceberExcluir.php?id=' . base64_encode($linhaDB->id) . '"><i class="fa fa-eraser"></i> Exluir</a>
//                                  </td>
//              </tr>';
//}
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
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <?php
//                    $objEmpresa = Empresa::getInstance(Conexao::getInstance());
//                    $empresa = $objEmpresa->select();
//                    if (empty($empresa)) { ?>
<!--                      <h3>Atenção. <br>Verificamos que você não cadastrou a sua imobiliária no sistema, para um funcionamento correto, clique no botão abaixo para realizar o cadastro.</h3>
                      <a href="./empresaIncluir.php"     >
                         <button class="btn btn-info" type="button">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Cadastrar Empresa
                        </button>
                      </a>-->
                      
                    <?php                    
//                    }
                    ?>
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <!--CONTAS À PAGAR-->
<!--                <div class="col-xs-12">
                     PAGE CONTENT BEGINS 
                    <div class="clearfix">
                        <div class="pull-right tableTools-container"></div>
                    </div>
                    <div class="table-header">
                        Listagem de Contas à Pagar até Hoje: <?php // echo formataData(date('Y-m-d')); ?>
                    </div>
                    <div>
                        <table id="tabela" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center">Nro Doc</th>
                                    <th>Parcela</th>
                                    <th>Data Mov.</th>
                                    <th>Data Venc.</th>
                                    <th>Valor</th>
                                    <th>Valor PG</th>
                                    <th>Data PG</th>
                                    <th>Fornecedor</th>
                                    <th class="hidden-480">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $wSaidaCTP; ?>
                            </tbody>
                        </table>
                    </div>
                     PAGE CONTENT ENDS 
                </div> /.col -->
                <br>
                <!--CONTAS À RECEBER-->
<!--                <div class="col-xs-12">
                     PAGE CONTENT BEGINS 
                    <div class="clearfix">
                        <div class="pull-right tableTools-container"></div>
                    </div>
                    <div class="table-header">
                        Listagem de Contas à Receber até Hoje: <?php // echo formataData(date('Y-m-d')); ?>
                    </div>
                    <div>
                        <table id="tabela1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center">Nro Doc</th>
                                    <th>Parcela</th>
                                    <th>Data Mov.</th>
                                    <th>Valor</th>
                                    <th>Valor PG</th>
                                    <th>Data PG</th>
                                    <th>Cliente</th>
                                    <th class="hidden-480">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $wSaidaCTR; ?>
                            </tbody>
                        </table>
                    </div>
                     PAGE CONTENT ENDS 
                </div> /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="assets/js/dataTables.tableTools.min.js"></script>
<script src="assets/js/dataTables.colVis.min.js"></script>
<script type="text/javascript">

               jQuery(function ($) {
                   //initiate dataTables plugin
                   $('#tabela')
                           .dataTable({
                               bAutoWidth: false,
                               //                 "aoColumns": [
                               //                    {"bSortable": false},
                               //                    null, null, null, null, null,
                               //                    {"bSortable": false}
                               //                 ],
                               "aaSorting": [],
                               "oLanguage": {
                                   "sProcessing": "Processando...",
                                   "sLengthMenu": "Mostrar _MENU_ registros",
                                   "sZeroRecords": "Não foram encontrados resultados",
                                   "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                                   "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
                                   "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
                                   "sInfoPostFix": "",
                                   "sSearch": "Buscar:",
                                   "sUrl": "",
                                   "oPaginate": {
                                       "sFirst": "Primeiro",
                                       "sPrevious": "Anterior",
                                       "sNext": "Seguinte",
                                       "sLast": "Último"
                                   }
                               }
                           });
                   $('#tabela1')
                           .dataTable({
                               bAutoWidth: false,
                               //                 "aoColumns": [
                               //                    {"bSortable": false},
                               //                    null, null, null, null, null,
                               //                    {"bSortable": false}
                               //                 ],
                               "aaSorting": [],
                               "oLanguage": {
                                   "sProcessing": "Processando...",
                                   "sLengthMenu": "Mostrar _MENU_ registros",
                                   "sZeroRecords": "Não foram encontrados resultados",
                                   "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                                   "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
                                   "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
                                   "sInfoPostFix": "",
                                   "sSearch": "Buscar:",
                                   "sUrl": "",
                                   "oPaginate": {
                                       "sFirst": "Primeiro",
                                       "sPrevious": "Anterior",
                                       "sNext": "Seguinte",
                                       "sLast": "Último"
                                   }
                               }
                           });
               })
</script>
<?php include_once './rodape.php'; ?>