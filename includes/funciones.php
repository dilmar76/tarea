<?php
require("conexion.php");

function insertar($nombre, $apellido, $telefono) {
    $conn = conectar();

    // Preparar la consulta SQL usando declaraciones preparadas
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, telefono) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("sss", $nombre, $apellido, $telefono);

    if ($stmt->execute()) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar los datos: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
function listar(){
    global $conn;
    $sql = "SELECT * FROM usuario";
    $r = mysqli_query($conn, $sql);
    $datos = mysqli_fetch_assoc($r);
    return $datos;
}

function listar2() {
    global $conn;
    $sql = "SELECT * FROM usuario";
    $r = mysqli_query($conn, $sql);
    $datos = [];
    while ($fila = mysqli_fetch_assoc($r)) {
        $datos[] = $fila;
    }
    return $datos;
}
?>
