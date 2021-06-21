<?php
	/* ----------------------------------------------------------------------------------- */
	/* Bimbo Tinto - Funciones sobre jornadas */
	/* ----------------------------------------------------------------------------------- */
	/* ----------------------------------------------------------------------------------- */
	function obtenerJornadas( $dbh ){
		// Devuelve los datos de los partidos registrados de la Vinotinto
		$q = "select j.id as idj, date_format(j.fecha,'%d de %M') as fecha, e1.nombre as equipo1, e1.bandera as bandera1, 
				e2.nombre as equipo2, e2.bandera as bandera2, j.cerrado from jornada j, equipo e1, equipo e2 
				where j.equipo1 = e1.id and j.equipo2 = e2.id order by fecha asc";
		
		return obtenerListaRegistros( mysqli_query( $dbh, $q ) );
	}
	/* ----------------------------------------------------------------------------------- */
	function obtenerJornadaActiva( $dbh ){
		// Devuelve los datos de los partidos registrados de la Vinotinto
		$q = "select id from jornada where cerrado = 0";
		
		return mysqli_fetch_array( mysqli_query ( $dbh, $q ) );
	}
	/* ----------------------------------------------------------------------------------- */
	function obtenerJornadaPorId( $dbh, $idj ){
		// Devuelve los datos de los partidos registrados de la Vinotinto
		$q = "select j.id as idj, date_format(j.fecha,'%d de %M') as fecha, j.cerrado, 
				date_format(j.fecha,'%W %d de %M') as fechadia, e1.id as idequipo1, e1.nombre as equipo1, 
				e1.bandera as bandera1, e2.id as idequipo2, e2.nombre as equipo2, e2.bandera as bandera2, j.cerrado 
				from jornada j, equipo e1, equipo e2 where j.equipo1 = e1.id and j.equipo2 = e2.id and j.id = $idj";
		
		return mysqli_fetch_array( mysqli_query ( $dbh, $q ) );
	}
	/* ----------------------------------------------------------------------------------- */
	function obtenerPrediccionJornadaUsuario( $dbh, $idp, $idj ){
		// Devuelve los datos de los partidos registrados de la Vinotinto
		$q = "select p.id, p.jugador0, p.jugador1, p.jugador2, p.jugador3, p.jugador4, p.jugador5, 
				p.jugador6, p.jugador7, p.jugador8, p.jugador9, p.jugador10, p.primergol, p.ganador as idganador, 
				e.nombre as ganador, e.bandera, p.puntos_alineacion, p.puntos_primergol, p.puntos_ganador 
				from prediccion p left join equipo e on p.ganador = e.id 
				where p.jornada = $idj and p.idParticipante = $idp";

		return mysqli_fetch_array( mysqli_query ( $dbh, $q ) );
	}
	/* ----------------------------------------------------------------------------------- */
	function registrarPrediccionAlineacion( $dbh, $idp, $idj, $jgd ){
		// Registra los datos de predicción de la alineación de una jornada asociado a un usuario
		$q = "insert into prediccion (idParticipante, jornada, fecha_actualizacion, 
				jugador0, jugador1, jugador2, jugador3, jugador4, jugador5, jugador6, jugador7, 
				jugador8, jugador9, jugador10, puntos_alineacion, puntos_primergol, puntos_ganador ) 
				values( $idp, $idj, NOW(), '$jgd[0]', '$jgd[1]', '$jgd[2]', '$jgd[3]', '$jgd[4]', 
				'$jgd[5]', '$jgd[6]', '$jgd[7]', '$jgd[8]', '$jgd[9]', '$jgd[10]', 0, 0 ,0 )";
		
		mysqli_query ( $dbh, $q );
		return mysqli_affected_rows( $dbh );
	}
	/* ----------------------------------------------------------------------------------- */
	function actualizarPrediccion( $dbh, $idp, $idj, $campo, $valor ){
		// Registra los datos de predicción de la alineación de una jornada asociado a un usuario
		if( $campo == "primergol" ) $asignacion = "$campo = '$valor'";
		else $asignacion = "$campo = $valor";

		$q = "update prediccion set $asignacion where idParticipante = $idp and jornada = $idj";
		
		mysqli_query ( $dbh, $q );
		return mysqli_affected_rows( $dbh );
	}
	/* ----------------------------------------------------------------------------------- */
	function actualizarPrediccionAlineacion( $dbh, $idu, $idj, $jgd ){
		// Registra los datos de predicción de la alineación de una jornada asociado a un usuario
		$q = "update prediccion set fecha_actualizacion = NOW(), jugador0 = '$jgd[0]', 
				jugador1 = '$jgd[1]', jugador2 = '$jgd[2]', jugador3 = '$jgd[3]', jugador4 = '$jgd[4]', 
				jugador5 = '$jgd[5]', jugador6 = '$jgd[6]', jugador7 = '$jgd[7]', jugador8 = '$jgd[8]', 
				jugador9 = '$jgd[9]', jugador10 = '$jgd[10]' 
				where idParticipante = $idu and jornada = $idj";
		
		mysqli_query ( $dbh, $q );
		return mysqli_affected_rows( $dbh );
	}
	/* ----------------------------------------------------------------------------------- */
	function obtenerPrediccionJornada( $dbh ){
		// Devuelve los datos de predicción de la jornada activa
		$idu 		= $_SESSION["user"]["id"];
		$jractiva 	= obtenerJornadaActiva( $dbh );
		if( !$jractiva )
			header( "Location: inicio.php" );
		return obtenerPrediccionJornadaUsuario( $dbh, $idu, $jractiva["id"] );
	}
	/* ----------------------------------------------------------------------------------- */
	function prediccionJornadaIniciada( $dbh, $idj, $idp ){
		// Devuelve verdadero si la predicción de una jornada de participante está iniciada
		$iniciada 	= false;
		$prediccion = obtenerPrediccionJornadaUsuario( $dbh, $idp, $idj );
		
		for ( $i = 0; $i < 11; $i++ ) { 
			if( $prediccion["jugador$i"] != "" ) $iniciada = true;
		}
		if( ( $prediccion["primergol"] != "" ) || ( $prediccion["idganador"] != NULL ) ) 
			$iniciada = true;

		return $iniciada;
	}
	/* ----------------------------------------------------------------------------------- */
	function obtenerPuntuacionJornadaParticipante( $dbh, $idp, $idj ){
		// Devuelve la puntuación total de un participante por jornada
		$q = "select (puntos_alineacion + puntos_primergol + puntos_ganador) as puntos 
				from prediccion where idparticipante = $idp and jornada = $idj";
		
		return mysqli_fetch_array( mysqli_query ( $dbh, $q ) );
	}
	/* ----------------------------------------------------------------------------------- */
	function obtenerPuntuaciones( $dbh, $idj ){
		// Devuelve los registros de participantes y sus puntuaciones por jornada
		$q = "select concat_ws(' ', p.nombre, p.apellido) as participante, p.id as idp, 
				pre.puntos_alineacion + pre.puntos_primergol + pre.puntos_ganador as total, 
				pre.puntos_alineacion as ptsp1, pre.puntos_primergol as ptsp2, pre.puntos_ganador as ptsp3  
				from prediccion pre, participante p where pre.idparticipante=p.id and pre.jornada = $idj 
				group by p.id order by total DESC";
		
		return obtenerListaRegistros( mysqli_query( $dbh, $q ) );
	}
	/* ----------------------------------------------------------------------------------- */
	/* Solicitudes asíncronas al servidor para procesar información de usuarios */
	/* ----------------------------------------------------------------------------------- */
	
	/* ----------------------------------------------------------------------------------- */
	//Registro de pronóstico de alineación (Paso 1)
	if( isset( $_POST["form_aln"] ) ){
		session_start();
		include( "db.php" );
		$idu = $_SESSION["user"]["id"];
		$jractiva = obtenerJornadaActiva( $dbh );

		if( $jractiva ){
			parse_str( $_POST["form_aln"], $alineacion );
			$pronostico_jornada_actual = obtenerPrediccionJornadaUsuario( $dbh, $idu, $jractiva["id"] );

			if( $pronostico_jornada_actual ){
				$rsp = actualizarPrediccionAlineacion( $dbh, $idu, $jractiva["id"], $alineacion["al_jugadores"] );
			}else{
				$rsp = registrarPrediccionAlineacion( $dbh, $idu, $jractiva["id"], $alineacion["al_jugadores"] );
			}

			if( $rsp != -1 ) 
				$res["exito"] 	= 1;
			else 	
				$res["exito"] 	= -1;
			
		}else{ 		
			//Jornada cerrada
			$res["exito"] 		= -2;
			$res["mje"] 		= "Esta jornada ya fue cerrada";
		}

		echo json_encode( $res );

	}
	/* ----------------------------------------------------------------------------------- */
	//Registro de pronóstico de primero gol y ganador del encuentro ( Paso 2, Paso 3 )
	if( isset( $_POST["reg_prediccion"] ) ){
		session_start();
		include( "db.php" );

		$idu 		= $_SESSION["user"]["id"];
		$campo 		= $_POST["reg_prediccion"];
		$valor 		= $_POST["valor"];
		$jractiva 	= obtenerJornadaActiva( $dbh ); 
			
		$rsp = actualizarPrediccion( $dbh, $idu, $jractiva["id"], $campo, $valor );
		
		if( $rsp != -1 ) 
			$res["exito"] 		= 1;
		else
			$res["exito"] 		= -1;
		
		echo json_encode( $res );

	}
?>