<?php
  //session_start();


    include ('menu.php');
    include ('../modelo/cliente.php');
    include ('../modelo/prestamos.php');
    include ('../modelo/facturas.php');
    require ('../modelo/usuarios.php');
    require ('../modelo/seguimiento.php');

$fecha_actual = date("d-m-Y");

?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <link rel="stylesheet" type="text/css" href="/afamp/prestamos/css/inicio.css" media="all">
     <body background= "/afamp/prestamos/imagenes/fondo.jpg">
    <link rel="stylesheet" href="/afamp/prestamos/bootstrapcdn/bootstrapcdn.css">
     <meta charset="utf-8">
     <title>Inicio</title>
   </head>
   <body>
  <div class="leyenda"></br></br>
    <h3>Prestamos TF® Trabajo Final (Tecnico superior en analisis y desarrollo de sistemas informaticos) </br>
    instituto patagonia</h3>
  </div>
    <div class="parrafoInicio">
      <h3>
        PAGINA DE PRUEBA</br>
      </h3>
    </div></br></br>

<?php

//$fecha_actual = date("d-m-Y");
//sumo 1 mes
//echo($fecha_actual);
echo("<br/>");
echo("<br/>");
//$fecha2=date("d-m-Y",strtotime($fecha_actual."+ 1 month"));
//echo($fecha2);
$i=0;
while($i < 4){
  $i++;
//  echo($fecha_actual);
$fecha2=date("d-m-Y",strtotime($fecha_actual."+ $i month"));
$fecha1=date("d-m-Y",strtotime($fecha2."- 1 month"));
echo("fecha 1 = ".$fecha1." fecha 2 =".$fecha2." fecha actual= ".$fecha_actual."<br/>");

}

  //$usuario=listarUsuariosId(1);
//foreach ($usuario as $key => $value) {
/*while($value= mysqli_fetch_array($usuario)){
  echo($value[0]."<br/>");
  echo($value[1]."<br/>");
  echo($value[2]."<br/>");
  echo($value[3]."<br/>");
}*/

  //$hora = new DateTime("now", new DateTimeZone('America/New York'));
  //echo("hora ".$hora);

$clave="nicolas";
$claveCod=MD5($clave);

echo("clave :".$clave."--------------------------clave codificada :".$claveCod);




?>
  </body>
</html>
