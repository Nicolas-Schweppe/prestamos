<?php
function listarPermisos(){
    include('controlador/conexion.php');
    $query= "SELECT * FROM perfiles";
    $resultado = $db->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll();
  }





 ?>
