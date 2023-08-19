<?PHP

    include('conexion.php');
    $set = mysqli_query($conexion, "SET @i=0;");
    $queryimagenes = "SELECT @i:=@i+1 AS posicion, imagen.* FROM imagen WHERE idInmueble = '$_REQUEST[idInmueble]' AND baja != '1' ORDER BY ordenImagen ASC";
    $rtsimagenes = mysqli_query($conexion, $queryimagenes);

    $caurosel  = "<div id='carouselExampleControls' class='carousel slide' data-bs-ride='carousel'>";
    $caurosel .= "<div class='carousel-inner'>";

/*  $caurosel .= "<div class='carousel-item active'>";
    $caurosel .= "<img src='assets/images/samples/architecture1.jpg' class='d-block w-100' alt='Image Architecture'>";
    $caurosel .= "</div>";    
    $caurosel .= "<div class='carousel-item'>";
    $caurosel .= "<img src='assets/images/samples/bg-mountain.jpg' class='d-block w-100' alt='Image Mountain'>";
    $caurosel .= "</div>";
    $caurosel .= "<div class='carousel-item'>";
    $caurosel .= "<img src='assets/images/samples/jump.jpg' class='d-block w-100' alt='Image Jump'>";
    $caurosel .= "</div>";
    $caurosel .= "</div>";
    $caurosel .= "<a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-bs-slide='prev'>";
    $caurosel .= "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
    $caurosel .= "<span class='visually-hidden'>Previous</span>";
    $caurosel .= "</a>";
    $caurosel .= "<a class='carousel-control-next' href='#carouselExampleControls' role='button' data-bs-slide='next'>";
    $caurosel .= "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
    $caurosel .= "<span class='visually-hidden'>Next</span>";
    $caurosel .= "</a>";
    $caurosel .= "</div>"; */

    $listado = "<table class='table table-lg'>";
    $listado .= "<thead>";
    $listado .= "<tr>";
    $listado .= "<th>#</th>";
    $listado .= "<th>Imagen</th>";
    $listado .= "<th>Descripci&oacute;n</th>";
    $listado .= "<th></th>";
    $listado .= "<th></th>";
    $listado .= "</tr>";
    $listado .= "</thead>";
    $listado .= "<tbody>";
    while($imagenes=mysqli_fetch_assoc($rtsimagenes)){

        $imagen = "assets/images/inmuebles/" . str_pad($imagenes['idImagen'], 8, "0", STR_PAD_LEFT) . "." . $imagenes['tipoImagen'];
        
        $listado .= "<tr>";
        //$listado .= "<td>". $imagenes['posicion'] . "</td>";
        $listado .= "<td>". $imagenes['ordenImagen'] . "</td>";
        $listado .= "<td><a href='". $imagen . "' target='_blank'><img src='". $imagen . "' height='60px'></a></td>";
        $listado .= "<td>". $imagenes['detalleImagen'] . "</td>";
        $listado .= "<td><a href='inmueble_abm_imgdet.php?idImagen=". $imagenes['idImagen'] . "&idInmueble=". $_REQUEST['idInmueble'] ."&abm=m" . $_REQUEST['abm'] ."' class='btn btn-info me-1 mb-1'><i class='fa-solid fa-pencil'></i></i></a></td>";
        $listado .= "<td><a href='fn/abm_img.php?idImagen=". $imagenes['idImagen'] . "&idInmueble=". $_REQUEST['idInmueble'] ."&abm=b" . $_REQUEST['abm'] ."' class='btn btn-danger me-1 mb-1'><i class='fa-solid fa-trash-can'></i></i></a></td>";
        $listado .= "</tr>";

//        $imgmodal  = "<div id='myModal' class='modal'>";
//        $imgmodal .= "<span class='close'>&times;</span>";
//        $imgmodal .= "<img class='modal-content' id='". $imagenes['idImagen'] ."'>";
//        $imgmodal .= "<div id='caption'></div>";
//        $imgmodal .= "</div>";

        if($imagenes['posicion']==1){$act="active";}else{$act="";}
        $caurosel .= "<div class='carousel-item ". $act ."'>";
        $caurosel .= "<img src='" . $imagen ."' class='d-block w-100' alt='". $imagenes['idImagen'] ."'>";
        $caurosel .= "<div class='carousel-caption d-none d-md-block'>";
        $caurosel .= "<p>". $imagenes['detalleImagen'] . "</p>";
        $caurosel .= "</div>";
        $caurosel .= "</div>";
    }
    $listado .= "</tbody>";
    $listado .= "</table>";

    $caurosel .= "</div>";
    $caurosel .= "<a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-bs-slide='prev'>";
    $caurosel .= "<span class='carousel-control-prev-icon'aria-hidden='true'></span>";
    $caurosel .= "<span class='visually-hidden'>Previous</span>";
    $caurosel .= "</a>";
    $caurosel .= "<a class='carousel-control-next' href='#carouselExampleControls' role='button' data-bs-slide='next'>";
    $caurosel .= "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
    $caurosel .= "<span class='visually-hidden'>Next</span>";
    $caurosel .= "</a>";
    $caurosel .= "</div>";

    $queryinmuebles = "SELECT * FROM vista_inmuebles WHERE idInmueble = '$_REQUEST[idInmueble]' ";
    $rtsinmuebles = mysqli_query($conexion, $queryinmuebles);
    $inmuebles=mysqli_fetch_assoc($rtsinmuebles);

?>