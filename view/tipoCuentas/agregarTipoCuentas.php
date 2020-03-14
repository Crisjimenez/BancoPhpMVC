<script>

function recargar(){

	document.forms[1].action = "../controller/tipoCuentas.php?accion=recargarTipoCuenta";
	document.forms[1].submit();
}
</script>

<div class="container">
	 <div class="jumbotron">
        <h1>Gesti&oacute;n de Tipo de Cuentas</h1>
        <p>En este módulo podrás gestionar toda la información referente a los usuarios, creación, modificación y eliminación de usuarios 
				también podrás, consultar los usuarios actuales.</p>
      </div>
	 
	 
	 <!-- gestion de Usuarios -->
	 <form class="form-horizontal" id="idForma" method="post" action="../controller/tipoCuentas.php?accion=guardarTipoCuenta">
		<fieldset>
		
		<input type="hidden" name="tipoCuentaID" value="<?php echo $tipoCuenta['idTipoCuenta'] ?>"  id="tipoCuentaID" />
		
		<!-- Text input idTipoCuenta -->
		<?php if($_SESSION["operacion"] == 'guardar' ){ ?>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="idTipoCuentaID">Id tipo cuenta: *</label>  
			  <div class="col-md-4">
			  <input id="idTipoCuentaID" name="idTipoCuentaID" type="text" placeholder="idTipoCuenta" value="<?php echo $tipoCuenta['idTipoCuenta'] ?>" class="form-control input-md" required="">
				
			  </div>
			</div>
		<?php }else if($_SESSION["operacion"] == 'modificar' ){ ?>  
			<input type="hidden" name="idTipoCuentaID" value="<?php echo $tipoCuenta['idTipoCuenta'] ?>"  id="idTipoCuentaID" />
			<div class="form-group">
			  <label class="col-md-4 control-label" for="idTipoCuentaID">idTipoCuenta: </label>  
			  <div class="col-md-4">
				<?php echo $tipoCuenta['idTipoCuenta'] ?>
			  </div>
			</div>
		<?php } ?> 

		<!-- Text input descripcion  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="descripcionID">Descripcion: *</label>  
		  <div class="col-md-5">
		  <input id="descripcionID" name="descripcionID" type="text" value="<?php echo $tipoCuenta['descripcion'] ?>" placeholder="descripcion" class="form-control input-md" required="">
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
			
			<a href="../controller/tipoCuentas.php?accion=listarTipoCuentas" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
		  </div>
		</div>

		</fieldset>
	</form>
	 <!-- gestion de carreras -->

</div> <!-- /container -->
