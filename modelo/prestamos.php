<?php

  function agregarPrestamos($idCliente,$monto,$total,$interes,$cuotas,$montoCuota,$pagado,$faltante,$fecha,$estadoPrestamo){
    require('controlador/conexion.php');
    $query="INSERT INTO prestamos (idCliente,monto,total,interes,cuotas,montoCuotas,pagado,faltante,fecha,estadoPrestamo)
    VALUES('$idCliente','$monto','$total','$interes','$cuotas','$montoCuota','$pagado','$faltante','$fecha','$estadoPrestamo')";
    $resultado = mysqli_query($mysqli,$query);

    if($resultado){
      $resultado=true;
    }else{
      $resultado=false;
    }
  return $resultado;
}
  function listarPrestamos(){
    include('controlador/conexion.php');
      $query= "SELECT * FROM prestamos";
      $resultado= $mysqli ->query($query);
      return $resultado;
    }



    function listarPrestamosCliente(){
        include('controlador/conexion.php');
        $query= "SELECT * FROM clientes,prestamos WHERE clientes.idCliente = prestamos.idCliente";
        $consulta = $db->prepare($query);
      	$consulta->execute();
      	return $consulta->fetchAll();
      }


    function eliminarPrestamos($prestamoE){
      include('../controlador/conexion.php');
      $query="DELETE  FROM prestamos WHERE idPrestamos=$prestamoE";
      $result = $mysqli->query($query);
        if($result){
          $resultado2='ok';
        }else{
          $resultado2 = 'no';
        }
            return $resultado2;

          //Se libera memoria
          $resultado->free();
          //Se cierra conexión con base de datos
          $mysqli->close();
    }

    function ultimoPrestamo(){
      include('controlador/conexion.php');
      $query= "SELECT * FROM prestamos";
      $resultado= $mysqli ->query($query);

     while($ver= mysqli_fetch_array($resultado)) {
        $idPrestamo=$ver['idPrestamos'];
     }
     return $idPrestamo;
   }

   function pagarPrestamos($idPrestamo,$prestamoPagado,$prestamoFaltante){
     include('controlador/conexion.php');
     include('../controlador/conexion.php');
     $query="UPDATE prestamos SET pagado = $prestamoPagado , faltante = $prestamoFaltante  WHERE idPrestamos = $idPrestamo";
     $resultado = mysqli_query($mysqli,$query);

     if($resultado){
       $resultado="se pago";
     }else{
       $resultado="no pago";
     }
   return $resultado;
}

    function estadoPrestamo($idPrestamo){
      include('controlador/conexion.php');
      include('../controlador/conexion.php');
      $query= "SELECT faltante FROM prestamos WHERE idPrestamos = $idPrestamo";
      $resultado= $mysqli ->query($query);
      while($ver= mysqli_fetch_array($resultado)) {
         $result=$ver['faltante'];
      }
      return $result;

    }

    function prestamoFinalizar($idPrestamo){
      include('controlador/conexion.php');
      include('../controlador/conexion.php');
      $query="UPDATE prestamos SET estadoPrestamo = 'Finalizado' WHERE idPrestamos = $idPrestamo";
      $resultado = mysqli_query($mysqli,$query);
      return $resultado;
  }

?>
