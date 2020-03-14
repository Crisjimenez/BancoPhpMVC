<?php

/**
* Clase controladora de modeulo de tipoCuentas
**/	

// importamos el modelo    
require '../model/tipoCuentasM.php';
// escribimos el encabezado
require '../view/header.php';
	
	// tomamos la accion a ejecutar
    $accion = $_GET['accion'];
    
	// en caso de ser inicio pintamos el index
	if($accion == 'inicio'){
		require '../view/indexSession.php';
	}
	
	/**
	* Gestion de TipoCuentas
	**/
    else if($accion == 'listarTipoCuentas'){
        
		$_SESSION["operacion"]="listar";
		
		$filtrosTipoCuentas = [
			'cedula'=> ""
		];
		
		//listo las tipoCuentas
		$listaTipoCuentas = tipoCuentasM::find();
		require '../view/tipoCuentas/listarTipoCuentas.php';
		
		
	}else if($accion == 'agregarTipoCuentas'){
		$_SESSION["operacion"]="guardar";
		$tipoCuenta = [
			'descripcion'=> "",
			'idTipoCuenta'=> ""
		];
		
		require '../view/tipoCuentas/agregarTipoCuentas.php';


    }else if($accion == 'eliminarTipoCuenta'){
		$id = $_GET['codigoEliminarID'];
		
		tipoCuentasM::delete($id);
		
		$filtrosTipoCuentas = [
                'idTipoCuenta'=> ""
            ];
		
		//listo las tipoCuentas
		$listaTipoCuentas = tipoCuentasM::find();
		require '../view/tipoCuentas/listarTipoCuentas.php';
		
		
	}else if($accion == 'consultarTipoCuentas'){
		
		$isPost = count($_POST);

        if($isPost > 0){
			
			$filtrosTipoCuentas = [
                'idTipoCuenta'=> $_POST['idTipoCuenta']
            ];
			
			$listaTipoCuentas = tipoCuentasM::findByFilter($filtrosTipoCuentas);
		
		}else{
			$listaTipoCuentas = tipoCuentasM::find();
		}
		
		require '../view/tipoCuentas/listarTipoCuentas.php';
		
	}else if($accion == 'editarTipoCuenta'){
	
		$_SESSION["operacion"]="modificar";
		$id = $_GET['id'];
		$tipoCuenta = tipoCuentasM::findById($id);
		require '../view/tipoCuentas/agregarTipoCuentas.php';
		
	// Metodo para guardar o actualizar la informacion 		
	}else if($accion == 'guardarTipoCuenta'){
		
		if($_SESSION["operacion"] == "guardar"){
			$tipoCuentaGuardar = [
				'idTipoCuenta'=> $_POST['idTipoCuentaID'],
				'descripcion'=> $_POST['descripcionID']
			];
		
			tipoCuentasM::insert($tipoCuentaGuardar);
		}else{
			$tipoCuentaModificar = [
				'idTipoCuenta'=> $_POST['idTipoCuentaID'],
				'descripcion'=> $_POST['descripcionID']
			];
		
			tipoCuentasM::update($tipoCuentaModificar);
		}
		
		$_SESSION["operacion"]="consultar";

		//listo las tipoCuentas
		$listaTipoCuentas = tipoCuentasM::find();

		
		require '../view/tipoCuentas/listarTipoCuentas.php';
		
	}

	require '../view/footer.php';