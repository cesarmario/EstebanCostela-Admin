<?PHP
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
include('conexion.php'); 
include('process.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);

if ($_REQUEST['abm']=='a' or $_REQUEST['abm']=='m'){

    if (!isset($_REQUEST['coordenadas']) or empty($_REQUEST['coordenadas'])){ ?>
		<script>
			alert("Debe seleccionar una Ubicacion!");
			window.history.back();
		</script>		
	<?PHP $validate = false; }
    if($validate = true){
        $query="UPDATE inmueble SET ubicacionInmueble='$_REQUEST[coordenadas]' WHERE idInmueble='$_REQUEST[idInmueble]'";
        $result = mysqli_query($conexion, $query);
        if (mysqli_affected_rows($conexion)>0){ ?>
            <script>
            location.replace("../inmuebles.php?abm=m&idInmueble=<?PHP echo $_REQUEST['idInmueble']?>");
            </script>
        <?PHP } else {?>
            <script>
                alert("Ocurrio un Error!!");
            </script>
        <?PHP }; 
    } ?>   
    <?PHP }

    if ($_REQUEST['abm']=='b'){

        $query="UPDATE inmueble SET ubicacionInmueble='' WHERE idInmueble='$_REQUEST[idInmueble]'";
        $result = mysqli_query($conexion, $query);
        if (mysqli_affected_rows($conexion)>0){ ?>
            <script>
            location.replace("../inmuebles.php?abm=m&idInmueble=<?PHP echo $_REQUEST['idInmueble']?>");
            </script>
        <?PHP } else {?>
            <script>
                alert("Ocurrio un Error!!");
            </script>
        <?PHP }; 
    } ?>   


