<?php
    
/**
* Clase controladora  de Inicio de session
**/	
require '../model/loginM.php';
// Anexo de coneccion 

	// se verifica el envio de datos
	$data = count($_POST)>0;
	// validamos que la pagina halla enviado datos
	if($data){
		$login = [
			'usr'=> $_POST['usr'],
			'contrasena'=> md5(md5($_POST['contrasena'])) //encriptar contraseña, encriptar por segunda vez
		];

		// verificamos la existencia del login
		$usuario = loginM::consultarLogin($login);

		// direccionamos segun la identidad
		if($usuario){
			//session_start();
			// inicialiamoza las variables de session
			$_SESSION["sessionNom"]=$usuario['idUsuario'];
			$_SESSION["operacion"]="consultar";  
			$_SESSION["nombre"]=$usuario['nombre'];
			$_SESSION["rol"]=$usuario['rol'];
			
			// Escribimos la pantalla de inicio
			require '../view/header.php';
			require '../view/indexSession.php';
			require '../view/footer.php';
			
		}else{
			// retornamos a el index en caso de error
			header("location:../index.php?error");
		}

	}
