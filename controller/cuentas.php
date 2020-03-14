<?php

/**
* Clase controladora de modelo de cuentas
**/	

// importamos el modelo    
require '../model/cuentasM.php';
// escribimos el encabezado
require '../view/header.php';
	
	// tomamos la accion a ejecutar
    $accion = $_GET['accion'];
    
	// en caso de ser inicio pintamos el index
	if($accion == 'inicio'){
		require '../view/indexSession.php';
	}
	
	/**
	* Gestion de Cuentas
	**/
    else if($accion == 'listarCuentas'){
	   
		$_SESSION["operacion"]="listar";
		
		$filtrosClientes = [
			'cedula'=> ""
		];
		
		//listo las cuentas
		$listaCuentas = cuentasM::find();
		require '../view/cuentas/listarCuentas.php';

	}else if($accion == 'agregarCuentas'){
		$_SESSION["operacion"]="guardar";
		$cuenta = [
			'cedulaCliente'=> "",
			'consecutivo'=> "",
			'fechaCreacion'=> "",
			'idTipoCuenta'=> "",
			'saldo'=> ""
		];
		
		require '../view/cuentas/agregarCuentas.php';


    }else if($accion == 'guardarCuenta'){
		
		if($_SESSION["operacion"] == "guardar"){
			$cuentaGuardar = [
				'cedulaCliente'=> $_POST['cedulaID'],
				'consecutivo'=> $_POST['consecutivoID'],
				'fechaCreacion'=> $_POST['fechaCreacionID'],
				'idTipoCuenta'=> $_POST['idTipoCuentaID'],
				'saldo'=> $_POST['saldoID']
			];
		
			cuentasM::insert($cuentaGuardar);
		}else{
			$cuentaModificar = [
				'cedulaCliente'=> $_POST['cedulaID'],
				'consecutivo'=> $_POST['consecutivoID'],
				'fechaCreacion'=> $_POST['fechaCreacionID'],
				'idTipoCuenta'=> $_POST['idTipoCuentaID'],
				'saldo'=> $_POST['saldoID']
			];
		
			cuentasM::update($cuentaModificar);
		}
		
		$_SESSION["operacion"]="consultar";
		
		//cargamos los parametros de nuevo
		$filtrosClientes = [
			'valorSemestre'=> ""
        ];
		
		
		//listo las cuentas
		$listaCuentas = cuentasM::find();
		
		require '../view/cuentas/listarCuentas.php';
		
	}else if($accion == 'editarCuenta'){
	
		$_SESSION["operacion"]="modificar";
		$id = $_GET['id'];
		$cuenta = cuentasM::findById($id);
		require '../view/cuentas/agregarCuentas.php';
		
	// Metodo para guardar o actualizar la informacion 		
	}

require '../view/footer.php';