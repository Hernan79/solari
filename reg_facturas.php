<?php
 		session_start();
		include_once('php_conexion.php');
        include_once('Class/funciones.php'); 
		include_once('Class/class_alumnos.php');
        include_once('Class/class_facturas.php');
		
        if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='s'){
		}else{
			header('location:error.php');
		}
		if(!empty($_GET['estado'])){
			$nit=limpiar($_GET['estado']);
			$cans=mysql_query("SELECT * FROM reg_facturas WHERE  estado='s'");
			if($dat=mysql_fetch_array($cans)){
				$xSQL="Update alumnos Set estado='s' Where id='$id'";
				mysql_query($xSQL);
				header('location:reg_facturas.php');
			}else{
				$xSQL="Update alumnos Set estado='n' Where id='$id'";
				mysql_query($xSQL);
				header('location:reg_facturas.php');
			}
		}
		
		#paginar
		$maximo=7;
		if(!empty($_GET['pag'])){
			$pag=limpiar($_GET['pag']);
		}else{
			$pag=1;
		}
		$inicio=($pag-1)*$maximo;
		
			$cans=mysql_query("SELECT COUNT(factura)as total FROM reg_facturas");
			if($dat=mysql_fetch_array($cans)){
				$total=$dat['total']; #inicializo la variable en 0
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
    <table width="95%" border="0">
      <tr>
        <td>
       	  <table class="table table-bordered">
              <tr class="success">
                <td>
                    <div class="row-fluid">
                      <div class="span6">
                        	<h3><img src="img/icono_alumno.jpg" class="img-circle img-polaroid" width="70" height="65"> 
                        	Registro y Control de Facturas</h3>
                      </div>
                      <div class="span6">
                      	<div align="right">
                       	<a href="#nuevo" role="button" class="btn" data-toggle="modal">
                            	<strong><i class="icon-user"></i> Ingresar Factura</strong>
                        </a>
                        <div class="btn-group">
                            <button class="btn" data-toggle="dropdown">
                            	<i class="icon-search"></i> <strong>Consultar por Vendedor</strong> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <?php
									$c=mysql_query("SELECT * FROM salones WHERE estado='s'");
									while($d=mysql_fetch_array($c)){
										echo '<li><a href="reg_facturas.php?factura=0'.$d['id'].'">'.$d['nombre'].'</a></li>';	
									}
							?>
                            <li><a href="reg_facturas.php?facturas=0">Todos</a></li>
                            </ul>
                        </div>
                        <br><br>
                        <form name="form1" method="post" action="">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-search"></i></span>
                                <input name="bus" type="text" placeholder="Buscar Factura" class="input-xlarge" autocomplete="off">
                            </div>
                        </form>
                        </div>
                      </div>
                    </div>
                </td>
              </tr>
            </table>

        </td>
      </tr>
      <tr>
        <td>
        	<?php 
				if(!empty($_POST['factura'])){							   
					$fecha_sist=limpiar($_POST['fecha_sist']);             
                    $codigo= limpiar($_POST['codigo']);        
                    $factura=limpiar($_POST['factura']);                   
                    /*$cliente=limpiar($_POST['cliente']);*/
                    $ne= limpiar($_POST['ne']);                            
                    $zona=limpiar($_POST['zona']);        
                    $fecha_real= limpiar($_POST['fecha_real']);            
                    $vendedor= limpiar($_POST['vendedor']);
                    $pedidos= limpiar($_POST['pedidos']);                  
                    $bultos= limpiar($_POST['bultos']);
                    $base_imponible= limpiar($_POST['base_imponible']);
                                                               
					
					if(empty($_POST['id'])){
						$c_factura = new Proceso_Factura('', $fecha_sist, $factura, $ne, $pedidos, $codigo, 'prueba', $vendedor, $bultos, $base_imponible, $fecha_real, $zona, 's');
						$c_factura->crear();
						
						$can=mysql_query("SELECT MAX(id)as maximo FROM reg_facturas");
						if($dato=mysql_fetch_array($can)){
							$codigo=$dato['maximo'];
							
							}
						}
						echo '	<div class="alert alert-info" align="center">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>
										La Factura "'.$factura.'" Registrado con Exito en la Base de Datos							
									</strong>
								</div>';
								
					}/*elseif(!empty($_POST['id'])){
						$codigo=$_POST['id'];
						$a_alumno = new Proceso_Factura($nombre,$apellido,$nit,$telefono,$fechan,$folio,$curso,'s',$codigo);
						$a_alumno->actualizar();
												
						
						echo '	<div class="alert alert-info" align="center">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>
										El alumno/a "'.$nombre.' '.$apellido.'" Actualizado con Exito en la Base de Datos							
									</strong>
								</div>';
					
					
				}*/
			?>
        	<table class="table table-bordered table table-hover">
              <tr class="success">
                <td width="8%"><center><strong>Fecha Sistema</strong></center></td>
                <td width="5%"><center><strong>Factura</strong></center></td>
                <td width="8%"><center><strong>Nota de Entrega</strong></center></td>
                <td width="8%"><center><strong>Pedidos</strong></center></td>
                <td width="5%"><center><strong>Codigo</strong></center></td>
                <td width="28%"><center><strong>Cliente</strong></center></td>
                <td width="5%"><center><strong>Vendedor</strong></center></td>
                <td width="5%"><center><strong>Bultos</strong></center></td>
                <td width="8%"><center><strong>Base Imponible</strong></center></td>
                <td width="5%"><center><strong>Zona</strong></center></td>
                <td width="8%"><center><strong>Fecha Real</strong></center></td>
                <td width="8%">&nbsp;</td>
              </tr>
              <?php

			  	if(empty($_GET['factura'])){
					if(empty($_POST['bus'])){
						
                        $sql="SELECT * FROM reg_facturas ORDER BY factura LIMIT $inicio, $maximo";
					}else{
						$bus=limpiar($_POST['bus']);
						$sql="SELECT * FROM reg_facturas WHERE factura LIKE '$bus%' or vendedor LIKE '$bus%' or zona='$bus' or ne='$bus'ORDER BY factura LIMIT $inicio, $maximo";
					}
				}else{
					$bus=limpiar($_GET['factura']);
					if($bus<>0){
						$sql="SELECT * FROM reg_facturas WHERE factura='$bus' ORDER BY apellido LIMIT $inicio, $maximo";
					}else{
						$sql="SELECT * FROM reg_facturas ORDER BY ne LIMIT $inicio, $maximo";
					}
				}
			  	
			  	$can=mysql_query($sql);
				while($dato=mysql_fetch_array($can)){	
					$factura = new Consultar_Facturas($dato['factura']);
                
			  ?>
                  <tr align="center">
                    <td><i class=""></i> <?php echo trim($dato['fecha_sist']); ?></td>
                    <td><i class=""></i> <?php echo trim($dato['factura']); ?></td>
                    <td><i class=""></i> <?php echo trim($dato['ne']); ?></td>
                    <td><i class=""></i> <?php echo trim($dato['pedidos']); ?></td>
                    <td><i class=""></i> <?php echo trim($dato['codigo']); ?></td>
                    <td><i class=""></i> <?php echo trim($dato['cliente']); ?></td>
                    <td><i class=""></i> <?php echo trim($dato['vendedor']); ?></td>
                    <td><i class=""></i> <?php echo trim($dato['bultos']); ?></td>
                    <td><i class=""></i> <?php echo trim($dato['base_imponible']); ?></td>
                    <td><i class=""></i> <?php echo trim($dato['zona']); ?></td>
                    <td><i class=""></i> <?php echo trim($dato['fecha_real']); ?></td>
                    <td>
                    	<center><a href="#actualizar<?php echo $dato['id']; ?>" role="button" class="btn btn-mini" data-toggle="modal" title="Editar">
                    		<i class="icon-edit"></i>
                        </a>
                        <a href="#eliminar<?php echo $dato['id']; ?>" role="button" class="btn btn-mini" data-toggle="modal" title="Eliminar">
                            <i class="icon-remove"></i>
                        </a></center>
                    </td>
                  </tr>
                  <!--actualizar alumno-->
                    <div id="actualizar<?php echo $dato['id']; ?>" 
                    class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <form name="form2" method="post" enctype="multipart/form-data" action="">
                    	<input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Actualizar Alumno</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row-fluid">
                                <div class="span6">
                                    <strong>Nombre del Alumno</strong><br>
                                    <input type="text" name="nombre" autocomplete="off" required value="<?php echo $dato['nombre']; ?>"><br>
                                    <strong>Codigo o Nit</strong><br>
                                  <input type="text" name="nit" autocomplete="off" required value="<?php echo $dato['nit']; ?>"><br>
                                    <strong>Fecha Nacimiento</strong><br>
                                    <input type="date" name="fechan" autocomplete="off" required value="<?php echo $dato['fechan']; ?>"><br>
                                    <strong>Curso / Salon</strong><br>
                                    <select name="curso">
                                    	<?php
											$c=mysql_query("SELECT * FROM salones WHERE estado='s'");
											while($d=mysql_fetch_array($c)){
												if($d['id']==$dato['curso']){	
													echo '<option value="'.$d['id'].'" selected>'.$d['nombre'].'</option>';
												}else{
													echo '<option value="'.$d['id'].'">'.$d['nombre'].'</option>';
												}
											}
										?>
                                        
                                    </select>
                                    <strong>Fotografia</strong><br>
                                    <input type="file" name="imagen" id="imagen">
                                </div>
                                <div class="span6">
                                    <strong>Apellidos del Alumno</strong><br>
                                    <input type="text" name="apellido" autocomplete="off" value="<?php echo $dato['apellido']; ?>"><br>
                                    <strong>Telefonos / Celulares</strong><br>
                                    <input type="text" name="telefono" autocomplete="off" value="<?php echo $dato['telefono']; ?>"><br>
                                    <strong>No. De Carpetas / Folio</strong><br>
                                    <input type="text" name="folio" autocomplete="off" value="<?php echo $dato['folio']; ?>"><br><br>
                                    <center><button type="submit" class="btn"><strong><i class="icon-ok"></i> Actualizar Alumno</strong></button></center>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
                        </div>
                        </form>
                    </div>

                    <!--Eliminar Factura-->
                    <div id="eliminar<?php echo $dato['id']; ?>" 
                    class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <form name="form4" method="post" enctype="multipart/form-data" action="eliminar.php">
                        <input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel"><i class="icon-info"></i>Advertencia</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row-fluid">
                                <div class="span6">
                                    <center><strong >Desea eliminar la Factura Nº </strong><strong><?php echo $dato['factura']; ?></center>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn"><strong><i class="icon-ok"></i> Aceptar</strong></button>
                            <button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
                        </div>
                        </form>


                    </div>

               <?php
            $id = limpiar(@$_POST['id']);

                    if(empty($id==0)){
                    $xSQL="DELETE FROM reg_facturas WHERE id = '$id'";
                    mysql_query($xSQL);
                    
   
                             echo'
                             <div class="alert alert-info" align="center">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>
                                        La factura ha sido eliminada de la Base de Datos                           
                                    </strong>                                   
                                </div>';
                    }
              ?>           
              <?php } ?>
            
            </table>
			<?php 
				$can=mysql_query($sql);
				if(!$dato=mysql_fetch_array($can)){				
					echo '<div class="alert alert-info" align="center"><strong>No hay Alumnos Registrados en la BD</strong></div>';
				}
			?>
        </td>
      </tr>
    </table>
    <div class="pagination">
        <ul>
        	<?php
			if(empty($_GET['factura']) and empty($_POST['bus'])){
				$tp = ceil($total/$maximo);#funcion que devuelve entero redondeado
         		for	($n=1; $n<=$tp ; $n++){
					if($pag==$n){
						echo '<li class="active"><a href="reg_facturas.php?pag='.$n.'">'.$n.'</a></li>';	
					}else{
						echo '<li><a href="reg_facturas.php?pag='.$n.'">'.$n.'</a></li>';	
					}
				}
				
			}
			?>
        </ul>
    </div>
</div>
<!--crear nuevo alumno-->
<div id="nuevo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form name="form2" method="post" enctype="multipart/form-data" action="">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Ingresar Factura</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
        	<div class="span6">
                <strong>Fecha del Sistema</strong><br>
                <input type="date" name="fecha_sist" autocomplete="off" required value="<?php echo date('Y-m-d'); ?>"><br>
            	<strong>Nº de Factura</strong><br>
            	<input type="text" name="factura" autocomplete="off" required><br>
                <strong>Nota de Entrega</strong><br>
              <input type="text" name="ne" autocomplete="off" required><br>
                <strong>Nº de Pedido</strong><br>
                <input type="text" name="pedidos" autocomplete="off" required><br>
                <strong>Código Cliente</strong><br>
                <input type="text" name="codigo" autocomplete="off" required><br>
                
                </div>
            <div class="span6">
                <strong>Fecha Real</strong><br>
                <input type="date" name="fecha_real" autocomplete="off" required value="<?php echo date('Y-m-d'); ?>"><br>
                <strong>Vendedor</strong><br>
                <select name="vendedor">
                    <?php
                        $c=mysql_query("SELECT * FROM salones WHERE estado='s'");
                        while($d=@mysql_fetch_array($c)){
                            echo '<option value="'.$d['id'].'">'.$d['nombre'].'</option>';
                        }
                    ?>
                </select>
            	<strong>Bultos</strong><br>
                <input type="text" name="bultos" autocomplete="off"><br>
                <strong>Base Imponible</strong><br>
                <input type="text" name="base_imponible" autocomplete="off"><br>
                <strong>Zona</strong><br>
                <input type="text" name="zona" autocomplete="off"><br><br>
                
            </div>
		</div>
	</div>
      	<div class="modal-footer">
            <button type="submit" class="btn"><strong><i class="icon-ok"></i> Aceptar</strong></button>
    		<button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>

    	</div>
    </form>
</div>
</body>
</html>