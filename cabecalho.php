<?php
//CABECALHO DA LOJA
define('LOGIN', 'site');
define('VERSAO', '0.13');
define('DIRETORIOIMAGENS', './img/produtos/');
require_once './classes/funcoes.class.php';
require_once './classes/logger.class.php';
require_once './classes/conexao.class.php';
require_once './classes/marca.class.php';
$objMarca = Marca::getInstance(Conexao::getInstance());
require_once './classes/categoria.class.php';
$objCategoria = Categoria::getInstance(Conexao::getInstance());
require_once './classes/produto.class.php';
$objProduto = Produto::getInstance(Conexao::getInstance());
require_once './classes/empresa.class.php';
$objEmpresa = Empresa::getInstance(Conexao::getInstance());
$empresa = $objEmpresa->selectUM("*", '', '');
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Site meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Loja Virtual <?php echo VERSAO; ?> - SEM CARRINHO DE COMPRAS</title>
        <!-- CSS -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Loja SIMPLES</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item active"><a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="category.php">Categorias</a></li>
                        <!--<li class="nav-item"><a class="nav-link" href="product.php">Produto</a></li>-->
                        <!--<li class="nav-item"><a class="nav-link" href="product.php">Carrinho</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contato</a></li>
                    </ul>

                    <form class="form-inline my-2 my-lg-0">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Procurar...">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-secondary btn-number">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <!--                        <a class="btn btn-success btn-sm ml-3" href="cart.php">
                                                    <i class="fa fa-shopping-cart"></i> Carrinho
                                                    <span class="badge badge-light">0</span>
                                                </a>-->
                    </form>
                </div>
            </div>
        </nav>
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">LOJA VIRTUAL <?php echo VERSAO; ?> SEM CARRINHO</h1>
                <p class="lead text-muted mb-0">Loja usada para estudos e talz....are baba !!!</p>
            </div>
        </section>