<?PHP
include('conexion.php');
$querynovedades = "SELECT * FROM novedad ORDER BY fechaNovedad DESC";
$rtsnovedades = mysqli_query($conexion, $querynovedades);

$listado = "<table class='table table-striped' id='table1'>";
$listado .= "<thead>";
$listado .= "<tr>";
$listado .= "<th></th>";
$listado .= "<th>Fecha Articulo</th>";
$listado .= "<th>Titulo</th>";
$listado .= "<th>Fecha</th>";
$listado .= "<th>Estado</th>";
$listado .= "<th></th>";
$listado .= "<th></th>";
$listado .= "</tr>";
$listado .= "</thead>";
$listado .= "<tbody>";
while ($articulos = mysqli_fetch_assoc($rtsnovedades)) {
    if ($articulos["baja"] == 0) {
        $estado = "Activo";
        $btn = "success";
    } else {
        $estado = "Baja";
        $btn = "danger";
    }

    $imagen = ".../images/novedades/" . $articulo['archivoNovedad'];

    switch ($articulos['tipoNovedad']) {
        case 'PDF':
            $icoTipoNovedad = "bi bi-file-text";
            break;
        case 'IMG':
            $icoTipoNovedad = "bi bi-card-image";
            break;
        case 'VID':
            $icoTipoNovedad = "bi bi-youtube";
            break;
        case 'TXT':
            $icoTipoNovedad = "bi bi-card-text";
            break;
    };

    $datosmodal = "<button type='button' class='btn btn-primary block' data-bs-toggle='modal' data-bs-target='#DatosModal" . $articulos['idNovedad'] . "'><i class='" . $icoTipoNovedad . "'></i></button>";
    $datosmodal .= "<div class='modal fade' id='DatosModal" . $articulos['idNovedad'] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>";
    $datosmodal .= "<div class='modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable' role='document'>";
    $datosmodal .= "<div class='modal-content'>";
    $datosmodal .= "<div class='modal-header'>";
    $datosmodal .= "<h5 class='modal-title' id='exampleModalCenterTitle'><i class='bi bi-caret-down-square-fill'></i>&nbsp;" . $articulos['tituloNovedad'] . "</h5>";
    $datosmodal .= "<button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>";
    $datosmodal .= "<i data-feather='x'></i>";
    $datosmodal .= "</button>";
    $datosmodal .= "</div>";
    $datosmodal .= "<div class='modal-body'>";
    $datosmodal .= "<span class='badge bg-light-success'><i class='bi bi-calendar'></i>&nbsp;" . $articulos['fechaNovedad']  . "</span>";
    $datosmodal .= "<p>";
    $datosmodal .= "<br><i class='bi bi-info-square-fill'></i>&nbsp;<b>Detalle:</b>&nbsp;" .  $articulos['detalleNovedad'];
    $datosmodal .= "</p>";
    $datosmodal .= "</div>";
    $datosmodal .= "<div class='modal-footer'>";
    $datosmodal .= "<button type='button' class='btn btn-light-secondary'";
    $datosmodal .= "data-bs-dismiss='modal'>";
    $datosmodal .= "<i class='bx bx-x d-block d-sm-none'></i>";
    $datosmodal .= "<span class='d-none d-sm-block'>X Cerrar</span>";
    $datosmodal .= "</button>";
    $datosmodal .= "</div>";
    $datosmodal .= "</div>";
    $datosmodal .= "</div>";
    $datosmodal .= "</div>";

    $listado .= "<tr>";
    /*$listado .= "<td>" . $datosmodal . "</td>"; */
    $listado .= "<td><a href='articulo.php?idNovedad=" . $articulos['idNovedad'] . "&abm=v' class='btn btn-success me-1 mb-1'><i class='" . $icoTipoNovedad . "'></i></a></td>";
    $listado .= "<td>" . date('d/m/Y', strtotime($articulos['fechaNovedad'])) . "</td>";
    $listado .= "<td>" . $articulos['tituloNovedad'] . "</td>";
    $listado .= "<td>" . date('d/m/Y', strtotime($articulos['fechaAlta'])) . "</td>";
    $listado .= "<td><span class='badge bg-light-" . $btn . "'>" . $estado . "</span></td>";
    $listado .= "<td><a href='articulo_abm.php?idNovedad=" . $articulos['idNovedad'] . "&abm=m' class='btn btn-info me-1 mb-1'>Editar</a></td>";

    if ($articulos['baja'] == 0) {
        $listado .= "<td><a href='fn/abm_articulo.php?idNovedad=" . $articulos['idNovedad'] . "&abm=b' class='btn btn-danger me-1 mb-1'>Eliminar</a></td>";
    } else {
        $listado .= "<td><a href='fn/abm_articulo.php?idNovedad=" . $articulos['idNovedad'] . "&abm=r' class='btn btn-success me-1 mb-1'>Activar</a></td>";
    }
    $listado .= "</tr>";
}
$listado .= "</tbody>";
$listado .= "</table>";
