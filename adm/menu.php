<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
            </div>
            <div class="pull-left info">
                <!--<p><?php echo NOME; ?></p>-->
                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <!--<li class="header"><center>MENU</center></li>-->
            <li class="treeview">
                <a href="./principal.php">
                    <i class="fa fa-dashboard"></i> <span>Início</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <!--CLIENTES-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-book"></i> <span>Clientes</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="./clienteIncluir.php"><i class="fa fa-file-o"></i> Incluir</a></li>
                    <li><a href="./clienteListar.php"><i class="fa fa-file-o"></i> Listar</a></li>
                </ul>
            </li>
            <!--PRODUTOS-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-book"></i> <span>Produtos</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="./produtoIncluir.php"><i class="fa fa-file-o"></i> Incluir</a> </li>
                    <li><a href="./produtoListar.php"><i class="fa fa-file-o"> </i> Listar</a>  </li>
                    <!--DEPARTAMENTOS-->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-address-book"></i> <span>Departamentos</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="./departamentoIncluir.php"><i class="fa fa-file-o"></i> Incluir</a> </li>
                            <li><a href="./departamentoListar.php"><i class="fa fa-file-o"> </i> Listar</a>  </li>
                        </ul>
                    </li>
                    <!--CATEGORIAS-->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-address-book"></i> <span>Categorias</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="./categoriaIncluir.php"><i class="fa fa-file-o"></i> Incluir</a> </li>
                            <li><a href="./categoriaListar.php"><i class="fa fa-file-o"> </i> Listar</a>  </li>
                        </ul>
                    </li>
                    <!--MARCAS-->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-address-book"></i> <span>Marcas</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="./marcaIncluir.php"><i class="fa fa-file-o"></i> Incluir</a> </li>
                            <li><a href="./marcaListar.php"><i class="fa fa-file-o"> </i> Listar</a>  </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!--PEDIDOS-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-book"></i> <span>Pedidos</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="./pedidoListar.php"><i class="fa fa-file-o"></i> Listar Pedidos</a></li>
                </ul>
            </li>
            <!--EMPRESA-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-book"></i> <span>Empresa</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="./empresaEditar.php"><i class="fa fa-file-o"></i> Editar Empresa</a></li>
                </ul>
            </li>

            <!--MODELO-->
            <!--            <li class="treeview">
                            <a href="#">
                                <i class="fa fa-share"></i> <span>Multilevel</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i> Level One
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                        <li>
                                            <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                                <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                            </ul>
                        </li>-->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->