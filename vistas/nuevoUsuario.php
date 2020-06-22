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
                    <form id="contact-us" action="http://localhost:8080/afamp/prestamos/index.php?controlador=usuarios&accion=agregarUsuarios" method="post" ><!-- envia a la carpeta ajax pero sin usar la app -->
                        <!-- Left Inputs -->
                        <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">

                            <b><input type="text" name="usuarioNuevo" id="usuarioNuevo" required="required" class="form" placeholder="Usuario"/></b>

                            <b><input type="text" name="contraseñaNuevo" id="contraseñaNuevo" required="required" class="form" placeholder="Contraseña" /></b>

                            <select  name="permisosNuevo" id="permisosNuevo" class="select"  style="height:40px" style="font-size:7px">
                            <option>Permisos</option>
                            <?php
                             foreach ( $perfiles as $ver) { ?>
                            <option><?php echo($ver[1]);?></option>);
                          <?php }?>
                          </select>
                          </b>
                        </div><!-- End Right Inputs -->
                        <!-- Bottom Submit -->
                        <div class="relative fullwidth col-xs-12">
                            <!-- Send Button -->
                            <button type="submit" name="nuevoUsuario" class="form-btn semibold">Agregar</button></br>
                            <a href="http://localhost:8080/afamp/prestamos/index.php?controlador=usuarios&accion=listarUsuarios"><button type="button" class="form-btn semibold">Atras</button></a>
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
