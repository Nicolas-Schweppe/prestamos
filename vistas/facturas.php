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
    <title> Facturas </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"></head>
  </head>
  <?php include ('menu.php'); ?>
  <link rel="stylesheet" type="text/css" href="/afamp/prestamos/css/clientes.css" media="all">
  <link rel="stylesheet" href="/afamp/prestamos/bootstrapcdn/bootstrapcdn.css">
  <script src="jquery/jquery.js"></script>
  <body background= "/afamp/prestamos/imagenes/fondo.jpg"></body>
  <body>
      <div class="container">
      <h2 style="text-align:center">Facturas</h2>
      <table id="example" class="display" style="width:100%" style="text-align:center">
        <thead>
    			<tr>
         			<th>Cliente</th><th>Id Prestamo</th><th>id Factura</th><th>Numero Cuotas</th><th>Fecha de pago</th><th>Imprimir</th>
    		</thead>
      </br>
        <?php

             foreach ($facturas as $ver){
              ?>
     		  <tr>
               <td ><?php echo ($ver['nombre']." ".$ver['apellido']); ?></td>
               <td style="text-align:center"><?php echo $ver ['idPrestamo']; ?></td>
    			     <td style="text-align:center"><?php echo $ver ['idFactura']; ?></td>
    			     <td style="text-align:center"><?php echo ($ver ['numeroCuotas']); ?></td>
               <td ><?php echo ($ver ['fechaPago']); ?></td>
               <td style="text-align:center"><button  type ="button" id ="imprimirFacturas"  onclick="imprimirFactura('<?php echo $ver['idCuota']; ?>')"><img alt="" src="imagenes/impresora.jpeg" width="45" height="35"></button></td>
             </tr>
          <?php } ?>
    </table>
    <body>
      <script>
      function imprimirFactura(idCuota){

        var datos ={
           'imprimirFactura' : idCuota
         };
         console.log(datos);
            $.ajax ({

            data:  datos,//datos que se envian a traves de ajax
            url:   'controlador/cuotas.php', //archivo que recibe la peticion
            type:  'post', //método de envio
            dataType: 'json',

            beforeSend: function (text) {
            console.log(text);},
            success:  function (text) { //una vez que el archivo recibe el request lo procesa y lo devuelve
              if(text=="si"){
                alert("La cuota NO se encuentra paga");
              }else{
                window.location.href="http://localhost:8080/afamp/prestamos/index.php?controlador=facturas&accion=imprimirFactura&idFactura="+idCuota;
              }
              console.log(text);

            }
          })

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
