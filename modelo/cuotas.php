<?php

    function agregarCuotas($idPrestamo,$numeroCuotas,$estado,$fecha,$fecha2){
      require('controlador/conexion.php');
      $query="INSERT INTO cuota (idPrestamo,numeroCuotas,estadoCuota,fechaUltima,fechaProxima)
      VALUES('$idPrestamo','$numeroCuotas','$estado','$fecha','$fecha2')";
      $resultado = mysqli_query($mysqli,$query);
        if($resultado){
            $resultado='ok';
        }else{
            $resultado='no';
        }
        return $resultado;
     }

     function listarCuotasPrestamos($idPrestamos){
       include('controlador/conexion.php');
         $query= "SELECT * FROM cuota,prestamos,clientes WHERE cuota.idPrestamo = prestamos.idPrestamos AND prestamos.idPrestamos = $idPrestamos AND prestamos.idCliente = clientes.idCliente";
          $consulta = $db->prepare($query);
         	$consulta->execute();
         	return $consulta->fetchAll();
         }



       function eliminarCuotas($prestamoE){
         require('../controlador/conexion.php');
             $query="DELETE FROM cuota WHERE idPrestamo=$prestamoE";
             $result = $mysqli->query($query);
               if($result){
                 $resultado='ok';
               }else{
                 $resultado = 'no';
               }
                 return $resultado;
       }

       function listarCuotasId($idCuota){
         require('../controlador/conexion.php');
           $query= "SELECT * FROM cuota,prestamos,clientes WHERE cuota.idPrestamo = prestamos.idPrestamos AND cuota.idCuota = $idCuota AND prestamos.idCliente = clientes.idCliente";
           $resultado= $mysqli ->query($query);
           return $resultado;
         }

         function cuotaPaga($idCuota){
           include('../controlador/conexion.php');
           $query="UPDATE cuota SET estadoCuota = 'pagado' WHERE idCuota=$idCuota";
           $resultado = mysqli_query($mysqli,$query);

           if($resultado){
             $resultado="ok";
           }else{
             $resultado="ko";
           }
           return $resultado;
         }


         function modificarEstado($idCuota){
           include('controlador/conexion.php');
           include('../controlador/conexion.php');
           $query="UPDATE cuota SET estadoCuota = 'vencido' WHERE idCuota=$idCuota";
           $resultado = mysqli_query($mysqli,$query);

           if($resultado){
             $resultado="ok";
           }else{
             $resultado="ko";
           }
           return $resultado;
         }
?>
