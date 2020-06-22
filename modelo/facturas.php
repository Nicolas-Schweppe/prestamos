<?php

function nuevaFactura($idCuota,$fechaPago){
  include('../controlador/conexion.php');
  $query="INSERT INTO facturas (idCuota,fechaPago)
  VALUES('$idCuota','$fechaPago')";
  $resultado = mysqli_query($mysqli,$query);

  if($resultado){
    $resultado=true;
  }else{
    $resultado=false;
  }
return $resultado;
}



  function listarFacturas($idFactura){
      require('controlador/conexion.php');
        $query= "SELECT * FROM cuota,prestamos,clientes,facturas WHERE cuota.idPrestamo = prestamos.idPrestamos AND cuota.idCuota = $idFactura AND prestamos.idCliente = clientes.idCliente AND facturas.idFactura = cuota.idCuota";
        $resultado= $mysqli ->query($query);
        return $resultado;
      }


  function listarFacturasAll(){
    require('controlador/conexion.php');
    $query= "SELECT * FROM clientes,facturas,prestamos,cuota WHERE facturas.idFactura = cuota.idCuota and cuota.idPrestamo = prestamos.idPrestamos AND clientes.idCliente = prestamos.idCliente";
    $consulta = $db->prepare($query);
    $consulta->execute();
    return $consulta->fetchAll();

      }

 ?>
