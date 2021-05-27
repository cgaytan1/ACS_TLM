<?php 
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="img/logos/tuercatracing.png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Asistencia Tracing</title>
</head>

<body style="background: #1F618D;">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="panel.php">
    <img src="img/logos/tuercablanca.png" width="30" height="30" class="d-inline-block align-top" alt="">
      ASISTENCIA TRACING
  </a>
  <ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="reg_emp.php" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-outline-success">Nuevo empleado</button></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="assist.php" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-outline-warning">Reporte</button></a>
  </li>
  </ul>
</nav>
<!-- FIN NAVBAR -->
<center><h1 style="margin-top: 2%;">TOMAR ASISTENCIA</h1></center>
<div class="container-fluid" style="background-color: rgba(0,0,0,0.7); width: 75%; border-radius: 10px; margin-left: 12%; margin-top: 1%;">
<form action="panel.php" method="POST">
<div class="form-group" style="margin-top: 1%;">
    <label style="font-weight: bold; color: white;">Turno:</label><br>
    <input type="submit" class="btn btn-success" value="Matutino" name="busca">
    <input type="submit" class="btn btn-warning" value="Vespertino" name="busca">
</div>
</form>
<form action="reg_assist.php" method="POST">
<div class="form-group" style="margin-top: 1%;">
    <label style="font-weight: bold; color: white;">Fecha</label>
    <input type="date" style="width: 17%;" required class="form-control" id="fechaActual" name="fecha">
</div>
<?php
$busca = $_POST["busca"];

error_reporting(0);
include 'conexion.php';
$consulta = "SELECT * FROM reg_empleados WHERE turno LIKE '".$busca."%'";
$resultado = mysqli_query($conexion, $consulta);
if (!empty($busca)) {
?>
<table class="table" style="margin-top: 1%;">
  <thead>
    <tr>
      <th style="color: white; text-align: center;" scope="col">ID</th>
      <th style="color: white; text-align: center;" scope="col">Nombre</th>
      <th style="color: white; text-align: center;" scope="col">Asistencia</th>
      <th style="color: white; text-align: center;" scope="col">Falta</th>
      <th style="color: white; text-align: center;" scope="col">Retardo</th>
      <th style="color: white; text-align: center;" scope="col">Justificación</th>
    </tr>
  </thead>
<tbody>
<?php
}else{
?>
<center><h5>Selecciona un turno... &#129488;</h5></center>
<?php
}
?>
<?php
if ($busca == 'Matutino') {
?>
<center><h1>MATUTINO</h1></center>
<?php
}elseif($busca == 'Vespertino') {
?>
<center><h1>VESPERTINO</h1></center>
<?php
}
?>
<?php
if($resultado && !empty($busca)){
while ($filas = mysqli_fetch_assoc($resultado)) { 
?>
    <tr>
      <th scope="row" style="color: white; text-align: center;"><?php echo utf8_encode($filas["n_empleado"]); ?></th>
      <td style="color: white;"><?php echo utf8_encode($filas["nombre"]); ?></td>
      <input type="hidden" value="<?php echo $filas["n_empleado"]; ?>" name="num[]">
      <input type="hidden" value="<?php echo $filas["nombre"]; ?>" name="names[]">
      <td style="color: white; text-align: center;">
      <input style="width: 25px; height: 25px;" type="checkbox" onclick="boton()" value="Asistencia" id="check" name="check[]">
      </td>
      <td style="color: white; text-align: center;">
      <input style="width: 25px; height: 25px;" type="checkbox" onclick="boton()" value="Falta" id="check" name="check[]">
      </td>
      <td style="color: white; text-align: center;">
      <input style="width: 25px; height: 25px;" type="checkbox" onclick="boton()" value="Retardo" id="check" name="check[]">
      </td>
      <td style="color: white; text-align: center;">
      <input style="width: 25px; height: 25px;" type="checkbox" onclick="boton()" value="Justificación" id="check" name="check[]">
      </center>
      </td>
    </tr>
<?php
	}
}
?>
  </tbody>
</table>
<?php
if (!empty($busca)) {
?>
<div class="form-group">
    <center>
      <button id="bot" type="submit" class="btn btn-outline-light btn-lg">Registrar</button><br><br>
    </center>
</div> 
</div>
<?php
}
?>
</body>
</html>

<script type="text/javascript">
window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
  document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
}
</script>
