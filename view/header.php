<!DOCTYPE html>
<html>
	<head>
		<title>Entidad Bancaria</title>
		<meta charset = "utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
		
	<body>
  <?php session_start(); ?>
		<!-- Menú de opciones -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../controller/clientes.php?accion=inicio">Corporacion X</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
    <?php if($_SESSION["rol"] == 'ADMIN' ){?>
      <li class="nav-item dropdown">
        <a class="nav-link" href="../controller/clientes.php?accion=listarClientes" id="navbarDropdown" role="button">
          Clientes
        </a>
      </li>
    <?php } ?>  

    <?php if($_SESSION["rol"] == 'ADMIN' ){?>
	    <li class="nav-item dropdown">
        <a class="nav-link" href="../controller/tipoCuentas.php?accion=listarTipoCuentas" id="navbarDropdown" role="button">
          Tipo Cuentas
        </a>
      </li>
    <?php } ?> 

    <?php if($_SESSION["rol"] == 'USUARIO' || $_SESSION["rol"] == 'ADMIN' ){?>
	    <li class="nav-item dropdown">
        <a class="nav-link" href="../controller/cuentas.php?accion=listarCuentas" id="navbarDropdown" role="button">
          Cuentas
        </a>
      </li>
    <?php } ?> 

    <?php if($_SESSION["rol"] == 'USUARIO' || $_SESSION["rol"] == 'ADMIN' ){?>
	    <li class="nav-item dropdown">
      <a class="nav-link" href="../controller/transacciones.php?accion=listartransacciones" id="navbarDropdown" role="button">
          Transacciones
        </a>
      </li>
    <?php } ?> 

      <li class="nav-item dropdown">
        <a class="nav-link" href="../index.php" id="navbarDropdown" role="button" >
          Salir
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" id="navbarDropdown" role="button" >
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link " id="navbarDropdown" role="button" >
        Bienvenido: <?php echo $_SESSION["nombre"] ?>
        </a>
      </li>
      
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="consultar.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Digite la cédula" aria-label="Search" name="txtced">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
		
