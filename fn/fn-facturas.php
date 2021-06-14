<?php
	if( isset( $_GET['exito'] ) ){
		$tipo_mensaje = "success";
		if( $_GET['exito'] != 1 )
			$tipo_mensaje = "error";

		$mensajes = array(
			-2 => "Archivo inválido, los formatos válidos son: PDF, JPG, JPEG y PNG",
			-1 => "Error al cargar factura",
			-0 => "Error al cargar factura, archivo vacío",
			 1 => "Factura cargada con éxito", 
		);
	}
?>