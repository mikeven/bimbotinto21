<?php
    /*
     * Bimbo Tinto - Primer Gol
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "db/db.php" );
    include( "db/data-user.php" );
    include( "db/data-jornadas.php" );

    checkSession( "" );

    $prediccion = obtenerPrediccionJornada( $dbh );
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Primer Gol::BimboTinto</title>
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
        
        .imgjugador {
            width: 40px;
            position: absolute;
            left: 15px;
            bottom: 0px;
        }
        .jugador_alineado{ opacity: 0; }

        .fila_jugadores { padding-top: 20px; padding-bottom: 12px; padding-right: 3%; padding-left: 3%; }
        
    </style>
</head>

<body>
    
    <div class="body_wrapper">
        
        <section id="fondo_actividad" class="software_promo_area bg_color sec_pad" style="min-height: 100vh">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-5" style="padding-left: 2%">
                        <div class="faq_tab" align="center">
                            <h4 class="tit4 text-center">Primer gol</h4>
                            <img id="imgpgol" src="img/gol.png" width="90%" align="center">
                            <p> De tus 11 jugadores, ¿quién crees que anote el primer gol?</p>
                            <p> <span class="btpts">+60 puntos</span> </p>
                            <div align="center" class="btn_siguiente_paso">
                                <a href="#!" class="azbtn btn_hover btn_hover cus_mb-10 btn_siguiente paso_primer_gol" data-paso="2">
                                    Siguiente <i class="ti-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-5 offset-lg-1" style="padding-right: 2%">
                        
                        <?php include ( "secciones/lista_jugadores.php" )?>
                        
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
    <script src="js/fn-bimbotinto.js"></script>
    <script src="js/fn-transiciones.js"></script>
    <script type="text/javascript">
        imagenPaso( "#imgpgol", "fade" );
        listaJugadores();
    </script>
    
</body>

</html>