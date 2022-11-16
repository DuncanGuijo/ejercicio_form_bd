<?php
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
    <h3>Introduzca sus datos para iniciar sesión</h3>

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

    <?php include("recursos/registro_validation.php")?>

    <!--FORM REGISTRO START-->
    <h3>Nuevo registro</h3>
    <?php echo $error?>
    <form action="recursos/registro_validation.php" method="POST">
        <fieldset>
        <label for="nombreR">Nombre:</label>
        <input type="text" name="nombreR" placeholder="Nombre" />
        <?php echo $errorNombre;?>
        <label for="apellidoR">Apellidos:</label>
        <input type="text" name="apellidoR"placeholder="Apellido" />
        <?php echo $errorApellido;?>
        <label for="userR">Usuario:</label>
        <input type="text" name="userR"placeholder="Usuario" />
        <?php echo $errorUsuario;?>
        <label for="claveR">Contraseña:</label>
        <input type="password" name="claveR"placeholder="Clave" /><br><br>
        <?php echo $errorPassword;?>
        <label for="emailR">Email:</label>
        <input type="text" name="emailR" placeholder="correo@ejemplo.com"/>
        <?php echo $errorEmail;?>
        <label for="githubR">Github:</label>
        <input type="text" name="githubR" placerholder="github.com/ejemplo"/>
        <?php echo $errorGithub;?>
        <input type="submit" name="registrar" value="Registrar">        
        </fieldset>
    </form>
    <!--FORM REGISTRO END-->

    

</head>
<body>
    
</body>
</html>