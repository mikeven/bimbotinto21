<div class="tab-content faq_content Cus_acc" id="puntuaciones">
    <div class="tab-pane fade show active" id="purchas" role="tabpanel" aria-labelledby="purchas-tab">
        <div id="accordion">
        	<?php 
        		$xpnd = "true"; $show = "show"; $cllp = "";
        		foreach ( $jornadas as $jr ) { 
        			$puntuaciones = obtenerPuntuaciones( $dbh, $jr["idj"] );
        	?>
            <div class="card">
                <div class="card-header" id="hpj<?php echo $jr['idj'] ?>">
                    <h5 class="mb-0">
                    <button class="btn btn-link <?php echo $cllp ?>" data-toggle="collapse" 
                    	data-target="#pj<?php echo $jr['idj'] ?>" aria-expanded="<?php echo $xpnd ?>" aria-controls="pj<?php echo $jr['idj'] ?>">
                    	<?php echo $jr["equipo1"]."-".$jr["equipo2"] ?> 
                    	<span class="tabfecha"><?php echo $jr["fecha"] ?></span>
                    	<i class="ti-plus"></i><i class="ti-minus"></i>
                    </button>
                    </h5>
                </div>

                <div id="pj<?php echo $jr['idj'] ?>" class="collapse <?php echo $show ?>" 
                	aria-labelledby="hpj<?php echo $jr['idj'] ?>" data-parent="#accordion">
                    <div class="card-body">
                        <table class="tabla_posiciones">
							<thead>
								<tr>
									<th width="10%">Posición</th>
									<th width="70%">Participante</th>
									<th width="10%">Puntos</th>
									<th width="10%"></th>
								</tr>
							</thead>
							<tbody>
								<?php $p = 1; foreach ( $puntuaciones as $reg ) { ?>
									<tr>
										<td align="center"><?php echo $p ?></td>
										<td><?php echo $reg["participante"] ?></td>
										<td align="center"><?php echo $reg["total"] ?></td>
										<td align="center"><i class="ti-layout-media-right-alt"></td>
									</tr>
								<?php $p++; } ?>
							</tbody>
						</table>
                    </div>
                </div>
            </div>
            <?php $xpn = "false"; $show = ""; $cllp = "collapsed";} ?>
        </div>
        
    </div>
    
</div>


