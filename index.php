<?php
//Primero algunas variables de configuracion
//La carpeta donde buscaremos los controladores
$carpetaControladores = "controlador/";

//Si no se indica un controlador, este es el controlador que se usará
$controladorPredefinido = "usuarios";

//Si no se indica una accion, esta accion es la que se usará
$accionPredefinida = "_loginAction()";

if(! empty($_GET['controlador']))
      $controlador = $_GET['controlador'];
else
      $controlador = $controladorPredefinido;

if(! empty($_GET['accion']))
      $accion = $_GET['accion'] . 'Action';
else
      $accion = $accionPredefinida;


//un poco de limpieza
$controlador = preg_replace('/[^a-zA-Z0-9]/', '', $controlador);
$accion = '_' . preg_replace('/[^a-zA-Z0-9]/', '', $accion);

//Ya tenemos el controlador y la accion

//Formamos el nombre del fichero que contiene nuestro controlador
$controlador = $carpetaControladores . $controlador . '.php';


//Incluimos el controlador o detenemos todo si no existe
if(is_file($controlador))
      require_once $controlador;
else
      die($controlador.'El controlador no existe - 404 not found');

//Llamamos la accion o detenemos todo si no existe
if(is_callable($accion))
      $accion();
else
      die('La accion no existe - 404 not found');
?>
