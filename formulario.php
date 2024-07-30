<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
    <script>
        function validarFormulario() {
            const nombre = document.getElementById('nombre').value.trim();
            const apellido = document.getElementById('apellido').value.trim();
            const telefono = document.getElementById('telefono').value.trim();

            let errores = [];

            if (nombre === '') {
                errores.push('El campo nombre es obligatorio.');
            }
            if (apellido === '') {
                errores.push('El campo apellido es obligatorio.');
            }
            if (telefono === '') {
                errores.push('El campo teléfono es obligatorio.');
            }

            if (nombre.length > 20) {
                errores.push('El nombre no debe tener más de 20 caracteres.');
            }
            if (apellido.length > 20) {
                errores.push('El apellido no debe tener más de 20 caracteres.');
            }
            if (telefono.length > 8) {
                errores.push('El teléfono no debe tener más de 8 caracteres.');
            }

            if (errores.length > 0) {
                alert(errores.join('\n'));
                return false; // Evita el envío del formulario
            }

            return true; // Permite el envío del formulario
        }
    </script>
</head>
<body>
    <form action="procesar.php" method="post" onsubmit="return validarFormulario()">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido">
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono">
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
