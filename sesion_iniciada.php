<?php
include("recursos/conexion.php");
include("recursos/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login correcto</title>
</head>
<body>
    <h3>Login correcto</h3>
    <?php echo "BIENVENIDO: $confirmacion_user <br><br>";?>
    <a href="cerrar_sesion.php">Cerrar sesión</a>
    
</body>
</html>