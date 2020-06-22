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
    <title>Usuarios</title>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"></head>
  <link rel="stylesheet" type="text/css" href="/afamp/prestamos/css/nuevoClientes.css" media="all">
  <body background="/afamp/prestamos/imagenes/fondo.jpg"></body>
  <script src="jquery/jquery.js"></script>
<br />
<body>
  <?php  foreach ($usuarios as $key => $ver) { ?>
<div class="inner contact">
                <!-- Form Area -->

                <div class="contact-form">
                    <!-- Form -->

                    <form  action="http://localhost:8080/afamp/prestamos/index.php?controlador=usuarios&accion=guardarCambios" method="post" >
                        <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">

                            <input type="hidden" name="idUsuarioModificar" id="idusUarioModificar" value="<?php echo($ver['idUsuario']); ?>" class="form" readonly="readonly"/>

                            <b><input type="text" name="usuarioModificar" id="usuarioModificar" value="<?php echo($ver['usuario']);?>" required="required" class="form" placeholder=" Usuario" /></b>

                            <b><input type="text" name="contraseñaModificar" id="contraseñaModificar" value=""required="required" class="form" placeholder="Contraseña" /></b>

                            <select  name="permisosModificar" id="permisosModificar" class="select"  style="height:40px" style="font-size:7px">
                            <option  >Permisos</option>
                            <?php
                             foreach ( $perfiles as $ver) { ?>
                            <option><?php echo($ver[1]);?></option>);
                          <?php }?>
                          </select>
                          <?php }?>
                        </div><!-- End Right Inputs -->
                        <!-- Bottom Submit -->
                        <div class="relative fullwidth col-xs-12">
                            <!-- Send Button -->
                            <button type="submit" name="modificarUsuario"  class="form-btn semibold">Guardar</button></br>
                            <a href="http://localhost:8080/afamp/prestamos/index.php?controlador=usuarios&accion=listarUsuarios"><button type="button" class="form-btn semibold">Atras</button></a>
                            <center><a href="mailto:nicolas_vialidad@hotmail.com"  target="blank">Necesita ayuda? </a> </center>
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
          </body>
    </html>
<?php } ?>
