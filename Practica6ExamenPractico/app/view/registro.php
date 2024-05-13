<?php
// Crear la conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "practica6");

// Verificar si se recibieron los datos del formulario
if(isset($_POST['usuario'], $_POST['contraseña'], $_POST['confirmar_contraseña'])) {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $confirmar_contraseña = $_POST['confirmar_contraseña'];

    // Verificar si las contraseñas coinciden
    if ($contraseña != $confirmar_contraseña) {
        // Redirigir a index.php con mensaje de error
        header("Location: ../../index.php?error=Las contraseñas no coinciden.");
        exit();
    } else {
        // Hashear la contraseña
        $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);
        
        // Preparar la consulta usando prepared statements
        $sql = "INSERT INTO usuario (nombre, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        
        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt) {
            // Vincular parámetros y ejecutar la consulta
            $stmt->bind_param("ss", $usuario, $contraseña_hash);
            if ($stmt->execute()) {
                // Mostrar mensaje de registro exitoso
                echo "<!DOCTYPE html>";
                echo "<html lang='en'>";
                echo "<head>";
                echo "<meta charset='UTF-8'>";
                echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
                echo "<title>Registro Exitoso</title>";
                echo "<link rel='stylesheet' href='../../public/css/index.css'>";
                echo "</head>";
                echo "<body>";
                echo "<div class='container'>";
                echo "<h2>Registro Exitoso</h2>";
                echo "<p>¡Usuario registrado correctamente!</p>";
                echo "<div class='enlace-productos'><a href='../../index.php'>Iniciar Sesión</a></div>";
                echo "</div>";
                echo "</body>";
                echo "</html>";
            } else {
                // Mostrar mensaje de error
                echo "<!DOCTYPE html>";
                echo "<html lang='en'>";
                echo "<head>";
                echo "<meta charset='UTF-8'>";
                echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
                echo "<title>Error</title>";
                echo "<link rel='stylesheet' href='../../public/css/index.css'>";
                echo "</head>";
                echo "<body>";
                echo "<div class='container'>";
                echo "<h2>Error</h2>";
                echo "<p>Ocurrió un error al registrar el usuario: " . $conn->error . "</p>";
                echo "<div class='enlace-productos'><a href='../../index.php'>Volver al Formulario</a></div>";
                echo "</div>";
                echo "</body>";
                echo "</html>";
            }
        } else {
            // Mostrar mensaje de error
            echo "<!DOCTYPE html>";
            echo "<html lang='en'>";
            echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<title>Error</title>";
            echo "<link rel='stylesheet' href='../../public/css/index.css'>";
            echo "</head>";
            echo "<body>";
            echo "<div class='container'>";
            echo "<h2>Error</h2>";
            echo "<p>Ocurrió un error en la preparación de la consulta.</p>";
            echo "<div class='enlace-productos'><a href='../../index.php'>Volver al Formulario</a></div>";
            echo "</div>";
            echo "</body>";
            echo "</html>";
        }
    }
} else {
    // Redirigir a index.php si no se recibieron todos los datos del formulario
    header("Location: ../../index.php");
    exit();
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
