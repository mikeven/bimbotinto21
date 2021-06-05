<?php
    $chv = "";
    if( $prediccion ) $chv = "checked";
?>
<div id="esquema_aln" class="round__shape mt_30"> 
    <div class="s_promo_info">
        
        <!-- Portero -->

        <div class="row posicionalieacion">
            <div class="col" align="center">
                <div class="promo_item def1 scroll_animation">
                    <div class="text">
                        <img src="img/saas/icon/slack.png" alt="">
                    </div>
                </div>
                <div id="porteropos" class="etiq_portero e_pr"><?php echo $prediccion["jugador0"]?></div>
            </div>
        </div>
        
        <!-- MedioCampistas -->

        <div class="row posicionalieacion">
            
            <div class="col" align="center">
                <div class="promo_item def1 scroll_animation msup">
                    <div class="text">
                        <img src="img/saas/icon/slack.png" alt="">
                    </div>
                </div>
                <div id="mc1" class="etiq_jugador e_mc"><?php echo $prediccion["jugador1"]?></div>
            </div>
            <div class="col" align="center">
                <div class="promo_item def2 scroll_animation">
                    <div class="text">
                        <img src="img/saas/icon/slack.png" alt="">
                    </div>
                </div>
                <div id="mc2" class="etiq_jugador e_mc"><?php echo $prediccion["jugador2"]?></div>
            </div>
            <div class="col" align="center">
                <div class="promo_item def2 scroll_animation">
                    <div class="text">
                        <img src="img/saas/icon/slack.png" alt="">
                    </div>
                </div>
                <div id="mc3" class="etiq_jugador e_mc"><?php echo $prediccion["jugador3"]?></div>
            </div>
            <div class="col" align="center">
                <div class="promo_item def2 scroll_animation msup">
                    <div class="text">
                        <img src="img/saas/icon/slack.png" alt="">
                    </div>
                </div>
                <div id="mc4" class="etiq_jugador e_mc"><?php echo $prediccion["jugador4"]?></div>
            </div>

        </div>
        
        <!-- Defensas -->

        <div class="row posicionalieacion">
            
            <div class="col" align="center">
                <div class="promo_item def1 scroll_animation msup">
                    <div class="text">
                        <img src="img/saas/icon/slack.png" alt="">
                    </div>
                </div>
                <div id="df1" class="etiq_jugador e_df"><?php echo $prediccion["jugador5"]?></div>
            </div>
            <div class="col" align="center">
                <div class="promo_item def2 scroll_animation">
                    <div class="text">
                        <img src="img/saas/icon/slack.png" alt="">
                    </div>
                </div>
                <div id="df2" class="etiq_jugador e_df"><?php echo $prediccion["jugador6"]?></div>
            </div>
            <div class="col" align="center">
                <div class="promo_item def2 scroll_animation">
                    <div class="text">
                        <img src="img/saas/icon/slack.png" alt="">
                    </div>
                </div>
                <div id="df3" class="etiq_jugador e_df"><?php echo $prediccion["jugador7"]?></div>
            </div>
            <div class="col" align="center">
                <div class="promo_item def2 scroll_animation msup">
                    <div class="text">
                        <img src="img/saas/icon/slack.png" alt="">
                    </div>
                </div>
                <div id="df4" class="etiq_jugador e_df"><?php echo $prediccion["jugador8"]?></div>
            </div>

        </div>

        <!-- Delanteros -->

        <div class="row posicionalieacion">
            
            <div class="col" align="center">
                <div class="promo_item def1 scroll_animation">
                    <div class="text">
                        <img src="img/saas/icon/slack.png" alt="">
                    </div>
                </div>
                <div id="dl1" class="etiq_jugador e_dl"><?php echo $prediccion["jugador9"]?></div>
            </div>
            <div class="col" align="center">
                <div class="promo_item def2 scroll_animation">
                    <div class="text">
                        <img src="img/saas/icon/slack.png" alt="">
                    </div>
                </div>
                <div id="dl2" class="etiq_jugador e_dl"><?php echo $prediccion["jugador10"]?></div>
            </div>

        </div>
        
    </div>
</div>

<form id="frm_alineacion">
    
    <div style="display: none;">
        <!-- Portero -->
        <input id="ch_jg0" type="checkbox" name="al_jugadores[]" class="chjugador" 
        value="<?php echo $prediccion['jugador0']?>" <?php echo $chv ?>/>
        
        <!-- Mediocampistas -->
        <input id="ch_jg1" type="checkbox" name="al_jugadores[]" class="chjugador" 
        value="<?php echo $prediccion['jugador1']?>" <?php echo $chv ?>/>
        <input id="ch_jg2" type="checkbox" name="al_jugadores[]" class="chjugador" 
        value="<?php echo $prediccion['jugador2']?>" <?php echo $chv ?>/>
        <input id="ch_jg3" type="checkbox" name="al_jugadores[]" class="chjugador" 
        value="<?php echo $prediccion['jugador3']?>" <?php echo $chv ?>/>
        <input id="ch_jg4" type="checkbox" name="al_jugadores[]" class="chjugador" 
        value="<?php echo $prediccion['jugador4']?>" <?php echo $chv ?>/>

        <!-- Defensas -->
        <input id="ch_jg5" type="checkbox" name="al_jugadores[]" class="chjugador" 
        value="<?php echo $prediccion['jugador5']?>" <?php echo $chv ?>/>
        <input id="ch_jg6" type="checkbox" name="al_jugadores[]" class="chjugador" 
        value="<?php echo $prediccion['jugador6']?>" <?php echo $chv ?>/>
        <input id="ch_jg7" type="checkbox" name="al_jugadores[]" class="chjugador" 
        value="<?php echo $prediccion['jugador7']?>" <?php echo $chv ?>/>
        <input id="ch_jg8" type="checkbox" name="al_jugadores[]" class="chjugador" 
        value="<?php echo $prediccion['jugador8']?>" <?php echo $chv ?>/>

        <!-- Delanteros -->
        <input id="ch_jg9" type="checkbox" name="al_jugadores[]" class="chjugador" 
        value="<?php echo $prediccion['jugador9']?>" <?php echo $chv ?>/>
        <input id="ch_jg10" type="checkbox" name="al_jugadores[]" class="chjugador" 
        value="<?php echo $prediccion['jugador10']?>" <?php echo $chv ?>/>
    
    </div>

</form>