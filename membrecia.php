<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Socio</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            min-height: 100vh;
        }

        form {
            background: url('fondo.png') no-repeat left top;
            background-size: cover;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            color: #c4ee34; /* Cambiado el color del texto */
            font-weight: bold; /* Hace que el texto sea más grueso */
            box-sizing: border-box; /* Añadido para que el padding no afecte al ancho total */
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: calc(100% - 20px); /* Ajustado para tener en cuenta el padding de 20px */
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: none;
            background: none;
            border-bottom: 1px solid #555;
            color: white;
        }

        button {
            background-color: #4CAF50;
            width: 50%;
            padding: 10px;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
        }

        a:hover {
            text-decoration: underline;
        }

        @media print {
            body {
                background: none;
            }

            form {
                background: url('fondo.png') no-repeat left top !important;
                background-size: cover !important;
            }

            button {
                display: none;
            }
            p{
                display: none;
            }
        }
    </style>
</head>
<body>
    <?php
    // Verificar si se ha enviado un ID a través del formulario
    if (isset($_GET['id'])) {
        // Recuperar el ID del formulario
        $id = $_GET['id'];

        // Conectar a la base de datos (ajusta estos valores según tu configuración)
        $servername = "localhost";
        $username = "root";
        $password = "yael1234";
        $dbname = "Paradice";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("La conexión a la base de datos falló: " . $conn->connect_error);
        }

        // Consulta SQL para obtener los datos del socio por ID
        $sql = "SELECT id,nombre, fecha_inicio, fecha_termino FROM socios WHERE id = '$id'";
        $result = $conn->query($sql);

        // Verificar si se encontraron resultados
        if ($result->num_rows > 0) {
            // Mostrar los datos en un formulario
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $nombre = $row['nombre'];
                $fechaInicio = $row['fecha_inicio'];
                $fechaTermino = $row['fecha_termino'];
            ?>
            <form>
                <h2> </h2>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <label for="id">ID del Socio:</label>
                <input type="text" name="id" value="<?php echo $id; ?>" readonly>

                <label for="id">Nombre del Socio:</label>
                <input type="text" name="nombre" value="<?php echo $nombre; ?>" readonly>

                <label for="fecha_inicio">Fecha de Inicio:</label>
                <input type="text" name="fecha_inicio" value="<?php echo $fechaInicio; ?>" readonly>

                <label for="fecha_termino">Fecha de Término:</label>
                <input type="text" name="fecha_termino" value="<?php echo $fechaTermino; ?>" readonly>
            </form>
            <br>
            <!-- Botón para imprimir el formulario -->
            <button onclick="imprimirFormulario()">Imprimir formulario</button> <br><br>
            <p class="animation a5"><a href="index.html">Regresar</a></p>


            <script>
                // Función para imprimir el formulario
                function imprimirFormulario() {
                    window.print();
                }
            </script>
            <?php
            }
        } else {
            echo "No se encontraron resultados para el ID proporcionado.";
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        echo "No se proporcionó un ID para la búsqueda.";
    }
    ?>
</body>
</html>
