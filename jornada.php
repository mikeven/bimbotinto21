<?php
    /*
     * Bimbo Tinto - Resumen de predicción por jornada participante
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "db/db.php" );
    include( "db/data-user.php" );
    include( "db/data-jugadores.php" );
    include( "db/data-jornadas.php" );

    checkSession( "" );

    if( isset( $_GET['j'] ) ){
        $idj            = $_GET['j'];
        $jornada        = obtenerJornadaPorId( $dbh, $idj );
        $prediccion     = obtenerPrediccionJornada( $dbh );
    }
        
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Jornada::BimboTinto</title>
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
        .datos_jornada div{
            display: inline;
        }
        .left {
            padding-left: 10px;
            padding-top: 10px;
            float: left;
            position: relative;
            height: auto;
        }
        .imgjugador {
            width: 30px;
            position: absolute;
            left: 15px;
            bottom: 0px;
        }

        .nombre_jugador{
          float: left; 
          line-height: 0.1em;
          font-size: 16px;
          margin-left: 50px;
        }

        .bloque_prediccion{
            padding-bottom: 36px;
        }
    </style>
</head>

<body>
    
    <div class="body_wrapper">
        
        <section class="software_promo_area bg_color sec_pad" style="min-height: 100vh">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-5" style="padding-left: 2%">
                        <div class="faq_tab">
                            <h4 class="f_p t_color3 f_600 f_size_22 mb_40">Jornada</h4>
                            <p><?php echo $jornada["fechadia"] ?></p>

                            <?php include( "secciones/info_jornada.php" ); ?>
                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1" style="padding-right: 2%">
                        <?php include ( "secciones/prediccion_jornada.php" )?>
                        <div align="center" style="margin-top: 100px">
                            <a href="paso2.html" class="cus_mb-10 jbtn" data-paso="1">
                                Modificar
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