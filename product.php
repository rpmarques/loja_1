<?php
require_once './cabecalho.php';
$produtoId = intval(base64_decode($_GET['produto_id']));
$produto = $objProduto->selectUM('*', '', " id=$produtoId");
$categoria = $objCategoria->selectUM('*', '', " id=$produto->categoria_id");
$objProduto->somaClique($produtoId);
?>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="category.php?categoria_id=<?php echo base64_encode($produto->categoria_id); ?>"><?php echo $categoria->nome; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $produto->nome; ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <a href="" data-toggle="modal" data-target="#productModal">
                        <!--TAMANHO DA IMAGEM AQUI 800x800-->
                        <img class="img-fluid imgLiquidNoFill imgLiquid" src="<?php echo DIRETORIOIMAGENS . $produto->foto_1; ?>" style="width:498px; height:498px;"/>
                        <p class="text-center">Zoom</p>
                    </a>
                </div>
            </div>
        </div>
        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <p class="price"><?php echo 'R$ ' . formataMoeda($produto->preco); ?></p>
                    <p class="price_discounted"><?php echo 'R$ ' . formataMoeda($produto->preco_antigo); ?></p><br><br><br><br><br><br><br><br>
                    <form method="get" action="cart.php">
                        <!--                        <div class="form-group">
                                                    <label for="colors">Color</label>
                                                    <select class="custom-select" id="colors">
                                                        <option selected>Select</option>
                                                        <option value="1">Blue</option>
                                                        <option value="2">Red</option>
                                                        <option value="3">Green</option>
                                                    </select>
                                                </div>-->
                        <!--                        <div class="form-group">
                                                    <label>Quantity :</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" class="form-control"  id="quantity" name="quantity" min="1" max="100" value="1">
                                                        <div class="input-group-append">
                                                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>-->
                        <!--                        <a href="cart.php" class="btn btn-success btn-lg btn-block text-uppercase">
                                                    <i class="fa fa-shopping-cart"></i> Adicionar ao Carrinnho
                                                </a>-->
                    </form>
                    <div class="product_rassurance">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br/>Entrega Rápida</li>
                            <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br/>Compra Segura</li>
                            <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br/>+(99)-99999-9999</li>
                        </ul>
                    </div>
                    <!--                    <div class="reviews_product p-3 mb-2 ">
                                            3 reviews
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            (4/5)-->
                    <a class="pull-right" href="#reviews">Informações Técnicas</a>
                    <!--</div>
<div class="datasheet p-3 mb-2 bg-info text-white">
    <a href="" class="text-white"><i class="fa fa-file-text"></i> Download DataSheet</a>
</div>
                    -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i> Descrição</div>
                <div class="card-body">
                    <p class="card-text">
                        <?php echo $produto->descricao_1; ?>
                    </p>

                </div>
            </div>
        </div>

        <!-- Inf Técnica -->
        <div class="col-12" id="reviews">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-comment"></i> Informações Técnicas</div>
                <div class="card-body">
                    <p class="card-text">
                        <?php echo $produto->inf_tecnica; ?>
                    </p>
                    <!--                    <div class="review">
                                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                            <meta itemprop="datePublished" content="01-01-2016">January 01, 2018

                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            by Paul Smith
                                            <p class="blockquote">
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                            </p>
                                            <hr>
                                        </div>
                                        <div class="review">
                                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                            <meta itemprop="datePublished" content="01-01-2016">January 01, 2018

                                            <span class="fa fa-star" aria-hidden="true"></span>
                                            <span class="fa fa-star" aria-hidden="true"></span>
                                            <span class="fa fa-star" aria-hidden="true"></span>
                                            <span class="fa fa-star" aria-hidden="true"></span>
                                            <span class="fa fa-star" aria-hidden="true"></span>
                                            by Paul Smith
                                            <p class="blockquote">
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                            </p>
                                            <hr>
                                        </div>-->
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once './rodape.php';
?>


<!-- Modal image -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel"><?php echo $produto->nome; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--TAMANHO DA IMAGEM AQUI 1200x1200-->
                <img class="img-fluid imgLiquidNoFill imgLiquid" src="<?php echo DIRETORIOIMAGENS . $produto->foto_1; ?>" style="width:766px; height:766px;"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    //Plus & Minus for Quantity product
    $(document).ready(function() {
        var quantity = 1;

        $('.quantity-right-plus').click(function(e) {
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
        });

        $('.quantity-left-minus').click(function(e) {
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            if (quantity > 1) {
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>
</body>
</html>
