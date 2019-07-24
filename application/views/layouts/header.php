    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php define('ENCABEZADO', true) ?>
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Survey</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ==================================================================== -->
                <!-- Logo -->
                <!-- ==================================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?= base_url() ?>inicioC/">
                        <b>
                            <img src="<?= base_url() ?>assets/images/logo3.png" alt="homepage" class="dark-logo" width="60px" height="50px" />
                            <img src="<?= base_url() ?>assets/images/logo3.png" alt="homepage" class="light-logo" width="60px" height="50px" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="<?= base_url() ?>assets/images/text-logo.png" alt="homepage" class="dark-logo" width="180px" height="50px" />
                            <!-- Light Logo text -->
                            <img src="<?= base_url() ?>assets/images/text-logo.png" class="light-logo" alt="homepage" width="180px" height="50px" /></span>
                    </a>
                </div>
                <!-- ==================================================================== -->
                <!-- Fin del logo -->
                <!-- ==================================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if ($this->session->usuario->Foto != '') { ?>
                                    <img src="<?= base_url() ?><?= $this->session->usuario->Foto ?>" alt="user" class="" />
                                <?php } else { ?>
                                    <img src="https://png.pngtree.com/png_detail/20181019/userpeoplelinear-iconuser-png-clipart_1859764.png" alt="user" class="" />
                                <?php } ?>
                                <span class="hidden-md-down"><?= $this->session->usuario->Usuario ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li class="nav-item dropdown u-pro">
                                        <ul class="dropdown-user">
                                            <li>
                                                <div class="dw-user-box">
                                                    <div class="u-img">
                                                        <?php if ($this->session->usuario->Foto != '') { ?>
                                                            <img src="<?= base_url() ?><?= $this->session->usuario->Foto ?>" alt="user">
                                                        <?php } else { ?>
                                                            <img src="https://png.pngtree.com/png_detail/20181019/userpeoplelinear-iconuser-png-clipart_1859764.png" alt="user">
                                                        <?php } ?>
                                                    </div>
                                                    <div class="u-text">
                                                        <h4><?= $this->session->usuario->Usuario ?></h4>
                                                        <?php if ($this->session->usuario->Rol != 'Administrador') { ?>
                                                            <h6 class="text-muted">Empresa:<br><span class="label label-success"><?= $this->session->empresa->NombreComercial ?></span></h6>
                                                            <h6 class="text-muted">Suscripción: <br><span class="<?= $this->session->empresa->TipoCuenta == 'Basica' ? 'label label-info' : 'label label-warning' ?>"><?= $this->session->empresa->TipoCuenta ?></span></h6>
                                                        <?php } else { ?>
                                                            <h6 class="text-muted"><span class="label label-danger"><?= $this->session->usuario->Rol ?></span></h6>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="<?= base_url() ?>EncuestasC/perfil/<?= $this->session->usuario->idUsuario ?>"><i class="ti-user"></i> Mi Perfil</a></li>
                                            <li role="separator" class="divider"></li>
											<li><a href="<?= base_url() ?>Login/cerrar"><i class=" fas fa-power-off"></i> Cerrar Sesión</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <?php if ($this->session->usuario->Rol == 'Administrador') { ?>
                            <li class="nav-small-cap">--- Menú Administrador</li>
                            <li> <a class="waves-effect" href="<?= base_url() ?>InicioC/"><i class="mdi mdi-home"></i><span class="hide-menu">Inicio
                                        <!--<span class="label label-rounded label-danger">4</span>--></span></a>
                            <li> <a class="waves-effect" href="<?= base_url() ?>EmpresasC/"><i class="far fa-building"></i><span class="hide-menu">Empresas
                                        <!--<span class="label label-rounded label-danger">4</span>--></span></a>
                            <li> <a class="waves-effect" href="<?= base_url() ?>UsuariosC/"><i class="mdi mdi-account"></i><span class="hide-menu">Usuarios
                                        <!--<span class="label label-rounded label-danger">4</span>--></span></a>
                            </li><?php } ?>
                        <li class="nav-small-cap">--- Menú Principal</li>
                        <li> <a href="<?= base_url() ?>EncuestasC/" class="waves-effect"><i class="fas fa-clipboard-list"></i><span class="hide-menu">Encuestas</span></a></li>
                        <!--<span class="label label-rounded label-danger">4</span>-->
                        <li> <a href="<?= base_url() ?>ResultadosC/" class="waves-effect"><i class="mdi mdi-table"></i><span class="hide-menu">Resultados</span></a></li>
                        <li> <a class="waves-effect" href="<?= base_url() ?>ResultadosC/grafi"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Estadísticas</span></a></li>
                        <!--<span class="label label-rounded label-success">25</span>-->
                        <li> <a class="waves-effect" href="<?= base_url() ?>ResultadosC/tutorial"><i class="mdi mdi-youtube-play"></i><span class="hide-menu">Tutorial</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
