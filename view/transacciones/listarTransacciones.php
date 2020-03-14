<?php
include ("../model/connection.php");
$listaCuentas = mysqli_query($conexion,"select * from cuentas;")	
				or die("Problemas en el select".mysqli_error($conexion));
?>
<div class="container">
	 
	<div class="jumbotron">
		<h1>Gestion de Transacciones</h1>
		<p>En este módulo podrás gestionar toda la información referente a los usuarios, creación, modificación y eliminación de usuarios 
				también podrás, consultar los usuarios actuales.</p>
	</div>
	 
	<br></br>
	
	<!-- fin filtros -->

		
		
     <!-- tabla de lista de carreras -->
	  
	<div align="right">
	    <a>
			<a href="../controller/cuentas.php?accion=agregarCuentas" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Agregar</a>
		</a>
	</div>
	<legend>Listado de Transacciones</legend>
			 
	<div class="span7">   
		<div class="widget stacked widget-table action-table">
					
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="td-actions">Depositar</th>
							<th class="td-actions">Retirar</th>
							<th>cedula del Cliente</th>
							<th>consecutivo</th>
							<th>Fecha de Creacion</th>
							<th>id Tipo Cuenta</th> 
							<th>Saldo</th>
						</tr>
					</thead>
					<tbody>
						<?php while($data = mysqli_fetch_array($listaCuentas)){ ?>
							<tr>
								<td class="td-actions">
									<p data-placement="top" data-toggle="tooltip" title="Depositar">
										<a class="btn btn-primary btn-xs" data-title="Depositar" href="../controller/transacciones.php?accion=Depositar&id=<?php echo $data['cedulaCliente'] ?>&id2=<?php echo $data['consecutivo'] ?>" >
									 <span class="glyphicon glyphicon-pencil"></span></a></p>
								</td>
								<td class="td-actions">								
									<p data-placement="top" data-toggle="tooltip" title="Retirar">
										<a class="btn btn-danger btn-xs" data-title="Retirar" href="../controller/transacciones.php?accion=Retirar&id=<?php echo $data['cedulaCliente'] ?>&id2=<?php echo $data['consecutivo'] ?>" >
									 <span class="glyphicon glyphicon-trash"></span></a></p>
								</td>
								<td><?php echo $data['cedulaCliente'] ?></td>
								<td><?php echo $data['consecutivo'] ?></td>
								<td><?php echo $data['fechaCreacion'] ?></td>
								<td><?php echo $data['idTipoCuenta'] ?></td>
								<td><?php echo $data['saldo'] ?></td>
							</tr>
							<?php } ?>

					</tbody>
				</table>
			</div>
			<div class="clearfix"></div>
						
		</div>		

	
	</div> <!-- /widget-content -->
					
</div> <!-- container -->

