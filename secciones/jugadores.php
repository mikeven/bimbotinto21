<div id="jugadores_posiciones" class="job_listing Cus_jobli">
    <h5 class="tit4 text-center">Posiciones</h5>
    
    <div id="job_filter" class="job_list_tab">
        <div class="row">
            <div class="col-sm-6 col-xs-6" align="center">
                <div id="initclic" data-filter=".prt" class="list_item_tab active">Porteros</div>
            </div>
            <div class="col-sm-6 col-xs-6" align="center">
                <div data-filter=".med" class="list_item_tab">Mediocampistas</div>
            </div>
        </div>
        <div class="row">
            <div class="col" align="center" align="center">
                <div data-filter=".def" class="list_item_tab">Defensas</div>
            </div>
            <div class="col" align="center" align="center">
                <div data-filter=".del" class="list_item_tab">Delanteros</div>
            </div>
        </div>
    </div>
    
    <div id="tab_filter" class="tabposiciones_jugadores" data-delclass="listing_tab">
        
        <!-- Porteros -->
        <div class="row fila_jugadores">
            <?php 
                $jg = 0;
                foreach ( $jugadores["porteros"] as $j ): 
                    $jsel = jPreseleccionado( $j, $prediccion, "P" );
            ?>
                <div class="col" align="center">
                    <a href="#!" class="jgseleccion" data-jg="<?php echo $j['a'] ?>" data-trg="e_pr" data-pj="pj<?php echo $jg ?>">
                        <div id="pj<?php echo $jg ?>" class="item prt <?php echo $jsel?>">
                            <img src="img/player.png" alt="" class="imgjugador">
                            <div class="nombre_jugador_pos"><?php echo $j["n"]." ".$j["a"] ?></div>
                        </div>
                    </a>
                </div>
            <?php $jg++; endforeach ?>
        </div>

        <!-- Mediocampistas -->
        <div class="row fila_jugadores">
            <?php foreach ( $jugadores["mediocampistas"] as $j ): 
                $jsel = jPreseleccionado( $j, $prediccion, "M" );
            ?>
                <div class="col" align="center">
                    <a href="#!" class="jgseleccion" data-jg="<?php echo $j['a'] ?>" data-trg="e_mc">
                        <div class="item med <?php echo $jsel?>">
                            <img src="img/player.png" alt="" class="imgjugador">
                            <div class="nombre_jugador_pos"><?php echo $j["n"]." ".$j["a"] ?></div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>

        <!-- Defensas -->
        <div class="row fila_jugadores">
            <?php foreach ( $jugadores["defensas"] as $j ): 
                $jsel = jPreseleccionado( $j, $prediccion, "D" );
            ?>
                <div class="col" align="center">
                    <a href="#!" class="jgseleccion" data-jg="<?php echo $j['a'] ?>" data-trg="e_df">    
                        <div class="item def <?php echo $jsel?>">
                            <img src="img/player.png" alt="" class="imgjugador">
                            <div class="nombre_jugador_pos"><?php echo $j["n"]." ".$j["a"] ?></div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>

        <!-- Delanteros -->
        <div class="row fila_jugadores">
            <?php foreach ( $jugadores["delanteros"] as $j ): 
                $jsel = jPreseleccionado( $j, $prediccion, "DL" );
            ?>
                <div class="col" align="center">
                    <a href="#!" class="jgseleccion" data-jg="<?php echo $j['a'] ?>" data-trg="e_dl">
                        <div class="item del <?php echo $jsel?>">
                            <img src="img/player.png" alt="" class="imgjugador">
                            <div class="nombre_jugador_pos"><?php echo $j["n"]." ".$j["a"] ?></div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>

    </div>
    
</div>
<div style="height: 50px;"></div>