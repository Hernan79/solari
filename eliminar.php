<?php 
        session_start();
        include_once('php_conexion.php');
        include_once('Class/funciones.php'); 
        include_once('Class/class_facturas.php');
        
        if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='s'){
        }else{
            header('location:error.php');
        }
                    // Actualizamos en funcion del id que recibimos 

                    
                    $id = limpiar($_POST['id']);

                    if(!empty($id<>0)){
                    $xSQL="DELETE FROM reg_facturas WHERE id = '$id'";
                    mysql_query($xSQL);
                    header("location:reg_facturas.php");
   
                             echo'
                             <div class="alert alert-info" align="center">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>
                                        La factura ha sido eliminada de la Base de Datos                           
                                    </strong>                                   
                                </div>';
                    }
                    
                    
                    
                    ?>
            