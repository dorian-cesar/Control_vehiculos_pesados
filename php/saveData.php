<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rut = $_POST['rut'];
    $type = $_POST['type'];

    if ($type == 'entrada') {
        $sql = "INSERT INTO choferes (rut, entrada) VALUES ('$rut', NOW())";
    } elseif ($type == 'salida') {
        $sql = "UPDATE choferes SET salida = NOW() WHERE rut = '$rut' AND salida IS NULL";
    } elseif ($type == 'actividad') {
        $actividad = $_POST['actividad'];
        $inicio = $_POST['inicio'];
        $fin = $_POST['fin'];
        //$chofer_id = $_POST['chofer_id'];
        $chofer_id =1 ;
        $sql = "INSERT INTO actividades (chofer_id, actividad, inicio, fin) VALUES ('$chofer_id', '$actividad', '$inicio', '$fin')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
