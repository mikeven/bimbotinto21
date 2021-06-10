<?php 
    foreach ( $jornadas as $j ) { 
        
        $predicc_iniciada   = prediccionJornadaIniciada( $dbh, $j["idj"], $idp );
        $puntaje            = obtenerPuntuacionJornadaParticipante( $dbh, $idp, $j["idj"] );
        $puntosj            = $puntaje["puntos"] == NULL ? 0 : $puntaje["puntos"];
        
        $icon               = "ti-unlock";      // icono candado abierto
        $btn_class          = "jbtn";           // botón rojo

        if( $predicc_iniciada ){
            $jlink          = "jornada.php?j=$j[idj]";
            $txboton        = "Ver mi predicción";
        }else{
            $txboton        = "Jugar jornada";
            $jlink          = "alineacion.php";
        }
        
        if( $j["cerrado"] == 1 ){
            $icon           = "ti-lock";    // icono candado cerrado

            if( $predicc_iniciada ){
                $txboton    = "Ver mi predicción";
            }else{
                $btn_class  = "jbtn_l";     // botón gris
                $jlink      = "#!";
            }
        }
?>

    <div class="jornada bloque_jornada">
        <div class="row enc_jornada">
            <div class="col-lg-12">
                <div class="enc_fecha" align="center">
                    <span class="fecha_jornada"><?php echo $j["fecha"]?></span>
                </div>
            </div>
        </div>
        <div class="row data_jornada">
            <div class="col-5">
                <div class="equipo"><img src="<?php echo $j['bandera1']?>"></div>
            </div>
            <div class="col-2 colptj" align="center">
                <span class="jvs">Vs</span>
                <div class="puntaje_jornada">
                    <?php echo $puntosj ?> pts.
                </div>
            </div>
            <div class="col-5">
                <div class="equipo"><img src="<?php echo $j['bandera2']?>"></div>
            </div>
        </div>
        <div class="row jugar_jornada">
            <div class="col-12" align="center">
                <span class="jvs">
                    <a href="<?php echo $jlink ?>" class="cus_mb-10 <?php echo $btn_class ?>">
                        <i class="<?php echo $icon ?>"></i> <?php echo $txboton ?>
                    </a>
                </span>
                <div align="center" class="candado">
                    
                </div>
            </div>
            
        </div>
    </div>
    
    <hr>

<?php } ?>
