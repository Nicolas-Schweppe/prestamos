<?php //MODELO

  function agregarCliente($nombre,$apellido,$telefono,$dni,$domicilio,$correo,$trabajo,$garante,$telefonoGarante){
    include('controlador/conexion.php');
    $query="INSERT INTO clientes (nombre,apellido,telefono,dni,domicilio,email,trabajo,garante,telefonoGarante)
    VALUES ('$nombre','$apellido','$telefono','$dni','$domicilio','$correo','$trabajo','$garante','$telefonoGarante')";

    $resultado = mysqli_query($mysqli,$query);

    if($resultado){
      $resultado=true;
    }else{
      $resultado=false;
    }

    return $resultado;
  }
//////////////////////////////////////////////////////
    function modificarCliente($idCliente,$nombre,$apellido,$telefono,$dni,$domicilio,$correo,$trabajo,$garante,$telefonoGarante){
      include('controlador/conexion.php');
      $consultaClientes="UPDATE clientes SET nombre='$nombre', apellido='$apellido', telefono='$telefono', dni='$dni',domicilio='$domicilio',email='$correo',trabajo='$trabajo',garante='$garante',telefonoGarante='$telefonoGarante' WHERE idCliente=$idCliente";
      $resultado = mysqli_query($mysqli,$consultaClientes);

      if($resultado){
        $resultado="ok";
      }else{
        $resultado="ko";
      }
      return $resultado;
}
//////////////////////////////////////////////////////
    function buscarCliente($id){
      include('../controlador/conexion.php');
      $query="SELECT * FROM clientes WHERE idCliente=$id;";
      $resultado = mysqli_query($mysqli,$query);
      return $resultado;

    }
//////////////////////////////////////////////////////
  function listarClienteId($idCliente){       //trae solo 1 cliente
    include('controlador/conexion.php');
    $query="SELECT * FROM clientes WHERE idCliente=$idCliente;";
    $resultado = $db->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll();
  }
//////////////////////////////////////////////////////
  function listarClientes(){       //trae todos los clientes
      include('controlador/conexion.php');
      $query= "SELECT * FROM clientes";
      $resultado = $db->prepare($query);
      $resultado->execute();
      return $resultado->fetchAll();
    }
///////////////////////////////////////////////////////
  function eliminarClientes($ClientesEliminar){
    include('../controlador/conexion.php');
    $query="DELETE FROM clientes WHERE idCliente=$ClientesEliminar";
    $result = $mysqli->query($query);
    if($result){
      $resultado = true;
    }else{
      $resultado = false;
    }
      return $resultado;

        //Se libera memoria
        $resultado->free();
        //Se cierra conexión con base de datos
        $mysqli->close();

    }

  function opciones(){
    include('controlador/conexion.php');
    $texto="";
    $query= "SELECT * FROM clientes";
    //$resultado = mysqli_query($mysqli,$query);
    $resultado= $mysqli ->query($query);

    return $resultado;
  }

  function listarNombres(){
    include('controlador/conexion.php');
      $query= "SELECT * FROM clientes ORDER BY nombre,apellido";
      $resultado= $mysqli ->query($query);
    return $resultado;
  }

?>
