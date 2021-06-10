<div id="bimbotinto-paso-2">
    <!-- Paso 2: Primer Gol -->
    <p align="center"> Selecciona <b>Ninguno</b> si crees que el equipo contrario anotará el primer gol</p>
    <div class="row fila_jugadores">
        <?php for ( $j = 0; $j < 11; $j++ ) { ?>
            <div class="col-6" align="center">
                <a href="#!" class="jg_gol" data-jg="<?php echo $prediccion["jugador$j"]?>">
                    <div id="jonce<?php echo $j?>" class="item jugador_alineado" style="position: relative;">
                        <img src="img/player.png" alt="" class="imgjugador">
                        <div class="nombre_jugador"><?php echo $prediccion["jugador$j"]?></div>
                    </div>
                </a> 
            </div>
        <?php } ?>
    </div>

    <div class="row fila_jugadores">
        <div class="col-12" align="center">
            <a href="#!" class="jg_gol" data-jg="Ninguno">
            <div id="jonce11" class="item jugador_alineado">
                <div class="nombre_jugador">Ninguno</div>
            </div>
        </a>
        </div>
    </div>

    <input id="jugador_primer_gol" type="hidden" value="">
</div>