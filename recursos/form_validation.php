<?php
$username= $password= $error = "";

if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        $error = "No se permiten campos vacios";
    }else{
        $username=$_POST['username'];
        $password =$_POST['password'];
        include("conexion.php");
        //declaramos la consulta
        $sql = "SELECT * FROM usuarios WHERE usuario = '" .$username . "' and clave = '" .$password. "';";
        //enviamos la consulta con la conexion y los datos que pedimos
        $query = mysqli_query($mysqli,$sql);
        //con rows cuantificamos el numero de filas del resultado
        $counter = mysqli_num_rows($query);
    if($counter==1){
            //guardamos username en SESSION
            $_SESSION['login_user_sys']=$username;
            $fila = mysqli_fetch_assoc($query);
            echo $fila['nombre'];
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['rol'] = $fila['rol'];
            switch ($fila['rol']){
                case 'U':
                    echo $fila['id'];
                    header("location:sesion_iniciada.php");
                    break;
                case 'A':
                    header("location:../admin.php");
                case 'E':
                    header("location:../editor.php");
                default:
                    header("location:../sesion_iniciada.php");
            }
        }else{
            $error = "Usuario o contraseña no validas.";
        }
    }
}

?>