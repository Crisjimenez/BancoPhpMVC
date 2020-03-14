<?php
	
	/**
	* Clase para la gestion de usuarios
	* Estudiantes, Docentes y Administradores
	**/
    class cuentasM {
		
		/**
		* Metodo para Insercion o creacion de usuarios
		**/
        public static function insert($usuario){
			include ("connection.php");

            mysqli_query($conexion,"INSERT INTO cuentas (cedulaCliente, 
											  consecutivo, 
											  fechaCreacion, 
											  idTipoCuenta,
											  saldo) 
										VALUES ('{$usuario['cedulaCliente']}', 
										        '{$usuario['consecutivo']}', 
												'{$usuario['fechaCreacion']}', 
												'{$usuario['idTipoCuenta']}', 
												'{$usuario['saldo']}');")
				or die("Problemas en el select".mysqli_error($conexion));
        
		
		}
		
		/**
		* Metodo para Modificacion de usuarios
		**/
        public static function update($usuario){
			include ("connection.php");

			mysqli_query($conexion,"UPDATE cuentas SET consecutivo = '{$usuario['consecutivo']}', 
							fechaCreacion = '{$usuario['fechaCreacion']}', 
							idTipoCuenta = '{$usuario['idTipoCuenta']}', 
							saldo = '{$usuario['saldo']}'
							WHERE cedulaCliente = '{$usuario['cedulaCliente']}';")
				or die("Problemas en el select".mysqli_error($conexion));
        
        }
        
		/**
		* Metodo para Eliminacion de usuarios
		**/
        public static function delete($cedula){
			include ("connection.php");
			mysqli_query($conexion,"delete from cuentas where cedulaCliente = '$cedula';")
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
		
		/**
		* Metodo para Consulta de usuarios por filtros
		**/
		public static function findByFilter($usuario){
			include ("connection.php");
			$query = "select * from cuentas u where 1 = 1 ";
			
			if($usuario['cedula'] != ""){
				$query .="and u.cedula = '{$usuario['cedula']}' ";
			}

			return mysqli_query($conexion,$query.mysqli_error($conexion))
						or die("Problemas en el select".mysqli_error($conexion));
		}
		

		public static function findById($cedula){
			include ("connection.php");
			$usuario =  mysqli_query($conexion,"select * from cuentas u where u.cedulaCliente  = '".$cedula."';")
			or die("Problemas en el select".mysqli_error($conexion));

			return mysqli_fetch_array($usuario);
		}
		

        
    }