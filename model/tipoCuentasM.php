<?php
	
	/**
	* Clase para la gestion de usuarios
	* Estudiantes, Docentes y Administradores
	**/
    class tipoCuentasM {
		
		/**
		* Metodo para Insercion o creacion de usuarios
		**/
        public static function insert($data){
			include ("connection.php");
            mysqli_query($conexion,"INSERT INTO tipoCuentas (descripcion, 
											  idTipoCuenta) 
										VALUES ('{$data['descripcion']}', 
										        '{$data['idTipoCuenta']}');");
        
		
		}
		
		/**
		* Metodo para Modificacion de usuarios
		**/
        public static function update($data){
			include ("connection.php");
			mysqli_query($conexion,"UPDATE tipoCuentas SET descripcion = '{$data['descripcion']}'
							WHERE idTipoCuenta = '{$data['idTipoCuenta']}';");
        
        }
        
		/**
		* Metodo para Eliminacion de usuarios
		**/
        public static function delete($idTipoCuenta){
			include ("connection.php");
			mysqli_query($conexion,"delete from tipoCuentas where idTipoCuenta = '$idTipoCuenta';");
        }
        
		/**
		* Metodo para Consulta de personas no asociadas a un rol
		**/
        public static function find(){
            include ("connection.php");
			return mysqli_query($conexion,"select * from tipoCuentas;")	
				or die("Problemas en el select".mysqli_error($conexion));
        }
		
		/**
		* Metodo para Consulta de usuarios por filtros
		**/
		public static function findByFilter($data){
			include ("connection.php");
			$query = "select * from tipoCuentas u where 1 = 1 ";
			
			if($data['idTipoCuenta'] != ""){
				$query .="and u.idTipoCuenta = '{$data['idTipoCuenta']}' ";
			}

			return mysqli_query($conexion,$query.mysqli_error($conexion));
		}
		

		public static function findById($idTipoCuenta){
			include ("connection.php");
			$data =  mysqli_query($conexion,"select * from tipoCuentas u where u.idTipoCuenta  = '".$idTipoCuenta."';")
			or die("Problemas en el select".mysqli_error($conexion));

			return mysqli_fetch_array($data);
		}
		

        
    }