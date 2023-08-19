<?PHP
    include('conexion.php');
    $queryoperaciones = "SELECT * FROM operacion ORDER BY nombreOperacion ASC";
    $rtsoperaciones = mysqli_query($conexion, $queryoperaciones);
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
    while($operaciones=mysqli_fetch_assoc($rtsoperaciones)){
        if($operaciones["baja"]==0){
            $estado="Activo";
            $btn="success";
        }else{
            $estado="Baja";
            $btn="danger";
        }
        
        $listado .= "<tr>";
        $listado .= "<td>". $operaciones['idOperacion'] . "</td>";
        $listado .= "<td>". $operaciones['nombreOperacion'] . "</td>";
        $listado .= "<td><span class='badge bg-light-" . $btn ."'>" . $estado . "</span></td>";
        if($operaciones['baja']==0){       
            $listado .= "<td><a href='fn/abm_opciones.php?idOperacion=". $operaciones['idOperacion'] . "&abm=bo' class='btn btn-danger me-1 mb-1'>Eliminar</a></td>"; 
        } else { 
            $listado .= "<td><a href='fn/abm_opciones.php?idOperacion=". $operaciones['idOperacion'] . "&abm=ro' class='btn btn-success me-1 mb-1'>Activar</a></td>";
        }
    
        $listado .= "</tr>";
    }
    $listado .= "</tbody>";
    $listado .= "</table>";


    
?>