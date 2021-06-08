<?php
    /* ----------------------------------------------------------------------------------- */
    /* Bimbo Tinto - Funciones sobre jornadas */
    /* ----------------------------------------------------------------------------------- */
    /* ----------------------------------------------------------------------------------- */
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
    function obtenerJornadaPorId( $dbh, $idj ){
        // Devuelve los datos de los partidos registrados de la Vinotinto
        $q = "select j.id as idj, date_format(j.fecha,'%d de %M') as fecha, 
                date_format(j.fecha,'%W %d de %M') as fechadia, e1.id as idequipo1, e1.nombre as equipo1, 
                e1.bandera as bandera1, e2.id as idequipo2, e2.nombre as equipo2, e2.bandera as bandera2, j.cerrado 
                from jornada j, equipo e1, equipo e2 where j.equipo1 = e1.id and j.equipo2 = e2.id and j.id = $idj";
        
        return mysqli_fetch_array( mysqli_query ( $dbh, $q ) );
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
        echo "jug: ".$i." - R: $acierto"."<br>";
        return $acierto;
    }
    /* ----------------------------------------------------------------------------------- */
    function puntajePorAlineacion( $prediccion, $resultados ){
        // Devuelve el total de puntos obtenidos en una predicción sobre la alineación de una jornada

        $puntos_por_jugador = 5;
        $puntos = 0;

        for( $i = 0; $i <= 10; $i++ ) { 
            
            if ( aciertoJugadorPosicion( $i, $prediccion, $resultados ) ){
                $puntos += $puntos_por_jugador;
            }
        }

        return $puntos;
    }
    /* ----------------------------------------------------------------------------------- */
    function puntajePorPaso( $prediccion, $resultados, $paso ){
        // Devuelve los puntos obtenidos en una predicción sobre los pasos 2, 3
        $puntos_por_acierto = 60;
        $puntos = 0;
        //echo $prediccion[$paso]. " == ". $resultados[$paso];

        if( $prediccion[$paso] == $resultados[$paso] )
            $puntos = $puntos_por_acierto;

        return $puntos;
    }
    /* ----------------------------------------------------------------------------------- */
    //Registro
    if( isset( $_GET["jornadabimbotinto"] ) ){
       
        include( "db/db.php" );
        include( "db/data-resultados.php" );
        
        $IDJ = 1;
        
        $resultados     = $resultados_jornada[ $IDJ ];
        $jornada        = obtenerJornadaPorId( $dbh, $IDJ );
        $predicciones   = obtenerPrediccionesJornada( $dbh, $IDJ );

        echo "Resultados sobre la Jornada $jornada[fechadia] : $jornada[equipo1] - $jornada[equipo2]"."<br>";
        echo "======================================================"."<br><br>";;



        foreach ( $predicciones as $reg ) {
            
            $ptos_p1 = puntajePorAlineacion( $reg, $resultados["jugadores"] );
            $ptos_p2 = puntajePorPaso( $reg, $resultados, "primergol" );
            $ptos_p3 = puntajePorPaso( $reg, $resultados, "idganador" );
            
            echo $reg["nombrep"]." ".$reg["apellidop"]." ".$ptos_p1." ".$ptos_p2." ".$ptos_p3."<br>"; 
        }
    }
?>