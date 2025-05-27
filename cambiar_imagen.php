<?php
$servername = "localhost";
$username = "root";
$password = "yael1234";
$dbname = "Paradice";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el ID del formulario
$id = $_POST['id'];

// Manejar la subida de la nueva imagen
$nueva_imagen = $_FILES['nueva_imagen']['name'];
$nueva_imagen_temporal = $_FILES['nueva_imagen']['tmp_name'];
$ruta_nueva_imagen = "image/" . $nueva_imagen;

// Consulta SQL para actualizar la imagen
$sql = "UPDATE socios SET foto = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $ruta_nueva_imagen, $id);

if ($stmt->execute()) {
    // Obtener los datos actualizados del socio
    $consulta_actualizada = "SELECT id, nombre, foto FROM socios WHERE id = '$id'";
    $resultado = $conn->query($consulta_actualizada);

    if ($resultado->num_rows > 0) {
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
      echo"<br><br><br>";
        // Mostrar los datos actualizados en una tabla
        echo "<h2>Datos Actualizados</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Nueva Imagen</th></tr>";

        $fila = $resultado->fetch_assoc();
        echo "<tr>";
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td><img src='" . $fila['foto'] . "' alt='Imagen del Socio' style='width: 100px; height: auto;'></td>";
        echo "</tr>";

        echo "</table>
        </body>
</html>";
    } else {
        echo "No se encontraron datos actualizados.";
    }
} else {
    echo "Error al actualizar la imagen del socio: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
