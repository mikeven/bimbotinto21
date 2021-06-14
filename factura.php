<?php
    /*
     * Bimbo Tinto - Carga de factura
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "db/db.php" );
    include( "db/data-user.php" );
    include( "db/data-jornadas.php" );

    include( "fn/fn-facturas.php" );

    checkSession( "" );
    $idp                = $_SESSION["user"]["id"];
    $participante       = obtenerUsuarioPorId( $dbh, $idu );
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Envía tu factura::Bimbo Tinto</title>
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
        .lista_jornadas{
            padding-right: 10%; padding-left: 10%; max-height: 620px; overflow-y: scroll;
        }
        .enlfrmfactura, .narchivofact{ color: #9d0b0b; }
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
        #factura_actual{
            padding: 4px;
            margin: 25px 0;
        }
        #opciones_inicio{
            padding: 12px 4px;
        }

        .alert.success {
            border-radius: 4px;
            padding: 12px 8px;
            background: rgba(192, 247, 189, 0.3);
            border-color: #498e46;
            color: #498e46;
        }

        .alert.error {
            padding: 12px 8px;
            border: 1px solid #be1616;
            color: #be1616 !important;
            border-radius: 4px;
            background-color: rgba(214,113,111,0.4);
        }
        <?php if( $participante["factura"] != "" ) { ?>
            #formulario_factura{ display: none; }
        <?php } ?>
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
                    <div class="col-lg-7 order-sm-12">
                        
                        <div style="float: right">
                            <p class="bnvlog_user">Bienvenido</p>
                            <p class="loginuser"><?php echo $_SESSION["user"]["nombre"] ?></p>
                        </div>
                        <div style="clear: both;"></div>
                        <h2 class="tit1">Envía tu factura</h2> 
                        <p id="info_factura">Adjunta una foto de una factura con algunos de los productos Bimbo. Con esta opción podrás ser seleccionado para algunos de los premios de Bimbotinto </p>
                        <?php include( "secciones/carga_factura.php" ) ?>
                        
                    </div>
                    <div class="col-lg-5 order-sm-1 pr_50" style="padding-left: 2%">
                        <div class="faq_tab">
                            
                            <img src="img/logo-bimbotinto.png" width="100%" align="center" class="btinto_logo_inicio">
                            <img id="imginicio" src="img/bimbotinto_jornada.png" width="100%" align="center">
                            <ul id="opciones_inicio" class="nav nav-tabs text-center">
                                <li class="nav-item">
                                    <a href="inicio.php" class="jbtn btn_hover cus_mb-10">Volver</a>
                                </li>
                            </ul>
                            
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script> 
    <!-- Validator -->
    <script src="vendors/bootstrapvalidator/dist/js/bootstrapValidator.min.js" type="text/javascript"></script>
    
    <script src="js/fn-transiciones.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/fn-user.js"></script>
    <script type="text/javascript">
        imagenPaso( "#imginicio", "escalfade" );
    </script>
</body>

</html>