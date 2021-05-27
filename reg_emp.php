<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="img/logos/tuercatracing.png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Asistencia Tracing</title>
</head>
<body>
    <!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
    <img src="img/logos/tuercablanca.png" width="30" height="30" class="d-inline-block align-top" alt="">
      ASISTENCIA TRACING
  </a>
  <ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="assist.php" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-outline-warning">Reporte</button></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="panel.php" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-outline-danger">Regresar</button></a>
  </li>
  </ul>
</nav>
<!-- FIN NAVBAR -->

<div class="container-fluid" style="background-color: rgba(0,0,0,0.7); width: 50%; border-radius: 10px; height: 88%; position: absolute; margin-left: 25%; margin-top: 2%;">
<center><h1>REGISTRO DE EMPLEADO</h1></center>
<form action="registro.php" method="POST">
<div style="margin-top: 1%;" class="form-group">
    <label style="font-weight: bold; color: white;" for="exampleFormControlSelect1">Nombre</label>
    <input required type="text" class="form-control" required name="name" placeholder="Nombre completo">
</div>
<div class="form-group">
    <label style="font-weight: bold; color: white;" for="exampleFormControlInput1">Teléfono</label>
    <input required type="text" class="form-control" required name="tel" style="width: 20%;" placeholder="Teléfono">
</div>
<div class="form-group">
    <label style="font-weight: bold; color: white;" for="exampleFormControlInput1">Domicilio</label>
    <input required type="text" class="form-control" name="dom" placeholder="Domicilio">
</div>
<div class="form-group">
    <label style="font-weight: bold; color: white;" for="exampleFormControlInput1">Email</label>
    <input required type="email" class="form-control" name="email" style="width: 50%;" placeholder="Email">
</div>
   <div class="form-group">
      <label for="inputState" style="font-weight: bold; color: white;">Turno</label>
      <select id="inputState" name="turno" class="form-control" style="width: 50%;">
        <option selected value="Matutino">Matutino</option>
        <option value="Vespertino">Vespertino</option>
      </select>
</div>
<div class="form-group">
    <center>
      <button type="submit" class="btn btn-outline-light btn-lg">Registrar</button>
    </center>
</div>
</form>

</div>
<div class="container-fluid" style="margin-top: 57%; position: absolute;">
<center>
<h1 style="color: black;">REGISTRO</h1>
</center>
<table class="table" style="margin-top: 1%;">
  <thead>
    <tr>
      <th style="text-align: center;" scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th style="text-align: center;" scope="col">Teléfono</th>
      <th scope="col">Domicilio</th>
      <th scope="col">Email</th>
      <th style="text-align: center;" scope="col">Turno</th>
    </tr>
  </thead>
  <tbody>
<?php
include 'conexion.php';
$consulta = "SELECT * FROM reg_empleados";
$resultado = mysqli_query($conexion, $consulta);
if($resultado){
while ($filas = mysqli_fetch_assoc($resultado)) { 
?>
    <tr>
      <th scope="row" style="text-align: center;"><?php echo utf8_encode($filas["n_empleado"]); ?></th>
      <td><?php echo utf8_encode($filas["nombre"]); ?></td>
      <td style="text-align: center;">
      <?php echo utf8_encode($filas["tel"]); ?>
      </td>
      <td>
      <?php echo utf8_encode($filas["domicilio"]); ?>
      </td>
      <td>
      <?php echo utf8_encode($filas["email"]); ?>
      </td>
      <td style="text-align: center;">
      <?php echo utf8_encode($filas["turno"]); ?>
      </center>
      </td>
      <td style='text-align: center;'> <a href="delete.php?id=<?php echo $filas['n_empleado']; ?>"><button type='button' class='btn btn error' style='background: red;'>Eliminar</button></a></td>
    </tr>
<?php   
  }
}
?>
  </tbody>
</table>
</div>

<img class="img-fluid" src="img/fondo.png">
</body>
<script>
        function checkIt(evt){
            evt = (evt) ? evt : window.event
                var charCode = (evt.which) ? evt.which : evt.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57)){
                    status = "ESTE CAMPO SOLO ACEPTA NUMEROS."
                    return false
                }
                status = "" 
                return true
            }
</script>
</html>
