<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body> 

    <a href="<?= base_url('/'); ?>">Volver al Inicio</a>

    <h2>Crear Cuenta</h2>

    <form action="<?= base_url('registro/guardar'); ?>" method="post">
        <div>
            <label for="nombre">Nombre completo:</label><br>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <br>
        <div>
            <label for="correo">Correo electrónico:</label><br>
            <input type="email" id="correo" name="correo" required>
        </div>
        <br>
        <div>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required>
        </div>
        <br>
        <button type="submit">Registrarse</button>
    </form>

</body>
</html>