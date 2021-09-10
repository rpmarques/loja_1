<!-- Footer -->
<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3">
                <h5>About</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <p class="mb-0"><?php echo $empresa->descricao; ?></p>
            </div>
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2"></script>
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto">
                <!--                <h5>Facebook</h5>
                                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">-->
                <div class="fb-page" data-href="<?php echo $empresa->facebook; ?>"  data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite=<?php echo $empresa->facebook; ?>" class="fb-xfbml-parse-ignore">
                                <a href="<?php echo $empresa->facebook; ?>">Naira Charnoski Massoterapeuta</a>
                    </blockquote>
                </div>
            </div>
            <!--            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                            <h5>Informations</h5>
                            <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                            <ul class="list-unstyled">
                                <li><a href="">Link 1</a></li>
                                <li><a href="">Link 2</a></li>
                                <li><a href="">Link 3</a></li>
                                <li><a href="">Link 4</a></li>
                            </ul>
                        </div>-->

            <!--            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                            <h5>Others links</h5>
                            <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                            <ul class="list-unstyled">
                                <li><a href=""><?php // echo $empresa->facebook;            ?></a></li>
                                <li><a href=""><?php //echo $empresa->instagram;            ?></a></li>
                                <li><a href="">Link 3</a></li>
                                <li><a href="">Link 4</a></li>
                            </ul>
                        </div>-->

            <div class="col-md-4 col-lg-3 col-xl-3">
                <h5>Contato</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><i class="fa fa-home mr-2"></i> LOJA <?php echo VERSAO; ?></li>
                    <li><i class="fa fa-envelope mr-2"></i><?php echo $empresa->email; ?></li>
                    <li><i class="fa fa-phone mr-2"></i> <?php echo $empresa->fone_1; ?></li>
                    <li><i class="fa fa-print mr-2"></i> <?php echo $empresa->fone_2; ?></li>
                </ul>
            </div>
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#">Topo</a>
                </p>
                <p class="text-right text-muted">Desenvolvido por <a href="https://www.facebook.com/ricardo.marques.80"> Ricardo P. Marques </a> <span><?php echo VERSAO; ?></span></p>
                <!--<p class="text-right text-muted">created with <i class="fa fa-heart"></i> by <a href="https://t-php.fr/43-theme-ecommerce-bootstrap-4.php"><i>t-php</i></a> | <span>v. 1.0</span></p>-->
            </div>
        </div>
    </div>
</footer>

<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./js/imgLiquid.js" type="text/javascript"></script>
<script>
    $(function() {
        $(".imgLiquidFill").imgLiquid({
            fill: true,
            horizontalAlign: "center",
            verticalAlign: "center"
        });
        $(".imgLiquidNoFill").imgLiquid({
            fill: false,
            horizontalAlign: "center",
            verticalAlign: "center"
        });
    });
    $(document).ready(function() {
        $('#list').click(function(event) {
            event.preventDefault();
            $('#products .item').addClass('list-group-item');
        });
        $('#grid').click(function(event) {
            event.preventDefault();
            $('#products .item').removeClass('list-group-item');
            $('#products .item').addClass('grid-group-item');
        });
    });
</script>


</body>
</html>
