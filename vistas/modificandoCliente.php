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
  <script src="jquery/jquery.js"></script>
<br />
<body>
  <?php
          foreach ($resultado as $key => $ver) {
    ?>
<div class="inner contact">
                <div class="contact-form">

                    <form  action="http://localhost:8080/afamp/prestamos/index.php?controlador=clientes&accion=guardarCambios" method="post" >

                        <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">

                            <input type="hidden" name="idClienteModificar" id="idClienteModificar" value="<?php echo($ver[0]); ?>" class="form" readonly="readonly"/>

                            <b><input type="text" name="nombreModificar" id="nombreModificar" value="<?php echo($ver[1]);?>" required="required" class="form" placeholder="Nombre" /></b>

                            <b><input type="text" name="apellidoModificar" id="apellidoModificar" value="<?php echo($ver[2]);?>"required="required" class="form" placeholder="Apellido" /></b>

                            <b><input type="text" name="telefonoModificar" id="telefonoModificar" value="<?php echo($ver[3]);?>"required="required" class="form" placeholder="Telefono" /></b>

                            <b><input type="text" name="dniModificar" id="dniModificar" value="<?php echo($ver[4]);?>"required="required" class="form" placeholder="Dni" /></b>

                            <b><input type="text" name="domicilioModificar" id="domicilioModificar" value="<?php echo($ver[5]);?>"  required="required" class="form" placeholder="Domicilio" /></b>
                        </div>

                        <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">

                            <b><input type="mail" name="correoModificar" id="correoModificar" value="<?php echo($ver[6]);?>" required="required" class="form" placeholder="Correo Electronico" /></b>

                            <b><input type="text" name="trabajoModificar" id="trabajoModificar" value="<?php echo($ver[7]);?>" required="required" class="form" placeholder="Trabajo" /></b>

                            <b><input type="text" name="garanteModificar" id="garanteModificar" value="<?php echo($ver[8]);?>" required="required" class="form" placeholder="Garante" /></b>

                            <b><input type="text" name="telefonoGaranteModificar" id="telefonoGaranteModificar" value="<?php echo($ver[9]);?>" required="required" class="form" placeholder="Telefono Garante" /></b>
                          <?php }?>

                        </div>

                        <div class="relative fullwidth col-xs-12">

                            <button type="submit" name="modificarCliente"  class="form-btn semibold">Guardar</button></br>
                            <a href="http://localhost:8080/afamp/prestamos/index.php?controlador=clientes&accion=listarClientes"><button type="button" class="form-btn semibold">Atras</button></a>
                        </div>

                        <div class="clear"></div>
                    </form>
                    <div class="mail-message-area">

                        <div class="alert gray-bg mail-message not-visible-message">

                        </div>
                    </div>

                </div>
            </div>
            <center><a href="mailto:nicolas_vialidad@hotmail.com"  target="blank">Necesita ayuda? </a> </center>
          </body>
    </html>
<?php } ?>
