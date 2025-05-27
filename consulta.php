<?php
// Conexión a la base de datos (reemplaza estos valores con los tuyos)
$servername = "localhost";
$username = "root";
$password = "yael1234";
$dbname = "Paradice";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado un ID a través de GET
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Consultar datos del socio específico
    $sql = "SELECT * FROM socios WHERE id = '$id'";
    $result = $conn->query($sql);

    // Comprobar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Inicio del documento HTML
        echo "<!DOCTYPE html>
                <html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <link rel='stylesheet' href='styles/style.css'> <!-- Enlace al archivo de estilo CSS -->
                    <style>

                    table {
                        width: 100%; /* Ancho de la tabla al 100% de la ventana */
                        border: 2px solid white; /* Borde blanco de la tabla */
                    }
                    th, td {
                        border: 2px solid white; /* Borde blanco de las celdas */
                        text-align: left;
                        padding: 10px;
                        color: #00ff00; /* Color del texto en las celdas */
                        font-size: 14px; /* Tamaño de la fuente */
                    }

                    hr {
                        border: 1px solid gray; /* Línea horizontal de color gris */
                        margin: 20px 0; /* Espaciado arriba y abajo de la línea */
                    }
                </style>
                    <title>Tabla de Socios</title>
                </head>
                <body>";

        // Nav
        echo "<nav>
                <img src='imagenes/logo.png' alt='Logo'>
                <ul>
                  <li><a href='alta.html'>Alta</a></li>
                  <li><a href='modificar.html'>Modificar</a></li>
                  <li><a href='index.html'>Consulta</a></li>
                  <li><a href='baja.html'>Baja</a></li>
                </ul>
              </nav>";
echo"<br><br><br>
";
        // Tabla de resultados
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Foto</th>
                    <th>Duración</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Término    </th>
                    <th>Membresía</th>
                    <th>Horario</th>
                    <th>Regadera</th>
                    <th>Teléfono</th>
                    <th>Costo</th>

                </tr>";

        // Imprimir datos de la fila encontrada
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td style='color: white; font-size: 16px;'>{$row['id']}</td>
                    <td style='color: white; font-size: 16px;'>{$row['nombre']}</td>
                    <td><img src='{$row['foto']}' alt='Foto del socio' style='width:200px; height:auto;'></td>
                    <td style='color: white; font-size: 16px;'>{$row['duracion']}</td>
                    <td style='color: white; font-size: 16px;'>{$row['fecha_inicio']}</td>
                    <td style='color: white; font-size: 16px;'>{$row['fecha_termino']}</td>
                    <td style='color: white; font-size: 16px;'>{$row['membresia']}</td>
                    <td style='color: white; font-size: 16px;'>{$row['horario']}</td>
                    <td style='color: white; font-size: 16px;'>{$row['servicio']}</td>
                    <td style='color: white; font-size: 16px;'>{$row['telefono']}</td>
                    <td style='color: white; font-size: 16px;'>{$row['costo']}</td>

                  </tr>";
        }

        // Fin del documento HTML
        echo "</table>
              </body>
              </html>";
    } else {
        echo "No se encontraron resultados para el ID proporcionado.";
    }
}
