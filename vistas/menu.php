<?php


//  session_start();
  if (!isset($_SESSION['sesion_id'])){
      header('Location:http://localhost/afamp/prestamos/index.php?controlador=login&accion=cerrarSesion');

  }else{
    $_SESSION['sesion_id'];
    $usuario=$_SESSION['usuario'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>menu</title>
  <meta charset="utf-8">
  <meta name="viewpor" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrapcdn/boots.css">
  <script src="../jquery/jquery.js"></script>
  <script src="../bootstrapcdn/boots.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/afamp/prestamos/index.php?controlador=inicio&accion=pantallaInicial">Inicio</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="http://localhost/afamp/prestamos/index.php?controlador=prestamos&accion=generarPrestamos">Generar Prestamo</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="active"><a href="http://localhost/afamp/prestamos/index.php?controlador=prestamos&accion=listarPrestamos">Prestamos</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="active"><a href="http://localhost/afamp/prestamos/index.php?controlador=clientes&accion=listarClientes">Clientes</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="active"><a href="http://localhost/afamp/prestamos/index.php?controlador=facturas&accion=listarFacturas">Ver Facturas</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="active"><a href="http://localhost/afamp/prestamos/index.php?controlador=usuarios&accion=listarUsuarios">Usuarios</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="active"><a href="http://localhost/afamp/prestamos/index.php?controlador=inicio&accion=pantallaAyuda">Ayuda</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span id="usuario" class="glyphicon glyphicon-user"><?php echo($usuario);?></span></a></li>
      <li><a href="http://localhost/afamp/prestamos/index.php?controlador=login&accion=cerrarSesion"><span class="glyphicon glyphicon-user"></span> Salir</a></li>
    </ul>
  </div>
</nav>

</body>
</html>
<?php }?>
