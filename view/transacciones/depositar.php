<script>

function recargar(){

	document.forms[1].action = "../controller/depositar.php?accion=recargarCuenta";
	document.forms[1].submit();
}
</script>

<div class="container">
	 <div class="jumbotron">
        <h1>Gestión de Transacciones</h1>
        <p>En este módulo podrás gestionar toda la información referente a los usuarios, creación, modificación y eliminación de usuarios 
				también podrás, consultar los usuarios actuales.</p>
      </div>
	 

<?php
	include ("../model/connection.php");
	$listaTipoCuentasSelect = mysqli_query($conexion,"select * from tipoCuentas;")	
					or die("Problemas en el select".mysqli_error($conexion));
?>			
	 
	 <!-- gestion de Usuarios -->
	 <form class="form-horizontal" id="idForma" method="post" action="../controller/transacciones.php?accion=guardarDeposito">
		<fieldset>
		
		<input type="hidden" name="cuentaID" value="<?php echo $cuenta['cedulaCliente'] ?>"  id="cuentaID" />
		
		<!-- Text input cedula -->
        <input type="hidden" name="cedulaID" value="<?php echo $cuenta['cedulaCliente'] ?>"  id="cedulaID" />
        <div class="form-group">
            <label class="col-md-4 control-label" for="cedulaID">Cedula: </label>  
            <div class="col-md-4">
            <?php echo $cuenta['cedulaCliente'] ?>
            </div>
        </div>


		<!-- Text input nombre  -->
        <input type="hidden" name="consecutivoID" value="<?php echo $cuenta['consecutivo'] ?>"  id="consecutivoID" />
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nombreCompletoID">Consecutivo: *</label>  
		  <div class="col-md-5">
		  <?php echo $cuenta['consecutivo'] ?>
		  </div>
		</div>

		<!-- Text input fecha nacimiento -->
        <input type="hidden" name="fechaCreacionID" value="<?php echo $cuenta['fechaCreacion'] ?>"  id="fechaCreacionID" />
		<div class="form-group">
		  <label class="col-md-4 control-label" for="fechaCreacionID">Fecha de Creación : *</label>  
		  <div class="col-md-5">
          <?php echo $cuenta['fechaCreacion'] ?>
		  </div>
		</div>

		<!-- Text input email -->
        <input type="hidden" name="idTipoCuentaID" value="<?php echo $cuenta['idTipoCuenta'] ?>"  id="idTipoCuentaID" />
		<div class="form-group">
		  <label class="col-md-4 control-label" for="idTipoCuentaID">Tipo de cuenta *</label>
		  <div class="col-md-2">
			<div class="input-group">
                <?php while($data = mysqli_fetch_array($listaTipoCuentasSelect)){ ?>
                    <?php if($data['idTipoCuenta'] == $cuenta['idTipoCuenta']){ echo $data['descripcion'];}else{echo "";}?>
                <?php } ?>
			</div>
		  </div>
		</div>
		
		<!-- Text input contraseña  -->
        <input type="hidden" name="saldoID" value="<?php echo $cuenta['saldo'] ?>"  id="saldoID" />
		<div class="form-group">
		  <label class="col-md-4 control-label" for="passID">Saldo actual : *</label>  
		  <div class="col-md-5">
            <?php echo $cuenta['saldo'] ?>
		  </div>
		</div>



		<div class="form-group">
		  <label class="col-md-4 control-label" for="passID">Saldo a depositar : *</label>  
		  <div class="col-md-5">
            <input id="saldoID" name="depositoID" class="form-control" placeholder="saldo a depositar" type="text" required="">
		  </div>
		</div>


		
		<!-- Button (Double) -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="guardarID"></label>
		  <div class="col-md-8"> 
			<button class="btn btn-primary" type="submit" value="Depositar"><span class=" glyphicon glyphicon-floppy-saved"> </span> Depositar</button>	
			
			<a href="../controller/transacciones.php?accion=listartransacciones" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
		  </div>
		</div>

		</fieldset>
	</form>
	 <!-- gestion de carreras -->

</div> <!-- /container -->
