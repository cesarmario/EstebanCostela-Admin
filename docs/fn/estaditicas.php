<?PHP
    include('conexion.php');
    $filtro = "";
    if ($_SESSION['rolUsu']!='1') { 
        $filtro = " AND idUsuario=" . $_SESSION['idUsu'];
        }
    $totalInmuebles = 0;
    $queryInmuebles = "SELECT COUNT(`idInmueble`) AS totalInmuebles FROM inmueble WHERE baja = '0' GROUP BY baja";
    $rtsInmuebles = mysqli_query($conexion, $queryInmuebles);
    if (mysqli_num_rows($rtsInmuebles)>0){
        $inmuebles=mysqli_fetch_assoc($rtsInmuebles);
        $totalInmuebles = $inmuebles['totalInmuebles'];
    } else { 
        $totalInmuebles = '0';
    }    

    $queryConsultas = "SELECT COUNT(`idConsulta`) AS totalConsultas FROM consulta WHERE baja = '0' $filtro GROUP BY baja";
    $rtsConsultas = mysqli_query($conexion, $queryConsultas);
    if (mysqli_num_rows($rtsConsultas)>0){
        $consultas=mysqli_fetch_assoc($rtsConsultas);
        $totalConsultas = $consultas['totalConsultas'];
    } else { 
        $totalConsultas = '0';
    }  

    $queryPedidos = "SELECT COUNT(`idPedido`) AS totalPedidos FROM pedido WHERE baja = '0' GROUP BY baja";
    $rtsPedidos = mysqli_query($conexion, $queryPedidos);
    if (mysqli_num_rows($rtsPedidos)>0){
        $pedidos=mysqli_fetch_assoc($rtsPedidos);        
        $totalPedidos = $pedidos['totalPedidos'];
    } else { 
        $totalPedidos = '0';
    } 

?>