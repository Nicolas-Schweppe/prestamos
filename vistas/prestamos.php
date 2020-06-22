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
    <title> Prestamos </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"></head>
  </head>
  <?php include ('menu.php'); ?>
  <link rel="stylesheet" type="text/css" href="/afamp/prestamos/css/clientes.css" media="all">
  <link rel="stylesheet" href="/afamp/prestamos/bootstrapcdn/bootstrapcdn.css">
  <script src="/afamp/prestamos/jquery/jquery.js"></script>
  <body background= "/afamp/prestamos/imagenes/fondo.jpg"></body>
  <body>
      <div class="container">
      <h2 style="text-align:center">Prestamos</h2>
      <table id="example" class="display" style="width:100%" style="text-align:center">
        <thead>
    			<tr>
            <?php if($limite == 1){?>
         			<th>Id</th><th>Cliente</th><th>Monto Solicitado</th><th>Total a Pagar</th><th>Interes</th><th>Cuotas</th><th>Monto de Cuotas</th><th>Pagado</th><th>Faltante</th><th>  Fecha Inicio  </th><th>Estado</th><th>Borrar</th><th>Agregar Pagos</th>
          <?php }else{?>
            <th>Id</th><th>Cliente</th><th>Monto Solicitado</th><th>Total a Pagar</th><th>Interes</th><th>Cuotas</th><th>Monto de Cuotas</th><th>Pagado</th><th>Faltante</th><th>  Fecha Inicio  </th><th>Estado</th>
          <?php }?>  
        </thead>
      </br>
        <?php

              foreach ($listadoPrestamos as $ver){
              ?>
     		  <tr>
    			     <td><?php echo $ver ['idPrestamos']; ?></td>
    			     <td><?php echo ($ver['nombre']." ".$ver['apellido']); ?></td>
    			     <td><?php echo ("$ ".$ver ['monto']); ?></td>
               <td><?php echo ("$ ".$ver ['total']); ?></td>
    			     <td><?php echo $ver ['interes']."%"; ?></td>
               <td><?php echo $ver ['cuotas']; ?></td>
               <td><?php echo ("$ ".$ver ['montoCuotas']); ?></td>
               <td><?php echo ("$ ".$ver ['pagado']); ?></td>
               <td><?php echo ("$ ".$ver ['faltante']); ?></td>
               <td><?php echo $ver ['fecha']; ?></td>
               <td><?php echo $ver ['estadoPrestamo']; ?></td>
               <?php if($limite==1){?>
               <td><button  type ="button" id ="borrar"  onclick="eliminarPrestamos('<?php echo $ver['idPrestamos'];?>')"><img alt="" src="imagenes/borrar.png" width="30" height="20"></button></td>
               <td><button type ="submit" id ="agregarPagos"  onclick="location='http://localhost:8080/afamp/prestamos/index.php?controlador=cuotas&accion=listarCuotas&idPrestamos=<?php echo $ver['idPrestamos'];?>'"><img alt="" src="imagenes/agregar.png" width="30" height="20"></button></td>
             <?php }?>
             </tr>
          <?php }    ?>
    </table>
    <body>
    <script>
        function eliminarPrestamos(idBorrar){

          var datos ={
             'prestamosEliminar' : idBorrar
           };
           var con;
          console.log(datos);
            if (!confirm("Desea eliminar el prestamo")) {
              con=false;
            }
            else {
               con =true;
              $.ajax ({

              data:  datos,//datos que se envian a traves de ajax
              url:   'controlador/prestamos.php', //archivo que recibe la peticion
              type:  'post', //método de envio
              dataType: 'json',

              beforeSend: function () {
                //$("#resultado").html("Ingresando.... ");
                console.log("intentando eliminar");
              },
              success:  function (resultado) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $().html(resultado);
                console.log(resultado);
                  if(resultado=="ok"){
                    window.location.href="http://localhost:8080/afamp/prestamos/index.php?controlador=prestamos&accion=listarPrestamos";
                  }else{
                    alert("no se pudo eliminar");
                    window.location.href="http://localhost:8080/afamp/prestamos/index.php?controlador=prestamos&accion=listarPrestamos";
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
