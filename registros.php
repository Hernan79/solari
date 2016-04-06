<?php
 		session_start();
    include('php_conexion.php'); 
    if($_SESSION['tipo_usu']=='a'){
    }else{
      header('location:error.php');
    }
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Nuevos Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>
    <script src="js/holder/holder.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/application.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
<table width="50%" border="0">
<tr>
  <td>
<table border="0" class="table table-bordered">
  <tr class="success">
    <td>
    	<center><strong>
        	<h3><img src="img/seguridad.jpg" class="img-circle img-polaroid" width="50" height="65"> 
            Nuevos Usuarios</h3>
        </strong></center>
    </td>
  </tr>
  <tr>
    <td>
      <div align="center">
        <form name="form1" method="post" action="">
          <label><strong>Nombre: </strong></label><input type="text" name="nombre" id="nom" required>
          <label><strong>Email: </strong></label><input type="text" name="email" id="email" required>
          <label><strong>Usuario: </strong></label><input type="text" name="usuario" id="usu" required>
          <label><strong>Contraseña: </strong></label><input type="password" name="contra1" id="c1" required>
          <label><strong>Repetir Contraseña: </strong></label><input type="password" name="contra2" id="c2" required><br><br>
          <input type="submit" name="button" id="button" class="btn btn-primary" value="Ingresar">
          </form>
     <?php 
	
  
  
  if(!empty($_POST['contra1']) && !empty($_POST['contra2']))
  {
      $contra=limpiar($_POST['contra2']);
      $nombre=$_POST['nombre'];
      $mail=$_POST['email'];
      $usuario=$_POST['usuario'];
      $c1=$_POST['contra1'];
      $comprobacion1 = mysql_query("SELECT * FROM usuarios WHERE usu='$usuario'");
      $comprobacion2 = mysql_query("SELECT * FROM usuarios WHERE email='$mail'");
		  
      if(mysql_num_rows($comprobacion1) > 0)
        {
          echo  '<div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Fallo de Registro!</strong> Este usuario existe
                </div>';
        } 
          elseif(mysql_num_rows($comprobacion2) > 0){

                                                    echo  '<div class="alert alert-error">
                                                          <button type="button" class="close" data-dismiss="alert">×</button>
                                                          <strong>Fallo de Registro!</strong> Este correo existe
                                                          </div>';
                                                    }
          else
          {
            if($_POST['contra1']==$_POST['contra2']) 
        		{
        			//$usuario=limpiar($_SESSION['username']);
        			$can=mysql_query("SELECT * FROM usuarios");
        			if($dato=mysql_fetch_array($can))
              {
        					$sql="INSERT INTO usuarios (email, estado, nom, usu, con, tipo) VALUES ('$mail', 's', '$nombre', '$usuario', '$c1', 'u')";
        					mysql_query($sql);
        					
                  echo  '<div class="alert alert-info" align="center">
        					       <button type="button" class="close" data-dismiss="alert">×</button>
        					       <strong>Registro!</strong> Realizado con exito
        					       </div>';
        			}
            } 
            else
                {
                  echo '<div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>ERROR</strong> Las constraseña no son iguales
                        </div>';
                } 	

    }
	   	
	}
	?>
        </div>
      </td>
    </tr>
</table>
</td></tr>
</table>
</div>
</body>
</html>