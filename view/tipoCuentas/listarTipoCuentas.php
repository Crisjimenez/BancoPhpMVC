<script>

	var variables = "";

	function deleteC(cedulaVar){
		variables = cedulaVar;
	}

	function eliminar(){
		document.forms[1].action = "../controller/tipoCuentas.php?accion=eliminarTipoCuenta&codigoEliminarID="+variables;
		document.forms[1].submit();
	}

	function abrirAsociar(){
		
	}

</script>

<?php
include ("../model/connection.php");
$listaTipoCuentas = mysqli_query($conexion,"select * from tipoCuentas;")	
				or die("Problemas en el select".mysqli_error($conexion));
?>
<div class="container">
	 
	<div class="jumbotron">
		<h1>Gesti&oacute;n de TipoCuentas</h1>
		<p>En este módulo podrás gestionar toda la información referente a los usuarios, creación, modificación y eliminación de usuarios 
				también podrás, consultar los usuarios actuales.</p>
	</div>
	 
	<br></br>
	
	<!-- fin filtros -->

		
		
     <!-- tabla de lista de carreras -->
	  
	<div align="right">
	    <a>
			<a href="../controller/tipoCuentas.php?accion=agregarTipoCuentas" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Agregar</a>
		</a>
	</div>
	<legend>Listado de tipoCuentas</legend>
			 
	<div class="span7">   
		<div class="widget stacked widget-table action-table">
					
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="td-actions">Modificar</th>
							<th class="td-actions">Eliminar</th>
							<th>Id Tipo Cuenta</th>
							<th>Descripcion</th>
						</tr>
					</thead>
					<tbody>
						<?php while($data = mysqli_fetch_array($listaTipoCuentas)){ ?>
							<tr>
								<td class="td-actions">
									<p data-placement="top" data-toggle="tooltip" title="Modificar">
										<a class="btn btn-primary btn-xs" data-title="Modificar" href="../controller/tipoCuentas.php?accion=editarTipoCuenta&id=<?php echo $data['idTipoCuenta'] ?>" >
									 <span class="glyphicon glyphicon-pencil"></span></a></p>
								</td>
								<td class="td-actions">								
									<p data-placement="top" data-toggle="tooltip" title="Delete">
										<a class="btn btn-danger btn-xs" onclick="javascript:deleteC('<?php echo $data['idTipoCuenta'] ?>')" data-title="Eliminar" data-toggle="modal" data-target="#delete" >
									 <span class="glyphicon glyphicon-trash"></span></a></p>
								</td>
								<td><?php echo $data['idTipoCuenta'] ?></td>
								<td><?php echo $data['descripcion'] ?></td>
							</tr>
							<?php } ?>

					</tbody>
				</table>
			</div>
			<div class="clearfix"></div>
						
		</div>		

	
	</div> <!-- /widget-content -->
					
</div> <!-- container -->


<form class="form-horizontal" method="post" action="../controller/tipoCuentas.php?accion=eliminarTipoCuenta">
<!-- Dialogos para update y delete  ---------------------------------------------------------------------------------------------------------->	
    
<!-- modal para eliminacion -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				<h4 class="modal-title custom_align" id="Heading">Eliminar Registro</h4>
			</div>
			<div class="modal-body">
		   
				<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Esta seguro que desea eliminar el registro seleccionado?</div>
		   
			</div>
			<div class="modal-footer ">
				<a onclick="eliminar()" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>S&iacute;</a>
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
			</div>
		</div>
    
	</div> <!-- fin modal-content --> 
</div> <!-- fin modal-dialog --> 
<!-- fin modal para eliminacion -->
<!-- fin modal para eliminacion y update ------------------------------------------------------------------------------------------ -->
</form>
