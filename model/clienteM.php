<?php
	
	/**
	* Clase para la gestion de usuarios
	* Estudiantes, Docentes y Administradores
	**/
    class clienteM {
		
		/**
		* Metodo para Insercion o creacion de usuarios
		**/
        public static function insert($usuario){
			include ("connection.php");
            mysqli_query($conexion,"INSERT INTO clientes (cedula, 
											  nombre, 
											  apellido, 
											  telefono,
											  direccion, 
											  correo) 
										VALUES ('{$usuario['cedula']}', 
										        '{$usuario['nombre']}', 
												'{$usuario['apellido']}', 
												'{$usuario['telefono']}', 
												'{$usuario['direccion']}',
												'{$usuario['correo']}');");
        
		
		}
		
		/**
		* Metodo para Modificacion de usuarios
		**/
        public static function update($usuario){
			include ("connection.php");
			mysqli_query($conexion,"UPDATE clientes SET nombre = '{$usuario['nombre']}', 
							apellido = '{$usuario['apellido']}', 
							telefono = '{$usuario['telefono']}', 
							direccion = '{$usuario['direccion']}', 
							correo = '{$usuario['correo']}'
							WHERE cedula = '{$usuario['cedula']}';");
        
        }
        
		/**
		* Metodo para Eliminacion de usuarios
		**/
        public static function delete($cedula){
			include ("connection.php");
			mysqli_query($conexion,"delete from clientes where cedula = '$cedula';");
        }
        
		/**
		* Metodo para Consulta de personas no asociadas a un rol
		**/
        public static function find(){
            include ("connection.php");
			return mysqli_query($conexion,"select * from clientes;")	
				or die("Problemas en el select".mysqli_error($conexion));
        }
		
		/**
		* Metodo para Consulta de usuarios por filtros
		**/
		public static function findByFilter($usuario){
			include ("connection.php");
			$query = "select * from clientes u where 1 = 1 ";
			
			if($usuario['cedula'] != ""){
				$query .="and u.cedula = '{$usuario['cedula']}' ";
			}

			return mysqli_query($conexion,$query.mysqli_error($conexion));
		}
		

		public static function findById($cedula){
			include ("connection.php");
			$usuario =  mysqli_query($conexion,"select * from clientes u where u.cedula  = '".$cedula."';")
			or die("Problemas en el select".mysqli_error($conexion));

			return mysqli_fetch_array($usuario);
		}
		

        
    }