<?PHP
//session_start();
//error_reporting(E_ALL);
if(!isset($_SESSION['idUsu'])) { ?>
     <script>
		//alert("Atencion\nNo ha Iniciado Sesion!");
		location.replace("./login.html"); 
	 </script>
<?PHP } ?>