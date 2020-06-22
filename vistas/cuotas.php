<?php
      session_start();

if (!isset($_SESSION['sesion_id'])){
   header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=login&accion=cerrarSesion');

}else{
  $_SESSION['sesion_id'];
  $usuario=$_SESSION['usuario'];

?>
<?php include ('menu.php');?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8"/>
    <title> Cuotas </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/afamp/prestamos/css/clientes.css" media="all">
    <link rel="stylesheet" type="text/css" href="/afamp/prestamos/bootstrapcdn/bootstrapcdn.css">
  <script src="jquery/jquery.js"></script>
  </head>
  <body background= "/afamp/prestamos/imagenes/fondo.jpg"></body>
  <?php if($limite == 1){?>
  <body><?php foreach($cuotas as $key => $ver){}?>
      <div class="container">
      <h2 style="text-align:center">Cuotas Sr.<?php echo " ".$ver['nombre']." ".$ver['apellido']; ?></h2>
      <h3 style="text-align:center">Monto de prestamo<?php echo (" $ ".$ver ['total']);?></h3>
      <table id="example" class="display" style="width:100%" style="text-align:center">
        <thead>
    			<tr style="text-align:center">
         			<th>Nº Cuotas</th><th>Monto Cuota</th><th>estado</th><th>Anterior Vencimiento</th><th>Proximo Vencimineto</th><th>PAGAR</th><th>Imprimir</th>
    		</thead>
      </br>
        <?php


                  foreach ($cuotas as $key => $ver) {
                  $fecha_actual =date("Y-m-d");

                  if($ver['estadoCuota'] == 'pagado' || $ver['estadoCuota'] == 'vencido'){
                    $estado=$ver['estadoCuota'];
                  }else{
                    if($fecha_actual > $ver['fechaProxima']){
                      include 'modelo/cuotas.php';
                      $estado="vencido";
                      $i=$ver['idCuota'];
                      $mod=modificarEstado($i);
                    }else{
                      $estado="activo";
                    }}
                   ?>
          <tr>
               <td style="text-align:center"><?php echo $ver ['numeroCuotas']; ?></td>
               <td style="text-align:center"><?php echo ("$ ".$ver ['montoCuotas']); ?></td>
               <td style="text-align:center"><?php echo $estado;?></td>
               <td style="text-align:center"><?php echo $ver['fechaUltima']; ?></td>
               <td style="text-align:center"><?php echo $ver['fechaProxima'] ; ?></td>
               <td><button  type ="button" id ="agergarPago"  onclick="agregarPago('<?php echo $ver['idCuota'];?>')"><img alt="" src="imagenes/moneda.png" width="45" height="35"></button></td>
               <td><button  type ="button" id ="imprimir"  onclick="imprimirFactura('<?php echo $ver['idCuota']; ?>')"><img alt="" src="imagenes/impresora.jpeg" width="45" height="35"></button></td>
             </tr>
           <?php }    ?>
    </table>
    <body>
    <script>
        function agregarPago(idCuota){

          var datos ={
             'agregarPago' : idCuota
           };
           var con;
          console.log(datos);
            if (!confirm("¿Desea pagar esta Cuota?")) {
              con=false;
            }
            else {
               con =true;
              $.ajax ({

              data:  datos,//datos que se envian a traves de ajax
              url:   'controlador/cuotas.php', //archivo que recibe la peticion
              type:  'post', //método de envio
              dataType: 'json',

              beforeSend: function (result) {

              },
              success:  function (result) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                if(result==0){
                  alert("La cuota ya se encuentra paga");
                  location.reload(true);
                }else{
                  alert("Pago realizado con exito");
                  location.reload(true);
                }
              }
            })
            }
        };

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
      <?php  }else{echo("<div><h2>Pantalla No Disponibles consultar Administrador.</h2></div>");} ?>
  </body>
</html>
<?php } ?>
