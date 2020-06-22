<?php require_once('tcpdf/tcpdf_import.php'); 

ob_start(); 
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage('L', 'A4');


$html = '<div><a href="http://localhost/tf/index.php?controlador=Proyecto&accion=listar" dir="ltr"><img src="images/titulopdf.png"  height="63"/></a></div>
<table style="float:left" border="1" cellspacing="0" cellpadding="0">
<div style="font-weight: bold; font-size: 12pt"><h2>Equipos del proyecto '.$proyecto_nombre.' - Listado detallado</h2></div>

    <table style="float:left" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <th width="5%"  bgcolor="#cccccc" align="center">codigo</th>    
      <th width="20%" bgcolor="#cccccc" align="center">nombre</th>
      <th width="30%" bgcolor="#cccccc" align="center">descripcion</th>
      <th width="20%" bgcolor="#cccccc" align="center">fecha alta </th>
      <th width="25%" bgcolor="#cccccc" align="center">marca - modelo</th>
    </tr>';

foreach($equipos as $equipo) { 

    $html.='<tr>
              <td align="center">'.$equipo['id'].'</td>
              <td> '. $equipo['nombre'].'</td>
              <td> '. $equipo['descripcion'].'</td>
              <td align="center"> '. date($equipo['fecha_alta']).'</td>
              <td> '. $equipo['equipo_tipo_marca'].' - '. $equipo['equipo_tipo_modelo'].'</td>
              </tr> ';
}
  $html.='</table>';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$nombre = 'equipos';
$pdf->Output($proyecto_nombre.'-'.$nombre.'.pdf', 'I');


?>
