<?php
////////////////Conexion////////////////
$servidor='localhost';
$bd='trabajo_final';
$usuarioBD='root';
$contraseñaBD='Patagonia';

$mysqli=new mysqli('localhost', $usuarioBD , $contraseñaBD, 'trabajo_final');//conexion

$db = new PDO('mysql:host=' . $servidor . ';dbname=' . $bd, $usuarioBD, $contraseñaBD);

?>
