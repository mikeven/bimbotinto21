<?php
    /*
     * Bimbo Tinto - Ganador del encuentro
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "db/db.php" );
    include( "db/data-user.php" );
    include( "db/data-jornadas.php" );

    checkSession( "" );
    $id_jact        = obtenerJornadaActiva( $dbh );
    $jornada_activa = obtenerJornadaPorId( $dbh, $id_jact["id"] );
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Ganador del encuentro::BimboTinto</title>
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
        .posicionalieacion{
            padding: 8px 0;
        }
        .msup{
            margin-top: 35px;
        }
        #posiciones_jugadores.owl-dots{
            margin-top: 25px !important;
        }
        .imgequipo{ width: 60px; }

        #tab_filter{ display: none; }

        .etiq_jugador{ width: 100%; height: 24px; background: #981010; margin-top: 12px; max-width: 100px; color: #fff; }
        .etiq_portero{ width: 90px; height: 24px; background: #981010; margin-top: 12px; }

        .tabposiciones_jugadores{
            height: 100% !important;
        }

        .fila_jugadores, .jugador_alineado { padding-top: 20px; padding-bottom: 12px; }
    </style>
</head>

<body>
    
    <div class="body_wrapper">
        
        <section id="fondo_actividad" class="software_promo_area bg_color sec_pad" style="min-height: 100vh">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-5" style="padding-left: 2%">
                        <div class="faq_tab">
                            <h4 class="tit4 text-center">Ganador del partido</h4>
                            <img src="img/bimbo_ganador.png" width="100%" align="center">
                            <hr>
                            <p align="center">¿Quién ganará el encuentro?</p>
                            <p align="center">La respusta correcta obtiene</p>
                            <p align="center"> <span class="btpts">+60 puntos</span> </p>
                            
                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1" style="padding-right: 2%">
                        <?php include ( "secciones/equipos_jornada.php" )?>
                        <div align="center" class="btn_siguiente_paso">
                            <a href="#!" class="azbtn btn_hover cus_mb-10 btn_siguiente paso_ganador" data-paso="3">
                                Finalizar <i class="ti-arrow-right"></i>
                            </a>
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
    <script src="js/fn-bimbotinto.js"></script>
    <script type="text/javascript">
        $('.list_item_tab').on('click', function () {
            $('#tab_filter').fadeIn();
        });
    </script>
</body>

</html>