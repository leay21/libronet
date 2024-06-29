<?php
include('connection.php');

// Establecer el encabezado de respuesta como JSON
header('Content-Type: application/json');

try {
    // Recibir el JSON de la solicitud y decodificarlo
    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data) {
        throw new Exception('No se pudo decodificar el JSON');
    }

    // Sanitizar las entradas
    $email_usuario = $conn->real_escape_string($data['email_usuario']);
    $password_usuario = $conn->real_escape_string($data['password_usuario']);

    // Verificar si el correo está registrado
    $sql = "SELECT * FROM usuarios WHERE correo = '$email_usuario'";
    $result = $conn->query($sql);

    if (!$result) {
        throw new Exception('Error en la consulta SQL: ' . $conn->error);
    }

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($password_usuario, $usuario['password'])) {
            $jsonResponse = json_encode([
                'usuario' => $usuario['nombre'],
                'status' => 200,
                "message" => 'Inicio de sesión exitoso.',
            ]);
        } else {
            // Contraseña incorrecta
            $jsonResponse = json_encode([
                'status' => 401,
                "message" => 'Correo o contraseña incorrectos.',
            ]);
        }
    } else {
        // Correo no registrado
        $jsonResponse = json_encode([
            'status' => 401,
            "message" => 'Correo o contraseña incorrectos.',
        ]);
    }

    echo $jsonResponse;
} catch (Exception $e) {
    $jsonResponse = json_encode([
        'status' => 500,
        'message' => 'Error en el servidor',
        'error' => $e->getMessage()
    ]);
    echo $jsonResponse;
} finally {
    $conn->close();
}
?>

