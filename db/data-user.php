<?php
	/* ----------------------------------------------------------------------------------- */
	/* Bimbo Tinto - Funciones de usuarios */
	/* ----------------------------------------------------------------------------------- */
	/* ----------------------------------------------------------------------------------- */
	function ultimaActualizacion( $dbh, $idu ){
		//Retorna la fecha donde se realizó la última actualización de documentos de usuario
		$q = "select date_format(ultima_act_doc,'%Y-%m-%d') as fecha from clients where id = $idu";
		$data = mysql_fetch_array( mysql_query ( $q, $dbh ) );
		
		return $data["fecha"];
	}
	/* ----------------------------------------------------------------------------------- */
	function chequearActualizacion( $dbh, $hoy, $idu ){
		//Chequea el estado de actualización de documentos e invoca a su revisión
		include( "bd/data-documento.php" );
		$fult_act_docs = ultimaActualizacion( $dbh, $idu );
		
		if( $fult_act_docs < $hoy ){
			revisarEstadoDocumentos( $dbh, $idu, $hoy );
		}		
	}
	/* ----------------------------------------------------------------------------------- */
	/* --------------------------------------------------------- */
	function checkSession( $pag ){
		// Redirecciona a la página de inicio de sesión en caso de no existir sesión de usuario

		if( isset( $_SESSION["user"] ) ){ 
			// Hay sesión iniciada
			if( $pag == "login" ) 
				echo "<script> window.location = 'home.php'</script>";
		}else{
			// No existe sesión iniciada
			echo "<script> window.location = 'index.html'</script>";
		}
	}
	/* ----------------------------------------------------------------------------------- */
	function usuarioValido( $usuario, $dbh ){
		$valido = true;

		$q = "select usuario from usuario where usuario = '$usuario'";
		$data_user = mysql_fetch_array( mysql_query ( $q, $dbh ) );
		if( $usuario == $data_user["usuario"] ) $valido = false;

		return $valido;
	}
	/* ----------------------------------------------------------------------------------- */
	function obtenerUsuarioSesion( $dbh ){
		//Devuelve los datos del usuario con sesión iniciada
		
		$idu = $_SESSION["user"]["id"];
		$q = "select * from clients where id = $idu";

		$data_user = mysqli_fetch_array( mysqli_query( $dbh, $q ) );
		return $data_user;					
	}
	/* ----------------------------------------------------------------------------------- */
	function obtenerUsuarioPorId( $idu, $dbh ){
		//Devuelve los datos de un usuario dado su id
		$sql = "select * from clients where id = $idu";
		$data_user = mysqli_fetch_array( mysqli_query ( $dbh, $sql ) );
		return $data_user;					
	}
	/* ----------------------------------------------------------------------------------- */
	function iniciarSesion( $data_u ){
		// Inicia la sesión de usuario
		$_SESSION["login"] 	= 1;	
		$_SESSION["user"] 	= $data_u;
	}
	/* ----------------------------------------------------------------------------------- */
	function obtenerUsuarioLogin( $dbh, $email, $passw ){
		// Devuelve los datos del participante que inicia sesión
		$data_u = NULL;
		$q = "select * from participante where email = '$email' and password = '$passw'";
		
		$data 	= mysqli_query ( $dbh, $q );
		$nrows 	= mysqli_num_rows( $data );
		if( $nrows > 0 ){
			$data_u = mysqli_fetch_array( $data );
			iniciarSesion( $data_u );
		}

		return $data_u;
	}
	/* ----------------------------------------------------------------------------------- */
	function obtenerUsuarioPorToken( $dbh, $token ){
		//Devuelve los datos de un usuario dado su token
		$q = "select * from usuario where token = '$token'";
		$data_user = mysqli_fetch_array( mysqli_query ( $dbh, $q ) );
		return $data_user;					
	}
	/* ----------------------------------------------------------------------------------- */
	function registrarNuevoUsuario( $dbh, $usuario ){
		//Registro de nuevo usuario

		$q = "insert into participante ( nombre, apellido, email, password, fecha_registro ) 
		values ( '$usuario[nombre]', '$usuario[apellido]', '$usuario[email]', '$usuario[password]', NOW() )";
		
		$Rs = mysqli_query( $dbh, $q );
		return mysqli_insert_id( $dbh );	
	}
	/* ----------------------------------------------------------------------------------- */
	function usuarioYaRegistrado( $dbh, $email ){
		//Determina si ya existe un usuario registrado dado su email
		$existe = false;
		$q = "select * from participante where email = '$email'";
		$nrows = mysqli_num_rows( mysqli_query ( $dbh, $q ) );
		
		if( $nrows > 0 ) $existe = true;
		
		return $existe;
	}
	/* ----------------------------------------------------------------------------------- */
	function verificarCuenta( $dbh, $id_usuario ){
		//Verifica cuenta de usuario después de su registro validado
		$actualizado = 1;
		$q = "update clients set verified = 1 where id = $id_usuario";
		$r = mysqli_query( $dbh, $q );
		if( mysqli_affected_rows( $dbh ) == -1 ) $actualizado = 0;
		
		return $actualizado;	
	}
	/* ----------------------------------------------------------------------------------- */
	function actualizarPasswordUsuario( $dbh, $password, $token ){
		//Asigna la nueva contraseña de usuario
		$actualizado = 1;
		$q = "update usuario set password = '$password' where token = '$token'";

		$r = mysqli_query( $dbh, $q );
		if( mysqli_affected_rows( $dbh ) == -1 ) $actualizado = 0;
		
		return $actualizado;
	}
	/* ----------------------------------------------------------------------------------- */
	function obtenerOrdenesNoLeidas( $dbh, $usuario ){
		//Devuelve el número de pedidos no leídos por el usuario
		$q = "select count(id) as noleidos from orders 
		where order_read = 'no-leido' and user_id = $usuario[id]";
		$data_user = mysqli_fetch_array( mysqli_query ( $dbh, $q ) );

		return $data_user["noleidos"];
	}
	/* ----------------------------------------------------------------------------------- */
	/* ----------------------------------------------------------------------------------- */
	/* Solicitudes asíncronas al servidor para procesar información de usuarios */
	/* ----------------------------------------------------------------------------------- */
	//Detección de sesión
	if( isset( $_SESSION["login"] ) ){
		$idu = $_SESSION["user"]["id"];
	}else $idu = NULL;
	
	/* ----------------------------------------------------------------------------------- */
	//Registro de nueva cuenta de usuario (cliente)
	if( isset( $_POST["form_nu"] ) ){
		session_start();
		include( "db.php" );

		parse_str( $_POST["form_nu"], $usuario );

		if( usuarioYaRegistrado( $dbh, $usuario["email"] ) ){
			$res["exito"] 			= -1;
			$res["mje"] 			= "Email ya registrado, por favor usa uno diferente";
		}else{
			
			$idu 					= registrarNuevoUsuario( $dbh, $usuario );
			obtenerUsuarioLogin( $dbh, $usuario["email"], $usuario["password"] );
			
			if( $idu > 0 ){
				$res["exito"] 		= 1;
				$res["mje"] 		= "Participante registrado con éxito";
			}else{
				$res["exito"] 		= -2;
				$res["mje"] 		= "Error al registrar cuenta de usuario";
			}			
		}

		echo json_encode( $res );

	}

	/* ----------------------------------------------------------------------------------- */

	//Inicio de sesión (asinc)
	if( isset( $_POST["usr_login"] ) ){ 
		// Invocación desde: js/fn-user.js
		session_start();
		include( "db.php" );
		$email 	= escaparTexto( $dbh, $_POST["email"] );
		$pwd 	= escaparTexto( $dbh, $_POST["password"] );
		$login 	= obtenerUsuarioLogin( $dbh, $email, $pwd );
		
		if( $login ){
			$res["exito"] = 1;
			$res["mje"] = "Inicio de sesión exitosa";
		} else {
			$res["exito"] = 0;
			$res["mje"] = "Email o contraseña incorrecta, verifica tus datos e intenta nuevamente";
		}
		
		echo json_encode( $res );
	}
	
	/* ----------------------------------------------------------------------------------- */
	
	//Restablecimiento de contraseña
	if( isset( $_POST["new_passw"] ) ){
		include( "db.php" );
		
		parse_str( $_POST["new_passw"], $data );

		$res["exito"] = actualizarPasswordUsuario( $dbh, $data["password"], $data["token"] );
		
		if( $res["exito"] == 1 ){
			$nuevo_token = obtenerTokenUsuarioNuevo( $data );
			asignarNuevoTokenUsuario( $dbh, $data["token"], $nuevo_token );
			$res["mje"] = "Contraseña restablecida con éxito <a href='sopa/'>Iniciar sesión</a>";
		}
		else
			$res["mje"] = "Error al restablecer contraseña";
		
		echo json_encode( $res );	
	}
	
	/* ----------------------------------------------------------------------------------- */
?>