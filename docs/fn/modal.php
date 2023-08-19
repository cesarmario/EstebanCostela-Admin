<?PHP 

$datosmodal = "<button type='button' class='btn btn-primary block' data-bs-toggle='modal' data-bs-target='#DatosModal". $inmuebles['idInmueble'] ."'> Detalle</button>";
$datosmodal .= "<div class='modal fade' id='DatosModal". $inmuebles['idInmueble'] ."' tabindex='-1' role='dialog'";
$datosmodal .= "aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>";
$datosmodal .= "<div class='modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable'";
$datosmodal .= "role='document'>";
$datosmodal .= "<div class='modal-content'>";
$datosmodal .= "<div class='modal-header'>";
$datosmodal .= "<h5 class='modal-title' id='exampleModalCenterTitle'>". $inmuebles['tituloInmueble'] . "</h5>";
$datosmodal .= "<button type='button' class='close' data-bs-dismiss='modal'";
$datosmodal .= "aria-label='Close'>";
$datosmodal .= "<i data-feather='x'></i>";
$datosmodal .= "</button>";
$datosmodal .= "</div>";
$datosmodal .= "<div class='modal-body'>";
$datosmodal .= "<p>";
$datosmodal .= "Croissant jelly-o halvah chocolate sesame snaps. Brownie";
$datosmodal .= "caramels candy";
$datosmodal .= "canes chocolate cake";
$datosmodal .= "marshmallow icing lollipop I love. Gummies macaroon donut";
$datosmodal .= "caramels";
$datosmodal .= "biscuit topping danish.";
$datosmodal .= "</p>";
$datosmodal .= "</div>";
$datosmodal .= "<div class='modal-footer'>";
$datosmodal .= "<button type='button' class='btn btn-light-secondary'";
$datosmodal .= "data-bs-dismiss='modal'>";
$datosmodal .= "<i class='bx bx-x d-block d-sm-none'></i>";
$datosmodal .= "<span class='d-none d-sm-block'>Cerrar</span>";
$datosmodal .= "</button>";
$datosmodal .= "</div>";
$datosmodal .= "</div>";
$datosmodal .= "</div>";
$datosmodal .= "</div>";

?>
