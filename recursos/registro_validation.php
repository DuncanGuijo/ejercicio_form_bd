<?php
include("conexion.php");

if(isset($_POST['registrar'])){
	$nombre = mysqli_real_escape_string($mysqli,$_POST['nombreR']);
	$apellido = mysqli_real_escape_string($mysqli,$_POST['apellidoR']);
	$usuario = mysqli_real_escape_string($mysqli,$_POST['userR']);
	$password = mysqli_real_escape_string($mysqli,$_POST['claveR']);

	$password_encriptada = sha1($password);//tengo que implementar la recepcion con sha1 tambien

	$sqluser = "SELECT usuario FROM usuarios WHERE usuario ='$usuario'";

	$resultadouser = $mysqli->query($sqluser);

	$filas = $resultadouser->num_rows;

	if($filas > 0){
		echo "<script>
				alert('El usuario ya existe');
				window.location = '../02-form.php';
			  </script>";
	}else{
		$sqlusuario = "INSERT INTO usuarios(nombre,apellidos,usuario,clave) 
						VALUES('$nombre','$apellido','$usuario','$password')";
        $resultadousuario = $mysqli->query($sqlusuario);
		if($resultadousuario > 0){
			echo "<script>
			alert('Registro correcto');
			window.location = '../02-form.php';
		  </script>";
		}else{			
			echo "<script>
			alert('Registro incorrecto');
			window.location = '../02-form.php';
		  </script>";
		}
	}
}
?>