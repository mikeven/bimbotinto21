<?php
    /*
     * Bimbo Tinto - Página de inicio
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "db/db.php" );
    include( "db/data-user.php" );
    include( "db/data-jornadas.php" );

    checkSession( "" );
    $jornadas           = obtenerJornadas( $dbh );
    $jornada_actual     = obtenerJornadaActiva( $dbh );
    $idj                = $jornada_actual["id"];
    $idp                = $_SESSION["user"]["id"];
    /*$jactual            = obtenerJornadaActiva( $dbh );
    $predicc_iniciada   = prediccionJornadaActualIniciada( $dbh, $jactual["id"], $_SESSION["user"]["id"] );*/
    
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Bimbo Tinto</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--icon font css-->
    <link rel="stylesheet" href="vendors/themify-icon/themify-icons.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/all.css">
    <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
    <link rel="stylesheet" href="vendors/animation/animate.css">
    <link rel="stylesheet" href="vendors/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/animation/animate.css">
    <link rel="stylesheet" href="vendors/magnify-pop/magnific-popup.css">
    <link rel="stylesheet" href="vendors/elagent/style.css">
    <link rel="stylesheet" href="vendors/scroll/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom_styles.css">
    <style type="text/css">

        .lista_jornadas{
            padding-right: 10%; padding-left: 10%; max-height: 620px; overflow-y: scroll;
        }
        .equipo{
            /*height: 60px;*/
            text-align: center;
        }
        .equipo img{ width: 75px; }
        .jornada{
            margin-top: 25px;
        }

        .jugar_jornada{ padding: 12px 0; }

        .candado{ float: left; font-size: 20px; color: #FFF; }

        .loginuser{    
            margin: 0;  
            color: #9d0b0b; 
            font-size: 30px;
            font-family: 'LemonJuice';
        }
        .bnvlog_user{ color: #000; font-family: 'Poppins'; font-size: 16px; margin: 0; }
    </style>
</head>

<body>
    
    <div class="body_wrapper">
        
        <section id="fondo_actividad" class="faq_area bg_color sec_pad" style="min-height: 100vh">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 order-sm-12 lista_jornadas">
                        <div style="float: left">
                            <p class="bnvlog_user">Jornadas de la Vinotinto</p>
                        </div>
                        <div style="float: right">
                            <p class="bnvlog_user">Bienvenido</p>
                            <p class="loginuser"><?php echo $_SESSION["user"]["nombre"] ?></p>
                        </div>
                        <div style="clear: both;"></div>
                        <?php include( "secciones/jornadas.php" ) ?>
                        
                    </div>
                    <div class="col-lg-5 order-sm-1 pr_50" style="padding-left: 2%">
                        <div class="faq_tab">
                            
                            <img src="img/logo-bimbotinto.png" width="100%" align="center" class="btinto_logo_inicio">
                            <img src="img/bimbotinto_jornada.png" width="100%" align="center">
                            <ul class="nav nav-tabs text-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a href="#" class="jbtn btn_hover agency_banner_btn pay_btn pay_btn_two cus_mb-10">Premios</a>
                                </li>
                                <li class="nav-item">
                                    <a href="puntuaciones.php" class="jbtn btn_hover agency_banner_btn pay_btn pay_btn_two cus_mb-10">Puntuaciones</a>
                                </li>
                            </ul>
                            <p class="text-center"> A medida que la vintotinto vaya avanzando, se desbloquearán los juegos y podrás hacer tu pronóstico</p>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </section>
        
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/propper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/wow/wow.min.js"></script>
    <script src="vendors/sckroller/jquery.parallax-scroll.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/isotope/isotope-min.js"></script>
    <script src="vendors/magnify-pop/jquery.magnific-popup.min.js"></script>
    <script src="vendors/scroll/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>