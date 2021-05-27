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
  <a class="navbar-brand" href="index.php">
    <img src="img/logos/tuercablanca.png" width="30" height="30" class="d-inline-block align-top" alt="">
      ASISTENCIA TRACING
  </a>
  <ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="reg_emp.php" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-outline-success">Nuevo empleado</button></a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="panel.php" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-outline-danger">Regresar</button></a>
  </li>
  </ul>
</nav>
<!-- FIN NAVBAR -->

<div class="col-md-12 well">
<div style="padding-top: 2%;">
<form method="POST" action="">
  <label style="font-weight: bold;">Fecha Desde:</label>
  <input type="date" style="width: 15%;" class="form-control" placeholder="Start"  name="date1">
  <label style="font-weight: bold;">Hasta:</label>
  <input type="date" style="width: 15%;" id="fechaActual" class="form-control" placeholder="End"  name="date2">
  <div style="padding-top: 1%;">
  <button class="btn btn-primary" name="search">Buscar</button>
  <a href="assist.php" type="button" class="btn btn-success">Refrescar</a>
  </div>
</form>
</div>
<?php
error_reporting(0);
$fecha = $_POST['date1'];
if (empty($fecha)) {
?>
<center><h5 style="padding-top: 5%;">Selecciona una fecha... &#129488;</h5></center>
<?php
}else{
?>
<center><h1 style="padding-top: 2%;">REPORTE DE ASISTENCIA</h1></center>
<div class="table-responsive">
<table class="table table-bordered">
        <thead class="alert-info">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Registro</th>
          </tr>
        </thead>
        <tbody>
          <?php include'range.php';
          } 
          ?>  
        </tbody>
      </table>
</div>
  </div>
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

