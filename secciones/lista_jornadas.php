<div class="app_testimonial_slider owl-carousel">
    <?php 
        foreach ( $jornadas as $j ) { 
            
            $predicc_iniciada = prediccionJornadaActualIniciada( $dbh, $j["idj"], $idp );

            $icon           = "ti-unlock";      // icono candado abierto
            $btn_class      = "jbtn";           // botón rojo

            if( $predicc_iniciada ){
                $jlink      = "jornada.php?j=$j[idj]";
                $txboton    = "Ver mi predicción";
            }else{
                $txboton    = "Jugar jornada";
                $jlink      = "alineacion.php";
            }
            
            if( $j["cerrado"] == 1 ){
                $icon           = "ti-lock";    // icono candado cerrado

                if( $predicc_iniciada ){
                    $txboton    = "Ver mi predicción";
                }else{
                    $btn_class  = "jbtn_l";
                }
            }
    ?>
    <div class="app_testimonial_item text-center">
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
                            <i class="<?php echo $icon ?>"></i> <?php echo $txboton ?>
                        </a>
                    </span>
                    <div align="center" class="candado">
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    

<?php } ?>

</div>

<div class="app_testimonial_slider owl-carousel" style="display: none;">
        <div class="app_testimonial_item text-center">
            <div class="author-img"><img src="img/home7/testimonial_author_img.png" alt=""></div>
            <div class="author_info">
                <h6 class="f_p f_500 f_size_18 t_color3 mb-0">Lurch Schpellchek</h6>
                <p>UI/UX designer</p>
            </div>
            <p class="f_400">What a load of rubbish bits and bobs pear shaped owt to do with me bubble and squeak jolly good morish tinkety tonk old fruit, car boot my good sir buggered plastered cheeky David, haggle young delinquent say so I said bite your arm off easy peasy. Skive off it's all gone to pot buggered.</p>
        </div>
        <div class="app_testimonial_item text-center">
            <div class="author-img"><img src="img/home7/testimonial_author_img.png" alt=""></div>
            <div class="author_info">
                <h6 class="f_p f_500 f_size_18 t_color3 mb-0">Lurch Schpellchek</h6>
                <p>UI/UX designer</p>
            </div>
            <p class="f_400">What a load of rubbish bits and bobs pear shaped owt to do with me bubble and squeak jolly good morish tinkety tonk old fruit, car boot my good sir buggered plastered cheeky David, haggle young delinquent say so I said bite your arm off easy peasy. Skive off it's all gone to pot buggered.</p>
        </div>
        <div class="app_testimonial_item text-center">
            <div class="author-img"><img src="img/home7/testimonial_author_img.png" alt=""></div>
            <div class="author_info">
                <h6 class="f_p f_500 f_size_18 t_color3 mb-0">Lurch Schpellchek</h6>
                <p>UI/UX designer</p>
            </div>
            <p class="f_400">What a load of rubbish bits and bobs pear shaped owt to do with me bubble and squeak jolly good morish tinkety tonk old fruit, car boot my good sir buggered plastered cheeky David, haggle young delinquent say so I said bite your arm off easy peasy. Skive off it's all gone to pot buggered.</p>
        </div>
    </div>
    
    <hr>
