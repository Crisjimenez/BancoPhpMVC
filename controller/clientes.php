<?php

/**
* Clase controladora de modeulo de clientes
**/	

// importamos el modelo    
require '../model/clienteM.php';
// escribimos el encabezado
require '../view/header.php';
	
	// tomamos la accion a ejecutar
    $accion = $_GET['accion'];
    
	// en caso de ser inicio pintamos el index
	if($accion == 'inicio'){
		require '../view/indexSession.php';
	}
	
	/**
	* Gestion de Clientes
	**/
    else if($accion == 'listarClientes'){
        
		$_SESSION["operacion"]="listar";
		
		$filtrosClientes = [
			'cedula'=> ""
		];
		
		//listo las clientes
		$listaClientes = clienteM::find();
		require '../view/clientes/listarClientes.php';
		
		
	}else if($accion == 'agregarClientes'){
		$_SESSION["operacion"]="guardar";
		$cliente = [
			'cedula'=> "",
			'nombre'=> "",
			'apellido'=> "",
			'telefono'=> "",
			'correo'=> "",
			'direccion'=> ""
		];
		
		require '../view/clientes/agregarClientes.php';


    }else if($accion == 'eliminarCliente'){
		$id = $_GET['codigoEliminarID'];
		
		clienteM::delete($id);
		
		$filtrosClientes = [
                'cedula'=> ""
            ];
		
		//listo las clientes
		$listaClientes = clienteM::find();
		require '../view/clientes/listarClientes.php';
		
		
	}else if($accion == 'consultarClientes'){
		
		$isPost = count($_POST);

        if($isPost > 0){
			
			$filtrosClientes = [
                'cedula'=> $_POST['cedula']
            ];
			
			$listaClientes = clienteM::findByFilter($filtrosClientes);
		
		}else{
			$listaClientes = clienteM::find();
		}
		
		require '../view/clientes/listarClientes.php';
		
	}else if($accion == 'editarCliente'){
	
		$_SESSION["operacion"]="modificar";
		$id = $_GET['id'];
		$cliente = clienteM::findById($id);
		require '../view/clientes/agregarClientes.php';
		
	// Metodo para guardar o actualizar la informacion 		
	}else if($accion == 'guardarCliente'){
		
		if($_SESSION["operacion"] == "guardar"){
			$clienteGuardar = [
				'cedula'=> $_POST['cedulaID'],
				'nombre'=> $_POST['nombreID'],
				'apellido'=> $_POST['apellidoID'],
				'telefono'=> $_POST['telefonoID'],
				'direccion'=> $_POST['direccionID'],
				'correo'=> $_POST['correoID']
			];
		
			clienteM::insert($clienteGuardar);
		}else{
			$clienteModificar = [
				'cedula'=> $_POST['clienteID'],
				'nombre'=> $_POST['nombreID'],
				'apellido'=> $_POST['apellidoID'],
				'telefono'=> $_POST['telefonoID'],
				'direccion'=> $_POST['direccionID'],
				'correo'=> $_POST['correoID']
			];
		
			clienteM::update($clienteModificar);
		}
		
		$_SESSION["operacion"]="consultar";
		
		//cargamos los parametros de nuevo
		$filtrosClientes = [
			'valorSemestre'=> "",
			'numSemestre'=> "",
			'numCreditos'=> "" //,
			// 'lstClientes'=> $_POST['clienteID']
        ];
		
		
		//listo las clientes
		$listaClientes = clienteM::find();
		//lista de clientes para filtro
		$listaClientesFiltro = clienteM::find();		
		
		
		require '../view/clientes/listarClientes.php';
		
	}

require '../view/footer.php';