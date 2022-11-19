<?php
include("recursos/session.php");
if(isset($_SESSION['login_user_sys']) && !empty($_SESSION['login_user_sys'])){
    header("location: sesion_iniciada.php");
    $_SESSION['login_user_sys'] ="";
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
    <?php include("recursos/form_validation.php");?>
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
    <?php echo $errorR?>
    <form action="#" method="POST">
        <fieldset>
        <span>*</span>
        <label for="nombreR">Nombre:</label>
        <input type="text" name="nombreR" placeholder="Nombre" value="<?php echo $nombreR;?>"/>
        <?php echo $errorNombre;?>
        <span>*</span>
        <label for="apellidoR">Apellidos:</label>
        <input type="text" name="apellidoR"placeholder="Apellido" value="<?php echo $apellidoR;?>"/>
        <?php echo $errorApellido;?>
        <span>*</span>
        <label for="userR">Usuario:</label>
        <input type="text" name="userR"placeholder="Usuario" value="<?php echo $userR;?>"/>
        <?php echo $errorUsuario;?>
        <span>*</span>
        <label for="claveR">Contraseña:</label>
        <input type="password" name="claveR"placeholder="Contraseña" /><br><br>
        <?php echo $errorPassword;?>
        <span>*</span>
        <label for="claveR2">Repetir contraseña:</label>
        <input type="password" name="claveR2"placeholder="Repetir contraseña" /><br><br>
        <?php echo $errorPassword2;?>
        <span>*</span>
        <label for="emailR">Email:</label>
        <input type="text" name="emailR" placeholder="correo@ejemplo.com"/>
        <?php echo $errorEmail;?>
        <label for="githubR">Github:</label>
        <input type="text" name="githubR" placeholder="github.com/ejemplo"/>
        <?php echo $errorGithub;?>
        <input type="submit" name="registrar" value="Registrar">    
        <?php echo $errorUsuarioRepetido;?>    
        </fieldset>
    </form>
    <!--FORM REGISTRO END-->

    

</head>
<body>
    
</body>
</html>