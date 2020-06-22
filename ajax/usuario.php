<?php
  //session_start();
 header('Content-type:text/json');
 require '../modelo/usuarios.php';
 require '../modelo/seguimiento.php';



if($_POST){
	$usuario =addslashes($_POST['usuario']);
	$password =addslashes($_POST['password']);


	$uvalido = validarUsuario($usuario,$password);
	if ($uvalido) {
		$result='OK';

		session_start();
		$_SESSION['sesion_id'] = session_id();
		$_SESSION['usuario'] = $usuario;
  //  $accion="Ingreso al Sistema";date_default_timezone_set('America/Argentina/Mendoza');$tiempo=date('j F Y h:i:s A');$seguimiento=agregarSeguimiento($tiempo,$usuario,$accion);

	} else {
		$result='NO';



	}
	$rta = json_encode($result);
	print $rta;
	exit;
}
?>
