<?php
include 'db.php';

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener las patentes de los vehículos
$sql = "SELECT patente FROM vehiculos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $vehicles = array();
    while($row = $result->fetch_assoc()) {
        $vehicles[] = $row['patente'];
    }
    echo json_encode($vehicles);
} else {
    echo json_encode(array());
}

$conn->close();
?>
