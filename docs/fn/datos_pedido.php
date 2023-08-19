<?PHP
    //Si la Operacion que estoy haciendo NO es alta osea es "m" o "b" busco los datos del Pedidos  para mostrarlos en el Formulario
    if($_REQUEST['abm']!='a'){ 
        include('conexion.php');
        $querypedidos = "SELECT * FROM vista_pedidos WHERE idPedido = '$_REQUEST[idPedido]' ";
        $rtspedidos = mysqli_query($conexion, $querypedidos);
        $pedido=mysqli_fetch_assoc($rtspedidos);
        $idPropiedad = $pedido['idPropiedad'];
        $nombrePropiedad = $pedido['nombrePropiedad'];
        $idOperacion = $pedido['idOperacion'];
        $nombreOperacion = $pedido['nombreOperacion'];
        $localidadAPedido = $pedido['localidadAPedido'];
        $localidadBPedido = $pedido['localidadBPedido'];
        $localidadCPedido = $pedido['localidadCPedido'];
        $importeMonedaPedido = $pedido['importeMonedaPedido'];
        $importeDesdePedido = $pedido['importeDesdePedido'];
        $importeHastaPedido = $pedido['importeHastaPedido'];
        $caracteristicasPedido = $pedido['caracteristicasPedido'];
        if($pedido['baja']==0){
            $estado  = "<option active value='0'>Activo</option>";
            $estado .= "<option value='1'>Baja</option>";
        }else{
            $estado  = "<option value='0'>Activo</option>";
            $estado .= "<option active value='1'>Baja</option>";
        }

    } else {
        //En caso de que la Operacin sea "a" inicializo todos los campos.    
        $idPropiedad = '';
        $nombrePropiedad = '';
        $idOperacion = ''; 
        $nombreOperacion = ''; 
        $localidadAPedido = '';
        $localidadBPedido = '';
        $localidadCPedido = '';
        $importeMonedaPedido = '';
        $importeDesdePedido = '';
        $importeHastaPedido = '';
        $caracteristicasPedido = '';
        $comentariosPedido = '';
        $estado  = "<option value='0'>Activo</option>";
        $estado .= "<option value='1'>Baja</option>";



    }

?>