<?php
include("recursos/session.php");
if(isset($_SESSION['login_user_sys'])){
    header("location: sesion_iniciada.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario bd ifc02110</title>

    <!--FORM_VALIDATION START-->
    <?php include("recursos/form_validation.php")?>
    <!--FORM_VALIDATION END-->
    <h3>Introduzca sus datos</h3>

    <!--FORM START-->
    <form name="form" action="#" method="POST">
        <fieldset>
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" placeholder="username" value="<?php echo $username;?>">
            <label for="password">Contraseña:</label>
            <input type="password"id="password" name="password" placeholder="user" value="<?php echo $password;?>">
            <input type="submit"  class="button" name="submit" value="submit">
        </fieldset>
    </form>
    <?php echo "$error";?>
    <!--FORM END-->

    <!--REGISTRO START-->
    <?php include("recursos/registro_validation.php")?>
    <!--REGISTRO END-->

    <!--FORM REGISTRO START-->
    <h3>Nuevo registro</h3>
    <form action="recursos/registro_validation.php" method="POST">
        <fieldset>
        <label for="nombreR">Nombre:</label>
        <input type="text" name="nombreR" placeholder="Nombre" />
        <label for="apellidoR">Apellidos:</label>
        <input type="text" name="apellidoR"placeholder="Apellido" />
        <label for="userR">Usuario:</label>
        <input type="text" name="userR"placeholder="Usuario" />
        <label for="claveR">Contraseña:</label>
        <input type="password" name="claveR"placeholder="Clave" />
        <input type="submit" name="registrar" value="Registrar">        
        </fieldset>
    </form>
    <!--FORM REGISTRO END-->

    

</head>
<body>
    
</body>
</html>