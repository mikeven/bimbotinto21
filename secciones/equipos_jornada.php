<div class="row fila_jugadores">
    <div class="col-4" align="center">
        <a href="#!" class="eq_jornada" data-equipo="<?php echo $jornada_activa['idequipo1']?>">
            <div class="item jugador_alineado">
                <img src="<?php echo $jornada_activa['bandera1']?>" alt="" class="imgequipo">
                <div class="nombre_equipo"><?php echo $jornada_activa["equipo1"]?></div>
            </div>
        </a>
    </div>
    <div class="col-4" align="center">
        <a href="#!" class="eq_jornada" data-equipo="<?php echo $jornada_activa['idequipo2']?>" >
            <div class="item jugador_alineado">
                <img src="<?php echo $jornada_activa['bandera2']?>" alt="" class="imgequipo">
                <div class="nombre_equipo"><?php echo $jornada_activa["equipo2"]?></div>
            </div>
        </a>
    </div>
    <div class="col-4" align="center">
        <a href="#!" class="eq_jornada" data-equipo="0">
            <div class="item jugador_alineado">
                <img src="img/empate.png" alt="" class="imgequipo">
                <div class="nombre_equipo">Empate</div>
            </div>                            
        </a>
    </div>
</div>

<input id="ganador" type="hidden" value="">