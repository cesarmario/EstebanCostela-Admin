<?PHP
    include('conexion.php');
    //if ($_SESSION['rolUsu']!='1') { $filtro = " AND idUsuario=" . $_SESSION['idUsu']; }else{ $filtro = ""; };
    $filtro = "";
    $querypedidos = "SELECT * FROM vista_pedidos WHERE baja = 0 $filtro ORDER BY fechaPedido DESC";
    $rtspedidos = mysqli_query($conexion, $querypedidos);
    $listadoPedidos = "<table class='table table-striped' id='table1'>";
    $listadoPedidos .= "<thead>";
    $listadoPedidos .= "<tr>";
    $listadoPedidos .= "<th>Agente</th>";
    $listadoPedidos .= "<th>Propiedad</th>";
    $listadoPedidos .= "<th>Operación</th>";
    $listadoPedidos .= "<th>Localidades</th>";
    $listadoPedidos .= "<th>Importe desde</th>";
    $listadoPedidos .= "<th>Importe hasta</th>";
    $listadoPedidos .= "<th>Características</th>";
    $listadoPedidos .= "<th>Comentarios</th>";
    $listadoPedidos .= "<th></th>";
    $listadoPedidos .= "</tr>";
    $listadoPedidos .= "</thead>";
    $listadoPedidos .= "<tbody>";
    while($pedidos=mysqli_fetch_assoc($rtspedidos)){

        $localidades = $pedidos['localidadAPedido'];
        if(!empty($pedidos['localidadBPedido'])){$localidades .= " , ".$pedidos['localidadBPedido'];}
        if(!empty($pedidos['localidadCPedido'])){$localidades .= " , ".$pedidos['localidadCPedido'];}        

        $listadoPedidos .= "<tr>";
        $listadoPedidos .= "<td>". $pedidos['nombreAgente'] . "</td>";
        $listadoPedidos .= "<td>". $pedidos['nombrePropiedad'] . "</td>";
        $listadoPedidos .= "<td>". $pedidos['nombreOperacion'] . "</td>";
        $listadoPedidos .= "<td>". $localidades . "</td>";
        $listadoPedidos .= "<td><b>". $pedidos['importeMonedaPedido'] . "</b>&nbsp;". $pedidos['importeDesdePedido'] . "</td>";
        $listadoPedidos .= "<td><b>". $pedidos['importeMonedaPedido'] . "</b>&nbsp;". $pedidos['importeHastaPedido'] . "</td>";
        $listadoPedidos .= "<td>". $pedidos['caracteristicasPedido'] . "</td>";
        $listadoPedidos .= "<td><b>". $pedidos['comentariosPedido'] . "</td>";
        $listadoPedidos .= "<td><a href='pedido_abm.php?idPedido=". $pedidos['idPedido'] ."&abm=m' class='btn btn-info me-1 mb-1'>Editar</a></td>";
        $listadoPedidos .= "</tr>";
    }
    $listadoPedidos .= "</tbody>";
    $listadoPedidos .= "</table>";
?>