<?php

//EN CASO DE TENER LOS DATOS DE INICIO DE SESSION
//REDIRECCIONA A LA PAGINA BIENVENIDO
if(isset($_SESSION['login_user_sys'])){
    header("location: sesion_iniciada.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
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



</head>
<body>
    
</body>
</html>