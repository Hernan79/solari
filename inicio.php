<?php
 		session_start();
		include_once('php_conexion.php'); 
		
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
		}else{
			header('location:error.php');
		}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blanco</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
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
    <div class="container">
            <div id="slider">
            <div><img src="img/slide-01.jpg"></div>
            <div><img src="img/slide-02.jpg"></div>
            <div><img src="img/slide-03.jpg"></div>
        </div>
    </div>
    <script type="text/javascript">
    $(function(){
        $('#slider div:gt(0)').hide();
            setInterval(function(){
                $('#slider div:first-child').fadeOut(1000)
                    .next('div').fadeIn(1000)
                    .end().appendTo('#slider');
            },4000);
    })
    </script>
        	<?php
				$c=mysql_query("SELECT COUNT(nombre) as salon FROM salones WHERE estado='s'");
				if($d=mysql_fetch_array($c)){
					$t_salones=$d['salon'];
				}
				$c=mysql_query("SELECT COUNT(nombre) as alumno FROM alumnos WHERE estado='s'");
				if($d=mysql_fetch_array($c)){
					$t_alumno=$d['alumno'];
				}
			?><br><br><br><br>
        	<strong>Numero de Alumnos Registrados: </strong><span class="label label-success"><?php echo $t_alumno; ?></span>
            <br><br>
            <strong>Numero de Salones o Cursos Registrados: </strong><span class="label label-success"><?php echo $t_salones; ?></span>
        </div>
    </div>
</body>
</html>