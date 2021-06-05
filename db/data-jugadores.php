<?php
	/* ----------------------------------------------------------------------------------- */
	/* Bimbo Tinto - Funciones de jugadores */
	/* ----------------------------------------------------------------------------------- */
	/* ----------------------------------------------------------------------------------- */
	function obtenerJugadores(){
		// Devuelve la lista de los jugadores del equipo
		
		/* Porteros */
		$porteros = array( 
			array("n" => "Wuilker", 	"a" => "Fariñez"), 
			array("n" => "Alain", 		"a" => "Baroja"),
			array("n" => "José", 		"a" => "Contreras"),
			array("n" => "Joel", 		"a" => "Graterol"),
			array("n" => "Rafael", 		"a" => "Romo") 
		);
		
		/* Mediocampistas */
		$mediocampistas = array( 
			array("n" => "Cristian", 	"a" => "Cásseres"), 
			array("n" => "Yangel", 		"a" => "Herrera"),
			array("n" => "Darwin", 		"a" => "Machís"),
			array("n" => "José", 		"a" => "Martínez"),
			array("n" => "Junior", 		"a" => "Moreno"),
			array("n" => "Jhon", 		"a" => "Murillo"),
			array("n" => "Rómulo", 		"a" => "Otero"),
			array("n" => "Tomás", 		"a" => "Rincón"),
			array("n" => "Jefferson", 	"a" => "Savarino"),
			array("n" => "Yeferson", 	"a" => "Soteldo"),
			array("n" => "Freddy", 		"a" => "Vargas")
		);	

		/* Defensas */
		$defensas = array( 
			array("n" => "Wilker", 		"a" => "Ángel"), 
			array("n" => "Jhon", 		"a" => "Chancellor"),
			array("n" => "Luis", 		"a" => "Mago"),
			array("n" => "Rolf", 		"a" => "Feltscher"),
			array("n" => "Nahuel", 		"a" => "Ferraresi"),
			array("n" => "Alexander", 	"a" => "González"),
			array("n" => "Ronald", 		"a" => "Hernández"),
			array("n" => "Yordan", 		"a" => "Osorio"),
			array("n" => "Roberto ", 	"a" => "Rosales"),
			array("n" => "Mikel", 		"a" => "Villanueva")
		);	

		/* Delanteros */
		$delanteros = array( 
			array("n" => "Fernando ", 	"a" => "Aristiguieta"), 
			array("n" => "Jhonder", 	"a" => "Cádez"),
			array("n" => "Sergio ", 	"a" => "Córdova"),
			array("n" => "Jan", 		"a" => "Hurtado"),
			array("n" => "Josef", 		"a" => "Martínez"),
			array("n" => "Daniel", 		"a" => "Pérez"),
			array("n" => "Eric", 		"a" => "Ramírez"),
			array("n" => "Salomón", 	"a" => "Rondón")
		);	
			
		$jugadores = array( 
						"porteros" 		=> $porteros, 
						"mediocampistas" => $mediocampistas, 
						"defensas" 		=> $defensas, 
						"delanteros" 	=> $delanteros 
					);
		
		return $jugadores;
	}
	/* ----------------------------------------------------------------------------------- */
	function jPreseleccionado( $jugador, $prediccion, $pos ){
		// Devuelve la marca que indica un jugador está registrado en una predicción
		$marca = "";
		$indices = array( 
						"M" 	=> array( "i" => 1, "f" => 4 ),
						"D" 	=> array( "i" => 5, "f" => 8 ),
						"DL" 	=> array( "i" => 9, "f" => 10 )
					);

		if( $pos == "P" ){
			if( $jugador["a"] == $prediccion["jugador0"] ) $marca = "item_s";
		}else{
			$ini = $indices[$pos]["i"];	$fin = $indices[$pos]["f"];

			for ( $i = $ini; $i <= $fin; $i++ ) { 
				if( $jugador["a"] == $prediccion["jugador$i"] ) $marca = "item_s";
			}
		}
		
		return $marca;
	}
	/* ----------------------------------------------------------------------------------- */
?>