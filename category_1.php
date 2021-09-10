<?php
require_once './cabecalho.php';
$itemPorPagina = '6';
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categorias</div>
                <ul class="list-group category_block">
                    <?php
                    $categoria = $objCategoria->select('*', '', '');
                    foreach ($categoria as $linhaDB) :
                        ?>
                        <li class="list-group-item"><a href="category.php?categoria_id=<?php echo base64_encode($linhaDB->id); ?>"><?php echo $linhaDB->nome; ?></a></li>
                    <?php endforeach;
                    ?>
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Novidade</div>
                <div class="card-body">
                    <?php $produto = $objProduto->selectUM('*', '', '', ' id DESC LIMIT 1'); ?>
                    <img class="img-fluid imgLiquidNoFill imgLiquid" src="<?php echo DIRETORIOIMAGENS . $produto->foto_1; ?>" style="width:213px; height:142px;"/>
                    <h4 class="card-title text-center"><a href="product.php?produto_id=<?php echo base64_encode($produto->id); ?>" title="View Product"><?php echo $produto->nome; ?></a></h4>
                    <p class="card-text"><?php echo substr($produto->descricao_1, 0, 100); ?></p>
                    <p class="bloc_left_price"><?php echo 'R$ ' . formataMoeda($produto->preco); ?></p>
                    <div class="col">
                        <a href="product.php?produto_id=<?php echo base64_encode($produto->id); ?>" class="btn btn-success btn-block">Visualizar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-lg-12 my-3">
                    <div class="pull-right">
                        <div class="btn-group">
                            <button class="btn btn-info" id="list">
                                List View
                            </button>
                            <button class="btn btn-danger" id="grid">
                                Grid View
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row vie" id="produtos">

                <?php
                if (empty($_REQUEST)) {
//                    $pagina = intval($_GET['pagina']);
                    $produtos = $objProduto->select('*', '', "", " RANDOM() limit $itemPorPagina");
                    if (!empty($produtos)):
                        foreach ($produtos as $linhaDB) :
                            ?>
                            <div class = "col-12 col-md-6 col-lg-4">
                                <div class = "card">
                                    <img class = "card-img-top imgLiquidNoFill imgLiquid" src = "<?php echo DIRETORIOIMAGENS . $linhaDB->foto_1; ?>" alt = "Card image cap" style="width:255px; height:200px;">
                                    <div class = "card-body">
                                        <h4 class = "card-title"><a href = "product.php?produto_id=<?php echo base64_encode($linhaDB->id); ?>" title = "Ver Produto"><?php echo $linhaDB->nome; ?></a></h4>
                                        <p class="card-text"><?php echo substr($linhaDB->descricao_1, 0, 100); ?></p>
                                        <div class="row">
                                            <div class="col">
                                                <p class="btn btn-danger btn-block"><?php echo 'R$ ' . formataMoeda($linhaDB->preco); ?></p>
                                            </div>
                                            <div class="col">
                                                <a href="product.php?produto_id=<?php echo base64_encode($produto->id); ?>" class="btn btn-success btn-block">Visualizar</a>
                                                <!--<a href="#" class="btn btn-success btn-block">Adicionar ao carrinho</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                }

                if (isset($_GET['categoria_id'])) :
                    $wCategoriaID = intval(base64_decode($_GET['categoria_id']));
                    $produtos = $objProduto->select('*', '', "categoria_id=$wCategoriaID");
                    if (!empty($produtos)) :
                        foreach ($produtos as $linhaDB) :
                            ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <img class = "card-img-top imgLiquidNoFill imgLiquid" src = "<?php echo DIRETORIOIMAGENS . $linhaDB->foto_1; ?>" alt = "Card image cap" style="width:253px; height:168.667px;">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="product.php?produto_id=<?php echo base64_encode($linhaDB->id); ?>" title="Ver Produto"><?php echo $linhaDB->nome; ?></a></h4>
                                        <p class="card-text"><?php echo substr($linhaDB->descricao_1, 0, 100); ?></p>
                                        <div class="row">
                                            <div class="col">
                                                <p class="btn btn-danger btn-block"><?php echo 'R$ ' . formataMoeda($linhaDB->preco); ?></p>
                                            </div>
                                            <div class="col">
                                                <a href="product.php?produto_id=<?php echo base64_encode($produto->id); ?>" class="btn btn-success btn-block">Visualizar</a>
                                                <!--<a href="#" class="btn btn-success btn-block">Adicionar ao carrinho</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!--
                                                POR ENQUANTO SEM PAGINAÇÃO
                                                <div class="col-12">
                                                    <nav aria-label="...">
                                                        <ul class="pagination">
                                                            <li class="page-item disabled">
                                                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item active">
                                                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#">Next</a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>-->
                        <?php
                    endif;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<?php require_once './rodape.php'; ?>