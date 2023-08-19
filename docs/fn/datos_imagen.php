<?PHP
include('conexion.php');
$queryimagenes = "SELECT * FROM imagen WHERE idImagen = '$_REQUEST[idImagen]' ";
$rtsimagenes = mysqli_query($conexion, $queryimagenes);
$imagenes=mysqli_fetch_assoc($rtsimagenes);
$imagen = "assets/images/inmuebles/" . str_pad($imagenes['idImagen'], 8, "0", STR_PAD_LEFT) . "." . $imagenes['tipoImagen'];
$nomimagen = str_pad($imagenes['idImagen'], 8, "0", STR_PAD_LEFT);
$ordenImagen=$imagenes['ordenImagen'];
$detalleImagen=$imagenes['detalleImagen'];
?>