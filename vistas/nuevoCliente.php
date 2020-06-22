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
    <meta charset="utf-8">
    <title>Clientes</title>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"></head>
  <link rel="stylesheet" type="text/css" href="/afamp/prestamos/css/nuevoClientes.css" media="all">
  <body background="/afamp/prestamos/imagenes/fondo.jpg"></body>
  <script src="../jquery/jquery.js"></script>
<br />
<body>


<div class="inner contact">
                <!-- Form Area -->
                <div class="contact-form">
                    <!-- Form -->
                    <form id="contact-us" action="http://localhost:8080/afamp/prestamos/index.php?controlador=clientes&accion=agregarCliente" method="post" ><!-- envia a la carpeta ajax pero sin usar la app -->
                        <!-- Left Inputs -->
                        <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
                            <!-- Name -->
                            <b><input type="text" name="nombreNuevo" id="nombreNuevo" required="required" class="form" placeholder="Nombre"/></b>
                            <!-- Email -->
                            <b><input type="text" name="apellidoNuevo" id="apellidoNuevo" required="required" class="form" placeholder="Apellido" /></b>
                            <!-- Subject -->
                            <b><input type="text" name="telefonoNuevo" id="telefonoNuevo" required="required" class="form" placeholder="Telefono" /></b>

                            <b><input type="text" name="dniNuevo" id="dniNuevo" required="required" class="form" placeholder="Dni" /></b>

                            <b><input type="text" name="domicilioNuevo" id="domicilioNuevo" required="required" class="form" placeholder="Domicilio" /></b>
                        </div><!-- End Left Inputs -->
                        <!-- Right Inputs -->
                        <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
                            <!-- Message -->
                            <b><input type="mail" name="correoNuevo" id="correoNuevo" required="required" class="form" placeholder="Correo Electronico" /></b>

                            <b><input type="text" name="trabajoNuevo" id="trabajoNuevo" required="required" class="form" placeholder="Trabajo" /></b>

                            <b><input type="text" name="garanteNuevo" id="garanteNuevo" required="required" class="form" placeholder="Garante" /></b>

                            <b><input type="text" name="telefonoGaranteNuevo" id="telefonoGaranteNuevo" required="required" class="form" placeholder="Telefono Garante" /></b>

                        </div><!-- End Right Inputs -->
                        <!-- Bottom Submit -->
                        <div class="relative fullwidth col-xs-12">
                            <!-- Send Button -->
                            <button type="submit" name="nuevoCliente" class="form-btn semibold">Agregar</button></br>
                            <a href="http://localhost:8080/afamp/prestamos/index.php?controlador=clientes&accion=listarClientes"><button type="button" class="form-btn semibold">Atras</button></a>
                        </div><!-- End Bottom Submit -->
                        <!-- Clear -->
                        <div class="clear"></div>
                    </form>

                    <!-- Your Mail Message -->
                    <div class="mail-message-area">
                        <!-- Message -->
                        <div class="alert gray-bg mail-message not-visible-message">

                        </div>
                    </div>

                </div><!-- End Contact Form Area -->
            </div><!-- End Inner -->


            <center><a href="mailto:nicolas_vialidad@hotmail.com"  target="blank">Necesita ayuda? </a> </center>
            </script>
          </body>
    </html>
<?php } ?>
