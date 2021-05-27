<?php
  require'conexion.php';
  if(ISSET($_POST['search'])){
    $date1 = date("Y-m-d", strtotime($_POST['date1']));
    $date2 = date("Y-m-d", strtotime($_POST['date2']));
    $query=mysqli_query($conexion, "SELECT * FROM `registro` WHERE `fecha` BETWEEN '$date1' AND '$date2' ORDER BY `fecha` ASC") or die(mysqli_error());
    $row=mysqli_num_rows($query);
    if($row>0){
      while($fetch=mysqli_fetch_array($query)){
?>
  <tr>
    <td><?php echo $fetch['id_empleado']?></td>
    <td><?php echo $fetch['nombre']?></td>
    <td><?php echo $fetch['fecha']?></td>
    <td><?php echo $fetch['registro']?></td>
  </tr>
<?php
      }
    }else{
      echo'
      <tr>
        <td colspan = "4"><center>Registros no Existen</center></td>
      </tr>';
    }
  }else{
    $query=mysqli_query($conexion, "SELECT * FROM `registro`") or die(mysqli_error());
    while($fetch=mysqli_fetch_array($query)){
?>
  <tr>
    <td><?php echo $fetch['id_empleado']?></td>
    <td><?php echo $fetch['nombre']?></td>
    <td><?php echo $fetch['fecha']?></td>
    <td><?php echo $fetch['registro']?></td>
  </tr>
<?php
    }
  }
?>