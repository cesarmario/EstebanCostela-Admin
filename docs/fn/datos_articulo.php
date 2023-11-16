<?PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

//Si la Operacion que estoy haciendo NO es alta osea es "m" o "b" busco los datos del Inmuebles  para mostrarlos en el Formulario
if ($_REQUEST['abm'] != 'a') {
    include('conexion.php');
    $queryarticulo = "SELECT * FROM novedad WHERE idNovedad = '$_REQUEST[idNovedad]' ";
    $idNovedad = $_REQUEST['idNovedad'];
    $rtsarticulo = mysqli_query($conexion, $queryarticulo);
    $articulo = mysqli_fetch_assoc($rtsarticulo);
    $tituloNovedad = $articulo['tituloNovedad'];
    $fechaNovedad = $articulo['fechaNovedad'];
    $detalleNovedad = $articulo['detalleNovedad'];
    $tipoNovedad = $articulo['tipoNovedad'];
    $archivoNovedad = $articulo['archivoNovedad'];
    $archivo = "../images/novedades/" .  $articulo['archivoNovedad'];
    $idCategoria = $articulo['idCategoria'];
    // $nombreCategoria = $articulo['nombreCategoria'];
    $nombreCategoria = "";
    /*$imagen = "<a href='" . $archivo . "' target='_blank'><img src='" .  $archivo . "' height='40%'></a>";*/
    //$imagen = "<img class='img-fluid w-100' src='" .  $archivo . "' alt=''>";
    $imagen = "";
    switch ($tipoNovedad) {
        case 'PDF':
            $nomTipoNovedad = "PDF";
            $imagen .= "<a href='" . $archivo . "' target='_BLANK'><img src='../images/novedades/icopdf.png' height='100px'></a>";
            break;
        case 'IMG':
            $nomTipoNovedad = "Imagen";
            $imagen .= "<img class='img-fluid w-100' src='" .  $archivo . "' alt=''>";
            break;
        case 'VID':
            $nomTipoNovedad = "Video";
            $imagen .= "<video width='auto'  height='400px' controls poster='../images/novedades/video.png'>";
            $imagen .= "<source src='" . $archivo . "' type='video/mp4'>";
            $imagen .= "</video>";
            break;
        case 'TXT':
            $nomTipoNovedad = "Solo Texto";
            $imagen .= "";
            break;
    };
} else {
    $idNovedad = '';
    $tituloNovedad = '';
    $fechaNovedad = date("Y-m-d");
    $detalleNovedad = '';
    $tipoNovedad = 'IMG';
    $archivoNovedad = '';
    $idCategoria = '';
    $nombreCategoria = '';
}

$querycategoria = "SELECT * FROM categoria ORDER BY nombreCategoria";
$rtscategoria = mysqli_query($conexion, $querycategoria);
// $categorias=mysqli_fetch_assoc($rtscategoria);