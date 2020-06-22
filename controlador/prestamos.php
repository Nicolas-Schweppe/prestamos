<?php

////////////////////////////////////listar/////////////////////////////////////////{

function _listarPrestamosAction(){
  session_start();include('modelo/usuarios.php');$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];$permiso=permisos($usuario);foreach($permiso as $key => $ver){$limite=$ver['prestamosV'];}
  require 'modelo/prestamos.php';
  $listadoPrestamos=listarPrestamosCliente();
  require 'vistas/prestamos.php';
}

/////////////////////////////////////////////////////////////////////////////////////}


function _generarPrestamosAction(){
  session_start();include('modelo/usuarios.php');$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];$permiso=permisos($usuario);foreach($permiso as $key => $ver){$limite=$ver['generarPrestamosV'];}
  require 'modelo/prestamos.php';
  require 'modelo/cliente.php';


  $opera=0;
  $listaClientes = listarClientes();
  require 'vistas/generarPrestamos.php';
}
/////////////////////////GENERAR PRESTAMOS///////////////////////////////////////////////{

function _agregarPrestamoAction(){
session_start();include('modelo/usuarios.php');$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];
$accion="prestamos Generado";
if(isset($_POST['generarPrestamos'])) {

  require 'modelo/prestamos.php';
  require 'modelo/cuotas.php';
  require 'modelo/seguimiento.php';

 $idCliente= $_POST["idClienteGenerar"];
 $monto = $_POST["montoGenerar"];
 $interes = $_POST["interesGenerar"];
 $cuotas = $_POST["cuotasGenerar"];
 $fecha = $_POST["fechaGenerar"];
 $estado="activo";

 if($monto>100){

 $total=(($interes*$monto)/100)+$monto;
 $montoCuotaPuro= $total/$cuotas;
 $faltante=$total;
 $pagado=0;
 $montoCuota=round($montoCuotaPuro * 100) / 100;   //se redondea decimales
 $cuotasPagas=0;
 $fecha2=$fecha;



 $prestamoNuevo= agregarPrestamos($idCliente,$monto,$total,$interes,$cuotas,$montoCuota,$pagado,$faltante,$fecha,$estado);

 $idPrestamo=ultimoPrestamo();

  for($i = 1; $i <= $cuotas; $i++){

    $proximaFecha=date("Y-m-d",strtotime($fecha."+ $i month"));//se usa variable del for para sumar meses
    $anteriorFecha=date("Y-m-d",strtotime($proximaFecha."- 1 month"));
    $numeroCuotas=$i;
    $prestamoCuota=agregarCuotas($idPrestamo,$numeroCuotas,$estado,$anteriorFecha,$proximaFecha);
  }
}else{}
}
 if($prestamoCuota == 'ok'){
   
   echo ("<div><script> alert('Prestamo generado con EXITO');</script></div>");
   header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=prestamos&accion=generarPrestamos');
   }else{
    echo ("<div><script> alert('ERROR ! problemas al generar el prestamo');</script></div>");

   header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=prestamos&accion=generarPrestamos');
   }
   $accion="Nuevo Prestamo";session_start();$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];date_default_timezone_set('America/Argentina/Mendoza');$tiempo=date('j F Y h:i:s A');$seguimiento=agregarSeguimiento($tiempo,$usuario,$accion);

}
/////////////////////////////////////////////////////////////////////////////////////}

////////////////////////////////////ELIMINAR/////////////////////////////////////////{
if($_POST['prestamosEliminar']){

  include('../modelo/prestamos.php');
  include('../modelo/cuotas.php');
  include('../modelo/seguimiento.php');
  $accion="Prestamo Eliminado";session_start();$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];date_default_timezone_set('America/Argentina/Mendoza');$tiempo=date('j F Y h:i:s A');$seguimiento=agregarSeguimiento($tiempo,$usuario,$accion);

	$prestamoE=$_POST['prestamosEliminar'];

	 $eliminado= eliminarPrestamos($prestamoE);
   $eliminadoCuota=eliminarCuotas($prestamoE);
   if ($eliminadoCuota) {
		   $resultado="ok";
	    } else {
		      $resultado='no';
	       }
	         $rta = json_encode($resultado);
	         print $rta;
	         exit;

/////////////////////////////////////////////////////////////////////////////////////}
}
///////////////////////////////SIMULAR PRESTAMO//////////////////////////////////////{
if($_POST['nombreClienteSimular']){

 $nombreSimular=$_POST['nombreClienteSimular'];
 $montoSimular =$_POST['montoSimular'];
 $interesSimular =$_POST['interesSimular'];
 $cuotasSimular =$_POST['cuotasSimular'];

 $totalSimular=(($interesSimular*$montoSimular)/100)+$montoSimular;
  if($totalSimular>0){
    $quedasSimular= $totalSimular/$cuotasSimular;
    $quedaSimular=round($quedasSimular * 100) / 100;

    $texto="Sr ".$nombreSimular." Su prestamo de $".$montoSimular." con un interes del ".$interesSimular."% quedara un TOTAL de $".$totalSimular.
    " en ".$cuotasSimular." cuotas de $".$quedaSimular." Pesos";
  }else{
    $texto="Complete todos los campos";
  }

  $rta = json_encode($texto);
  print $rta;
  exit;
  }
/////////////////////////////////////////////////////////////////////////////////////}

?>
