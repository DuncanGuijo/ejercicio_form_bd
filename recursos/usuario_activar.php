<?php
include("conexion.php");
include("session.php");
$token = $_GET['token'];
$id = $_GET['id'];
$query = "SELECT * FROM usuarios WHERE token='$token' and id='$id'";
echo "<p>$query</p>";

$usuario_validado = "Su cuenta a sido validada correctamente.<br>
                    Pulse en el <a href='../02-form.php'>siguiente enlace</a> para volver a la pagina de inicio";

echo $usuario_validado;

?>