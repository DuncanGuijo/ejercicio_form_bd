<?php
include("conexion.php");
include("funciones.php");

//Variables
$nombreR = $apellidoR = $userR = $emailR = $githubR = $token = "";

//Variables de errores
$errorNombre = $errorApellido = $errorUsuario = $errorPassword = $errorPassword2= $errorEmail = $errorGithub = $errorUsuarioRepetido='';
$errorR = 'NO';

if(isset($_POST['registrar'])){

	//asocio variables a la sesion
	$nombreR = $_SESSION['nombreR'] = recogerVar($_POST['nombreR']);
	$apellidoR = $_SESSION['apellidoR'] = recogerVar($_POST['apellidoR']);
	$userR = $_SESSION['userR'] = recogerVar($_POST['userR']);
	$passwordR = $_SESSION['claveR'] = recogerVar($_POST['claveR']);
	$passwordR2 = $_SESSION['claveR2'] = recogerVar($_POST['claveR2']);
	$emailR = $_SESSION['emailR'] = recogerVar($_POST['emailR']);
	$githubR = $_SESSION['githubR'] = recogerVar( $_POST['githubR']);

	//comprovaciones
	if(empty($_POST['nombreR']) || !ctype_alpha($_POST['nombreR'])){
		$errorNombre ="Introduzca un nombre valido.";
		$errorR = 'SI';
	}

	if(empty($_POST['apellidoR']) || !ctype_alpha($_POST['apellidoR'])){
		$errorApellido ="Introduzca un apellido valido.";
		$errorR = 'SI';
	}

	if(empty($_POST['userR']) || !ctype_alpha($_POST['userR'])){
		$errorUsuario ="Introduzca un usuario valido.";
		$errorR = 'SI';
	}

	if(empty($_POST['claveR'])){
		$errorPassword ="Introduzca una contraseña valida.";
		$errorR = 'SI';
	}

	if(empty($_POST['claveR2']) && ($_POST['claveR'] != $_POST['claveR2'])){
		$errorPassword2 ="La contraseña no coincide.";
		$errorR = 'SI';
	}

	if(empty($_POST['emailR']) || !filter_var($_POST['emailR'],FILTER_VALIDATE_EMAIL)){
		$errorEmail ="Introduzca una dirección de correo valida.";
		$errorR = 'SI';
	}


	if($errorR =='NO'){
		//saneamiento
		$nombreR = mysqli_real_escape_string($mysqli,$nombreR);
		$apellidoR = mysqli_real_escape_string($mysqli,$apellidoR);
		$userR = mysqli_real_escape_string($mysqli,$userR);
		$passwordR = mysqli_real_escape_string($mysqli,$passwordR);
		$emailR = mysqli_real_escape_string($mysqli,filter_var($emailR,FILTER_SANITIZE_EMAIL));
		$githubR = mysqli_real_escape_string($mysqli,$githubR);
		$fecha_creacion = date_create('Y-m-d');
		$token_length = strlen($passwordR);
		$permited_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$token = generate_token($permited_chars,$token_length);
		$fecha_en_unix = strtotime("now");

		$password_encriptada = sha1($password);//tengo que implementar la recepcion con sha1 tambien

		$sqluser = "SELECT usuario FROM usuarios WHERE usuario ='$userR'";

		$resultadouser = $mysqli->query($sqluser);

		$filas = $resultadouser->num_rows;

		if($filas > 0){
			$errorUsuarioRepetido ="Este usuario ya existe.";
		}else{
			$sqlusuario = "INSERT INTO usuarios(nombre,apellidos,usuario,clave,email,estado,rol,token,github,create_at,modified_at) 
							VALUES('$nombreR','$apellidoR','$userR','$passwordR','$emailR','A','U','$token','$githubR','$fecha_en_unix','$fecha_en_unix')";
        	$resultadousuario = $mysqli->query($sqlusuario);
			$id = mysqli_insert_id($mysqli);
			$_SESSION['login_user_sys']=$username;
			if($resultadousuario > 0){
				$_SESSION['login_user_sys']=$userR;
				$textomail = '<h1>Confirmación cuenta</h1>';
				$textomail .= "<p>Estimad $nombreR : </p>
				<p>Para confirmar su registro clique en el 
				<a href='recursos/usuario_activar.php?token=$token&id=$id'>siguiente enlace. </a><p>";
				echo $textomail;
				/*$url="registro_correcto.php";
				header("location:$url");
				exit;*/
			}else{			
				echo "<script>
				alert('Registro incorrecto');
				window.location = '../02-form.php';
		  	</script>";
			}
		}
	}/*else{
		$url=
		header('../02-form')
	}*/
}
?>