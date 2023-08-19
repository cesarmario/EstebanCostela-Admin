<?PHP session_start();
include('conexion.php');
include('process.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
$fecha = date("Y-m-d H:i:s");

if ($_SESSION['rolUsu'] == '1') {
	$return = "usuarios.php";
} else {
	$return = "index.php";
}

if ($_REQUEST['abm'] == 'a') { //Funcion Alta Usuario
	$query = "INSERT INTO usuario (
		`uidUsuario`,
		`pswUsuario`,
		`nombreUsuario`,
		`matriculaUsuario`,
		`mailUsuario`,
		`telefonoUsuario`,
		`domicilioUsuario`,
		`rolUsuario`,
		`baja`
		)VALUES(
		'$_REQUEST[uidUsuario]',
		md5('$_REQUEST[pswUsuario]'),
		'$_REQUEST[nombreUsuario]',
		'$_REQUEST[matriculaUsuario]',
		'$_REQUEST[mailUsuario]',
		'$_REQUEST[telefonoUsuario]',
		'$_REQUEST[domicilioUsuario]',
		'2',
		'0')";
	$result = mysqli_query($conexion, $query);
	if (mysqli_affected_rows($conexion) > 0) { ?>
		<script>
			location.replace("../<?PHP echo $return; ?>");
		</script>
	<?PHP } else {
	?>
		<script>
			alert("Ocurrio un Error al guardar en los Datos!!");
		</script>
		<input type='button' value='Volver' onClick="location.replace('../<?PHP echo $return; ?>');" class="button" />
<?PHP }
} ?>

<?PHP
if ($_REQUEST['abm'] == 'm') { //Funcion Modificar Inmueble

	$query = "UPDATE usuario SET
	uidUsuario='$_REQUEST[uidUsuario]',
	nombreUsuario='$_REQUEST[nombreUsuario]',
	matriculaUsuario='$_REQUEST[matriculaUsuario]',
	mailUsuario='$_REQUEST[mailUsuario]',
	telefonoUsuario='$_REQUEST[telefonoUsuario]',
	domicilioUsuario='$_REQUEST[domicilioUsuario]'
	WHERE idUsuario = '$_REQUEST[idUsuario]' ";
	$result = mysqli_query($conexion, $query);
	if (mysqli_affected_rows($conexion) > 0) { ?>
		<script>
			location.replace("../<?PHP echo $return; ?>");
		</script>
	<?PHP } else { 	?>
		<script>
			alert("Ocurrio un Error al guardar en los Datos!!");
		</script>
		<div class="form-group">
			<a href="../<?PHP echo $return; ?>&abm=p" class="btn btn-info me-1 mb-1">Volver</a>
		</div>
<?PHP }
} ?>

<?PHP
if ($_REQUEST['abm'] == 'p') { //Funcion Modificar Usuario

	$query = "UPDATE usuario SET pswUsuario = md5('$_REQUEST[pswUsuario]') WHERE idUsuario = '$_REQUEST[idUsuario]' ";
	$result = mysqli_query($conexion, $query);
	if (mysqli_affected_rows($conexion) > 0) { ?>
		<script>
			location.replace("../<?PHP echo $return; ?>");
		</script>
	<?PHP } else { 	?>
		<script>
			alert("Ocurrio un Error al guardar en los Datos!!");
		</script>
		<div class="form-group">
			<a href="../<?PHP echo $return; ?>&abm=p" class="btn btn-info me-1 mb-1">Volver</a>
		</div>
<?PHP }
} ?>

<?PHP
if ($_REQUEST['abm'] == 'x') { //Funcion Eliminar Imagen

	$query = "UPDATE usuario SET logoUsuario = '' WHERE idUsuario = '$_REQUEST[idUsuario]' ";
	$result = mysqli_query($conexion, $query);
	if (mysqli_affected_rows($conexion) > 0) {
		//$directorio = "/gestion/assets/images/usuarios/";
		$nombre = $_REQUEST['logoUsuario'];
		$directorio = $_SERVER['DOCUMENT_ROOT'] . $_SESSION['sesionc_Path'] . '/gestion/assets/images/usuarios/';
		$imagen = $directorio . $nombre;
		unlink($imagen);
?>
		<script>
			location.replace("../usuario_abm.php?abm=m&idUsuario=<?PHP echo $_REQUEST['idUsuario']; ?>");
		</script>
	<?PHP } else { 	?>
		<script>
			alert("Ocurrio un Error al guardar en los Datos!!");
		</script>
		<div class="form-group">
			<a href="../<?PHP echo $return; ?>&abm=p" class="btn btn-info me-1 mb-1">Volver</a>
		</div>
<?PHP }
} ?>


