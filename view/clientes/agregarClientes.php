<script>

function recargar(){

	document.forms[1].action = "../controller/clientes.php?accion=recargarCliente";
	document.forms[1].submit();
}
</script>

<div class="container">
	 <div class="jumbotron">
        <h1>Gesti&oacute;n de Clientes</h1>
        <p>En este módulo podrás gestionar toda la información referente a los usuarios, creación, modificación y eliminación de usuarios 
				también podrás, consultar los usuarios actuales.</p>
      </div>
	 
	 
	 <!-- gestion de Usuarios -->
	 <form class="form-horizontal" id="idForma" method="post" action="../controller/clientes.php?accion=guardarCliente">
		<fieldset>
		
		<input type="hidden" name="clienteID" value="<?php echo $cliente['cedula'] ?>"  id="clienteID" />
		
		<!-- Text input cedula -->
		<?php if($_SESSION["operacion"] == 'guardar' ){ ?>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="cedulaID">Cedula: *</label>  
			  <div class="col-md-4">
			  <input id="cedulaID" name="cedulaID" type="text" placeholder="Cedula" value="<?php echo $cliente['cedula'] ?>" class="form-control input-md" required="">
				
			  </div>
			</div>
		<?php }else if($_SESSION["operacion"] == 'modificar' ){ ?>  
			<input type="hidden" name="cedulaID" value="<?php echo $cliente['cedula'] ?>"  id="cedulaID" />
			<div class="form-group">
			  <label class="col-md-4 control-label" for="cedulaID">Cedula: </label>  
			  <div class="col-md-4">
				<?php echo $cliente['cedula'] ?>
			  </div>
			</div>
		<?php } ?> 

		<!-- Text input nombre  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nombreCompletoID">Nombre: *</label>  
		  <div class="col-md-5">
		  <input id="nombreID" name="nombreID" type="text" value="<?php echo $cliente['nombre'] ?>" placeholder="Nombre" class="form-control input-md" required="">
		  </div>
		</div>

		<!-- Text input fecha nacimiento -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="apellidoID">Apellido : *</label>  
		  <div class="col-md-5">
		  
		  <div class='input-group date' id='datetimepicker8' >
				<input id="apellidoID" name="apellidoID" type="text" value="<?php echo $cliente['apellido'] ?>" placeholder="Apellido" class="form-control input-md" required="">
			</div>

		  <!-- input id="nombreCompletoID" name="nombreCompletoID" type="text" placeholder="Nombre Completo" class="form-control input-md" required="" -->
		  </div>
		</div>

		<!-- Text input email -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="usuarioID">telefono: *</label>
		  <div class="col-md-4">
			<div class="input-group">
			  <input id="telefonoID" name="telefonoID" class="form-control"value="<?php echo $cliente['telefono'] ?>" placeholder="Telefono" type="text" required="">
			</div>
		</div>	
		</div>	
		
		<!-- Text input contraseña  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="passID">Dirección : *</label>  
		  <div class="col-md-5">
			<input id="direccionID" name="direccionID" class="form-control"value="<?php echo $cliente['direccion'] ?>" placeholder="Direccion" type="text" required="">
		  </div>
		</div>

		<div class="form-group">
		  <label class="col-md-4 control-label" for="passID">Correo electronico: *</label>  
		  <div class="col-md-5">
			<input id="correoID" name="correoID" class="form-control"value="<?php echo $cliente['correo'] ?>" placeholder="Correo" type="text" required="">
		  </div>
		</div>

		
		<!-- Button (Double) -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="guardarID"></label>
		  <div class="col-md-8">
			<?php if($_SESSION["operacion"] == 'guardar' ){?>
				<button class="btn btn-primary" type="submit" value="Guardar"><span class=" glyphicon glyphicon-floppy-saved"> </span> Guardar</button>				
			<?php }else if($_SESSION["operacion"] == 'modificar' ){ ?>  
				<button class="btn btn-primary" type="submit" value="Modificar"><span class=" glyphicon glyphicon-floppy-saved"> </span> Modificar</button>	
			<?php } ?>  
			
			<a href="../controller/clientes.php?accion=listarClientes" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
		  </div>
		</div>

		</fieldset>
	</form>
	 <!-- gestion de carreras -->

</div> <!-- /container -->
