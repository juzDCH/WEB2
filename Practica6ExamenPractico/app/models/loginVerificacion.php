<?php
// Este archivo establece la conexión con la base de datos utilizando la configuración definida en config.php
require_once '../../config/config.php';

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    // Manejar el error de conexión de manera más amigable para el usuario
    echo "Lo sentimos, se produjo un error al conectar con la base de datos. Por favor, inténtelo de nuevo más tarde.";
    
    // Registrar detalles del error en un archivo de registro
    error_log("Error de conexión a la base de datos: " . $conn->connect_error, 0);
    
    // Terminar la ejecución del script
    exit();
}

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Inicio de Sesión</title>";
echo "<link rel='stylesheet' type='text/css' href='../../public/css/index.css'>";
echo "</head>";
echo "<body>";
echo "<div class='mensaje'>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT * FROM usuario WHERE nombre='$usuario'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        // Comprueba si la contraseña ingresada coincide con la contraseña almacenada en la base de datos
        if (password_verify($contraseña, $fila['password'])) {
            // Inicio de sesión exitoso, mostrar mensaje de éxito
            echo "<div class='exito'>Inicio de sesión exitoso. Bienvenido.</div>";
            echo "<div class='enlace-saludo'><a href='http://localhost/Practica6ExamenPractico/'>Ir a atras</a></div>";
        } else {
            // Contraseña incorrecta, mostrar mensaje de error
            echo "<div class='error'>Contraseña incorrecta. Redirigiendo al inicio de sesión...</div>";
            header("Refresh: 3; url=index.php");
        }
    } else {
        // El usuario no está registrado, mostrar mensaje de error
        echo "<div class='error'>El usuario no está registrado. Redirigiendo al inicio de sesión...</div>";
        header("Refresh: 3; url=index.php");
    }
}

echo "</div>";
echo "</body>";
echo "</html>";

// Cerrar la conexión a la base de datos
$conn->close();
?>
