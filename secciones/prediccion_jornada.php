<div class="row">
    <div class="col-lg-6 col-sm-12">
        <h4 class="tit4">Tu Once Inicial</h4>
        <div id="once_inicial">
            <?php for ( $j = 0; $j < 11; $j++ ) { ?>
                <div id="rjor<?php echo $j ?>" class="item jugador_once" style="position: relative;">
                    <img src="img/player.png" alt="" class="imgjugador">
                    <div class="nombre_jugador"><?php echo $prediccion["jugador$j"]?></div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div id="prediccion_primer_gol" class="bloque_prediccion">
            <h4 class="tit4">Primer Gol</h4>
        
            <div id="rjor11" class="item jugador_once" style="position: relative;">
                <img src="img/player.png" alt="" class="imgjugador">
                <div class="nombre_jugador"><?php echo $prediccion["primergol"]?></div>
            </div>
        </div>
        <div id="prediccion_ganador" class="bloque_prediccion">
            <h4 class="tit4">Ganador del encuentro</h4>
            <div id="rjor12" class="item jugador_once" style="position: relative;">
                <img src="<?php echo $prediccion['bandera']?>" alt="" class="imgbandera">
                <div class="nombre_jugador"><?php echo $prediccion["ganador"]?></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    
</div>