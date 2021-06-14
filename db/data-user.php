<?php
	/* ----------------------------------------------------------------------------------- */
	/* Bimbo Tinto - Funciones de usuarios */
	/* ----------------------------------------------------------------------------------- */
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
		
		$idp = $_SESSION["user"]["id"];
		$q = "select * from participante where id = $idp";

		return mysqli_fetch_array( mysqli_query( $dbh, $q ) );					
	}
	/* ----------------------------------------------------------------------------------- */
	function obtenerUsuarioPorId( $dbh, $idu ){
		//Devuelve los datos de un participante dado su id
		$sql = "select * from participante where id = $idu";
		$data_user = mysqli_fetch_array( mysqli_query ( $dbh, $sql ) );
		return $data_user;					
	}
	/* ----------------------------------------------------------------------------------- */
	function obtenerUsuarioPorEmail( $dbh, $email ){
		//Devuelve los datos de un participante dado su email
		$q = "select * from participante where email = '$email'";
		return mysqli_fetch_array( mysqli_query ( $dbh, $q ) );				
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
	function guardarFacturaParticipante( $dbh, $idp, $factura ){
		// Registra el nombre del archivo de una factura asociado a un participante
		$q = "update participante set factura = '$factura', fecha_factura = NOW() where id = $idp";
		
		mysqli_query ( $dbh, $q );
		return mysqli_affected_rows( $dbh );
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
	function enviarPasswordEmail( $e_mail, $password ){
		// Envía un mensaje por email con contraseña de usuario

		$asunto = "Tu contraseña en Bimbotinto";
		$oemail = "bimbotinto@bimbovenezuela.com";
		
		$cabeceras = "Reply-To: Bimbotinto <$oemail>\r\n"; 
  		$cabeceras .= "Return-Path: Bimbotinto <$oemail>\r\n";
  		$cabeceras .= "From: Bimbotinto <$oemail>\r\n"; 
		$cabeceras .= "Organization: Bimbo\r\n";
	  	$cabeceras .= "X-Priority: 3\r\n";
	  	$cabeceras .= "X-Mailer: PHP". phpversion() ."\r\n"; 
		$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        
        $mensaje  = "<div style='width:320px; padding:8px 4px;'>";
        	$mensaje .= "<div align='center'>";
        		$mensaje .= "<img src='https://bimbovenezuela.com/bimbotinto/img/logo-bimbotinto.png' width='250'>";
        	$mensaje .= "</div>";
        	$mensaje .= "<hr>";
        	$mensaje .= "<p style='font-size: 18px'>Tu contraseña para ingresar a BimboTinto es: </p>";
        
        	$mensaje .= "<p style='font-size: 17px; font-weight: bolder; color: #be1616'>$password</p>";
        	$mensaje .= "<br>";
        	$mensaje .= "<a href='https://bimbovenezuela.com/bimbotinto' style='font-size: 18px'>Ingresa a Bimbotinto</a>";
        $mensaje  .= "</div>";

		return mail( $e_mail, $asunto, $mensaje, $cabeceras );
	}
	/* ----------------------------------------------------------------------------------- */
	function cargarArchivoFactura( $archivo ){
		// Carga el archivo de la factura en la ubicación destino

		$uploadDir 					= 'facturas/'; 
		$uploadStatus 				= 0; 
		$respuesta['mje']			= "NADA";
		$uploadedFile 				= ''; 

		if( !empty( $archivo["name"] ) ){

            $uploadStatus 			= 1; 
      		// Info de carga 
            $fileName 				= basename( $archivo["name"] ); 
            $targetFilePath 		= $uploadDir.$fileName; 
            $fileType 				= pathinfo( $targetFilePath, PATHINFO_EXTENSION ); 
             
            // Tipos de formato
            $allowTypes 			= array( 'pdf', 'jpg', 'png', 'jpeg' ); 
            if( in_array( $fileType, $allowTypes ) ){ 
                // Carga del archivo al servidor
                if( move_uploaded_file( $archivo["tmp_name"], $targetFilePath ) ){ 
                    $uploadedFile 	= $fileName; 
                }else{ 
                    $uploadStatus 	= -1; 
                    $respuesta['mje'] 	= 'Error al cargar factura';
                } 
            }else{ 
                $uploadStatus 		= -2; 
                $respuesta['mje'] 	= 'Formatos válidos: PDF, JPG, JPEG y PNG'; 
            } 
        } 

        $respuesta['estatus'] 		= $uploadStatus;
        
        return $respuesta;
	}
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
	
	//Envío de contraseña
	if( isset( $_POST["env_passw"] ) ){
		include( "db.php" );
		
		parse_str( $_POST["env_passw"], $data );

		$participante 		= obtenerUsuarioPorEmail( $dbh, $data["email"] );
		
		if( $participante ){
			$envio 			= enviarPasswordEmail( $data["email"], $participante["password"] );
			if( $envio ){
				$res["exito"] 	= 1;
				$res["mje"] 	= "Contraseña enviada a tu email";
			}else{
				$res["exito"] 	= -1;
				$res["mje"] 	= "Error al enviar contraseña por email";
			}
		}
		else{
			$res["exito"] 	= -1;
			$res["mje"] 	= "Email no registrado";
		}
		
		echo json_encode( $res );	
	}

	/* ----------------------------------------------------------------------------------- */
	
	//Envío de factura
	if( isset( $_POST["factura_participante"] ) ){
		
		include( "db.php" );
		$idp 	= $_POST["factura_participante"];
		$carga 	= cargarArchivoFactura( $_FILES["archivo_factura"] );		

		$exito 	= $carga["estatus"];
		if( $carga["estatus"] == 1 ){
			$res = guardarFacturaParticipante( $dbh, $idp, $_FILES["archivo_factura"]["name"] );
		}
		$url = "../factura.php?exito=$exito";

		echo "<script>window.location = '".$url."'</script>";
	}
	
	/* ----------------------------------------------------------------------------------- */
	
	if( isset( $_GET["logout"] ) ){
		unset( $_SESSION["login"] );
		unset( $_SESSION["user"] );
		session_destroy();
		echo "<script> window.location = 'index.html'</script>";
	}

	/* ----------------------------------------------------------------------------------- */
?>