<?php
    session_start();

if (!isset($_SESSION['sesion_id'])){
   header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=login&accion=cerrarSesion');

}else{
  $_SESSION['sesion_id'];
  $usuario=$_SESSION['usuario'];

  include ('menu.php');
  ini_set('data.timezone','America/Argentina/Salta');
  $time2= date('Y-m-d',time());
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Generar Prestamos</title>
    <link rel="stylesheet" href="../bootstrapcdn/bootstrapcdn.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"></head>
    <link rel=»stylesheet» href=»//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css»>
    <link rel="stylesheet" type="text/css" href="css/select.css" />
    <link rel="stylesheet" type="text/css" href="css/generarPrestamos.css" media="all"/>

<script src=»https://code.jquery.com/jquery-1.12.4.js»></script>
<script src=»https://code.jquery.com/ui/1.12.0/jquery-ui.js»></script>
</head>
    <script src="jquery/jquery.js"></script>
  </head>
  <body background= "/afamp/prestamos/imagenes/fondo.jpg"></body>
  <body>
  <div class="caja">
    <div class="form-row" >
     <h3>Buscar clientes</h4>
       <div class="needs-validation">
      <select id="nombre" class="select"  style="height:30px" >
      <option>Clientes</option>

      <?php

       foreach ($listaClientes as $ver) { ?>

      <option id="nombre"><?php echo($ver[0]." ".$ver[1]." ".$ver[2]);?></option>);
    <?php }?>
    </select>
    <button class="btn btn-primary" onclick="buscarCliente()">OK</button>
  </div>
  </div>
</div>
    <form class="needs-validation" action="http://localhost:8080/afamp/prestamos/index.php?controlador=prestamos&accion=agregarPrestamo" method="post"  novalidate>


          <input type="hidden" class="form-control" name="idClienteGenerar" id="idClienteGenerar"   readonly="readonly" required="true" ></input>


        <div class="col-md-4 mb-3">
          <label for="validationTooltip01">Nombre</label>
          <input type="text" class="form-control" name="nombreClienteGenerar" id="nombreClienteGenerar"   readonly="readonly" required="true" ></input>
          <div class="valid-tooltip">
          </div>
        </div>
          <div class="col-md-4 mb-3">
            <label for="validationTooltip01">Apellido</label>
            <input type="text" class="form-control" name="apellidoClienteGenerar" id="apellidoClienteGenerar"   readonly="readonly" required="true" ></input>
            <div class="valid-tooltip">
            </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationTooltip02">Monto solicitado</label>
          <input type="number" class="form-control" name="montoGenerar" id="montoGenerar" placeholder="monto $"  required="true">
          <div class="valid-tooltip">
            <br/>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="validationTooltip02">Interes</label>
          <input type="number" class="form-control" name="interesGenerar" id="interesGenerar" placeholder="interes %"  required="true">
          <div class="valid-tooltip">

          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="validationTooltip02">Cuotas</label>
          <input type="number" class="form-control" name="cuotasGenerar" id="cuotasGenerar" placeholder="Nº cuotas" value="" required="true">
          <div class="valid-tooltip">
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="validationTooltip02">Fecha</label>
          <input type="text" class="form-control" name="fechaGenerar" id="fechaGenerar" readonly="readonly"  value="<?php echo($time2 );?>" required="true">
          <div class="valid-tooltip">
          <br/>
          </div>
        </div>
      </div><br/>
      <?php if($limite == 1){?>
      <button type="submit" name="generarPrestamos" class="btn btn-primary">Generar prestamos</button>
    <?php }?>
    </form></br>
      <div class="needs-validation">
        <button  class="btn btn-primary" onclick="simularPrestamos()">Simular Prestamos</button>
      </div><br/>
    <div class="span">
      <br/>
      <span type="text" id="simulacion"></span>
    </div>
    <script>
    ///////////////////Prestamo///////////////////////
        function simularPrestamos(){
          var simulador={
               'nombreClienteSimular' : document.getElementById("nombreClienteGenerar").value,
               'montoSimular': document.getElementById("montoGenerar").value,
               'interesSimular':document.getElementById("interesGenerar").value,
               'cuotasSimular':document.getElementById("cuotasGenerar").value
          };
              console.log(simulador);
              $.ajax ({
              data:  simulador,
              url:   'controlador/prestamos.php',
              type:  'post',
              dataType: 'json',

              beforeSend: function (texto){
                $("#simulacion").html(texto);
              },
             success:  function (texto) {
                $("#simulacion").html(texto);
            }
              })

        }
        ///////////////////CLIENTES//////////////////////
        function buscarCliente(){
          var datos ={
            'nombreBuscando' : document.getElementById("nombre").value
          };

            $.ajax ({
            data:  datos,
            url:   'controlador/clientes.php',
            type:  'post',
            dataType: 'json',

            beforeSend: function (uvalido){
              console.log("buscando"+uvalido);
              console.log(datos);
            },
           success:  function (uvalido) {
                $("#idClienteGenerar").val(uvalido[0]);
                $("#nombreClienteGenerar").val(uvalido[1]);
                $("#apellidoClienteGenerar").val(uvalido[2]);
          }
            })
      };
    </script>
    </div>
  </body>
</html>
<?php } ?>
