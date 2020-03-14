<?php

	/**
	* Clase para la gestion de inicio de session
	**/
    class loginM {
        
		/**
		* Metodo para la consulta de usuario 
		* para el inicio de session
		**/
      public static function consultarLogin($usuario){

				include ("connection.php");

				$usuario = mysqli_query($conexion, "select * from usuarios where idUsuario= '{$usuario['usr']}' and password = '{$usuario['contrasena']}'")
				or die("Problemas en el select".mysqli_error($conexion));

				return mysqli_fetch_array($usuario);
      }
        
	}
	?>	