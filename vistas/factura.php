<?php

session_start();

if (!isset($_SESSION['sesion_id'])){
   header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=login&accion=cerrarSesion');

}else{
$_SESSION['sesion_id'];
$usuario=$_SESSION['usuario'];

 require_once('app/lib/tcpdf/tcpdf_import.php');

  ob_start();
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->AddPage('P', 'A4');

  ini_set('data.timezone','America/Argentina/Salta');

  $time2= date('d/m/Y',time());

  foreach($lista as $key=> $ver){
    $fechaPago=date("d/m/Y", strtotime($ver['fechaPago']));
    $fechaVencimiento=date("d/m/Y", strtotime($ver['fechaProxima']));
    $html.= '<div><a href="http://localhost:8080/afamp/prestamos/index.php?controlador=cuotas&accion=listarCuotas&idPrestamos='.$ver['idPrestamo'].'" dir="ltr"><img src="app/reportes/img/titulo.jpg"  height="70"/></a></div>';
    $html.='<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css3/style.css" media="all" />
    <body background= "imagenes/fondo.jpg"></body>
    </head>


    <div style="font-weight: bold; font-size: 12pt">Nº factura: '.$idFactura.'</div>
    <div style="font-weight: bold; font-size: 12pt">Fecha actual:'.$time2.'</div>
    <div style="font-weight: bold; font-size: 12pt">Fecha pago:'.$fechaPago.'</div>
     <div style="font-weight: bold; font-size: 12pt">Nombre y Apellido Cliente:   '.$ver['nombre'].'  '.$ver['apellido'].'</div>
     <div style="font-weight: bold; font-size: 12pt">Dni: '.$ver['dni'].'   Tel: '.$ver['telefono'].'</div>';


    $html.='<table style="float:left" border="2" cellspacing="0" cellpadding="0">
    <div style="font-weight: bold; font-size: 12pt" align="center"><h2> Detalles de factura</h2></div>
        <table style="float:left" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <th width="20%"  bgcolor="#cccccc" align="center">NºPrestamo </th>
          <th width="20%" bgcolor="#cccccc" align="center">Total Prestamo</th>
          <th width="20%" bgcolor="#cccccc" align="center">Fecha vencimiento</th>
          <th width="20%" bgcolor="#cccccc" align="center">cuota Nº</th>
          <th width="25%" bgcolor="#cccccc" align="center">Monto cuota</th>
        </tr>';


        $html.='<tr>
                  <td align="center">'.$ver['idPrestamo'].'</td>
                  <td align="center"> '."$ ".$ver['total'].'</td>
                  <td align="center"> '.$fechaVencimiento.'</td>
                  <td align="center"> '.$ver['numeroCuotas'].'/'.$ver['cuotas'].'</td>
                  <td align="center"> '."$ ".$ver['montoCuotas'].'</td>
                  </tr> ';
                  }
        $html.='</table><br/><br/>';


        $html.='<br/>Factura generada por :'.$usuario.'<br/>
                     Local ubicado: Viedma 374<br/>
                     Tel:(2920-15344663)<br/>
                     Horario de atencion : 9:00 a 13:00 y de 17:00 a 20:30<br/>
                     <a href="mailto:nicolas_vialidad@hotmail.com">Correo:nicolas_vialidad@hotmail.com</a>';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    $nombre = 'Factura'."$idFactura";
    $pdf->Output($proyecto_nombre.'-'.$nombre.'.pdf', 'I');

}
?>
