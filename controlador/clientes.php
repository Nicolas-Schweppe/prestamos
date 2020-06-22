<?php
///////////////////////////carga vista clientes////////////////////////////////{
function _listarClientesAction(){
  session_start();include('modelo/usuarios.php');$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];$permiso=permisos($usuario);foreach($permiso as $key => $ver){$limite=$ver['clientesV'];}
  require 'modelo/cliente.php';
  $listaClientes = listarClientes();
  require 'vistas/clientes.php';
}
/////////////////////carga vista nuevocliente////////////////////////////////////

 function _nuevoClienteAction(){
  require 'vistas/nuevoCliente.php';
 }
///////////////////////////NUEVO////////////////////////////////{

 function _agregarClienteAction(){
   session_start();include('modelo/usuarios.php');$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];
   include ('modelo/cliente.php');
   include ('modelo/seguimiento.php');

   if(isset($_POST['nuevoCliente'])) {

     $nombreNuevo= $_POST["nombreNuevo"];
     $apellidoNuevo = $_POST["apellidoNuevo"];
     $telefonoNuevo = $_POST["telefonoNuevo"];
     $dniNuevo = $_POST["dniNuevo"];
     $domicilioNuevo = $_POST["domicilioNuevo"];
     $correoNuevo = $_POST["correoNuevo"];
     $trabajoNuevo = $_POST["trabajoNuevo"];
     $garanteNuevo = $_POST["garanteNuevo"];
     $telefonoGaranteNuevo = $_POST["telefonoGaranteNuevo"];

     $clienteNuevo= agregarCliente($nombreNuevo,$apellidoNuevo,$telefonoNuevo,$dniNuevo,$domicilioNuevo,$correoNuevo,$trabajoNuevo,$garanteNuevo,$telefonoGaranteNuevo);

     if($clienteNuevo){
       $resultado='ok';
       echo ("<div><script> alert('Cliente agregado');</script></div>");
       header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=clientes&accion=listarClientes');

    }else{
      $resultado='no';
      header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=clientes&accion=listarClientes');
      //require 'vistas/clientes.php';
    }
      mysqli_close($mysqli);
    }
    $accion="Cliente Agregado";session_start();$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];date_default_timezone_set('America/Argentina/Mendoza');$tiempo=date('j F Y h:i:s A');$seguimiento=agregarSeguimiento($tiempo,$usuario,$accion);
}
///////////////////carga vista modificando ////////////////////////////}
  function _modificarClienteAction(){
     require 'modelo/cliente.php';
     $idCliente=$_GET['idCliente'];
     $resultado=listarClienteId($idCliente);
     require 'vistas/modificandoCliente.php';

  }

///////////////////////////Mofificar//////////////////////////////{

  function _guardarCambiosAction(){
    include ('modelo/cliente.php');
    include ('modelo/seguimiento.php');

   if(isset($_POST['modificarCliente'])) {

   $idClienteModificar= $_POST['idClienteModificar'];
   $nombreModificar= $_POST['nombreModificar'];
   $apellidoModificar = $_POST['apellidoModificar'];
   $telefonoModificar = $_POST['telefonoModificar'];
   $dniModificar = $_POST['dniModificar'];
   $domicilioModificar = $_POST['domicilioModificar'];
   $correoModificar = $_POST['correoModificar'];
   $trabajoModificar = $_POST['trabajoModificar'];
   $garanteModificar = $_POST['garanteModificar'];
   $telefonoGaranteModificar = $_POST['telefonoGaranteModificar'];

   $clienteModificar= modificarCliente($idClienteModificar,$nombreModificar,$apellidoModificar,$telefonoModificar,$dniModificar,$domicilioModificar,$correoModificar,$trabajoModificar,$garanteModificar,$telefonoGaranteModificar);

   if($cliente=="ok"){
     header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=clientes&accion=listarClientes');
     echo ("<div><script> alert('Cliente Modificado');</script></div>");
   }else{
     echo ("<div><script> alert('Error al modificar Cliente');</script></div>");
     header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=clientes&accion=listarClientes');
   }
       mysqli_close($mysqli);
   }
   $accion="Cliente Modificado";session_start();$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];date_default_timezone_set('America/Argentina/Mendoza');$tiempo=date('j F Y h:i:s A');$seguimiento=agregarSeguimiento($tiempo,$usuario,$accion);
///////////////////////////////////////////////////////////////////////////}
  }
/////////////////////////////ELIMINAR//////////////////////////////////////{

if($_POST['clientesEliminar']){
 include('../modelo/cliente.php');
 include('../modelo/seguimiento.php');
 $clientesEliminar =$_POST['clientesEliminar'];
 $accion="Cliente Eliminado";session_start();$_SESSION['sesion_id'];$usuario=$_SESSION['usuario'];date_default_timezone_set('America/Argentina/Mendoza');$tiempo=date('j F Y h:i:s A');$seguimiento=agregarSeguimiento($tiempo,$usuario,$accion);

 $clienteEliminado= eliminarClientes($clientesEliminar);
  if ($clienteEliminado) {
   $clienteEliminado="ok";
 } else {
   $clienteEliminado='kdo';
 }
 $rta = json_encode($clienteEliminado);
 print $rta;
 exit;
}

////////////////////////////////////////////////////////////////////////////}

//////////////////////////////Buscar Clientes///////////////////////////////{
if($_POST['nombreBuscando']){
  include('../modelo/cliente.php');
  $idCliente =addslashes($_POST['nombreBuscando']);

  $id1=explode(" ",$idCliente); //aca separo el numero de la cadena de texto
  $id=$id1[0];//solo el numero
  $uvalido= buscarCliente($id);

  while($ver= mysqli_fetch_array($uvalido)) {
    $uvalido=$ver;
  }
    $rta = json_encode($uvalido);
    print $rta;
    exit;

}
/////////////////////////////////////////////////////////////////////////////}
?>
