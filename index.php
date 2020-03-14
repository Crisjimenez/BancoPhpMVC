<!DOCTYPE html>
  <head>
		<title>Entidad Bancaria</title>
		<meta charset = "utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="view/css/login.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  
  <script type="text/javascript">
			$(document).ready(function () {
		
				var sPageURL = window.location.search.substring(1);
				if(sPageURL.length>0){
					 switch (sPageURL) {
					 
						case "error":
							var mensaje = "Usuario o contraseña incorrecto";
							break;
						case "SesionExpirada":
							var mensaje = "La sesión ha expirado";
							break;
						default:
							var mensaje = "";
					 
					}
					 $("#mensaje").append(mensaje);
				}
			});
		</script>

<!------ Include the above in your HEAD tag ---------->
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      </br>
      <div id="mensaje" class="error" style="font-weight: bold !important;font-weight: bold !important;font-size: 18px;color: red;" align="center"></div>
    </div>

    <!-- Login Form -->
    <form method="post" action="controller/login.php?accion=registrar">
      <input type="text" id="usr" name="usr" class="fadeIn second"  placeholder="usuario">
      <input type="password" id="password" class="fadeIn third" name="contrasena" placeholder="contraseña">
      <input type="submit" class="fadeIn fourth" value="Ingresar">
    </form>

    <!-- Remind Passowrd >
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div -->

  </div>
</div>
</body>
</html>