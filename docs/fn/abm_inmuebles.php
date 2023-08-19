<?PHP session_start();
include('conexion.php');
include('process.php');   
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
$fecha = date("Y-m-d H:i:s");

if ($_REQUEST['abm']=='a') { //Funcion Alta Inmueble

	$validate = true;

	if (!isset($_REQUEST['idPropiedad']) or empty($_REQUEST['idPropiedad'])){ ?>
		<script>
			alert("Debe seleccionar una Tipo de Propiedad!");
			window.history.back();
		</script>		
	<?PHP $validate = false; }

	if (!isset($_REQUEST['idOperacion']) or empty($_REQUEST['idOperacion'])){ ?>
		<script>
			alert("Debe seleccionar una Tipo de Operacion!");
			window.history.back();
		</script>		
	<?PHP $validate = false; }

	if (!isset($_REQUEST['idLocalidad']) or empty($_REQUEST['idLocalidad'])){ ?>
		<script>
			alert("Debe seleccionar una Localidad!");
			window.history.back();
		</script>		
	<?PHP $validate = false; }

	if($validate = true){
		$query="INSERT INTO inmueble (
		`idPropiedad`,
		`idOperacion`,
		`idLocalidad`,
		`tituloInmueble`,
		`descripcionInmueble`,
		`domicilioCalleInmueble`,
		`domicilioNumeroInmueble`,
		`domicilioOrientacionInmueble`,
		`habitacionesInmueble`,
		`banosInmueble`,
		`superficieCubiertaInmueble`,
		`superficieTotalInmueble`,
		`tipoSuperficieTotalInmueble`,
		`informacionAdicionalInmueble`,
		`informacionPrivadaInmueble`,	
		`valorInmueble`,
		`monedaInmueble`,
		`plantasInmueble`,
		`cloacaInmueble`,
		`gasNaturalInmueble`,
		`pavimentoInmueble`,
		`tipoAguaCalienteInmueble`,
		`aguaCorrienteInmueble`,
		`frenteTerrenoInmueble`,
		`largoTerrenoInmueble`,
		`antiguedadInmueble`,
		`estadoInmueble`,
		`mejorasInmueble`,
		`cocheraInmueble`,
		`tipoCocheraInmueble`,
		`vehiculosCocheraInmueble`,
		`idUsuario`,
		`baja`
		)VALUES(
		'$_REQUEST[idPropiedad]',
		'$_REQUEST[idOperacion]',
		'$_REQUEST[idLocalidad]',
		'$_REQUEST[tituloInmueble]',
		'$_REQUEST[descripcionInmueble]',
		'$_REQUEST[domicilioCalleInmueble]',
		'$_REQUEST[domicilioNumeroInmueble]',
		'$_REQUEST[domicilioOrientacionInmueble]',
		'$_REQUEST[habitacionesInmueble]',
		'$_REQUEST[banosInmueble]',
		'$_REQUEST[superficieCubiertaInmueble]',
		'$_REQUEST[superficieTotalInmueble]',
		'$_REQUEST[tipoSuperficieTotalInmueble]',
		'$_REQUEST[informacionAdicionalInmueble]',
		'$_REQUEST[informacionPrivadaInmueble]',
		'$_REQUEST[valorInmueble]',
		'$_REQUEST[monedaInmueble]',
		'$_REQUEST[plantasInmueble]',
		'$_REQUEST[cloacaInmueble]',
		'$_REQUEST[gasNaturalInmueble]',
		'$_REQUEST[pavimentoInmueble]',
		'$_REQUEST[tipoAguaCalienteInmueble]',
		'$_REQUEST[aguaCorrienteInmueble]',
		'$_REQUEST[frenteTerrenoInmueble]',
		'$_REQUEST[largoTerrenoInmueble]',
		'$_REQUEST[antiguedadInmueble]',
		'$_REQUEST[estadoInmueble]',
		'$_REQUEST[mejorasInmueble]',
		'$_REQUEST[cocheraInmueble]',
		'$_REQUEST[tipoCocheraInmueble]',
		'$_REQUEST[vehiculosCocheraInmueble]',
		'$_SESSION[idUsu]',
		'0')";
		$result = mysqli_query($conexion, $query);
		if (mysqli_affected_rows($conexion)>0){ 
			
			$queryctrl="SELECT * FROM inmueble WHERE baja != '1' ORDER BY idInmueble DESC LIMIT 1";
			$rtsctrl = mysqli_query($conexion, $queryctrl);
			$ctrl=mysqli_fetch_assoc($rtsctrl);
			$idInmueble=$ctrl['idInmueble'];		
			?>
			<script>
				location.replace("../inmueble_abm_img.php?idInmueble=<?PHP echo $idInmueble;?>");
			//	location.replace("../inmuebles.php");
			</script>		
		<?PHP } else { ?>
			<script>
				alert("Ocurrio un Error a guardar en la Base de Datos!!");
			</script>
		<!--input type ='button' value = 'Volver' onClick="location.replace('../inmuebles.php');" class="button"/-->
		<?PHP } 
	}
} ?>

