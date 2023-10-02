<?PHP
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include('conexion.php');
include('process.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
?>

<!-- Cargar Imagen -->
<?PHP
if ($_REQUEST['abm'] == 'a' or $_REQUEST['abm'] == 'm') {

	//if(empty($_FILES['imagen']['name'])){
	if (!isset($_FILES['imagen'])) { ?>

		<script>
			alert("Debe seleccionar una imagen!");
			window.history.back();
		</script>

		<?PHP } else {

		$cantidad = count($_FILES["imagen"]["tmp_name"]);

		for ($i = 0; $i < $cantidad; $i++) {

			// Recibo los datos de la imagen 
			$inombre = $_FILES['imagen']['name'][$i];
			$tipo    = $_FILES['imagen']['type'][$i];
			$tamano  = $_FILES['imagen']['size'][$i];
			$tmp_nn  = $_FILES['imagen']['tmp_name'][$i];
			$error   = $_FILES['imagen']['error'][$i];

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

			$query = "INSERT INTO imagen (
			`tipoImagen`,
			`idInmueble`,
			`detalleImagen`,
			`ordenImagen`,
			`baja`
			)VALUES(
			'$qtipo',	
			'$_REQUEST[idInmueble]',
			'$_REQUEST[detalleImagen]',
			'2',
			'0')";

			$result = mysqli_query($conexion, $query);
			if (mysqli_affected_rows($conexion) > 0) {
				$queryimagen = "SELECT * FROM imagen WHERE idInmueble = '$_REQUEST[idInmueble]' AND baja != '1' ORDER BY idImagen DESC LIMIT 1";
				$rtsimagen = mysqli_query($conexion, $queryimagen);
				$img = mysqli_fetch_assoc($rtsimagen);
				$id_new = $img['idImagen'];
				$nombre = str_pad($id_new, 8, "0", STR_PAD_LEFT) . "." . $qtipo;

				// Ruta donde se guardaran las imagenes cuando se ejecuta Local
				//$directorio = $_SERVER['DOCUMENT_ROOT'].$_SESSION['sesionc_Path'].'/estebancostela/docs/assets/images/inmuebles/';
				// Ruta donde se guardaran las imagenes cuando se ejecuta en al web
				$directorio = $_SERVER['DOCUMENT_ROOT'] . $_SESSION['sesionc_Path'] . '/gestion/assets/images/inmuebles/';

				$fullpath = $directorio . $nombre;
				//echo "Nombre: " . $nombre;
				//echo "<BR> tipo: " . $qtipo;
				//echo "<BR> ID: " . $id_new;
				//echo "<BR> URL: " . $directorio;
				//echo "<BR> URL FULL: ". $fullpath;
				//echo "<BR> IMAGEN: ". $inombre;
				//echo "<BR> TMP: ". $tmp_nn;
				//echo "<BR> Error: ". $error;	

				if (move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $fullpath)) {
					//if (copy($_FILES['imagen']['tmp_name'],$fullpath)) { 
		?>
					<script>
						//alert("Datos cargados correctamente"); 
					</script>
				<?PHP } else {
					echo "<BR>Error en la subida de ficheros!\n"; ?>
					<script>
						alert("Ocurrio un Error!!");
					</script>
				<?PHP } ?>
			<?PHP } else { ?>
				<script>
					alert("Ocurrio un Error al guardar en DB!!");
				</script>
	<?PHP }
		}
	} ?>

<?PHP } ?>

<!-- Baja de Imagen -->
<?PHP
if ($_REQUEST['abm'] == 'bm' or $_REQUEST['abm'] == 'ba') {
	$query = "UPDATE imagen SET baja='1' WHERE idImagen='$_REQUEST[idImagen]'";
	$result = mysqli_query($conexion, $query);
	if (mysqli_affected_rows($conexion) > 0) { ?>
		<script>
			// alert("Imagen Eliminada correctamente"); 
		</script>
	<?PHP } else { ?>
		<script>
			alert("Ocurrio un Error!!");
		</script>
	<?PHP }; ?>
<?PHP }; ?>


<!-- Modificar de Imagen -->
<?PHP
if ($_REQUEST['abm'] == 'mm' or $_REQUEST['abm'] == 'ma') {

	$query = "UPDATE imagen SET
	ordenImagen='$_REQUEST[ordenImagen]',
	detalleImagen= '$_REQUEST[detalleImagen]'
	WHERE idImagen='$_REQUEST[idImagen]'";
	$result = mysqli_query($conexion, $query);
	if (mysqli_affected_rows($conexion) > 0) { ?>

	<?PHP } else { ?>
		<script>
			alert("Ocurrio un Error!!");
		</script>
	<?PHP }; ?>
<?PHP }; ?>

<?PHP
if ($_REQUEST['abm'] == 'a' or $_REQUEST['abm'] == 'ba' or $_REQUEST['abm'] == 'ma') { ?>

	<script>
		location.replace("../inmueble_abm_img.php?idImagen=<?PHP echo $_REQUEST['idInmueble']; ?>&idInmueble=<?PHP echo $_REQUEST['idInmueble']; ?>&abm=a");
	</script>

<?PHP } else { ?>

	<script>
		location.replace("../inmueble_abm.php?idInmueble=<?PHP echo $_REQUEST['idInmueble']; ?>&abm=m");
	</script>

<?PHP }; ?>