<?php
require_once './cabecalho.php';
?>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="https://dummyimage.com/855x365/55595c/fff" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://dummyimage.com/855x365/a30ca3/fff" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://dummyimage.com/855x365/1443ff/fff" alt="Third slide">
                    </div>
                </div>
                <!--CONTROLES DO CAROUSEL-->
                <!--                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>-->
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card">
                <!--TAMANHO DA IMAGEM AQUI 600x400-->
                <div class="card-header bg-success text-white text-uppercase">
                    <i class="fa fa-heart"></i> Mais acessado
                </div>
                <?php
                $produto = $objProduto->selectUM('*', '', '', ' cliques DESC LIMIT 1', '');
                ?>
                <img class="img-fluid border-0 imgLiquidNoFill imgLiquid" src="<?php echo DIRETORIOIMAGENS . $produto->foto_1; ?>" alt="Card image cap" style="width:255px; height:200px;">
                <div class="card-body">
                    <h4 class="card-title text-center"><a href="product.php?produto_id=<?php echo base64_encode($produto->id); ?>" title="View Product"><?php echo $produto->nome; ?></a></h4>
                    <div class="row">
                        <div class="col">
                            <p class="btn btn-default btn-block"><?php echo 'R$ ' . formataMoeda($produto->preco); ?></p>
                        </div>
                        <div class="col">
                            <a href="product.php?produto_id=<?php echo base64_encode($produto->id); ?>" class="btn btn-success btn-block">Visualizar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header bg-primary text-white text-uppercase">
                    <i class="fa fa-star"></i> Últimos Produtos
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        //ÚLTIMOS 4 PRODUTOS CADSTRADOS
                        $produtos = $objProduto->select('*', '', '', ' id desc LIMIT 4', '');
                        foreach ($produtos as $linhaDB) :
                            ?>
                            <div class="col-sm">
                                <div class="card">
                                    <!--TAMANHO DA IMAGEM AQUI 600x400-->
                                    <img class="card-img-top imgLiquidNoFill imgLiquid" src="<?php echo DIRETORIOIMAGENS . $linhaDB->foto_1 ?>" alt="Card image cap" style="width:242px; height:200px;">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="product.php?produto_id=<?php echo base64_encode($linhaDB->id); ?>" title="View Product"><?php echo $linhaDB->nome; ?></a></h4>
                                        <p class="card-text"><?php echo substr($linhaDB->descricao_1, 0, 100); ?></p>
                                        <div class="row">
                                            <div class="col">
                                                <p class="btn btn-default btn-block"><?php echo 'R$ ' . formataMoeda($linhaDB->preco); ?></p>
                                            </div>
                                            <div class="col">
                                                <a href="product.php?produto_id=<?php echo base64_encode($linhaDB->id); ?>" class="btn btn-success btn-block">Visualizar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3 mb-4">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header bg-primary text-white text-uppercase">
                    <i class="fa fa-trophy"></i> Mais acessados
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $produtos = $objProduto->select('*', '', '', ' cliques ASC LIMIT 4', '');
                        foreach ($produtos as $linhaDB) :
                            ?>
                            <div class="col-sm">
                                <div class="card">
                                    <!--TAMANHO DA IMAGEM AQUI 600x400-->
                                    <img class="card-img-top imgLiquidNoFill imgLiquid" src="<?php echo DIRETORIOIMAGENS . $linhaDB->foto_1; ?>" alt="Card image cap" style="width:242px; height:200px;">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="product.php?produto_id=<?php echo base64_encode($linhaDB->id); ?>" title="View Product"><?php echo $linhaDB->nome; ?></a></h4>
                                        <p class="card-text"><?php echo substr($linhaDB->descricao_1, 0, 100); ?></p>
                                        <div class="row">
                                            <div class="col">
                                                <p class="btn btn-default btn-block"><?php echo 'R$ ' . formataMoeda($linhaDB->preco); ?></p>
                                            </div>
                                            <div class="col">
                                                <a href="product.php?produto_id=<?php echo base64_encode($linhaDB->id); ?>" class="btn btn-success btn-block">Visualizar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once './rodape.php';
?>