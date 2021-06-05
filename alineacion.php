<?php
    /*
     * Bimbo Tinto - Alineación principal
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "db/db.php" );
    include( "db/data-user.php" );
    include( "db/data-jugadores.php" );
    include( "db/data-jornadas.php" );

    checkSession( "" );

    $prediccion = obtenerPrediccionJornada( $dbh );
    $jugadores = obtenerJugadores();
    
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Alineación principal::BimboTinto</title>
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
        .imgjugador{ width: 30px; }
        .nombre_jugador_pos{ line-height: 1em; padding: 10px 0; font-size: 14px;}

        .fila_jugadores .item{
            background: #fff; 
            padding: 2px; 
            max-width: 80px; 
            color: #be1616; 
            border: 1px solid #be1616; 
            border-radius: 12px
        }

        .fila_jugadores .item:hover{
            color: #fff; 
            background: #be1616; 
        }

        .fila_jugadores .item_s{
            color: #fff;
            background: #be1616; 
        }
 
        #tab_filter{ display: none; }

        .etiq_jugador{ width: 100%; height: 24px; background: #be1616; margin-top: 12px; max-width: 100px; color: #fff; border-radius: 15px; }
        .etiq_portero{ width: 90px; height: 24px; background: #be1616; margin-top: 12px; color: #fff; }

        .tabposiciones_jugadores{
            height: 100% !important;
        }

        .fila_jugadores .col{ padding-top: 6px; padding-bottom: 6px; }
    </style>
</head>

<body>
    
    <div class="body_wrapper">
        
        <section class="software_promo_area bg_color sec_pad" style="min-height: 100vh">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-5" style="padding-left: 2%">
                        <div id="panel_jugadores" class="faq_tab">
                            <h4 class="f_p t_color3 f_600 f_size_22 mb_40">Alineación Inicial</h4>
                            <p> ¿ Crees saber cuál será la formación de la Vinotinto para este próximo juego ?</p>
                            <p> Arma tu alineación, por cada jugador acertado obtendrás +5 puntos</p>
                            <?php include ( "secciones/jugadores.php" )?>
                            <div align="center" class="btn_siguiente_paso">
                                <a href="#!" class="app_btn btn_hover cus_mb-10 btn_siguiente paso_alineacion" 
                                data-paso="1" onclick="ircaja()">
                                    Siguiente <i class="ti-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-5 offset-lg-1" style="padding-right: 2%">
                        <?php include ( "secciones/mapa_alineacion.php" )?>
                        <div align="center" class="btn_siguiente_paso">
                            <a href="#!" class="app_btn btn_hover cus_mb-10 btn_siguiente paso_alineacion" 
                            data-paso="1" onclick="ircaja()">
                                Siguiente <i class="ti-arrow-right"></i>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/fn-transiciones.js"></script>
    <script src="js/fn-bimbotinto.js"></script>
    <script type="text/javascript">
        alineacionCompleta();
        $('.list_item_tab').on('click', function () {
            $('#tab_filter').fadeIn();
        });
    </script>
</body>

</html>