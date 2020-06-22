<?php

function _validar(){
  include '../vistas/login.php';
}
function _cerrarSesionAction(){
  include 'modelo/seguimiento.php';
  //$accion="Salio del Sistema";session_start();$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];date_default_timezone_set('America/Argentina/Mendoza');$tiempo=date('j F Y h:i:s A');$seguimiento=agregarSeguimiento($tiempo,$usuario,$accion);
  //unset($_SESSION["sesion_id"]);
  //unset($_SESSION["usuario"]);
  session_destroy();
  require 'vistas/login.php';
}

 ?>
