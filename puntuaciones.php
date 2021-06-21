<?php
    /*
     * Bimbo Tinto - Tabla de puntuaciones
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "db/db.php" );
    include( "db/data-user.php" );
    include( "db/data-jornadas.php" );

    //checkSession( "" );
    $jornadas       = obtenerJornadas( $dbh );
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Puntuaciones::Bimbo Tinto</title>
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

        .tabla_posiciones{ width: 100%; }
        .tabla_posiciones th, .tabla_posiciones td{ padding: 4px 6px; }
        .tabla_posiciones thead{ background: #9d0b0b; color: #fff; }
        .tabla_posiciones tbody{ background: #8e0313; color: #fff; }
        .tabfecha{
            color: #000;
            font-size: 14px;
            padding: 4px; border: 1px solid #ccc;
        }
        table {
          border-collapse: collapse;
          border-radius: 0.5em;
          overflow: hidden;
        }

        th, td {
          padding: 1em;
          border-bottom: 2px solid white; 
        }

        table tr:last-child td:first-child {
            border-bottom-left-radius: 5px;
        }

        table tr:last-child td:last-child {
            border-bottom-right-radius: 5px;
        }

        .enlprd{ color: #fff; }
        .enlprd:hover{ color: #fff; }

        .faq_content .tab-pane .card .card-header .btn {
            color: #8e0313;
            display: block;
            width: 100%;
            text-align: left;
            font: 500 18px/26px "Poppins", sans-serif;
            padding: 20px 30px 20px 10px;
            position: relative;
            white-space: normal;
            background: rgba(0,0,0,0.1);
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
                    <div class="col-lg-7 order-sm-12 tabla_participantes">
                        
                        <?php include( "secciones/tabla_puntuaciones.php" ) ?>
                        
                    </div>
                    <div class="col-lg-5 order-sm-1 pr_50" style="padding-left: 2%">
                        <div class="faq_tab">
                            <img src="img/logo-bimbotinto.png" width="100%" align="center">
                            <img id="imgpremio" src="img/bimbo_trofeo.png" width="100%" align="center">
                            <h4 class="tit4 text-center">Puntuaciones</h4>
                            <ul class="nav nav-tabs text-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a href="inicio.php" class="jbtn btn_hover cus_mb-10">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a href="premios.php?premios" class="jbtn btn_hover cus_mb-10">Premios</a>
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
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/fn-transiciones.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        imagenPaso( "#imgpremio", "y-mov" );
        animarPremio();
        $("span[title]").click(function () {
          var $title = $(this).find(".title");
          if (!$title.length) {
            $(this).append('<span class="title">' + $(this).attr("title") + '</span>');
          } else {
            $title.remove();
          }
        });​
    </script>
</body>

</html>