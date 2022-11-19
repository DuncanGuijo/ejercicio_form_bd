<?php
include("recursos/registro_validation.php");
include("recursos/conexion.php");
$id = mysqli_insert_id($mysqli);
$textomail = '<h1>Confirmación de cuenta</h1>
            <p>Estimad@ 
            </p>
            <p>Para confirmar su registro clique en el siguiente 
            <a href="recursos/usuario_activar.php?token=$token&id=$id">enlace</a></p>';
echo $textomail;
echo "NO CONSIGO GUARDAR EL ID CON mysqli_inser_id ni con mysql_fetch_assoc"
?>