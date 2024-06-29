<?php
include('connection2.php');

// Consulta para recuperar datos
$sql = "SELECT * FROM producto";  // Ajusta la consulta a tus necesidades
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Output de cada fila
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = array();
}

$conn->close();

// Devolver datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
