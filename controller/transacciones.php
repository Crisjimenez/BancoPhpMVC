<?php

/**
* Clase controladora de modelo de transacciones
**/	

// importamos el modelo    
require '../model/transaccionesM.php';
// escribimos el encabezado
require '../view/header.php';
	
	// tomamos la accion a ejecutar
    $accion = $_GET['accion'];
    
	// en caso de ser inicio pintamos el index
	if($accion == 'inicio'){
		require '../view/indexSession.php';
	}
	
	/**
	* Gestion de Transacciones
	**/
    else if($accion == 'listartransacciones'){
	   
		$_SESSION["operacion"]="listar";
		
		$filtrostransacciones = [
			'cedula'=> ""
		];
		
		//listo las transacciones
		$listatransacciones = transaccionesM::find();
		require '../view/transacciones/listartransacciones.php';

    }else if($accion == 'Depositar'){
	
        $id = $_GET['id'];
        $id2 = $_GET['id2'];
		$cuenta = transaccionesM::findById($id, $id2);
		require '../view/transacciones/depositar.php';
		

    }else if($accion == 'guardarDeposito'){
	
        $cuentaModificar = [
            'cedulaCliente'=> $_POST['cedulaID'],
            'consecutivo'=> $_POST['consecutivoID'],
            'fechaCreacion'=> $_POST['fechaCreacionID'],
            'idTipoCuenta'=> $_POST['idTipoCuentaID'],
            'saldo'=> $_POST['saldoID'],
            'deposito'=> $_POST['depositoID'],
        ];
    
        transaccionesM::depositar($cuentaModificar);
        $listatransacciones = transaccionesM::find();
		require '../view/transacciones/listartransacciones.php';
		
    }else if($accion == 'Retirar'){
	
        $id = $_GET['id'];
        $id2 = $_GET['id2'];
		$cuenta = transaccionesM::findById($id, $id2);
		require '../view/transacciones/retirar.php';
		

    }else if($accion == 'guardarRetiro'){
	
        $cuentaModificar = [
            'cedulaCliente'=> $_POST['cedulaID'],
            'consecutivo'=> $_POST['consecutivoID'],
            'fechaCreacion'=> $_POST['fechaCreacionID'],
            'idTipoCuenta'=> $_POST['idTipoCuentaID'],
            'saldo'=> $_POST['saldoID'],
            'retiro'=> $_POST['retiroID'],
        ];

        if($_POST['saldoID'] >= $_POST['retiroID']){

            transaccionesM::retirar($cuentaModificar);
            $listatransacciones = transaccionesM::find();
            require '../view/transacciones/listartransacciones.php';

        }else{

            $id = $_POST['cedulaID'];
            $id2 =  $_POST['consecutivoID'];
            $cuenta = transaccionesM::findById($id, $id2);
            $mensajeError = 'No tiene suficiente dinero.';
            require '../view/transacciones/retirar.php';
        }

    }
    
    require '../view/footer.php';