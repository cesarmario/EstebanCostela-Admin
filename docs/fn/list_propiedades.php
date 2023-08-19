<?PHP
    include('conexion.php');
    $querypropiedades = "SELECT * FROM propiedad ORDER BY nombrePropiedad ASC";
    $rtspropiedades = mysqli_query($conexion, $querypropiedades);
    $listado = "<table class='table table-striped' id='table1'>";
    $listado .= "<thead>";
    $listado .= "<tr>";
    $listado .= "<th>#</th>";
    $listado .= "<th>Nombre</th>";
    $listado .= "<th>Estado</th>";
    $listado .= "<th>Acci&oacute;n</th>";
    $listado .= "</tr>";
    $listado .= "</thead>";
    $listado .= "<tbody>";
    while($propiedades=mysqli_fetch_assoc($rtspropiedades)){
        if($propiedades["baja"]==0){
            $estado="Activo";
            $btn="success";
        }else{
            $estado="Baja";
            $btn="danger";
        }
        
        $listado .= "<tr>";
        $listado .= "<td>". $propiedades['idPropiedad'] . "</td>";
        $listado .= "<td>". $propiedades['nombrePropiedad'] . "</td>";
        $listado .= "<td><span class='badge bg-light-" . $btn ."'>" . $estado . "</span></td>";
        if($propiedades['baja']==0){       
            $listado .= "<td><a href='fn/abm_opciones.php?idPropiedad=". $propiedades['idPropiedad'] . "&abm=bp' class='btn btn-danger me-1 mb-1'>Eliminar</a></td>"; 
        } else { 
            $listado .= "<td><a href='fn/abm_opciones.php?idPropiedad=". $propiedades['idPropiedad'] . "&abm=rp' class='btn btn-success me-1 mb-1'>Activar</a></td>";
        }
        $listado .= "</tr>";
    }
    $listado .= "</tbody>";
    $listado .= "</table>";
?>