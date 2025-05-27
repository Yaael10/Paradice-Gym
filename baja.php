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

// Consulta SQL para eliminar al socio
$sql = "DELETE FROM socios WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {


    echo "<!DOCTYPE html>";
    echo "<html lang='es'>";
    echo "<head>";
    echo "    <meta charset='UTF-8'>";
    echo "    <meta http-equiv='X-UA-Compatible' content='IE=edge'>";
    echo "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "    <link rel='icon' href='favicon.ico' type='imagenes/icono.ico'>";
    echo "    <link rel='stylesheet' href='styles/style1.css'>";
    echo "    <title>PARADICE GYM</title>";
    echo "    <style>";
    echo "        body {";
    echo "            background-color: black;";
    echo "            color: white;";
    echo "            margin: 0;";
    echo "            font-family: Arial, sans-serif;";
    echo "        }";
    echo "";
    echo "    </style>";
    echo "</head>";
    echo "<body>";
  
  
  
  
    echo "        <div class='header'>";
    echo "            <h2 class='animation a1'><center>Los datos fueron eliminados correctamente</center></h2>";
  
    echo" <center><p class='animation a5'><a href='index.html'>Regresa</a></p></center>";
    echo "        </div>";
 
    echo "    </div>";
    echo "    <div class='right'></div>";
    echo "</div>";
  
    echo "</body>";
    echo "</html>";
} else {
    echo "Error al eliminar socio: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>





