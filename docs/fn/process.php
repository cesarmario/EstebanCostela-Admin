<?PHP 
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jan 1900 05:00:00 GMT"); // Indicamos una fecha en el pasado
header("Refresh: 5; URL='../index.php'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enlace Inmobiliario</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
</head>
<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="../index.php"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="index.html">
                <img src="../assets/images/logo/logo.png">
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="card mt-5">
            <!--div class="card-header">
                <h4 class="card-title">Procesando</h4>
            </div-->
            <div class="card-body">
			
            <div class="alert alert-light-warning color-warning"><img src="../assets/vendors/svg-loaders/oval.svg" class="me-4" style="width: 3rem" alt="procesando">
                Aguarde un momento en breve sera redirigido.
            </div>
            </div>
        </div>
    </div>
</body>
</html>