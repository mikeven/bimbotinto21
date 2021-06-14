<?php
	/* ----------------------------------------------------------------------------------- */
	/* Bimbo Tinto - Funciones sobre resultados */
	/* ----------------------------------------------------------------------------------- */
	/* ----------------------------------------------------------------------------------- */
	define( "PTSALINEACION", 	5 );
	define( "PTSPRIMERGOL", 	60 );
	define( "PTSGANADOR", 		30 );


	function obtenerPrediccionesJornada( $dbh, $idj ){
        // Devuelve los datos de las predicciones de todos los participantes
        $q = "select pa.nombre as nombrep, pa.apellido as apellidop, pa.email, 
                p.id as idprediccion, p.jugador0, p.jugador1, p.jugador2, p.jugador3, p.jugador4, p.jugador5, 
                p.jugador6, p.jugador7, p.jugador8, p.jugador9, p.jugador10, p.primergol, p.ganador as idganador, 
                e.nombre as ganador, e.bandera, p.puntos_alineacion, p.puntos_primergol, p.puntos_ganador 
                from participante pa, prediccion p left join equipo e on p.ganador = e.id 
                where p.idparticipante = pa.id and p.jornada = $idj";
        
        return obtenerListaRegistros( mysqli_query( $dbh, $q ) );
    }
    /* ----------------------------------------------------------------------------------- */
    function jugadoresPosicion( $i, $resultados ){
        // Devuelve los jugadores de los resultados ubicados en una posicion

        if( $i >= 1 && $i <= 4 ) // Mediocampistas
                $jugadores_posicion = array_slice( $resultados, 1, 4 );
        if( $i >= 5 && $i <= 8 ) // Defensas
                $jugadores_posicion = array_slice( $resultados, 5, 8 );
        if( $i >= 9 ) // Defensas
                $jugadores_posicion = array_slice( $resultados, 9 );

        return $jugadores_posicion;
    }
     /* ----------------------------------------------------------------------------------- */
    function aciertoJugadorPosicion( $i, $p, $res ){
        // Devuelve verdadero si una predicción acertó un jugador en su posición
        $acierto = false;

        if( $i == 0 ){
            if( $p["jugador$i"] == $res[$i] ) $acierto = true;
        }else{
            $jugadores_posicion = jugadoresPosicion( $i, $res );
            if( in_array( $p["jugador$i"], $jugadores_posicion ) )
                $acierto = true;
        }
        //echo "jug: ".$i." - R: $acierto"."<br>";
        return $acierto;
    }
    /* ----------------------------------------------------------------------------------- */
    function puntajePorAlineacion( $prediccion, $resultados ){
        // Devuelve el total de puntos obtenidos en una predicción sobre la alineación de una jornada

        $puntos_por_jugador = PTSALINEACION;
        $puntos = 0;

        for( $i = 0; $i <= 10; $i++ ) { 
            
            if ( aciertoJugadorPosicion( $i, $prediccion, $resultados ) ){
                $puntos += $puntos_por_jugador;
            }
        }

        return $puntos;
    }
    /* ----------------------------------------------------------------------------------- */
    function puntajePorPaso( $prediccion, $resultados, $paso, $pts ){
        // Devuelve los puntos obtenidos en una predicción sobre los pasos 2, 3
        $puntos_por_acierto = $pts;
        $puntos = 0;
        //echo $prediccion[$paso]. " == ". $resultados[$paso];

        if( $prediccion[$paso] == $resultados[$paso] )
            $puntos = $puntos_por_acierto;

        return $puntos;
    }
    /* ----------------------------------------------------------------------------------- */
	function obtenerResultadosJugadores( $j, $p, $med, $def, $del ){
		$correcto = true;
		$respuesta["jugadores"] = array();

		if( $j == 0 ){
			$correcto = false;
			echo "<script>alert('Indicar jornada')</script>";
		}
		if( $p == -1 ){
			$correcto = false;
			echo "<script>alert('Indicar PORTERO')</script>";
		}
		if( count( $med ) != 4 ){
			$correcto = false;
			echo "<script>alert('Revisar cantidad de MEDIOCAMPISTAS')</script>";
		}
		if( count( $def ) != 4 ){
			$correcto = false;
			echo "<script>alert('Revisar cantidad de DEFENSAS')</script>";
		}
		if( count( $del ) != 2 ){
			$correcto = false;
			echo "<script>alert('Revisar cantidad de DELANTEROS')</script>";
		}

		$respuesta["s"] = $correcto;
		if( $correcto ){
			$respuesta["jugadores"] = array_merge( array($p), $med, $def, $del );
		}
		
		return $respuesta;
	}

	/*===========================================================*/
	//Registro de resultados de alineación
    if( isset( $_POST["jresultados"] ) ){
         
        $IDJ 				= isset( $_POST["jornada"] ) ? $_POST["jornada"] : 0;
        $P 					= isset( $_POST["portero"] ) ? $_POST["portero"] : 0;
        
        if( !isset( $_POST['med'] ) || !isset( $_POST['def'] ) || !isset( $_POST['def'] ) )
        	echo "<script>alert('Resultados incompletos')</script>";
        
        if( isset( $_POST['med'] ) && isset( $_POST['def'] ) && isset( $_POST['def'] ) )
        {	
	        $resultados     	= obtenerResultadosJugadores( $IDJ, $P, $_POST['med'], $_POST['def'], $_POST['del'] );
	        
	        if( $resultados["s"] ){
	        	$jornada        	= obtenerJornadaPorId( $dbh, $IDJ );
		        $predicciones   	= obtenerPrediccionesJornada( $dbh, $IDJ );

		        echo "Resultados sobre la Jornada $jornada[fechadia] : $jornada[equipo1] - $jornada[equipo2]"."<br>";
		        echo "======================================================"."<br><br>";;

		        foreach ( $predicciones as $reg ) {
		            
		            $ptos_p1 = puntajePorAlineacion( $reg, $resultados["jugadores"] );
		            //$ptos_p2 = puntajePorPaso( $reg, $resultados, "primergol", 60 ); 
		            //$ptos_p3 = puntajePorPaso( $reg, $resultados, "idganador", 30 );
		            //$ptos_p2 = $ptos_p3 = 0;

		            echo $reg["nombrep"]." ".$reg["apellidop"]." ".$ptos_p1."<br>"; 
		            //guardarPuntuacion( $dbh, $ptos_p1, $ptos_p2, $ptos_p3, $reg["idprediccion"], $IDJ );
		        }
			}
		}
    }
    /*===========================================================*/
    //Registro de resultados de primer gol
    if( isset( $_POST["jpgol"] ) ){
         
        $IDJ 						= isset( $_POST["jornada"] ) 	? 	$_POST["jornada"] : 0;
        $resultados["primergol"] 	= isset( $_POST["primergol"] ) 	? 	$_POST["primergol"] : 0;
        if( $IDJ == "" )
        	echo "<script>alert('Indicar jornada')</script>";
        else{

        	$jornada        	= obtenerJornadaPorId( $dbh, $IDJ );
        	$predicciones   	= obtenerPrediccionesJornada( $dbh, $IDJ );

        	echo "Resultados sobre la Jornada $jornada[fechadia] : $jornada[equipo1] - $jornada[equipo2]"."<br>";
		        echo "======================================================"."<br><br>";;

		        foreach ( $predicciones as $reg ) {
		            
		            $ptos_p2 = puntajePorPaso( $reg, $resultados, "primergol", PTSPRIMERGOL ); 

		            echo $reg["nombrep"]." ".$reg["apellidop"]." ".$ptos_p2."<br>"; 
		            //guardarPuntuacion( $dbh, $ptos_p1, $ptos_p2, $ptos_p3, $reg["idprediccion"], $IDJ );
		        }
        }
        
    }
    /*===========================================================*/
    //Registro de resultados de ganador de partido
    if( isset( $_POST["jganador"] ) ){
        

        $IDJ 						= isset( $_POST["jornada"] ) 	? 	$_POST["jornada"] : 0;
        $resultados["idganador"] 	= isset( $_POST["idganador"] ) 	? 	$_POST["idganador"] : 0;
        if( $IDJ == "" )
        	echo "<script>alert('Indicar jornada')</script>";
        else{
        	
        	$jornada        	= obtenerJornadaPorId( $dbh, $IDJ );
        	$predicciones   	= obtenerPrediccionesJornada( $dbh, $IDJ );

        	echo "Resultados sobre la Jornada $jornada[fechadia] : $jornada[equipo1] - $jornada[equipo2]"."<br>";
		        echo "======================================================"."<br><br>";;

		        foreach ( $predicciones as $reg ) {
		            
		            $ptos_p3 = puntajePorPaso( $reg, $resultados, "idganador", PTSGANADOR ); 

		            echo $reg["nombrep"]." ".$reg["apellidop"]." ".$ptos_p3."<br>"; 
		            //guardarPuntuacion( $dbh, $ptos_p1, $ptos_p2, $ptos_p3, $reg["idprediccion"], $IDJ );
		        }
        }
        
    }
    /*===========================================================*/
?>