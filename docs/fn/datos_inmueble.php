<?PHP
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    
    error_reporting(E_ALL);

    //Si la Operacion que estoy haciendo NO es alta osea es "m" o "b" busco los datos del Inmuebles  para mostrarlos en el Formulario
    if($_REQUEST['abm']!='a'){ 
        include('conexion.php');
        $queryinmueble = "SELECT * FROM vista_inmuebles WHERE idInmueble = '$_REQUEST[idInmueble]' ";
        $rtsinmueble = mysqli_query($conexion, $queryinmueble);
        $inmueble=mysqli_fetch_assoc($rtsinmueble);
        $idPropiedad = $inmueble['idPropiedad'];
        $nombrePropiedad = $inmueble['nombrePropiedad'];
        $idOperacion = $inmueble['idOperacion'];
        $nombreOperacion = $inmueble['nombreOperacion'];
        $idLocalidad = $inmueble['idLocalidad'];
        $nombreLocalidad = $inmueble['nombreLocalidad'];
        $tituloInmueble = $inmueble['tituloInmueble'];
        $descripcionInmueble = $inmueble['descripcionInmueble'];
        $domicilioCalleInmueble = $inmueble['domicilioCalleInmueble'];
        $domicilioNumeroInmueble = $inmueble['domicilioNumeroInmueble'];
        $domicilioOrientacionInmueble = $inmueble['domicilioOrientacionInmueble'];
        $ubicacionInmueble = $inmueble['ubicacionInmueble'];
        $habitacionesInmueble = $inmueble['habitacionesInmueble'];
        $banosInmueble = $inmueble['banosInmueble'];
        $superficieCubiertaInmueble = $inmueble['superficieCubiertaInmueble'];
        $superficieTotalInmueble = $inmueble['superficieTotalInmueble'];
        $tipoSuperficieTotalInmueble = $inmueble['tipoSuperficieTotalInmueble'];
        $informacionAdicionalInmueble = $inmueble['informacionAdicionalInmueble'];
        $informacionPrivadaInmueble = $inmueble['informacionPrivadaInmueble'];        
        $valorInmueble = $inmueble['valorInmueble'];
        $monedaInmueble = $inmueble['monedaInmueble'];
        $plantasInmueble = $inmueble['plantasInmueble'];
        $cloacaInmueble = $inmueble['cloacaInmueble'];
        $gasNaturalInmueble = $inmueble['gasNaturalInmueble'];
        $pavimentoInmueble = $inmueble['pavimentoInmueble'];
        $tipoAguaCalienteInmueble = $inmueble['tipoAguaCalienteInmueble'];
        $aguaCorrienteInmueble = $inmueble['aguaCorrienteInmueble'];
        $frenteTerrenoInmueble = $inmueble['frenteTerrenoInmueble'];
        $largoTerrenoInmueble = $inmueble['largoTerrenoInmueble'];
        $antiguedadInmueble = $inmueble['antiguedadInmueble'];
        $estadoInmueble = $inmueble['estadoInmueble'];
        $mejorasInmueble = $inmueble['mejorasInmueble'];
        $cocheraInmueble = $inmueble['cocheraInmueble'];
        $tipoCocheraInmueble = $inmueble['tipoCocheraInmueble'];
        $vehiculosCocheraInmueble = $inmueble['vehiculosCocheraInmueble'];
        $domicilio = $inmueble['domicilioCalleInmueble'];
        if(!empty($inmueble['domicilioNumeroInmueble'])){$domicilio .= " " . $inmueble['domicilioNumeroInmueble'];}
        if(!empty($inmueble['domicilioOrientacionInmueble'])){$domicilio .= " " . $inmueble['domicilioOrientacionInmueble'];}
    } else {
        //En caso de que la Operacin sea "a" inicializo todos los campos.    
        $idPropiedad = '';
        $nombrePropiedad = '';
        $idOperacion = ''; 
        $nombreOperacion = ''; 
        $idLocalidad = ''; 
        $nombreLocalidad = ''; 
        $tituloInmueble = ''; 
        $descripcionInmueble = ''; 
        $domicilioCalleInmueble = ''; 
        $domicilioNumeroInmueble = ''; 
        $domicilioOrientacionInmueble = '';
        $ubicacionInmueble = ''; 
        $habitacionesInmueble = ''; 
        $banosInmueble = ''; 
        $superficieCubiertaInmueble = ''; 
        $superficieTotalInmueble = ''; 
        $informacionAdicionalInmueble = '';
        $informacionPrivadaInmueble = ''; 
        $valorInmueble = ''; 
        $monedaInmueble = ''; 
        $plantasInmueble =''; 
        $cloacaInmueble = ''; 
        $gasNaturalInmueble = ''; 
        $pavimentoInmueble = ''; 
        $tipoAguaCalienteInmueble = ''; 
        $aguaCorrienteInmueble = ''; 
        $frenteTerrenoInmueble = ''; 
        $largoTerrenoInmueble = ''; 
        $antiguedadInmueble = ''; 
        $estadoInmueble = ''; 
        $mejorasInmueble = ''; 
        $cocheraInmueble = ''; 
        $tipoCocheraInmueble = ''; 
        $vehiculosCocheraInmueble = ''; 
        $domicilio = "";
     }

?>