<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <?php
    require("includes/funciones.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = trim($_POST["nombre"]);
        $apellido = trim($_POST["apellido"]);
        $telefono = trim($_POST["telefono"]);

        $errores = [];

        // Validar campos vacíos
        if (empty($nombre)) {
            $errores[] = "El campo nombre es obligatorio.";
        }
        if (empty($apellido)) {
            $errores[] = "El campo apellido es obligatorio.";
        }
        if (empty($telefono)) {
            $errores[] = "El campo teléfono es obligatorio.";
        }

        // Validar longitud de nombre y apellido
        if (strlen($nombre) > 20) {
            $errores[] = "El nombre no debe tener más de 20 caracteres.";
        }
        if (strlen($apellido) > 20) {
            $errores[] = "El apellido no debe tener más de 20 caracteres.";
        }

        // Validar longitud de teléfono
        if (strlen($telefono) > 8) {
            $errores[] = "El teléfono no debe tener más de 8 caracteres.";
        }

        // Mostrar errores o resultado
        if (!empty($errores)) {
            echo "<ul>";
            foreach ($errores as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
        } else {
            // Insertar datos en la base de datos
            insertar($nombre, $apellido, $telefono);
        }
    } else {
        echo "Acceso no autorizado.";
    }
    ?>
</body>
</html>