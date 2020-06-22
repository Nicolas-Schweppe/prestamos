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
    <title> Clientes  </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"></head>
  </head>
  <?php include ('menu.php'); ?>
  <link rel="stylesheet" type="text/css" href="/afamp/prestamos/css/clientes.css" media="all">
  <link rel="stylesheet" href="/afamp/prestamos/bootstrapcdn/bootstrapcdn.css">
  <script src="jquery/jquery.js"></script>
  <body background= "/afamp/prestamos/imagenes/fondo.jpg"></body>
  <body>
      <a href="http://localhost:8080/afamp/prestamos/index.php?controlador=clientes&accion=nuevoCliente"><button class="form-btn semibold">Agregar Cliente<img alt="" src="imagenes/btn.ico" width="30" height="30"></button></a>
      <button class="form-btn semibold">Exportar Clientes<img alt="" src="imagenes/guardar.ico" width="25" height="30"></button>
      <div class="container">
      <table id="example" class="display" style="width:100%" style="text-align:center">
        <thead>
    			<tr><?php if($limite == 1){?>
         			<th>Id</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dni</th><th>Domicilio</th><th>Correo</th><th>Trabajo</th><th>Garante</th><th>Telefono de Garante</th><th>Editar</th><th>Borrar</th>
            <?php }else{?>
              <th>Id</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dni</th><th>Domicilio</th><th>Correo</th><th>Trabajo</th><th>Garante</th><th>Telefono de Garante</th>
            <?php }?>
      	</thead>
      </br>
        <?php foreach ($listaClientes as $ver){ ?>
     		  <tr>
    			     <td><?php echo $ver ['idCliente']; ?></td>
    			     <td><?php echo $ver ['nombre']; ?></td>
    			     <td><?php echo $ver ['apellido']; ?></td>
    			     <td><?php echo $ver ['telefono']; ?></td>
    			     <td><?php echo $ver ['dni']; ?></td>
               <td><?php echo $ver ['domicilio']; ?></td>
               <td><?php echo $ver ['email']; ?></td>
               <td><?php echo $ver ['trabajo']; ?></td>
               <td><?php echo $ver ['garante']; ?></td>
               <td><?php echo $ver ['telefonoGarante']; ?></td>
               <?php if($limite == 1){?>
               <td><button type ="submit" name ="editar"  onclick="location='http://localhost:8080/afamp/prestamos/index.php?controlador=clientes&accion=modificarCliente&idCliente=<?php echo $ver['idCliente'];?>'"><img alt="" src="imagenes/editar.png" width="30" height="20"></button></td>
               <td><button  type ="button" id ="borrar"  onclick="eliminarClientes('<?php echo $ver['idCliente'];?>')"><img alt="" src="imagenes/borrar.png" width="30" height="20"></button></td>
               <?php }?>
             </tr>
          <?php } ?>
    </table>
    <body>
    <script>
        function eliminarClientes(idBorrar){

          var datos ={
             'clientesEliminar' : idBorrar
           };
           var con;
          console.log(datos);
            if (!confirm("Desea eliminar el Cliente")) {
              con=false;
            }
            else {
               con =true;
              $.ajax ({

              data:  datos,//datos que se envian a traves de ajax
              url:   'controlador/clientes.php', //archivo que recibe la peticion
              type:  'post', //método de envio
              dataType: 'json',

              beforeSend: function () {
                //$("#resultado").html("Ingresando.... ");
                console.log("intentando eliminar");
              },
              success:  function (resultado) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $().html(resultado);

                  if(resultado=="ok"){
                    window.location.href="http://localhost:8080/afamp/prestamos/index.php?controlador=clientes&accion=listarClientes";
                  }else{
                    alert("no se pudo eliminar");
                    window.location.href="http://localhost:8080/afamp/prestamos/index.php?controlador=clientes&accion=listarClientes";
                  }
              }
            })
            }
        console.log(con);
        };
      </script>
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
<?php } ?>
