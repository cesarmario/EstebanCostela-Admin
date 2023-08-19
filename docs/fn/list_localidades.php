<?PHP
    include('conexion.php');
    $querylocalidades = "SELECT * FROM localidad ORDER BY idLocalidad ASC";
    $rtslocalidades = mysqli_query($conexion, $querylocalidades);
    $listado = "<table class='table table-striped' id='table1'>";
    $listado .= "<thead>";
    $listado .= "<tr>";
    $listado .= "<th>#</th>";
    $listado .= "<th>Nombre</th>";
    $listado .= "<th>Cod.Postal</th>";
    $listado .= "</tr>";
    $listado .= "</thead>";
    $listado .= "<tbody>";
    while($localidades=mysqli_fetch_assoc($rtslocalidades)){
        
        $listado .= "<tr>";
        $listado .= "<td>". $localidades['idLocalidad'] . "</td>";
        $listado .= "<td>". $localidades['nombreLocalidad'] . "</td>";
        $listado .= "<td><span class='badge bg-light-secondary'>" . $localidades['cpLocalidad'] . "</span></td>";
        $listado .= "</tr>";
    }
    $listado .= "</tbody>";
    $listado .= "</table>";
?>