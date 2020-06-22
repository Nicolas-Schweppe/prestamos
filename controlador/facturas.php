<?php
  function _listarFacturasAction(){
    include('modelo/facturas.php');
    $facturas=listarFacturasAll();
    require 'vistas/facturas.php';

  }

 function _imprimirFacturaAction(){
  include('modelo/facturas.php');
  $idFactura=$_GET['idFactura'];
  $lista=listarFacturas($idFactura);
  require 'vistas/factura.php';
 }







 ?>
