<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" type="text/css" href="public/css/index.css">
</head>
<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registro de Usuarios</label>
            <div class="login-form">
                <form class="sign-in-htm" action="app/models/loginVerificacion.php" method="POST">

                    <div class="group">
                        <label for="usuario" class="label">Usuario</label>
                        <input id="usuario" type="text" class="input" name="usuario" placeholder="Usuario" required>
                    </div>
                    <div class="group">
                        <label for="contraseña" class="label">Contraseña</label>
                        <input id="contraseña" type="password" class="input" name="contraseña" placeholder="Contraseña" required>
                    </div>
                    <div class="group">
                        <button type="submit" class="button">Iniciar Sesión</button>
                    </div>
                </form>
                <form class="sign-up-htm" action="app/view/registro.php" method="POST">
                    <div class="group">
                        <label for="usuario" class="label">Usuario</label>
                        <input id="usuario" type="text" class="input" name="usuario" placeholder="Usuario" required>
                    </div>
                    <div class="group">
                        <label for="contraseña" class="label">Contraseña</label>
                        <input id="contraseña" type="password" class="input" name="contraseña" placeholder="Contraseña" required>
                    </div>
                    <div class="group">
                        <label for="confirmar_contraseña" class="label">Confirmar Contraseña</label>
                        <input id="confirmar_contraseña" type="password" class="input" name="confirmar_contraseña" placeholder="Confirmar Contraseña" required>
                    </div>
                    <div class="group">
                        <button type="submit" class="button">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
