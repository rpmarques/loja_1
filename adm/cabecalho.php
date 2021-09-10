<?php
/* ADM DA LOJA
 * 0.02 - CADASTRO DE MARCAS
 * 0.03 - CADASTRO DE CATEGORIAS */
define('VERSAO', '0.12');
$nomeArquivoPHP = pathinfo(__FILE__);
$wArquivo = $nomeArquivoPHP['basename'];
//DEIXO SOMENTE APARECENDO OS ERROS CRÍTICOS
//error_reporting(E_ERROR|E_PARSE);
// REPORTA TODOS OS ERROS E AVISOS
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once '../classes/funcoes.class.php';
require_once '../classes/logger.class.php';
require_once '../classes/conexao.class.php';
require_once '../classes/usuario.class.php';
$objUsuario = Usuarios::getInstance(Conexao::getInstance());
require_once '../classes/marca.class.php';
$objMarca = Marca::getInstance(Conexao::getInstance());
require_once '../classes/categoria.class.php';
$objCategoria = Categoria::getInstance(Conexao::getInstance());
require_once '../classes/produto.class.php';
$objProduto = Produto::getInstance(Conexao::getInstance());
require_once '../classes/empresa.class.php';
$objEmpresa = Empresa::getInstance(Conexao::getInstance());

session_start();
if (isset($_SESSION['login'])) {
    define('ID', $_SESSION['id']);
    define('LOGIN', $_SESSION['login']);
    define('NOME', $_SESSION['nome']);
    define('DIRETORIOIMAGENS', '../img/produtos/');
} else { //CASO A SESSÃO ESTEJA FECHADA, VAI DIRETO PARA A PÁGINA DE LOGIN
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Retaguarda - Versão: <?php echo VERSAO ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="./plugins/datepicker/datepicker3.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="./plugins/timepicker/bootstrap-timepicker.min.css">

        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="./dist/css/skins/_all-skins.min.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="./plugins/datepicker/datepicker3.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="./plugins/iCheck/all.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="./plugins/colorpicker/bootstrap-colorpicker.min.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="./plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="./plugins/select2/select2.min.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="./plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="./plugins/datatables/dataTables.bootstrap.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="./plugins/iCheck/all.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="./dist/css/skins/_all-skins.min.css">

        <!-- TiniMCE -->
        <script src="./plugins/tinymce/tinymce.min.js"></script>
        <!--<script src="./plugins/tinymce/langs/pt_BR.js"></script>-->
        <script>tinymce.init({
                selector: 'textarea',
                language: "pt_BR",
                plugins: ['advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'],
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            });
        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="./principal.php" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Retaguarda</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!--Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                                    <span class="hidden-xs"><?php echo NOME; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                                        <p>
                                            <?php echo NOME; ?>
                        <!--                  <small>Member since Nov. 2012</small>-->
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <!--              <li class="user-body">
                                                    <div class="row">
                                                      <div class="col-xs-4 text-center">
                                                        <a href="#">Followers</a>
                                                      </div>
                                                      <div class="col-xs-4 text-center">
                                                        <a href="#">Sales</a>
                                                      </div>
                                                      <div class="col-xs-4 text-center">
                                                        <a href="#">Friends</a>
                                                      </div>
                                                    </div> /.row
                                                  </li>-->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="./logout.php" class="btn btn-default btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- =============================================== -->
            <?php require_once './menu.php'; ?>
            <!-- =============================================== -->