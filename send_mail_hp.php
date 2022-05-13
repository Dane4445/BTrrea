<?php
	require "./conexion_restaurant.php";
	if ($recibido = isset($_POST['enviado_btn'])) {
		//datos del formulario
		$nombre = $_POST['nombre_txt'];
		$apellidos = $_POST['apellidos_txt'];
		$dni = $_POST['dni_txt'];
		$mail = $_POST['mail'];
		$mensaje =$_POST['mensaje_txt'];

		//datos mail
		$destinatario = "eabad@denelcentro.com";
		$asunto = "Contacto de formulario web";

		//contenido del mail
		$carta = "De: $nombre $apellidos <$mail>.\n";
		$carta .= "Asunto: $asunto\n";
		$carta .= "Mensaje: \n $mensaje";


		//guardar mensaje en bbdd

		//1- conexion
		if($conexion = mysqli_connect($servidor, $usuario, $password, $bbdd)){
			mysqli_query($conexion, "SET NAMES 'UTF8'");
			//2- seleccionar BBDD
			if(mysqli_select_db($conexion, $bbdd)){
				//3- definir consulta
				$consulta = "INSERT INTO mensajes (nombre, apellidos, dni, mail, mensaje) VALUES ('$nombre', '$apellidos', '$dni', '$mail', '$mensaje')";
				//4- ejecutar query
				mysqli_query($conexion, $consulta);
				//5- comprobar
				if(mysqli_errno($conexion) != 0){
					//hay error
					echo "<p>Nº error: ".mysqli_errno($conexion)."</p><p>Mensaje error: ".mysqli_error($conexion)."</p>";
				}else{
					//no hay error
					$enviado = mail($destinatario, $asunto, $carta);
					header("Location:./contactos.php?rec=$recibido&env=$enviado");
				}
			}
		}
	}

?>