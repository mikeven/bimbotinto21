<?php 
    foreach ( $jornadas as $j ) { 
        
        $jornada_actual = obtenerJornadaActiva( $dbh );
        
        $idj        = $jornada_actual["id"];
        $jlink      = "alineacion.php?j=$idj";
        $icon       = "ti-unlock";
        $btn_class  = "jbtn";
        
        if( $j["cerrado"] == 1 ){
            $btn_class = "jbtn_l"; $jlink = "#!"; $icon = "ti-lock";
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
            <div class="col-2" align="center">
                <span class="jvs">Vs</span>
            </div>
            <div class="col-5">
                <div class="equipo"><img src="<?php echo $j['bandera2']?>"></div>
            </div>
        </div>
        <div class="row jugar_jornada">
            <div class="col-12" align="center">
                <span class="jvs">
                    <a href="<?php echo $jlink ?>" class="cus_mb-10 <?php echo $btn_class ?>">
                        <i class="<?php echo $icon ?>"></i> Jugar jornada
                    </a>
                </span>
                <div align="center" class="candado">
                    
                </div>
            </div>
            
        </div>
    </div>
    
    <hr>

<?php } ?>
