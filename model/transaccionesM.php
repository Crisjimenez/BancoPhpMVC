<?php
	
    class transaccionesM {

        public static function depositar($usuario){
			include ("connection.php");
            $total = $usuario['deposito'] + $usuario['saldo'];
			mysqli_query($conexion,"UPDATE cuentas SET saldo = '{$total}'
							WHERE cedulaCliente = '{$usuario['cedulaCliente']}'
                            and consecutivo = '{$usuario['consecutivo']}';")
				or die("Problemas en el select".mysqli_error($conexion));
        
        }

        public static function retirar($usuario){
			include ("connection.php");
            $total =  $usuario['saldo'] - $usuario['retiro'];
			mysqli_query($conexion,"UPDATE cuentas SET saldo = '{$total}'
							WHERE cedulaCliente = '{$usuario['cedulaCliente']}'
                            and consecutivo = '{$usuario['consecutivo']}';")
				or die("Problemas en el select".mysqli_error($conexion));
        
        }

		/**
		* Metodo para Consulta de personas no asociadas a un rol
		**/
        public static function find(){
            include ("connection.php");
			return mysqli_query($conexion,"select * from cuentas;")	
				or die("Problemas en el select".mysqli_error($conexion));
        }
		

		public static function findById($cedula, $consecutivo){
			include ("connection.php");
			$usuario =  mysqli_query($conexion,"select * from cuentas u where u.cedulaCliente  = '".$cedula."' and u.consecutivo = '".$consecutivo."';")
			or die("Problemas en el select".mysqli_error($conexion));

			return mysqli_fetch_array($usuario);
		}
		

        
    }