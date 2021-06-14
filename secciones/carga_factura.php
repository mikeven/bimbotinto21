
<!-- Formulario de factura -->
<div id="formulario_factura">
    <form id="frm_factura" action="db/data-user.php" class="login-form mt_60" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="factura_participante" value="<?php echo $idp?>">
        <div class="form-group text_box">
            <label class="f_p text_c f_900">Archivo</label>
            <input type="file" placeholder="Nombre" name="archivo_factura" required>
        </div>
        <div align="center" style="margin-top: 50px">
            <button type="submit" class="azbtn btn_hovert envfac">Enviar</button>
        </div>
    </form>
</div>
<?php if( $participante["factura"] != "" ) { ?>
    <p>Ya registraste una factura: <span class="narchivofact"><?php echo $participante['factura']?></span></p>
    <div id="factura_actual" align="center">
        <img src="db/facturas/<?php echo $participante['factura']?>" height="250">
    </div>
    
    <p style="padding: 18px">Para cambiar esta factura, haz clic <a id="enl_frmfactura" href="#!" class="enlfrmfactura"><b>Aquí</b></a></p>
<?php } ?>   

<?php if(isset($_GET['exito'] ) ){
    // Manejo de mensaje de error: fn/fn-facturas.php ?>
    <div class="alert <?php echo $tipo_mensaje ?>">
        <div class="alert_body">
            <i class="icon-close"></i>
            <?php echo $mensajes[ $_GET["exito"] ]?>
        </div>
        <div class="alert_close"><i class="icon_close"></i></div>
    </div>
<?php } ?>