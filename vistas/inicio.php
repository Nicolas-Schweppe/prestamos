<?php
  session_start();
  if (!isset($_SESSION['sesion_id'])){
   header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=login&accion=cerrarSesion');

  }else{
    $_SESSION['sesion_id'];
    $usuario=$_SESSION['usuario'];
    include ('menu.php');
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"></head>
     <link rel="stylesheet" type="text/css" href="/afamp/prestamos/css/inicio.css" media="all">
     <body background= "/afamp/prestamos/imagenes/fondo.jpg">
    <link rel="stylesheet" href="/afamp/prestamos/bootstrapcdn/bootstrapcdn.css">
     <meta charset="utf-8">
     <title>Inicio</title>
   </head>
   <body>
  <div class="leyenda"></br></br>
    <h3>Prestamos TF® Trabajo Final (Tecnico superior en analisis y desarrollo de sistemas informaticos) </br>
    instituto patagonia</h3>
  </div>
    <div class="parrafoInicio">
      <h3>
        Es un sistema/aplicación web dirigida a prestamistas independientes </br>
        o sociedad que desee automatizar su negocio. Prestamos "TF" te permite</br>
        manejar tus clientes y préstamos, así como también pagos en sus diferentes</br>
        modalidades.</br>
      </h3>
    </div></br></br>
<?php }?>
  </body>
</html>
