<?php

Registro($_POST['name'], $_POST['tel'], $_POST['dom'], $_POST['email'], $_POST['turno']);

function Registro($name, $tel, $dom, $email, $turno){
	include 'conexion.php';
	$sentencia = "INSERT INTO `reg_empleados` (`n_empleado`, `nombre`, `tel`, `domicilio`, `email`, `turno`) VALUES (NULL, '$name', '$tel', '$dom', '$email', '$turno')";
	$resultado = mysqli_query($conexion, $sentencia);
	if($resultado){
		echo '<script>
		alert("Empleado creado con éxito");
		var pagina = "panel.php";
		function redir(){
			location.href = pagina;
		}
		setTimeout("redir()", 200);
		</script>';
	}else{
		echo "Error al realizar el cambio, intentelo de nuevo.".mysqli_error($conexion);
	}
}
?>