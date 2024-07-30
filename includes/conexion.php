<?php
function conectar() {
    $conn = mysqli_connect("127.0.0.1", "root", "", "tecnologia2");
    if (!$conn) {
        die("Error en la conexión: " . mysqli_connect_error());
    }
    return $conn;
}
?>
