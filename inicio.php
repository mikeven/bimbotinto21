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

    $jornadas = obtenerJornadas( $dbh );
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
            padding-right: 10%; padding-left: 10%; max-height: 500px; overflow-y: scroll;
        }
        .equipo{
            height: 60px;
            text-align: center;
        }
        .jornada{
            margin-top: 40px;
        }

        .enc_jornada{
            -webkit-border-top-left-radius: 25px;
            -webkit-border-top-right-radius: 25px;
            -moz-border-radius-topleft: 25px;
            -moz-border-radius-topright: 25px;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            background: #9d0b0b;
        } 
        .data_jornada{
            -webkit-border-bottom-right-radius: 25px;
            -webkit-border-bottom-left-radius: 25px;
            -moz-border-radius-bottomright: 25px;
            -moz-border-radius-bottomleft: 25px;
            border-bottom-right-radius: 25px;
            border-bottom-left-radius: 25px;
            background: #be1616;
        }

        .fecha_jornada, .jvs{
            color: #FFF;
        }

        .jugar_jornada{ padding: 12px 0; }

        .candado{ float: left; font-size: 20px; color: #FFF; }
    </style>
</head>

<body>
    
    <div class="body_wrapper">
        
        <section class="faq_area bg_color sec_pad" style="min-height: 100vh">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 order-sm-12 lista_jornadas">
                        
                        <?php include( "secciones/jornadas.php" ) ?>
                        
                    </div>
                    <div class="col-lg-5 order-sm-1 pr_50" style="padding-left: 2%">
                        <div class="faq_tab">
                            <h4 class="f_p t_color3 f_600 f_size_22 mb_40">Bimbo Tinto</h4>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a href="#" class="btn_hover agency_banner_btn pay_btn pay_btn_two cus_mb-10">Premios</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="btn_hover agency_banner_btn pay_btn pay_btn_two cus_mb-10">Puntuaciones</a>
                                </li>
                            </ul>
                            <p> A medida que la vintotinto vaya avanzando, se desbloquearán los juegos y podrás hacer tu pronóstico</p>
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