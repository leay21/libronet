<?php
include('connection.php');

$ID = $_POST['id'];
$NOMBRE=$_POST['txtnombre'];
$APELLIDO=$_POST['txtapellido'];
$TELEFONO=$_POST['txttel'];
$EMAIL=$_POST['txtemail'];
$MENSAJE=$_POST['txtmensaje'];


mysqli_query($conexion, "UPDATE `contacto` SET `nombre` = '$NOMBRE', `apellido` = '$APELLIDO', `tel` = '$TELEFONO',
`email` = '$EMAIL', `mensaje` = '$MENSAJE' WHERE `contacto`.`id` = '$ID'") or die ("Error al actualizar");

mysqli_close($conexion);
header("location:consultas.php");
?>
