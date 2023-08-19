<?PHP session_start();
include('conexion.php'); 
include('process.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
$fecha = date("Y-m-d H:i:s");

if ($_REQUEST['abm']=='ap') { //Funcion Alta Propiedad
	$query="INSERT INTO propiedad (
	`nombrePropiedad`,
	`baja`
	)VALUES(
	'$_REQUEST[nombrePropiedad]',
	'0')";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ ?>
		<script>
        	location.replace("../propiedades.php");
        </script>		
<?PHP } else { 
		?>
		<script>
			alert("Ocurrio un Error a guardar en la Base de Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../propiedades.php');" class="button"/>
<?PHP } 
}  ?>

<!-- Modificar Propiedad -->
<?PHP
if ($_REQUEST['abm']=='up'){ 
	$query="UPDATE propiedad SET nombrePropiedad='$_REQUEST[nombrePropiedad]' WHERE idPropiedad='$_REQUEST[idPropiedad]'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ 	?>
		<script>
		   location.replace("../propiedades.php"); 
        </script>
    <?PHP } else { ?>
		<script>
            alert("Ocurrio un Error!!");
			location.replace("../propiedades.php");
        </script>
	<?PHP }; ?>    
<?PHP }; ?>

<!-- Baja de Propiedad -->
<?PHP
if ($_REQUEST['abm']=='bp'){ 
	$query="UPDATE propiedad SET baja='1' WHERE idPropiedad='$_REQUEST[idPropiedad]'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ 	?>
		<script>
           alert("Propiedad Eliminada correctamente"); 
		   location.replace("../propiedades.php");
        </script>
    <?PHP } else { ?>
		<script>
            alert("Ocurrio un Error!!");
			location.replace("../propiedades.php");
        </script>
	<?PHP }; ?>    
<?PHP }; ?>


<!-- Activar de Propiedad -->
<?PHP
if ($_REQUEST['abm']=='rp'){ 
	$query="UPDATE propiedad SET baja='0' WHERE idPropiedad='$_REQUEST[idPropiedad]'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ 	?>
		<script>
           alert("Propiedad Activada correctamente");
		   location.replace("../propiedades.php"); 
        </script>
    <?PHP } else { ?>
		<script>
            alert("Ocurrio un Error!!");
			location.replace("../propiedades.php");
        </script>
	<?PHP }; ?>    
<?PHP }; ?>


<?PHP
//*********************Funciones DB: Operacion****************************************************************

if ($_REQUEST['abm']=='ao') { //Alta Operacion
	$query="INSERT INTO operacion (
	`nombreOperacion`,
	`baja`
	)VALUES(
	'$_REQUEST[nombreOperacion]',
	'0')";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ ?>
		<script>
        	location.replace("../operaciones.php");
        </script>		
<?PHP } else { 
		?>
		<script>
			alert("Ocurrio un Error a guardar en la Base de Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../operaciones.php');" class="button"/>
<?PHP } 
} ?>

<!-- Modificar Operacion -->
<?PHP
if ($_REQUEST['abm']=='uo'){ 
	$query="UPDATE operacion SET nombreOperacion='$operaciones[nombreOperacion]' WHERE idOperacion='$_REQUEST[idOperacion]'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ 	?>
		<script>
		   location.replace("../operaciones.php"); 
        </script>
    <?PHP } else { ?>
		<script>
            alert("Ocurrio un Error!!");
			location.replace("../operaciones.php");
        </script>
	<?PHP }; ?>    
<?PHP }; ?>

<!-- Baja de Operaciones -->
<?PHP
if ($_REQUEST['abm']=='bo'){ 
	$query="UPDATE operacion SET baja='1' WHERE idOperacion='$_REQUEST[idOperacion]'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ 	?>
		<script>
           alert("Operacion Eliminada correctamente"); 
		   location.replace("../operaciones.php");
        </script>
    <?PHP } else { ?>
		<script>
            alert("Ocurrio un Error!!");
			location.replace("../operaciones.php");
        </script>
	<?PHP }; ?>    
<?PHP }; ?>


<!-- Activar de Operaciones -->
<?PHP
if ($_REQUEST['abm']=='ro'){ 
	$query="UPDATE operacion SET baja='0' WHERE idOperacion='$_REQUEST[idOperacion]'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ 	?>
		<script>
           alert("Operacion Activada correctamente");
		   location.replace("../operaciones.php"); 
        </script>
    <?PHP } else { ?>
		<script>
            alert("Ocurrio un Error!!");
			location.replace("../operaciones.php");
        </script>
	<?PHP }; ?>    
<?PHP }; ?>

