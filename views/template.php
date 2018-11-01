<?php 
    $mvc = new MvcController();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistema de inventario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="views/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="views/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="views/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="views/assets/icon/icofont/css/icofont.css">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="views/assets/pages/menu-search/css/component.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="views/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="views/assets/css/jquery.mCustomScrollbar.css">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="index.php">
                            <img class="img-fluid" src="views/assets/images/logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <!-- Expandir la pantalla -->
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>

                        <!-- Nombre del usuario y el logout -->
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!">
                                        <img src="views/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                        <span>John Doe</span>
                                        <i class="ti-angle-down"></i>
                                    </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="index.php?action=salir">
                                        <i class="ti-layout-sidebar-left"></i> Cerrar Sesión
                                    </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Navegación</div>

                            <!-- Menu de la izquierda -->
                            <!-- Aqui van los links para la nevegacion del sistema -->
                            <?php if(isset($_SESSION['sesion'])){?>
                            <ul class="pcoded-item pcoded-left-item">

                                <li >
                                    <a href="index.php">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                
                                <!-- Menu desplegable -->
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-view-list-alt"></i><b>C</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.Categorias.main">Categorias</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="active">
                                            <a href="index.php?action=addCategoria">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.Categorias.Agregar-Categoria">Agregar Categoria</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                        <li class="active">
                                            <a href="index.php?action=categorias">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.Categorias.Ver-Categorias">Ver Categorias</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-gift"></i><b>P</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.Productos.main">Productos</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="active">
                                            <a href="index.php?action=addProducto">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.Productos.Agregar-Productos">Agregar Productos</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                        <li class="active">
                                            <a href="index.php?action=productos">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.Productos.Ver-Productos">Ver Productos</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>U</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.Usuarios.main">Usuarios</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="active">
                                            <a href="index.php?action=registro">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.Usuarios.Agregar-Usuarios">Agregar Usuarios</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                        <li class="active">
                                            <a href="index.php?action=usuarios">
                                                <span class="pcoded-micon"><i class="ti-eye"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.Usuarios.Ver_Usuarios">Ver Usuarios</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- ./ Final del menu desplegable -->
                            <?php
                            }else{
                                echo '<li class="active">
                                    <a href="index.php?action=login">
                                    <span class="pcoded-micon"><i class="ti-eye"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.Usuarios.Ver_Usuarios">Inicie sesion</span>
                                    <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>';
                            }
                            ?>    
                                
                            </ul>
                            <!-- ./ Finaliza el menu de la izquierda -->
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <!-- Aqui va lo del mvc-->
                                        <?php
                                            
                                            $mvc -> enlacesPaginasController();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    
    <!-- Required Jquery -->
    <script type="text/javascript" src="views/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="views/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="views/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="views/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="views/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="views/bower_components/modernizr/js/modernizr.js"></script>
    <!-- am chart -->
    <script src="views/assets/pages/widget/amchart/amcharts.min.js"></script>
    <script src="views/assets/pages/widget/amchart/serial.min.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="views/bower_components/chart.js/js/Chart.js"></script>
    <!-- Todo js -->
    <script type="text/javascript" src="views/assets/pages/todo/todo.js "></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="views/bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="views/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="views/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="views/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="views/assets/pages/dashboard/custom-dashboard.min.js"></script>
    <script type="text/javascript" src="views/assets/js/SmoothScroll.js"></script>
    <script src="views/assets/js/pcoded.min.js"></script>
    <script src="views/assets/js/demo-12.js"></script>
    <script src="views/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="views/assets/js/script.min.js"></script>
</body>

</html>
                        