<?PHP
if ($_REQUEST['abm']=='m') { //Funcion Modificar Inmueble

	$query="UPDATE inmueble  SET
	idPropiedad='$_REQUEST[idPropiedad]',
	idOperacion='$_REQUEST[idOperacion]',
	idLocalidad='$_REQUEST[idLocalidad]',
	tituloInmueble='$_REQUEST[tituloInmueble]',
	descripcionInmueble='$_REQUEST[descripcionInmueble]',
	domicilioCalleInmueble='$_REQUEST[domicilioCalleInmueble]',
	domicilioNumeroInmueble='$_REQUEST[domicilioNumeroInmueble]',
	domicilioOrientacionInmueble='$_REQUEST[domicilioOrientacionInmueble]',
	habitacionesInmueble='$_REQUEST[habitacionesInmueble]',
	banosInmueble='$_REQUEST[banosInmueble]',
	superficieCubiertaInmueble='$_REQUEST[superficieCubiertaInmueble]',
	superficieTotalInmueble='$_REQUEST[superficieTotalInmueble]',
	tipoSuperficieTotalInmueble='$_REQUEST[tipoSuperficieTotalInmueble]',
	informacionAdicionalInmueble='$_REQUEST[informacionAdicionalInmueble]',
	informacionPrivadaInmueble='$_REQUEST[informacionPrivadaInmueble]',
	valorInmueble='$_REQUEST[valorInmueble]',
	plantasInmueble='$_REQUEST[plantasInmueble]',
	cloacaInmueble='$_REQUEST[cloacaInmueble]',
	gasNaturalInmueble='$_REQUEST[gasNaturalInmueble]',
	pavimentoInmueble='$_REQUEST[pavimentoInmueble]',
	tipoAguaCalienteInmueble='$_REQUEST[tipoAguaCalienteInmueble]',
	aguaCorrienteInmueble='$_REQUEST[aguaCorrienteInmueble]',
	frenteTerrenoInmueble='$_REQUEST[frenteTerrenoInmueble]',
	largoTerrenoInmueble='$_REQUEST[largoTerrenoInmueble]',
	antiguedadInmueble='$_REQUEST[antiguedadInmueble]',
	estadoInmueble='$_REQUEST[estadoInmueble]',
	mejorasInmueble='$_REQUEST[mejorasInmueble]',
	cocheraInmueble='$_REQUEST[cocheraInmueble]',
	tipoCocheraInmueble='$_REQUEST[tipoCocheraInmueble]',
	vehiculosCocheraInmueble='$_REQUEST[vehiculosCocheraInmueble]',
	monedaInmueble='$_REQUEST[monedaInmueble]' WHERE idInmueble = '$_REQUEST[idInmueble]' ";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
		?>
		<script>
       		location.replace("../inmuebles.php");
        </script>		
	<?PHP } else { 	?>
		<script>
			alert("Ocurrio un Error a guardar en la Base de Datos!!");
		</script>
		<!--input type ='button' value = 'Volver' onClick="location.replace('../inmuebles.php');" class="button"/-->
	<?PHP } 
} ?>

<!-- Baja de Inmueble -->
<?PHP
if ($_REQUEST['abm']=='b'){ 
	$query="UPDATE inmueble SET baja='1' WHERE idInmueble ='$_REQUEST[idInmueble]'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ 	?>
		<script>
           alert("Inmueble Eliminado correctamente"); 
		   location.replace("../inmuebles.php");
        </script>
    <?PHP } else { ?>
		<script>
            alert("Ocurrio un Error!!");
			location.replace("../inmuebles.php");
        </script>
	<?PHP }; ?>    
<?PHP }; ?>

<!-- Activar de Inmueble -->
<?PHP
if ($_REQUEST['abm']=='r'){ 
	$query="UPDATE inmueble SET baja='0' WHERE idInmueble ='$_REQUEST[idInmueble]'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ 	?>
		<script>
           alert("Inmueble Activado correctamente");
		   location.replace("../inmuebles.php"); 
        </script>
    <?PHP } else { ?>
		<script>
            alert("Ocurrio un Error!!");
			location.replace("../inmuebles.php");
        </script>
	<?PHP }; ?>    
<?PHP }; ?>