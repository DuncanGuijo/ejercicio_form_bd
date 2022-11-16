<?php
include("conexion.php");

$errorNombre = $errorApellido = $errorUsuario = $errorPassword = $errorEmail = $errorGithub ='';
$error= 'SI';

if(isset($_POST['registrar'])){

	//comprovaciones
	if(empty($_POST['nombreR']) || !ctype_alpha($_POST['nombreR'])){
		$errorNombre ="Introduzca un nombre valido";
		$error = 'SI';

	}

	if(empty($_POST['apellidoR']) || !ctype_alpha($_POST['apellidoR'])){
		$errorApellido ="Introduzca un apellido valido";
		$error = 'SI';
	}

	if(empty($_POST['userR']) || !ctype_alpha($_POST['userR'])){
		$errorUsuario ="Introduzca un usuario valido";
		$error = 'SI';
	}

	if(empty($_POST['claveR']) || !ctype_alpha($_POST['claveR'])){
		$errorPassword ="Introduzca una contraseña valida";
		$error = 'SI';
	}

	$error='SI';

	if($error='NO'){
		//saneamiento
		$nombre = mysqli_real_escape_string($mysqli,$_POST['nombreR']);
		$apellido = mysqli_real_escape_string($mysqli,$_POST['apellidoR']);
		$usuario = mysqli_real_escape_string($mysqli,$_POST['userR']);
		$password = mysqli_real_escape_string($mysqli,$_POST['claveR']);
		$email = filter_var($_POST['emailR'],FILTER_SANITIZE_EMAIL);
		$github = mysqli_real_escape_string($mysqli,$_POST['githubR']);
		$fecha_creacion = date_create('Y-m-d');
		$fecha_en_unix = strtotime("now");

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
			$sqlusuario = "INSERT INTO usuarios(nombre,apellidos,usuario,clave,email,estado,rol,token,github,create_at,modified_at) 
							VALUES('$nombre','$apellido','$usuario','$password','$email','A','U','token','$github','$fecha_en_unix','$fecha_en_unix')";
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
}
?>