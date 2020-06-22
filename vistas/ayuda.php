<?php
  session_start();
  if (!isset($_SESSION['sesion_id'])){
   header('Location:http://localhost:8080/afamp/prestamos/index.php?controlador=login&accion=cerrarSesion');

  }else{
    $_SESSION['sesion_id'];
    $usuario=$_SESSION['usuario'];
    include ('menu.php');
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"></head>
     <link rel="stylesheet" type="text/css" href="/afamp/prestamos/css/ayuda.css" media="all">
     <body background= "/afamp/prestamos/imagenes/fondco.jpg">
    <link rel="stylesheet" href="/afamp/prestamos/bootstrapcdn/bootstrapcdn.css">
     <meta charset="utf-8">
     <title>Inicio</title>
   </head>
   <body>
  <div class="parrafoInicio">
    <h3>INFORMACION DEL SISTEMA</h3>
  </div>
      <h4>
        <b><u><FONT FACE="tahoma" size="5">Clientes</FONT></u></b><dir> Es OBLIGATORIO el ingreso del cliente con sus respectivos datos para cualquier tipo de operacion o simulacion en prestamos.</br>
          De esta forma se aseguras que tu cliente quede registrado en el sistema.</br> En la parte superior de la pagina clientes se encuentra el boton "Agregar Cliente", este lo llevara a un formulario donde se requieren los datos del Cliente
          (nombre,apellido,telefono dni,domicilio,email,trabajo,garante,telefono del garante) todos estos campos deben ser completados para que el cliente quede
          agregado correctamente.</br>
          Depediendo de cuales sean sus permisos en el sistema <b>(ver apartado usuarios)</b>,podra encontrar dos funciones dentro de clientes.</br></br>
          <b><u><FONT FACE="tahoma" size="3">Editar Clientes :</FONT></u></b> Esta accion ubicada a la derecha de la tabla clientes identificado con icono de lapiz permite corregir los datos del cliente en caso de modificaciones de cualquier dato ya mencionados.</br></br>
          <b><u><FONT FACE="tahoma" size="3">Borrar Clientes :</FONT></u></b> Esta accion se ubica a la derecha de la tabla clientes identificado con icono de basurero rojo, eliminara de forma permanente al cliente, esto no es recomendable para el uso del sistema.</br></dir>

          <b><u><FONT FACE="tahoma" size="5">Generar Prestamos</FONT></u></b><dir>
            Una vez generado el cliente, se podra simular o generar el prestamo. Para ello debemos seleccionar el cliente en la lista (buscar clientes),
            una vez seleccionado precionamos el boton "OK" para confirmarlo.
            En el formulario para generar prestamos te encontraras con tres campos bloqueados para evitar algun tipo de error humano o clientes no registrados (nombre cliente,apellido cliente y fecha).
            Los siguientes campos a completar solo aceptan datos numericos no menor al numero cero (monto,interes,cuotas).
            Depediendo de cuales sean sus permisos en el sistema <b>(ver apartado usuarios)</b>,podra encontrar dos funciones dentro de Generar prestamos.</br></br>
          <b><u><FONT FACE="tahoma" size="3">Simular Prestamos :</FONT></u></b>Esta accion se podra utilizar cuando se encuentren completados todos los campos del formulario. Precionado el boton(simular prestamos) aparecera un texto
            en la parte inferior del formulario con los datos del prestamo. Estos datos se pueden cambiar en el momento hasta que el cliente este de acuerdo con la simulacion.
            Se recomienda siempre utilizar esta funcion para informar al cliente antes de generar el prestamo.</br>
        </br>  <b><u><FONT FACE="tahoma" size="3">Generar Prestamos :</FONT></u></b>Cuando el cliente este de acuerdo con la simulacion se genera el prestamo precionando el boton (Generar prestamos). En el caso de algun problema o dato mal cargado
            el sistema mostrara un error con el mensaje "Error al generar el prestamo". Este error solo se mostrar si el cliente no esta confirmado o se ingrese algun numero negativo al formulario.
            En el caso de no mosrar ningun error el prestamo se genera con exito y el formulario se blanquea nuevamente.
          </dir>
          <b><u><FONT FACE="tahoma" size="5">Prestamos</FONT></u></b><dir>
            Esta tabla muestra todos los prestamos registrados con sus datos correspondientes (numero de prestamo,monto solicitado,total a pagar, interes, numero de cuotas, monto de las cuotas, pagado hasta la fecha, faltante hasta la fecha, fecha de incio, y estado del prestamo).
            Estado del prestamo puede tener dos valores (Activo/Finalizado). El prestamo mostrara el mensaje "Activo" hasta que las cuotas se encuentren todas pagas y faltante sea cero. Cuando el prestamo no tenga mas cuotas impagas mostrara
            el mensaje "Finalizado".
            Depediendo de cuales sean sus permisos en el sistema <b>(ver apartado usuarios)</b>,podra encontrar dos funciones dentro de prestamos.</br></br>
            <b><u><FONT FACE="tahoma" size="3">Borrar prestamos :</FONT></u></b> No se recomienda borrar el prestamo ya que cualquier informacion podria ser util a futuro. Pero de hacerlo este boton
            ubicado a la derecha de la tabla prestamos identificado con icono de basurero rojo borrara al prestamo y sus respectivas cuotas de forma irreversible. En caso que el prestamo cuente con cuotas pagas
            solo permanecera las facturas del prestamo eliminado.</br>
            </br><b><u><FONT FACE="tahoma" size="3">Agregar Pagos :</FONT></u></b> Esta accion ubicada a la derecha de la tabla prestamos identificado con icono de simbolo "+" color verde, nos llevara a la vista de las cuotas
            correspondientes al prestamo para agregar pagos <b>(ver apartado cuotas)</b>.
          </dir>
            <b><u><FONT FACE="tahoma" size="5">Cuotas</FONT></u></b><dir>
              Esta tabla es accesible desde la funcion "agregar pagos" vista Prestamos. En esta tabla se muestran las cuotas del prestamo selecionado,cada fila corresponde a cada cuota con sus datos correspondientes.
              (numero de cuotas, monto de cuotas, estado, anterior vencimiento , proximo vencimiento).
              En este caso la columna estado puede tomar 3 valores (Activo/Pagado/vencido). En el caso que la cuota se encuentre dentro de las fechas vencimiento se mostrara el mensaje "Activo",
              Si la fecha actual supera la fecha de vencimiento automaticamente el estado de la cuota mostrara el mensaje de "Vencido", queda a disposicion del negocio la pena que le genere a este estado.
              Por ultimo si se agrega un pago dentro de la fecha cambiara al estado "Pagado".</br>
              Dentro de cuotas se encuentran dos acciones (Pagar e Imprimir).</br></br>
              <b><u><FONT FACE="tahoma" size="3">Pagar :</FONT></u></b> accion representada por icono de billetes utilizada para pagar la cuota correspondiente, en caso que la cuota se encuentre paga
              saldra un error con el mensaje "La cuota ya se encuentra paga", caso contrario saldra el mensaje "pago realizado con exito ".</br></br>
              <b><u><FONT FACE="tahoma" size="3">Imprimir :</FONT></u></b> Esta accion solamente funciona en el caso que la cuota se encuentre paga, de lo contrario mostrara un mensaje "la cuota no se encuentra paga" para mas detalle <b>(ver apartado facturas)</b>.
            </dir>
            <b><u><FONT FACE="tahoma" size="5">Facturas</FONT></u></b><dir>En esta tabla se mostraran TODAS las facturas generadas por el sistema con posibilidad de poder buscarla por numero en caso que el cliente pida reimprimirla.
              La factura cuenta con los datos(cliente,total del prestamo ,fecha de vencimiento ,numero de factura , numero de cuota con contador, fecha de pago y fecha actual).
              Ademas muestra informacion del negocio como horarios y usuario que emitio la factura.
              El titulo PRESTAMOS TF que se encuentra en la factura esta diseñado como boton para volver al apartado de prestamos sin necesidad de retroceder la pagina.
          </dir>
          <b><u><FONT FACE="tahoma" size="5">Usuarios</FONT></u></b><dir>Vista disponible solamente para administradores. Se muestra la tabla con todos los usuarios generados y sus datos (nombre,contraseña,permisos).
            La contraseña no se muestra por seguridad , el administrador es el unico que podra modificar o restablecer la contraseña de los usuarios.</br></br>
            <b><u><FONT FACE="tahoma" size="3">Editar Usuarios :</FONT></u></b> Esta accion ubicada a la derecha de la tabla Usuarios identificado con icono de lapiz permite corregir los datos del usuarios en caso de modificaciones de cualquier dato ya mencionados.</br></br>
            <b><u><FONT FACE="tahoma" size="3">Borrar Usuarios :</FONT></u></b> Esta accion se ubica a la derecha de la tabla Usuarios identificado con icono de basurero rojo, eliminara de forma permanente al usuario, esto no es recomendable para el uso del sistema.</br></br>
            <b><u><FONT FACE="tahoma" size="3">Agregar Usuarios :</FONT></u></b> Accion para generar un nuevo usuario donde al completar el formulario el administrador puede seleccionar el permiso que desee otorgarle al usuario.</br>
            <dir><b><u><FONT FACE="tahoma" size="5">Permisos</FONT></u></b><dir>
            Se encuentran 3 tipos de permisos abarcando todas las posibilidades posibles para el dueño del negocio.</br></br>
            <b><u><FONT FACE="tahoma" size="3">Administrador :</FONT></u></b> *Usuario sin limitaciones.</br>
            </br><b><u><FONT FACE="tahoma" size="3">Encargado :</FONT></u></b><dir>
            *permiso a las acciones del sistema (Generar Prestamos,Simular Prestamo,editar/eliminar clientes,agregar pagos,borrar Prestamo,imprimir facturas).</br>
            * permisos a las vistas (inicio,generar Prestamos, Prestamos,Clientes,Cuotas, Ver Facturas,Ayuda)</br></dir>
            <b><u><FONT FACE="tahoma" size="3">Operador :</FONT></u></b><dir>
              *permiso a las acciones del sistema(Simular Prestamos,Agregar Cliente,imprimir Facturas).</br>
              * permisos a las vistas (inicio,generar Prestamos, Prestamos,Clientes,Ver Facturas,Ayuda).
            </dir>
          </dir>
            <center><a href="mailto:nicolas_vialidad@hotmail.com"  target="blank">AQUI!</br>Contactar al administrador del sistema</a> </center>
      </h4>
    </br></br>
<?php }?>
  </body>
</html>
