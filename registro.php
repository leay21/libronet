<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('php/connection.php');


$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['tel'];
$email=$_POST['email'];
$mensaje=$_POST['mensaje'];


$consulta = "INSERT INTO `contacto` (`nombre`, `apellido`, `tel`, `email`, `mensaje`)
 VALUES ('$nombre', '$apellido', '$telefono', '$email', '$mensaje')";

$resultado=mysqli_query($conexion,$consulta) or die("error de registro");

mysqli_close($conexion);
header("Location: php/consultas.php");

?>