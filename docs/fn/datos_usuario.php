<?PHP
include('conexion.php');
//Si la Operacion que estoy haciendo NO es alta osea es "m" o "b" busco los datos del Inmuebles  para mostrarlos en el Formulario
if($_REQUEST['abm']!='a'){ 
    $queryusuario = "SELECT * FROM usuario WHERE idUsuario = '$_REQUEST[idUsuario]' ";
    $rtsusuario = mysqli_query($conexion, $queryusuario);
    $usuario=mysqli_fetch_assoc($rtsusuario);
    $uidUsuario = $usuario['uidUsuario'];
    $pswUsuario = $usuario['pswUsuario'];
    $nombreUsuario = $usuario['nombreUsuario'];
    $matriculaUsuario = $usuario['matriculaUsuario'];
    $mailUsuario = $usuario['mailUsuario'];
    $telefonoUsuario = $usuario['telefonoUsuario'];
    $domicilioUsuario = $usuario['domicilioUsuario'];
    $nombre = $usuario['logoUsuario'];
    $directorio = "/gestion/assets/images/usuarios/";
    $imagen=$directorio.$nombre;

    if (is_dir($imagen)){
        
    }

} else {
    //En caso de que la Operacin sea "a" inicializo todos los campos.    
    $uidUsuario = "";
    $pswUsuario = "";
    $nombreUsuario = "";
    $matriculaUsuario = "";
    $mailUsuario = "";
    $telefonoUsuario = "";
    $domicilioUsuario = "";
    $nombre = "";
    $imagen="";
}
?>