<?php
include 'db.php';
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener RUT y contraseña enviados desde el formulario
$rut = $_POST['rut'];
$password = $_POST['password'];

// Consulta SQL para verificar las credenciales
$sql = "SELECT * FROM choferes WHERE rut = '$rut' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Credenciales válidas
    echo "success";
} else {
    // Credenciales inválidas
    echo "success";
}

$conn->close();
?>
