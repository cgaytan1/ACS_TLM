<?php
include 'conexion.php';

$id = $_POST["num"];

for ($i=0; $i < count($id) ; $i++) { 

	$q="INSERT INTO `registro` (`id`,`id_empleado`, `nombre`, `fecha`, `registro`) VALUES (NULL,'".$_POST['num'][$i]."','".$_POST['names'][$i]."','".$_POST['fecha']."','".$_POST['check'][$i]."') "; 

    $result = $conexion->query($q) or trigger_error("Query Failed! SQL: $q - Error: ".mysqli_error(), E_USER_ERROR);
}

if($result){
		echo '<script>
		alert("Registro creado con éxito");
		var pagina = "panel.php";
		function redir(){
			location.href = pagina;
		}
		setTimeout("redir()", 200);
		</script>';
	}else{
		echo "Error al realizar el cambio, intentelo de nuevo.".mysqli_error($conexion);
	}
?>