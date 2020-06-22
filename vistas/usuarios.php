<?php
      session_start();

if (!isset($_SESSION['sesion_id'])){
    header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=login&accion=cerrarSesion');

}else{
  $_SESSION['sesion_id'];
  $usuario=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8"/>
    <title> Usuarios  </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"></head>
  </head>
  <?php include ('menu.php'); ?>
  <link rel="stylesheet" type="text/css" href="/afamp/prestamos/css/clientes.css" media="all">
  <link rel="stylesheet" href="/afamp/prestamos/bootstrapcdn/bootstrapcdn.css">
  <script src="jquery/jquery.js"></script>
  <body background= "/afamp/prestamos/imagenes/fondo.jpg"></body>
  <?php if($limite == 1){?>
  <body><h2 style="text-align:center">Usuarios</h2>
      <a href="http://localhost:8080/afamp/prestamos/index.php?controlador=usuarios&accion=nuevoUsuario"><button class="form-btn semibold">Agregar Usuarios<img alt="" src="imagenes/btn.ico" width="30" height="30"></button></a>
      <button class="form-btn semibold">Exportar Usuarios<img alt="" src="imagenes/guardar.ico" width="25" height="30"></button>
      <div class="container">
      <table id="example" class="display" style="width:100%" style="text-align:center">
        <thead>
    			<tr>
         			<th>Id</th><th>Usuario</th><th>Contraseña</th><th>Permisos</th><th>Editar</th><th>Borrar</th>
    		</thead>
      </br>
        <?php
              foreach ($usuarios as $key => $ver) {?>
     		     <tr>
    			     <td style="text-align:center"><?php echo $ver ['idUsuario']; ?></td>
    			     <td style="text-align:center"><?php echo $ver ['usuario']; ?></td>
    			     <td style="text-align:center"><?php echo ("xxxxxxx"); ?></td>
    			     <td style="text-align:center"><?php echo $ver ['permisos']; ?></td>
               <td><button type ="submit" name ="editar"  onclick="location='http://localhost:8080/afamp/prestamos/index.php?controlador=usuarios&accion=modificarUsuario&idUsuario=<?php echo $ver['idUsuario'];?>'"><img alt="" src="imagenes/editar.png" width="30" height="20"></button></td>
               <td><button  type ="button" id ="borrar"  onclick="eliminarUsuario('<?php echo $ver['idUsuario'];?>')"><img alt="" src="imagenes/borrar.png" width="30" height="20"></button></td>
             </tr>
          <?php } ?>
    </table>
    <body>
    <script>
        function eliminarUsuario(idBorrar){

          var datos ={
             'usuarioEliminar' : idBorrar
           };
           var con;
          console.log(datos);
            if (!confirm("Desea eliminar el usuario")) {
              con=false;
            }
            else {
               con =true;
              $.ajax ({

              data:  datos,//datos que se envian a traves de ajax
              url:   'controlador/usuarios.php', //archivo que recibe la peticion
              type:  'post', //método de envio
              dataType: 'json',

              beforeSend: function () {
                console.log("intentando eliminar");
              },
              success:  function (resultado) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $().html(resultado);

                  if(resultado=="ok"){
                    window.location.href="http://localhost:8080/afamp/prestamos/index.php?controlador=usuarios&accion=listarUsuarios";
                  }else{
                  //Escribo un cartel para que ingrese la contraseña correctamente
                    alert("no se pudo eliminar");
                    window.location.href="http://localhost:8080/afamp/prestamos/index.php?controlador=usuarios&accion=listarUsuarios";
                  }
              }
            })
            }
        console.log(con);
        };
      </script>
      <?php //}?>
    </body>
      </div>
      <body>
        <link rel="stylesheet" href="datatables2/datatables/jquery.dataTables.min.css"/>
        <link rel="stylesheet" href="datatables2/datatables/dataTables.min.css"/>
        <script src="datatables2/datatables/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="datatables2/datatables/jquery-ui-11.10.1.custom.min.js" type="text/javascript"></script>
        <script src="datatables2/datatables/jquery.dataTables.min.js"></script>
        <script src="datatables2/datatables/dataTables.min.js"></script>
        <script>
        $(document).ready(function() {
        $('#example').DataTable();
        } );
        </script>
  </body>

</html>
<?php  }else{echo("<div><h2>Pantalla Disponibles solo para Administrador.</h2></div>");}
} ?>
