<?PHP session_start();
include('conexion.php');
include('process.php'); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
$fecha = date("Y-m-d H:i:s");

$query="UPDATE consulta SET respuestaConsulta='$_REQUEST[respuestaConsulta]', fechaRespuestaConsulta='$fecha' 
WHERE idConsulta= '$_REQUEST[idConsulta]'";
$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ ?>
		<script>
        	location.replace("../consultas.php");
        </script>		
<?PHP } else { ?>
		<script>
			alert("Ocurrio un Error a guardar en la Base de Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../consultas.php');" class="button"/>
<?PHP } ?>