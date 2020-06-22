<?php

///////////////////////////////mostrar vista cuotas///////////////////
  function _listarCuotasAction(){
    session_start();include('modelo/usuarios.php');$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];$permiso=permisos($usuario);foreach($permiso as $key => $ver){$limite=$ver['cuotas'];}
    require ('modelo/cuotas.php');
    $idPrestamos= $_GET['idPrestamos'];
    $cuotas=listarCuotasPrestamos($idPrestamos);
    require ('vistas/cuotas.php');
  }

  ///////////////////////////////PAGAR////////////////////////////////
  if(isset($_POST['agregarPago'])) {
    require('../modelo/cuotas.php');
    require('../modelo/prestamos.php');
    require('../modelo/facturas.php');
    require('../modelo/seguimiento.php');
    $idCuota =$_POST['agregarPago'];
    $accion="Pago de Cuota";session_start();$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];date_default_timezone_set('America/Argentina/Mendoza');$tiempo=date('j F Y h:i:s A');$seguimiento=agregarSeguimiento($tiempo,$usuario,$accion);



    $pago=listarCuotasId($idCuota);
    while($ver= mysqli_fetch_array($pago)) {

     $idCuota=$ver['idCuota'];
     $idPrestamo=$ver['idPrestamo'];
     $numeroCuotas=$ver['numeroCuotas'];
     $estadoCuota=$ver['estadoCuota'];
     $fechaUltima=$ver['fechaUltima'];
     $fechaProxima=$ver['fechaProxima'];
     $idCliente=$ver['idCliente'];
     $monto=$ver['monto'];
     $total=$ver['total'];
     $interes=$ver['interes'];
     $cuotas=$ver['cuotas'];
     $montoCuotas=$ver['montoCuotas'];
     $pagado=$ver['pagado'];
     $faltante=$ver['faltante'];
     $fecha=$ver['fecha'];
     $estadoPrestamo=$ver['estadoPrestamo'];
     $nombre=$ver['nombre'];
     $apellido=$ver['apellido'];
     $dni=$ver['dni'];


    }
    if($estadoCuota != "pagado"){
      $cuotaPagado=cuotaPaga($idCuota);

      $prestamoPagado=$pagado + $montoCuotas;
      $prestamoFaltante=$faltante - $montoCuotas;

      $pagarPrestamo=pagarPrestamos($idPrestamo,$prestamoPagado,$prestamoFaltante);

      $fechaPago =date("Y-m-d");
      $agregarFactura=nuevaFactura($idCuota,$fechaPago);
      $cierre=estadoPrestamo($idPrestamo);

        if($cierre==0){
        $finalizar=prestamoFinalizar($idPrestamo);
      }
      $result=1;

  }else{
      $result=0;
  }
    $rta = json_encode($result);
    print $rta;
    exit;

  }

  ////////////////////////IMPRIMIR//////////////////////////////
    if(isset($_POST['imprimirFactura'])) {
      require('../modelo/cuotas.php');

      $cuotaImprimir=$_POST['imprimirFactura'];
      $comprobarEstado=listarCuotasId($cuotaImprimir);

      while($ver= mysqli_fetch_array($comprobarEstado)) {
          $estadoFactura=$ver['estadoCuota'];

            if($estadoFactura != "activo"){
              $text="no";
            }else{
              $text="si";
            }
      }
      $rta = json_encode($text);
      print $rta;
      exit;
    }
?>
