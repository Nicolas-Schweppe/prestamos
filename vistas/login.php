<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="/afamp/prestamos/css/login.css" rel="stylesheet" id="bootstrap-css">
    <script src="/afamp/prestamos/jquery/jquery.js"></script>
    <body background= "/afamp/prestamos/imagenes/fondo.jpg">
    </head>

    <title>Prestamos</title>
      <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="imagenes/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">

                <input type="text" id="usuario" class="form-control" placeholder="Usuario" required autofocus>
                <input type="password" id="password" class="form-control" placeholder="Contraseña" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="Ingresar"> Recordarme
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" onclick="validarUsuario(event);" type="submit">Ingresar</button>
                <span id="resultado"></span>
            </form><!-- /form -->
            <a href="mailto:nicolas_vialidad@hotmail.com" class="forgot-password">
                ¿Necesita ayuda?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
  </body>
  <body>
  <script type="text/javascript">

  function validarUsuario(event){
    event.preventDefault();

      var datos={
            'usuario' : document.getElementById("usuario").value,
            'password' : document.getElementById("password").value
          };


          $.ajax({

            data:  datos,//datos que se envian a traves de ajax
            url:   'ajax/usuario.php', //archivo que recibe la peticion
            type:  'post', //método de envio
            dataType: 'json',

            beforeSend: function () {
              $("#resultado").html("Ingresando.... ");
            },
            success:  function (result) { //una vez que el archivo recibe el request lo procesa y lo devuelve
              setTimeout(function() {
                $("#resultado").html(result);
                if(result == 'OK') {
                  //Cargo la pagina clientes
                  location.href='http://localhost/afamp/prestamos/index.php?controlador=inicio&accion=pantallaInicial';

                } else {
                  //Escribo un cartel para que ingrese la contraseña correctamente
                  $("#resultado").html("Usuario / Contraseña Incorrecta");
                  //$("#resultado").html(result); //probando q recibo de la funcion
                }
              }, 500);
            }
          })
        };
    </script>
  </body>
</html>
