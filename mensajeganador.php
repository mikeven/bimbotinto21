<?php
	/* ----------------------------------------------------------------------------------- */
	/* Bimbo Tinto - Funciones de usuarios */
	/* ----------------------------------------------------------------------------------- */
	/* ----------------------------------------------------------------------------------- */
	
	/* ----------------------------------------------------------------------------------- */
	function enviarMensajeGanador( $e_mail, $mje ){
		// Envía un mensaje por email con contraseña de usuario

		$asunto = "Felicidades";
		$oemail = "bimbotinto@bimbovenezuela.com";
		
		$cabeceras = "Reply-To: Bimbotinto <$oemail>\r\n"; 
  		$cabeceras .= "Return-Path: Bimbotinto <$oemail>\r\n";
  		$cabeceras .= "From: Bimbotinto <$oemail>\r\n"; 
		$cabeceras .= "Organization: Bimbo\r\n";
	  	$cabeceras .= "X-Priority: 3\r\n";
	  	$cabeceras .= "X-Mailer: PHP". phpversion() ."\r\n"; 
		$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        
        $mensaje  	= $mje;

		return mail( $e_mail, $asunto, $mensaje, $cabeceras );
	}
	/* ----------------------------------------------------------------------------------- */
	function mensajeGanador( $premio, $nombre ){
		if( $premio == 1 )
			$plantilla 		= file_get_contents( "fn/mailing/premio_camisa.html" );
		if( $premio == 2 )
			$plantilla 		= file_get_contents( "fn/mailing/premio_cesta.html" );

		$mensaje 		= str_replace( "{participante}", $nombre, $plantilla );

		return $mensaje;
	}	
	/* ----------------------------------------------------------------------------------- */
	ini_set( 'display_errors', 1 );

	/*
	//Premio principal
	$e_mail = "enyerbethjose94@gmail.com"; $nombre = "Enyerbeth Véliz";
	$mensaje = mensajeGanador( 1, $nombre );
	if( enviarMensajeGanador( $e_mail, $mensaje ) )
		echo "Mensaje enviado a: $nombre - $e_mail"."<br>";
	
	//Premio sorteo
	$e_mail = "lejardy.churio@gmail.com"; $nombre = "Lejardy Churio";
	$mensaje = mensajeGanador( 2, $nombre );
	if( enviarMensajeGanador( $e_mail, $mensaje ) )
		echo "Mensaje enviado a: $nombre - $e_mail"."<br>";*/
?>