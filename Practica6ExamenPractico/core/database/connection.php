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

// Operaciones con la base de datos...
// (Aquí puedes realizar consultas, inserciones, actualizaciones, etc.)

// Cerrar la conexión a la base de datos
?>
