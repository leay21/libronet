<?php

include('connection.php');

$ID = $_POST['txtid'];
mysqli_query($conexion, "DELETE FROM contacto WHERE id='$ID'") or die ("error al eliminar");

mysqli_close($conexion);
header("location:consultas.php");

?> 