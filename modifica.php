<?php
// Conectar a la base de datos (reemplaza con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "yael1234";
$dbname = "Paradice";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar los datos del formulario
$id = $_POST['id'];
$duracion = $_POST['duracion'];
$nueva_fecha_inicio = $_POST['nueva_fecha_inicio'];
$nueva_fecha_termino = $_POST['nueva_fecha_termino'];
$membresia = $_POST['membresia'];
$horario = $_POST['horario'];
$servicio = $_POST['servicio'];
$costo = $_POST['costo'];



// Actualizar la fecha de inicio en la base de datos
$sql = "UPDATE socios SET duracion='$duracion', fecha_inicio='$nueva_fecha_inicio', fecha_termino='$nueva_fecha_termino', membresia='$membresia', horario='$horario', servicio='$servicio' , costo='$costo' WHERE id=$id";

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
    echo "            <h2 class='animation a1'><center>Los datos fueron modificados correctamente</center></h2>";
  
    echo" <center><p class='animation a5'><a href='index.html'>Regresa</a></p></center>";
    echo "        </div>";
 
    echo "    </div>";
    echo "    <div class='right'></div>";
    echo "</div>";
  
    echo "</body>";
    echo "</html>";} else {
        echo "No se modifico el socio: $nombre_socio";

}

// Cerrar la conexión
$conn->close();
?>

