<?php

function _loginAction(){
  require 'vistas/login.php';
  //$accion="Ingreso al Sistema";session_start();$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];date_default_timezone_set('America/Argentina/Mendoza');$tiempo=date('j F Y h:i:s A');$seguimiento=agregarSeguimiento($tiempo,$usuario,$accion);


}

// ///////////////////////////mostrar vista usuarios//////////////////////////////{
  function _listarUsuariosAction(){
    session_start();include('modelo/usuarios.php');$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];$permiso=permisos($usuario);foreach($permiso as $key => $ver){$limite=$ver['usuariosV'];}
    $usuarios=listarUsuarios();
    require 'vistas/usuarios.php';
  }
///////////////////////////////mostrar vista nuevo usuarios//////////////////////{
  function _nuevoUsuarioAction(){
    require 'modelo/perfiles.php';
    $perfiles=listarPermisos();
    require 'vistas/nuevoUsuario.php';
  }
/////////////////////////////NUEVO////////////////////////////////{
  function _agregarUsuariosAction(){

  include ('modelo/usuarios.php');
  include ('modelo/seguimiento.php');
  if(isset($_POST['nuevoUsuario'])){

    $usuarioNuevo= $_POST["usuarioNuevo"];
    $contraseñaNuevo = $_POST["contraseñaNuevo"];
    $permisosNuevo = $_POST["permisosNuevo"];

    $usuarioNuevo= agregarUsuario($usuarioNuevo,$contraseñaNuevo,$permisosNuevo);
   if($usuarioNuevo){
      $resultado='ok';
      echo ("<div><script> alert('Usuario Agregado');</script></div>");
      header('Location:http://localhost/afamp/prestamos/index.php?controlador=usuarios&accion=listarUsuarios');
    }else{
      $resultado='no';
      header('Location:http://localhost/afamp/prestamos/index.php?controlador=usuarios&accion=listarUsuarios');
    }
    mysqli_close($mysqli);
  }
  $accion="Nuevo Usuario";session_start();$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];date_default_timezone_set('America/Argentina/Mendoza');$tiempo=date('j F Y h:i:s A');$seguimiento=agregarSeguimiento($tiempo,$usuario,$accion);

  }
// //////////////////////////////////////////////////////////////////}

// /////////////////////////carga vista modificar usuario///////////////////////////////{
  function _modificarUsuarioAction(){
    require 'modelo/perfiles.php';
    $perfiles=listarPermisos();
    require('modelo/usuarios.php');
    $idUsuarios=$_GET['idUsuario'];
    $usuarios=listarUsuariosId($idUsuarios);
    require 'vistas/modificarUsuario.php';
  }
///////////////////////////////////MODIFICAR////////////////////////////////////////////////
 function _guardarCambiosAction(){
  include 'modelo/usuarios.php';
  include 'modelo/seguimiento.php';
  if(isset($_POST['modificarUsuario'])) {

 $idusuarioModificado=$_POST["idUsuarioModificar"];
 $usuarioModificado= $_POST["usuarioModificar"];
 $contraseñaModificado = $_POST["contraseñaModificar"];
 $permisosModificado = $_POST["permisosModificar"];
//
 $usuarioModificado= modificarUsuario($idusuarioModificado,$usuarioModificado,$contraseñaModificado,$permisosModificado);
//
 if($usuarioModificado){
  $resultado='ok';
//  echo ("<div><script> alert('Usuario Agregado');</script></div>");
  header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=usuarios&accion=listarUsuarios');
 }else{
  $resultado='no';
  header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=usuarios&accion=listarUsuarios');
 }
    mysqli_close($mysqli);
    $accion="Usuario Modificado";session_start();$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];date_default_timezone_set('America/Argentina/Mendoza');$tiempo=date('j F Y h:i:s A');$seguimiento=agregarSeguimiento($tiempo,$usuario,$accion);

 }
}
// //////////////////////////////////////////////////////////////////}

 ///////////////////////////ELIMINAR///////////////////////////////{
 if(isset($_POST['usuarioEliminar'])) {
   include('../modelo/usuarios.php');
   include('../modelo/seguimiento.php');
   $idEliminar =$_POST['usuarioEliminar'];
   $accion="Usuario Eliminado";session_start();$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];date_default_timezone_set('America/Argentina/Mendoza');$tiempo=date('j F Y h:i:s A');$seguimiento=agregarSeguimiento($tiempo,$usuario,$accion);
   $usuarioEliminar= eliminarUsuario($idEliminar);
   if ($usuarioEliminar) {
     $usuarioEliminar="ok";
   } else {
     $usuarioEliminar='kdo';

   }

 $rta = json_encode($usuarioEliminar);
 print $rta;
 exit;

}
?>
