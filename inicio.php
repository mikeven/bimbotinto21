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
    
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Inicio::Bimbo Tinto</title>
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
        .sec_pad {
            padding: 60px 0px;
        }
        #imgcopa_america{ 
            padding: 4px; 
            border-radius: 12px;
            background: #be1616; 
        }
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
        .puntaje_jornada {
            font-family: 'Poppins';
            color: #ffffff;
            background: #9d0b0b;
            border: 1px solid #ccc;
            border-radius: 25px;
            font-size: 12px;
            font-weight: bolder;
            line-height: 1.8em;
            margin-top: 5px;
        }
        .colptj{ padding: 0; }
        .loginuser{    
            margin: 0;  
            color: #9d0b0b; 
            font-size: 30px;
            font-family: 'LemonJuice';
        }
        .logout{
            margin: 0;  
            color: #9d0b0b; 
            font-size: 20px;
            font-family: 'LemonJuice';
        }
        .bnvlog_user{ color: #000; font-family: 'Poppins'; font-size: 16px; margin: 0; }
        #opciones_inicio{
            padding: 12px 4px;
        }

        .alert.info p, .alert.info ul li{
            line-height: 1.5em;
        }

        .alert.info ul li{
            color: #000; font-weight: bolder;
        }

        .alert .alert_close {
             top: 95% !important;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4EFGSZZVCN"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-4EFGSZZVCN');
    </script>
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
                        
                        <?php if( $idp == 10 ) { ?>

                            <div class="alert info">
                                <div class="alert_body">
                                    <i class="icon-info"></i>
                                    <p>¡Saludos <b>Victor</b>! Eres el participante con mayor puntaje de nuestra dinámica BimboTinto de la jornada <b>Venezuela - Colombia</b> </p>

                                    <p>Es necesario que por favor nos envíes una factura con la compra de un producto Bimbo en las próximas 24h para poder hacer efectivo tu premio.</p>
                                    <p>Adicionalmente, envíanos los siguientes datos:</p>
                                    <ul>
                                        <li>Nombre y Apellido</li>
                                        <li>Cédula</li>
                                        <li>Ciudad de residencia</li>
                                        <li>Talla de camisa</li>
                                        <li>Número de contacto</li>
                                    </ul>
                                    <p>Envía tus datos a <a href="mailto:bimbotinto@bimbovenezuela.com?Subject=BimboTinto%20Respuesta">bimbotinto@bimbovenezuela.com</a> o escríbenos un mensaje directo a nuestra cuenta de Instagram 
                                        <a href="https://www.instagram.com/bimbovenezuela/" target="_blank">bimbovenezuela</a></p>
                                    <p><a href="factura.php">Envía tu factura </a></p>
                                </div>
                                <div class="alert_close"><i class="icon_close"></i> Cerrar</div>
                            </div>
                        <?php } ?>
                        <?php include( "secciones/jornadas.php" ) ?>
                        
                    </div>
                    <div class="col-lg-5 order-sm-1 pr_50" style="padding-left: 2%">
                        <div class="faq_tab">
                            <div align="left">
                                <img src="img/logo-bimbotinto.png" width="80%" align="center" class="btinto_logo_inicio">
                            </div>
                            
                            <img id="imginicio" src="img/bimbotinto_jornada.png" width="100%" align="center">
                            <ul id="opciones_inicio" class="nav nav-tabs text-center">
                                <li class="nav-item">
                                    <a href="premios.php?premios" class="jbtn btn_hover cus_mb-10">Premios</a>
                                </li>
                                <li class="nav-item">
                                    <a href="puntuaciones.php" class="jbtn btn_hover cus_mb-10">Puntuaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a href="factura.php" class="jbtn btn_hover cus_mb-10">Envía tu factura</a>
                                </li>
                            </ul>
                            <p class="text-center"> A medida que la Vintotinto vaya avanzando, se desbloquearán los juegos y podrás hacer tu pronóstico</p>
                            <div align="right">
                                <a href="inicio.php?logout" class="align_right logout">
                                    <i class="ti-close"></i> Cerrar Sesión
                                </a>
                            </div>
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
    <script src="js/fn-transiciones.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        imagenPaso( "#imginicio", "escalfade" );
        jornadaActiva();
    </script>
</body>

</html>