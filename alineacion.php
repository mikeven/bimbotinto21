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

        .esquema_aln{ display: none; }

        

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
            min-width: 70px;
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

        .posicionalieacion > .col{ padding: 0px 2px; }

        .imgfranela2{ max-height: 50px; }

        @media (max-width: 368px) {
            .posicionalieacion { padding: 8px 2px; }
            .posicionalieacion > .col{ padding: 0; }
            im
            .pan1 {
                
                margin-top: -25px;
            }
            .pan2 {
                
                margin-top: -35px;
            }
            .pan3{
                
                margin-top: -25px;
            }
            .esquema_aln {
                background-size: 220%;
                background-repeat: no-repeat;
                background-image: url(img/cancha.png);
                background-position: 53% 30px;
                padding-bottom: 50px;
            }
            
        }
        @media (min-width: 369px) and (max-width: 568px) {
            .posicionalieacion { padding: 8px 2px; }
            .pan1 {
                padding: 8px 20px;
                margin-top: -25px;
            }
            .pan2 {
                
                margin-top: -35px;
            }
            .pan3{
                padding: 8px 95px;
                margin-top: -25px;
            }
            .esquema_aln {
                background-size: 170%;
                background-repeat: no-repeat;
                background-image: url(img/cancha.png);
                background-position: 53% 30px;
                padding-bottom: 50px;
            }
        }
        @media (min-width: 569px) and (max-width: 767px) {
            .esquema_aln {
                background-size: 120%;
                background-repeat: no-repeat;
                background-image: url(img/cancha.png);
                background-position: 53% 30px;
                padding-bottom: 70px;
            }
            
            .pan1 {
                padding: 8px 115px;
                margin-top: -25px;
            }
            .pan2 {
                padding: 8px 100px;
                margin-top: -25px;
            }
            .pan3{
               padding: 8px 105px;
                margin-top: -25px;
            }
        }
        @media (min-width: 768px) and (max-width: 991px) {
            .esquema_aln{
                background-size: 105%;
                background-repeat: no-repeat;
                background-image: url(img/cancha.png);
                background-position: 53% 30px;
                padding-bottom: 80px;
            }
            .pan1 {
                padding: 8px 165px;
                margin-top: -25px;
            }
            .pan2 {
                padding: 8px 120px;
                margin-top: -25px;
            }
            .pan3{
               padding: 8px 185px;
                margin-top: -25px;
            }
        }
        @media (min-width: 992px) {
            .esquema_aln{
                background-size: 135%;
                background-repeat: no-repeat;
                background-image: url(img/cancha.png);
                background-position: 60% 40px;
                padding-bottom: 50px;
            }
            .pan1 {
                padding: 8px 95px;
                margin-top: -25px;
            }
            .pan2 {
                padding: 8px 65px;
                margin-top: -25px;
            }
            .pan3{
                padding: 8px 120px;
                margin-top: -25px;
            }
        }
        @media (min-width: 1200px) {
            .pan1 {
                padding: 8px 145px;
                margin-top: -25px;
            }
            .pan2 {
                padding: 8px 120px;
                margin-top: -25px;
            }
            .pan3{
                padding: 8px 180px;
                margin-top: -25px;
            }
            .esquema_aln{
                background-size: 120%;
                background-repeat: no-repeat;
                background-image: url(img/cancha.png);
                background-position: 63% 40px;
                padding-bottom: 150px;
            }
        }

        @media (max-width: 767px) {
            .sepmob{ margin-top: 50px; text-align: center; }
        }
        
        .sec_pad {
            padding: 20px 0px 30px 0;
        }

        .job_listing .job_list_tab .list_item_tab.active, .job_listing .job_list_tab .list_item_tab:hover {
            background: transparent;
            padding: 2px 12px; background: #8e0313; 
            border-radius: 15px; color:  #FFF;
        }

        .job_listing .job_list_tab .list_item_tab {
            color:#8e0313;
        }

    </style>
</head>

<body>
    
    <div class="body_wrapper">
        
        <section id="fondo_actividad" class="software_promo_area bg_color sec_pad" style="min-height: 100vh">
            <div class="container">
                <div align="center" style="padding-bottom: 25px;">
                    <img src="img/logo-bimbotinto.png" width="200">
                </div>
                <div class="row">
                    
                    <div class="col-lg-5" style="padding-left: 2%">
                        <div id="panel_jugadores" class="faq_tab">
                            <h4 class="tit4 text-center">Alineación Inicial</h4>
                            <img src="img/bimbotino_alineacion.png" width="50%" align="left">
                            <p> ¿ Crees saber cuál será la formación de la Vinotinto para este próximo juego ?</p>
                            <p class="sepmob"> Arma tu alineación, por cada jugador acertado obtendrás <span class="btpts">+5 puntos</span></p>
                            <?php include ( "secciones/jugadores.php" )?>
                            <div align="center" class="btn_siguiente_paso">
                                <a href="#!" class="azbtn btn_hover cus_mb-10 btn_siguiente paso_alineacion" 
                                data-paso="1" onclick="ircaja()">
                                    Siguiente <i class="ti-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-7 esquema_aln" style="padding-right: 2%">
                        <?php include ( "secciones/mapa_alineacion.php" )?>
                        
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
        $(".esquema_aln").fadeIn( 1200 );
    </script>
    <?php if( $prediccion ) { ?>
        <script type="text/javascript">
            $(".imgfranela").attr( "src", "img/vinotinto.png" );
        </script>
    <?php } ?>
</body>

</html>