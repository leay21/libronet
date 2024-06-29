<?php
session_start();
include('connection.php');

// Recibir el JSON de la solicitud y decodificarlo
$data = json_decode(file_get_contents('php://input'), true);

// Sanitizar las entradas
$nombre_usuario = $conn->real_escape_string($data['nombre_usuario']);
$apellidoP_usuario = $conn->real_escape_string($data['apellidoP_usuario']);
$apellidoM_usuario = $conn->real_escape_string($data['apellidoM_usuario']);
$email_usuario = $conn->real_escape_string($data['email_usuario']);
$password_usuario = $conn->real_escape_string($data['password_usuario']);
$calle_usuario = $conn->real_escape_string($data['calle_usuario']);
$estado_usuario = $conn->real_escape_string($data['estado_usuario']);
$ciudad_usuario = $conn->real_escape_string($data['ciudad_usuario']);
$cp_usuario = $conn->real_escape_string($data['cp_usuario']);

// Hashear la contraseña
$password_hashed = password_hash($password_usuario, PASSWORD_DEFAULT);

// Verificar si el correo ya está registrado
$sql = "SELECT * FROM usuarios WHERE correo = '$email_usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $jsonResponse = json_encode([
        'status' => 500,
        "message" => 'El usuario ya está registrado.',
    ]);
} else {
    $sql = "INSERT INTO usuarios (nombre, apellidoP, apellidoM, correo, password, calle, estado, ciudad, cp) VALUES ('$nombre_usuario', '$apellidoP_usuario', '$apellidoM_usuario', '$email_usuario', '$password_hashed', '$calle_usuario', '$estado_usuario', '$ciudad_usuario', '$cp_usuario')";
    if ($conn->query($sql) === TRUE) {
        $jsonResponse = json_encode([
            'status' => 200,
            "message" => 'Registro exitoso.',
        ]);
    } else {
        $jsonResponse = json_encode([
            'status' => 404,
            "message" => 'No se pudo hacer el registro.',
        ]);
    }
}

$conn->close();
header('Content-Type: application/json');
echo $jsonResponse;
?>
