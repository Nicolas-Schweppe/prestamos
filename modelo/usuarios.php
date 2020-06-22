<?php

/////////////////////////USUARIOS//////////////////////////

function listarUsuarios(){
  require('controlador/conexion.php');
    $query= "SELECT * FROM usuarios";
    $resultado= $mysqli->query($query);
  return $resultado;
}

///////////////////////////////////////////////////////////

function agregarUsuario($usuarioNuevo,$contraseñaNuevo,$permisosNuevo){
  include('controlador/conexion.php');
  $contraseña=MD5($contraseñaNuevo);
  $query="INSERT INTO usuarios (usuario,contraseña,permisos)
  VALUES ('$usuarioNuevo','$contraseña','$permisosNuevo')";
  $resultado = mysqli_query($mysqli,$query);

  if($resultado){
    $resultado=true;
  }else{
    $resultado=false;
  }
  return $resultado;
}
///////////////////////////////////////////////////////////////

function listarUsuariosId($idUsuaio){
  include('controlador/conexion.php');
    $query= "SELECT * FROM usuarios WHERE idUsuario=$idUsuaio";
    $resultado = $db->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll();
}

////////////////////////////////////////////////////////////

function modificarUsuario($idUsuarioModificado,$usuarioModificado,$contraseñaModificado,$permisosModificado){
  include('controlador/conexion.php');
  $contraseña=MD5($contraseñaModificado);
  $query="UPDATE usuarios SET usuario='$usuarioModificado', contraseña='$contraseña', permisos='$permisosModificado' WHERE idUsuario=$idUsuarioModificado";
  $resultado = mysqli_query($mysqli,$query);

  if($resultado){
    $resultado="ok";
  }else{
    $resultado="ko";
  }
  return $resultado;
}
////////////////////////////////////////////////////////////////

  function validarUsuario($usuario, $password) {
    require '../controlador/conexion.php';
    $contraseña=MD5($password);
    $sql="SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
    //$sql="SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado = $mysqli->query($sql);
    $row_cnt = $resultado->num_rows;
      if($row_cnt > 0) {
        $existe = true;
      } else {
        $existe = false;
      }
      return $existe;
    }
//////////////////////////////////////////////////////////////////

  function eliminarUsuario($idEliminar){
    include '../controlador/conexion.php';
    $query="DELETE FROM usuarios WHERE idUsuario = $idEliminar;";
    $resultado= $mysqli->query($query);
    if($resultado){
      $resultado = true;
    }else{
      $resultado = false;
    }
      return $resultado;

        $resultado->free();

        $mysqli->close();
  }

  function permisos($usuario){
    include ('controlador/conexion.php');
    $query="SELECT * FROM usuarios , perfiles WHERE usuarios.usuario='$usuario' AND perfiles.persmisos = usuarios.permisos";
    $resultado = $db->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll();
  }
?>
