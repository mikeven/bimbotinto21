<!doctype html>
<html lang="en">

<head>
    <!-- Primary Meta Tags -->
    <title>Premios::BimboTinto</title>
    <meta charset="UTF-8">
    <meta name="title" content="BimboTinto - premios">
    <meta name="description" content="BimboTinto 2021">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://bimbovenezuela.com/bimbotinto/">
    <meta property="og:title" content="BimboTinto">
    <meta property="og:description" content="BimboTinto 2021">
    <meta property="og:image" content="https://bimbovenezuela.com/bimbotinto/img/bimbotinto-aplicacion.png">
    <meta property="og:image:secure_url" content="https://bimbovenezuela.com/bimbotinto/img/bimbotinto-aplicacion.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="450"/>
    <meta property="og:image:alt" content="Bimbo Tinto"/>

    <meta property="fb:app_id" content="771429363482702"/>

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://bimbovenezuela.com/bimbotinto/">
    <meta property="twitter:title" content="BimboTinto">
    <meta property="twitter:description" content="BimboTinto 2021">
    <meta property="twitter:image" content="https://bimbovenezuela.com/bimbotinto/img/bimbotinto-aplicacion.png">

    <link rel="canonical" href="https://www.bimbovenezuela.com/registro.html"/>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/bootstrap-selector/css/bootstrap-select.min.css">
    <!--icon font css-->
    <link rel="stylesheet" href="vendors/themify-icon/themify-icons.css">
    <link rel="stylesheet" href="vendors/elagent/style.css">
    <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
    <link rel="stylesheet" href="vendors/animation/animate.css">
    <link rel="stylesheet" href="vendors/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/magnify-pop/magnific-popup.css">
    <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="vendors/scroll/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom_styles.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="vendors/bootstrapvalidator/dist/css/bootstrapValidator.min.css" type="text/css">
    <style type="text/css">
        .sec_pad {
            padding: 60px 0px;
        }
        #logobimbotinto{
            text-align: center;
        }
        .imgbtinto{
            max-height: 80px;
        }
        .bloque_premio{
            margin: 10% 30%;
        }
        .enc_premio {
            -webkit-border-top-left-radius: 25px;
            -webkit-border-top-right-radius: 25px;
            -moz-border-radius-topleft: 25px;
            -moz-border-radius-topright: 25px;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            background: #9d0b0b;
        }
        .franelapremio {
            max-width: 700px;
            background: #be1616;
            padding: 20% 10%;
        }
        .pie_premio{
            -webkit-border-bottom-right-radius: 25px;
            -webkit-border-bottom-left-radius: 25px;
            -moz-border-radius-bottomright: 25px;
            -moz-border-radius-bottomleft: 25px;
            border-bottom-right-radius: 25px;
            border-bottom-left-radius: 25px;
            background: #8b8b8b;
        }
        .pie_premio span, .enc_premio span{ width: 100%; color: #fff; }
        <?php if( isset( $_GET["reglas"] ) ) { ?>
            #premio_bimbotinto{ display: none; }
        <?php } ?>
        <?php if( isset( $_GET["premios"] ) ) { ?>
            #reglas_bimbotinto{ display: none; }
        <?php } ?>
    </style>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-4EFGSZZVCN');
    </script>
</head>

<body>
    
    <div class="body_wrapper">
        <section id="fondo_actividad" class="sign_in_area bg_color sec_pad" style="min-height: 100vh">
            
            <div class="container">

                <div id="logobimbotinto">
                    <img src="img/logo-bimbotinto.png" width="30%" align="center">
                </div>

                <div class="sign_info">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="sign_info_content">
                                <div class="start_img">
                                    <img id="imgpremio" src="img/bimbo_trofeo.png" alt="" style="max-width: 100%;">
                                </div>
                                <div align="center">
                                    <a class="jbtn btn_hover cus_mb-10" href="inicio.php">
                                        <i class="ti-arrow-left"></i> Inicio 
                                    </a>
                                </div>
                            </div>
                            <div id="condiciones" class="row">
                                <div class="col-6" align="right">
                                    <a id="enl_premios" class="" href="#"> Premios </a>
                                </div>
                                <div class="col-6" align="left">
                                    <a id="enl_reglas" class="" href="#"> Reglas </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div id="premio_bimbotinto" class="premio" align="center">

                                <h2 class="tit1">Premios</h2>                                
                                <p align="center">
                                    <b>El ganador de cada jornada se llevará como premio la camiseta oficial de la Vinotinto</b>
                                </p>
                                <div id="premio_franela" class="bloque_premio">
                                    <div class="row enc_premio" align="center">
                                        <span>Premio por cada jornada</span>
                                    </div>
                                    <div class="row franelapremio" align="center">
                                        <img id="imgfranela" src="img/franela-vintotinto.png" width="100%" style="margin: 0 auto;">
                                    </div>
                                    <div class="row pie_premio" align="center">
                                        <span>Camiseta oficial de la Vinotinto 2021</span>
                                    </div>
                                </div>
                                <div id="premio_adicional">
                                    <p align="center">
                                        Adicionalmente, sortearemos de manera aleatoria una cesta de productos Bimbo entre todos los participantes de cada jornada.
                                    </p>
                                    <div id="premio_cesta" class="bloque_premio">
                                        <div class="row enc_premio" align="center">
                                            <span>Premio participante aleatorio</span>
                                        </div>
                                        <div class="row franelapremio" align="center">
                                            <img id="imgcesta" src="img/bimbocesta.png" width="100%" style="margin: 0 auto;">
                                        </div>
                                        <div class="row pie_premio" align="center">
                                            <span>Productos Bimbo</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="reglas_bimbotinto" class="premio">

                                <h2 class="tit1" align="center">Reglas</h2>                                
                                <p>
                                    Los participantes deberán tener la mayor cantidad de aciertos a las opciones presentadas para cada partido de la Vinotinto. Únicamente debes cumplir las siguientes condiciones:
                                </p>
                                <ol>
                                    <li>Registrarte</li>
                                    <li>Completar los 3 pasos</li>
                                    <li>Una vez hecho el registro, deberás adjuntar la foto de una factura con algunos de los productos Bimbo. (Para ser seleccionado como ganador, todos pueden participar)</li>
                                </ol>

                                <h2 class="tit4">Puntaje</h2>
                                <div class="texto_reglas">
                                    <ul>
                                        <li><span class="btpts">+5 pts</span> Por cada jugador acertado del once inicial </li>
                                        <li><span class="btpts">+60 pts</span> Por acertar quién marcará el primer gol del partido 
                                        </li>
                                        <li><span class="btpts">+30 pts</span> Por acertar el resultado del partido  (equipo A, equipo B, empate)
                                        </li>
                                    </ul>
                                </div>
                                <h2 class="tit4">Ganadores</h2>
                                <div class="texto_reglas">
                                    <p> El ganador de cada jornada se anunciará al día siguiente luego de concluir el juego donde participe la Vinotinto. De igual forma la tabla de posiciones se encontrará abierta para que pueda visualizarse como fue su puntuación con respecto a los otros concursantes. En caso que dos o más personas obtengan la máxima puntuación, el desempate se llevará a cabo mediante un sorteo.
                                    </p>
                                </div>
                                <h2 class="tit4">Partidos de la Vinotinto</h2>
                                <div class="texto_reglas">
                                    <ul>
                                        <li>Dom 13/06: Venezuela - Brasil</li>
                                        <li>Jue 17/06: Venezuela - Colombia</li>
                                        <li>Dom 20/06: Venezuela - Ecuador</li>
                                        <li>Dom 27/06: Venezuela - Perú</li>
                                    </ul>
                                </div>
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
    <!--<script src="js/validator.min.js"></script>-->
    <script src="vendors/wow/wow.min.js"></script>
    <script src="vendors/sckroller/jquery.parallax-scroll.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/isotope/isotope-min.js"></script>
    <script src="vendors/magnify-pop/jquery.magnific-popup.min.js"></script>
    <script src="vendors/scroll/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script src="js/fn-bimbotinto.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/fn-transiciones.js"></script>
    <script src="js/fn-bimbotinto.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        imagenPaso( "#imgpremio", "y-mov" );
        animarPremio();
    </script>
    <!-- Validator -->
    <script src="vendors/bootstrapvalidator/dist/js/bootstrapValidator.min.js" type="text/javascript"></script>
    <script src="js/fn-user.js"></script>
</body>

</html>