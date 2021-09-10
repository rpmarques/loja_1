<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Versão</b> <?php echo VERSAO; ?>
    </div>
    <center>Desenvolvido por <strong><a href="https://www.facebook.com/ricardo.marques.80" target="_blank">Ricardo P. Marques</a>.</strong> Todos os direitos reservados.</center>
</footer>
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div> <!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="./plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="./bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="./plugins/select2/select2.full.min.js"></script>
<script src="./plugins/select2/i18n/pt-BR.js"></script>
<!-- InputMask -->
<!--<script src="./plugins/input-mask/jquery.inputmask.js"></script>
<script src="./plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="./plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="./plugins/input-mask/phone-codes/phone-codes.json"></script>-->
<!--MaskedInput-->
<script src="./plugins/maskedinput/jquery.maskedinput.min.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="./plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="./plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="./plugins/datepicker/locales/bootstrap-datepicker.pt-BR.js"></script>
<!-- bootstrap color picker -->
<script src="./plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="./plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="./plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="./plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="./plugins/fastclick/fastclick.js"></script>
<!-- PriceFormar -->
<script src="./plugins/priceFormat/price_format.2.0.min.js"></script>
<!-- DataTables -->
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>

<!-- Page script -->
<script>
    $(function() {
        //MÁSCARAS
        $('#cnpj').mask('99.999.999/9999-99');
        $('#fone1').mask('(99)-9999-9999?9');
        $('#fone2').mask('(99)-9999-9999?9');
        $('#cpf').mask('999.999.999-99');
        $('#insc_est').mask('999/9999999');
        $('#cep').mask('99999-999');
//iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
//Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
//Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
//Initialize Select2 Elements
        $(".select2").select2({
            language: "pt-BR"
        });

//Date picker
        $('#data_cad').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            autoclose: "true",
            immediateUpdates: "true",
            todayHighlight: "true",
            showOtherMonths: "true",
            selectOtherMonths: "false"
        });
        $('#data_pg').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            autoclose: "true",
            immediateUpdates: "true",
            todayHighlight: "true",
            showOtherMonths: "true",
            selectOtherMonths: "false"
        });
        $('#data_venc').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            autoclose: "true",
            immediateUpdates: "true",
            todayHighlight: "true",
            showOtherMonths: "true",
            selectOtherMonths: "false"
        });
        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
        $('#valor').priceFormat({
            //http://jquerypriceformat.com/
            allowNegative: false, //PERMITE N�MEROS NEGATIVOS
            centsLimit: 2, //CASAS DECIMAIS DEPOIS DA VIRGULA
            prefix: '', //SE VAI O SIMBOLO MONET�RIO
            centsSeparator: ',', //SEPARADOR DECIMAL
            thousandsSeparator: '.' //SEPARADOR DE MILHAR
        });
        $('#valor_antigo').priceFormat({
            //http://jquerypriceformat.com/
            allowNegative: false, //PERMITE N�MEROS NEGATIVOS
            centsLimit: 2, //CASAS DECIMAIS DEPOIS DA VIRGULA
            prefix: '', //SE VAI O SIMBOLO MONET�RIO
            centsSeparator: ',', //SEPARADOR DECIMAL
            thousandsSeparator: '.' //SEPARADOR DE MILHAR
        });
    });
</script>
<script type="text/javascript">
    jQuery(function($) {
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

    })
</script>
</body>
</html>