<?PHP
    session_start();
    include('conexion.php');
    //if ($_SESSION['rolUsu']!='1') { $filtro = " AND idUsuario=" . $_SESSION['idUsu']; }else{ $filtro = ""; };
    //$queryconsultas = "SELECT * FROM vista_consultas WHERE baja = 0 $filtro ORDER BY fechaConsulta DESC";
    $queryconsultas = "SELECT * FROM vista_consultas WHERE baja = 0 ORDER BY fechaConsulta DESC";
    $rtsconsultas = mysqli_query($conexion, $queryconsultas);
    $listadoConsultas = "<table class='table table-striped' id='table1'>";
    $listadoConsultas .= "<thead>";
    $listadoConsultas .= "<tr>";
    $listadoConsultas .= "<th>Fecha</th>";
    $listadoConsultas .= "<th>Nombre y Apellido</th>";
    $listadoConsultas .= "<th>Inmueble</th>";
    $listadoConsultas .= "<th>Consulta</th>";
    $listadoConsultas .= "<th>Respuesta</th>";
    $listadoConsultas .= "<th>Fecha de Respuesta</th>";
    $listadoConsultas .= "<th></th>";
    $listadoConsultas .= "</tr>";
    $listadoConsultas .= "</thead>";
    $listadoConsultas .= "<tbody>";
    while($consultas=mysqli_fetch_assoc($rtsconsultas)){
        $listadoConsultas .= "<tr>";
        $listadoConsultas .= "<td>". $consultas['fechaConsulta'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['nombreConsulta'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['tituloInmueble'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['comentarioConsulta'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['respuestaConsulta'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['fechaRespuestaConsulta'] . "</td>";
        if ($consultas['idUsuario']==$_SESSION['idUsu'] or $_SESSION['rolUsu']=='1') {
            if(!empty($consultas['respuestaConsulta'])){$btn="outline-primary";$btnlabel="Detalles";}else{$btn="info";$btnlabel="Responder";}
            $listadoConsultas .= "<td><a href='consulta_abm.php?idConsulta=". $consultas['idConsulta'] ."' class='btn btn-" . $btn . " me-1 mb-1'>".$btnlabel."</a></td>";
        }else{ $filtro = ""; 
            $listadoConsultas .= "<td></td>";
        };

    $listadoConsultas .= "</tr>";
    }
    $listadoConsultas .= "</tbody>";
    $listadoConsultas .= "</table>";
?>
