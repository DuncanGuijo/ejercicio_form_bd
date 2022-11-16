<<<<<<< HEAD
<?php
session_start();//iniciamos session
$username= $password= $error = "";

if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        $error = "No se permiten campos vacios";
    }else{
        $username=$_POST['username'];
        $password =$_POST['password'];
        include("conexion.php");
        //declaramos la consulta
        $sql = "SELECT usuario, clave FROM usuarios WHERE usuario = '" .$username . "' and clave = '" .$password. "';";
        //enviamos la consulta con la conexion y los datos que pedimos
        $query = mysqli_query($mysqli,$sql);
        //con rows cuantificamos el numero de filas del resultado
        $counter = mysqli_num_rows($query);
    if($counter==1){
            //confirmamos username en SESSION
            $_SESSION['login_user_sys']=$username;
            header("location: sesion_iniciada.php"); //EN CASO DE QUERER REDIRECCIONAR LA PAG

        }else{
            $error = "Usuario o contraseña no validas.";
        }
    }
}

=======
<?php
session_start();
$username= $password= $error = "";

if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        $error = "No se permiten campos vacios";
    }else{
        $username=$_POST['username'];
        $password =$_POST['password'];
        include("conexion.php");
        //declaramos la consulta
        $sql = "SELECT usuario, clave FROM usuarios WHERE usuario = '" .$username . "' and clave = '" .$password. "';";
        //enviamos la consulta con la conexion y los datos que pedimos
        $query = mysqli_query($mysqli,$sql);
        //con rows cuantificamos el numero de filas del resultado
        $counter = mysqli_num_rows($query);
    if($counter==1){
            //guardamos username en SESSION
            $_SESSION['login_user_sys']=$username;
            header("location: sesion_iniciada.php"); //EN CASO DE QUERER REDIRECCIONAR LA PAG
        }else{
            $error = "Usuario o contraseña no validas.";
        }
    }
}
>>>>>>> master
?>