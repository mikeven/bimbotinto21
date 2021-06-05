<div class="row">
    <div class="col-lg-6 col-sm-12">
        <h4 class="f_p t_color3 f_600 f_size_22 mb_20">Tu Once Inicial</h4>
        <div id="once_inicial">
            <?php for ( $j = 0; $j < 11; $j++ ) { ?>
                <div class="item jugador_once" style="position: relative;">
                    <img src="img/player.png" alt="" class="imgjugador">
                    <div class="nombre_jugador"><?php echo $prediccion["jugador$j"]?></div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div id="prediccion_primer_gol" class="bloque_prediccion">
            <h4 class="f_p t_color3 f_600 f_size_22 mb_20">Primer Gol</h4>
        
            <div class="item jugador_once" style="position: relative;">
                <img src="img/player.png" alt="" class="imgjugador">
                <div class="nombre_jugador"><?php echo $prediccion["primergol"]?></div>
            </div>
        </div>
        <div id="prediccion_ganador" class="bloque_prediccion">
            <h4 class="f_p t_color3 f_600 f_size_22 mb_20">Ganador del encuentro</h4>
            <div class="item jugador_once" style="position: relative;">
                <img src="img/player.png" alt="" class="imgjugador">
                <div class="nombre_jugador"><?php echo $prediccion["ganador"]?></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    
</div>