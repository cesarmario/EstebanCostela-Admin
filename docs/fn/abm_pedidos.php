<?PHP session_start();
include('conexion.php');
include('process.php'); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
$fecha = date("Y-m-d H:i:s");

if ($_REQUEST['abm']=='a') { //Funcion Alta Inmueble
	$query="INSERT INTO pedido (	
	`idPropiedad`,
	`idOperacion`,
	`localidadAPedido`,
	`localidadBPedido`,
	`localidadCPedido`,
	`importeMonedaPedido`,
	`importeDesdePedido`,
	`importeHastaPedido`,
	`caracteristicasPedido`,
	`comentariosPedido`,
	`idUsuario`,
	`baja`
	)VALUES(
	'$_REQUEST[idPropiedad]',
	'$_REQUEST[idOperacion]',
	'$_REQUEST[localidadAPedido]',
	'$_REQUEST[localidadBPedido]',
	'$_REQUEST[localidadCPedido]',
	'$_REQUEST[importeMonedaPedido]',
	'$_REQUEST[importeDesdePedido]',
	'$_REQUEST[importeHastaPedido]',
	'$_REQUEST[caracteristicasPedido]',
	'$_REQUEST[comentariosPedido]',
	'$_SESSION[idUsu]',
	'0')";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ ?>
		<script>
        	location.replace("../pedidos.php");
        </script>		
<?PHP } else { ?>
		<script>
			alert("Ocurrio un Error a guardar en la Base de Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../pedidos.php');" class="button"/>
<?PHP } 
} ?>


<?PHP
if ($_REQUEST['abm']=='m') { //Funcion Modificar Inmueble

	$query="UPDATE pedido SET
	idPropiedad='$_REQUEST[idPropiedad]',
	idOperacion='$_REQUEST[idOperacion]',
	localidadAPedido='$_REQUEST[localidadAPedido]',
	localidadBPedido='$_REQUEST[localidadBPedido]',
	localidadCPedido='$_REQUEST[localidadCPedido]',
	importeMonedaPedido='$_REQUEST[importeMonedaPedido]',
	importeDesdePedido='$_REQUEST[importeDesdePedido]',
	importeHastaPedido='$_REQUEST[importeHastaPedido]',
	caracteristicasPedido='$_REQUEST[caracteristicasPedido]',
	comentariosPedido='$_REQUEST[comentariosPedido]',
	baja='$_REQUEST[estado]'
	WHERE idPedido = '$_REQUEST[idPedido]' ";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
		?>
		<script>
       		location.replace("../pedidos.php");
        </script>		
	<?PHP } else { 	?>
		<script>
			alert("Ocurrio un Error a guardar en la Base de Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../pedidos.php');" class="button"/>
	<?PHP } 
} ?>


