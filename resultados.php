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
    include( "db/data-jugadores.php" );
    include( "db/fn-resultados.php" );

    checkSession( "" );
    $jugadores          = obtenerJugadores();
    $lista_jugadores    = array_merge( $jugadores["porteros"], $jugadores["mediocampistas"], 
                                       $jugadores["defensas"], $jugadores["delanteros"] ); 
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
        #frm_resultados{
            padding: 12px 4px;
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
                    <div class="col-lg-7 order-sm-12">
                        <div align="center">
                            <h1>Registro de resultados</h1>
                        </div>
                        <form id="frm_resultados" action="resultados.php?once_inicial" method="post">
                            <input type="hidden" name="jresultados" value="1">
                            <h2 class="text-right">Jornada</h2>
                            <hr>
                            <div class="row">
                                <div class="form-group text_box">
                                    <label class="f_p text_c f_900">Jornada</label>
                                    <select id="seljornada" name="jornada">
                                        <option value="0" disabled selected>Seleccione</option>
                                        <option value="1">Venezuela - Brasil</option>
                                        <option value="2">Venezuela - Colombia</option>
                                        <option value="3">Venezuela - Ecuador</option>
                                        <option value="4">Venezuela - Perú</option>
                                    </select>
                                </div>
                            </div>
                            
                            <a id="toggleJ" href="#!"><h2 class="text-right">Jugadores <i class="ti-arrow-up"></i></h2></a>
                            <hr>
                            <div id="Jtoggle">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group text_box">
                                            <label class="f_p text_c f_900">Portero</label>
                                            <select id="selportero" name="portero">
                                                <option value="0" selected>Seleccione</option>
                                                <?php foreach ( $jugadores["porteros"] as $j ): ?>
                                                    <option value="<?php echo $j['a'] ?>"><?php echo $j['a']." ".$j['n'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group text_box">
                                            <label class="f_p text_c f_900">Mediocampistas</label>
                                            
                                            <?php foreach ( $jugadores["mediocampistas"] as $j ): ?>
                                                <div>
                                                    <input type="checkbox" name="med[]" value="<?php echo $j['a'] ?>" class="chrjug"> 
                                                    <?php echo $j['a']." ".$j['n'] ?>
                                                </div>
                                            <?php endforeach ?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group text_box">
                                            <label class="f_p text_c f_900">Defensas</label>
                                            
                                            <?php foreach ( $jugadores["defensas"] as $j ): ?>
                                                <div>
                                                    <input type="checkbox" name="def[]" value="<?php echo $j['a'] ?>" class="chrjug">
                                                    <?php echo $j['a']." ".$j['n'] ?>
                                                </div>
                                            <?php endforeach ?>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group text_box">
                                            <label class="f_p text_c f_900">Delanteros</label>
                                            
                                            <?php foreach ( $jugadores["delanteros"] as $j ): ?>
                                                <div>
                                                    <input type="checkbox" name="del[]" value="<?php echo $j['a'] ?>" class="chrjug">
                                                    <?php echo $j['a']." ".$j['n'] ?>
                                                </div>
                                            <?php endforeach ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                                <a href="#!">
                                    <button type="submit" class="azbtn btn_hovert">Guardar</button>
                                </a>
                            </div>
                        </form>

                        <h2 class="text-right">Primer gol y ganador</h2>
                        <hr>
                        <div class="row">
                            <form id="frm_resultados_primer_gol" action="resultados.php?primer_gol" method="post">
                                <input type="hidden" name="jpgol" value="1">
                                <input type="hidden" id="idjornada_pgol" name="jornada" value="" class="valjornada">
                                <div class="col-6">
                                    <div class="form-group text_box">
                                        <label class="f_p text_c f_900">Primer Gol</label>
                                        <select id="primer_gol" name="primergol">
                                            <option value="Ninguno">Ninguno</option>
                                            <?php foreach ( $lista_jugadores as $j ): ?>
                                                <option value="<?php echo $j['a'] ?>"><?php echo $j['a']." ".$j['n'] ?></option>
                                            <?php endforeach ?>  
                                        </select>
                                    </div>
                                    <a href="#!">
                                        <button type="submit" class="azbtn btn_hovert">Guardar</button>
                                    </a>
                                </div>
                            </form>
                            <form id="frm_resultados_ganador" action="resultados.php?ganador" method="post">
                                <input type="hidden" name="jganador" value="1">
                                <input type="hidden" id="idjornada_ganador" name="jornada" value="" class="valjornada">
                                <div class="col-6">
                                    <div class="form-group text_box">
                                        <label class="f_p text_c f_900">Ganador Jornada</label>
                                        <select name="idganador">
                                            <option value="0" selected>Empate</option>
                                            <option value="1">Venezuela</option>
                                            <option value="2">Colombia</option>
                                            <option value="3">Brasil</option>
                                            <option value="4">Perú</option>
                                            <option value="5">Ecuador</option>
                                        </select>
                                    </div>
                                    <a href="#!">
                                        <button type="submit" class="azbtn btn_hovert">Guardar</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <div class="col-lg-5 order-sm-1 pr_50" style="padding-left: 2%">
                        <div class="faq_tab">
                            <div align="left">
                                <img src="img/logo-bimbotinto.png" width="80%" align="center" class="btinto_logo_inicio">
                            </div>
                            <div align="right">
                                <img id="imgcopa_america" src="img/copa-america.png" width="35%">
                            </div>
                            
                            <img id="imginicio" src="img/bimbotinto_jornada.png" width="100%" align="center">
                            
                            <div align="right">
                                <a href="inicio.php" class="align_right logout">
                                    <i class="ti-arrow-left"></i> Regresar
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
    <script src="js/fn-resultados.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        imagenPaso( "#imginicio", "escalfade" );
        logoCopa();
    </script>
</body>

</html>