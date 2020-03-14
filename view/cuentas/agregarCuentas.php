<script>

function recargar(){

	document.forms[1].action = "../controller/cuentas.php?accion=recargarCuenta";
	document.forms[1].submit();
}
</script>

<div class="container">
	 <div class="jumbotron">
        <h1>Gestión de Cuentas</h1>
        <p>En este módulo podrás gestionar toda la información referente a los usuarios, creación, modificación y eliminación de usuarios 
				también podrás, consultar los usuarios actuales.</p>
      </div>
	 

<?php
	include ("../model/connection.php");
	$listaTipoCuentasSelect = mysqli_query($conexion,"select * from tipoCuentas;")	
					or die("Problemas en el select".mysqli_error($conexion));
?>			
	 
	 <!-- gestion de Usuarios -->
	 <form class="form-horizontal" id="idForma" method="post" action="../controller/cuentas.php?accion=guardarCuenta">
		<fieldset>
		
		<input type="hidden" name="cuentaID" value="<?php echo $cuenta['cedulaCliente'] ?>"  id="cuentaID" />
		
		<!-- Text input cedula -->
		<?php if($_SESSION["operacion"] == 'guardar' ){ ?>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="cedulaID">Cedula Cliente: *</label>  
			  <div class="col-md-4">
			  <input id="cedulaID" name="cedulaID" type="text" placeholder="Cedula" value="<?php echo $cuenta['cedulaCliente'] ?>" class="form-control input-md" required="">
				
			  </div>
			</div>
		<?php }else if($_SESSION["operacion"] == 'modificar' ){ ?>  
			<input type="hidden" name="cedulaID" value="<?php echo $cuenta['cedulaCliente'] ?>"  id="cedulaID" />
			<div class="form-group">
			  <label class="col-md-4 control-label" for="cedulaID">Cedula: </label>  
			  <div class="col-md-4">
				<?php echo $cuenta['cedulaCliente'] ?>
			  </div>
			</div>
		<?php } ?> 

		<!-- Text input nombre  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nombreCompletoID">Consecutivo: *</label>  
		  <div class="col-md-5">
		  <input id="consecutivoID" name="consecutivoID" type="text" value="<?php echo $cuenta['consecutivo'] ?>" placeholder="consecutivo" class="form-control input-md" required="">
		  </div>
		</div>

		<!-- Text input fecha nacimiento -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="fechaCreacionID">Fecha de Creación : *</label>  
		  <div class="col-md-5">
		  
		  <div class='input-group date' id='datetimepicker8' >
			<input type='text' class="form-control" id="fechaCreacionID" name="fechaCreacionID"  placeholder="YYYY-MM-DD" value="<?php echo $cuenta['fechaCreacion'] ?>" />
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar">
			</span>
			</span>
		   </div>
		  </div>
		</div>

		<!-- Text input email -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="idTipoCuentaID">Tipo de cuenta *</label>
		  <div class="col-md-2">
			<div class="input-group">
				<select id="idTipoCuentaID" name="idTipoCuentaID" class="form-control" value="<?php echo $cuenta['idTipoCuenta'] ?>" required="">
					<option value="">-- Seleccione una opción --</option>
					<?php while($data = mysqli_fetch_array($listaTipoCuentasSelect)){ ?>
						<option value="<?php echo $data['idTipoCuenta'] ?>" <?php if($data['idTipoCuenta'] == $cuenta['idTipoCuenta']){ echo "selected";}else{echo "";}?> ><?php echo $data['descripcion'] ?></option>
					<?php } ?>
				</select>
			</div>
		  </div>
		</div>
		
		<!-- Text input contraseña  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="passID">Saldo : *</label>  
		  <div class="col-md-5">
			<input id="saldoID" name="saldoID" class="form-control"value="<?php echo $cuenta['saldo'] ?>" placeholder="saldo" type="text" required="">
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
			
			<a href="../controller/cuentas.php?accion=listarCuentas" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
		  </div>
		</div>

		</fieldset>
	</form>
	 <!-- gestion de carreras -->

</div> <!-- /container -->
