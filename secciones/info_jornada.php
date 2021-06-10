<div id="datos_jornada" class="row" style="display: none">
    <div class="col-2" align="right">
        <?php echo substr( $jornada["equipo1"], 0, 3 ); ?>
    </div>
    <div class="col-3" align="center">
        <img src="<?php echo $jornada['bandera1']?>" class="banderas_jornada">
    </div>
    <div class="col-2" align="center">
        Vs
    </div>
    <div class="col-3" align="center">
        <img src="<?php echo $jornada['bandera2']?>" class="banderas_jornada">
    </div>
    <div class="col-2" align="left">
        <?php echo substr( $jornada["equipo2"], 0, 3 ); ?>
    </div>
</div>

<div class="jornada bloque_jornada">
        <div class="row enc_jornada">
            <div class="col-lg-12">
                <div class="enc_fecha" align="center">
                    <span class="fecha_jornada"><?php echo $jornada["fechadia"] ?></span>
                </div>
            </div>
        </div>
        <div class="row data_jornada">
            <div class="col-5">
                <div class="equipo" align="center">
                    <img src="<?php echo $jornada['bandera1']?>" class="banderas_jornada">
                </div>
            </div>
            <div class="col-2" align="center">
                <span class="jvs">Vs</span>
            </div>
            <div class="col-5">
                <div class="equipo" align="center">
                    <img src="<?php echo $jornada['bandera2']?>" class="banderas_jornada">
                </div>
            </div>
        </div>
        
    </div>