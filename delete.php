<?php
	EliminarEmpleado($_GET['id']);

	function EliminarEmpleado($id){
		include 'conexion.php';
		$sentencia = "DELETE FROM `reg_empleados` WHERE `reg_empleados`.`n_empleado` = '".$id."'";
		$resultado = mysqli_query($conexion, $sentencia);
		if($resultado){
		echo $id;
		echo '<script>
		alert("Empleado eliminado con éxito");
		var pagina = "reg_emp.php";
		function redir(){
			location.href = pagina;
		}
		setTimeout("redir()", 200);
		</script>';
	}else{
		echo $id;
		echo "Error al realizar el cambio, intentelo de nuevo.";
	}
	}
?>