<!-- Cargar Imagen -->
<?PHP
if ($_REQUEST['abm'] == 'i') {

	if (!isset($_FILES['imagen'])) { ?>

		<script>
			alert("Debe seleccionar una imagen!");
			window.history.back();
		</script>

		<?PHP } else {

		// Recibo los datos de la imagen 
		$inombre = $_FILES['imagen']['name'];
		$tipo    = $_FILES['imagen']['type'];
		$tamano  = $_FILES['imagen']['size'];
		$tmp_nn  = $_FILES['imagen']['tmp_name'];
		$error   = $_FILES['imagen']['error'];

		switch ($tipo) {
			case 'application/pdf':
				$qtipo = "pdf";
				break;
			case 'image/jpeg':
				$qtipo = "jpeg";
				break;
			case 'image/jpg':
				$qtipo = "jpg";
				break;
			case 'image/png':
				$qtipo = "png";
				break;
			case 'image/gif':
				$qtipo = "gif";
				break;
		};

		$id_img = $_REQUEST['idUsuario'];
		$nombre = str_pad($id_img, 6, "0", STR_PAD_LEFT) . "." . $qtipo;
		$directorio = $_SERVER['DOCUMENT_ROOT'] . $_SESSION['sesionc_Path'] . '/gestion/assets/images/usuarios/';
		$fullpath = $directorio . $nombre;

		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fullpath)) {
			$query = "UPDATE usuario SET logoUsuario='$nombre' WHERE idUsuario = '$_REQUEST[idUsuario]' ";
			$result = mysqli_query($conexion, $query);
			if (mysqli_affected_rows($conexion) > 0) { ?>
				<script>
					location.replace("../usuario_abm.php?abm=m&idUsuario=<?PHP echo $_REQUEST['idUsuario']; ?>");
				</script>
			<?PHP } else { 	?>
				<script>
					alert("Ocurrio un Error al guardar en los Datos!!");
				</script>
				<div class="form-group">
					<a href="../<?PHP echo $return; ?>&abm=p" class="btn btn-info me-1 mb-1">Volver</a>
				</div>
			<?PHP } ?>
		<?PHP } else {
			echo "<BR>Error en la subida de ficheros!\n"; ?>
			<script>
				alert("Ocurrio un Error!!");
			</script>
	<?PHP }
	} ?>

<?PHP } ?>


<!-- Baja de Usuarios -->
<?PHP
if ($_REQUEST['abm'] == 'b') {
	$query = "UPDATE usuario SET baja='1' WHERE idUsuario='$_REQUEST[idUsuario]'";
	$result = mysqli_query($conexion, $query);
	if (mysqli_affected_rows($conexion) > 0) { 	?>
		<script>
			alert("Usuario Eliminado correctamente");
			location.replace("../usuarios.php");
		</script>
	<?PHP } else { ?>
		<script>
			alert("Ocurrio un Error!!");
		</script>
	<?PHP }; ?>
<?PHP }; ?>


<!-- Activar de Usuario -->
<?PHP
if ($_REQUEST['abm'] == 'r') {
	$query = "UPDATE usuario SET baja='0' WHERE idUsuario='$_REQUEST[idUsuario]'";
	$result = mysqli_query($conexion, $query);
	if (mysqli_affected_rows($conexion) > 0) { 	?>
		<script>
			alert("Usuario Activado correctamente");
			location.replace("../usuarios.php");
		</script>
	<?PHP } else { ?>
		<script>
			alert("Ocurrio un Error!!");
		</script>
	<?PHP }; ?>
<?PHP }; ?>