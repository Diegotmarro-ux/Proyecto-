<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body> 

    <a href="<?= base_url('/'); ?>">Volver al Inicio</a>

    <h2>Crear Cuenta</h2>
    <?php if (session()->getFlashdata('errors')): ?>
        <div style="color: red; margin-bottom: 15px;">
            <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('registro/guardar'); ?>" method="post">
        <div>
            <label for="nombre">Nombre completo:</label><br>
          <input type="text" id="nombre" name="nombre" value="<?= old('nombre') ?>" required>
        </div>
        <br>
        <div>
            <label for="correo">Correo electrónico:</label><br>
        <input type="email" id="correo" name="correo" value="<?= old('correo') ?>" required>
        </div>
        <br>
        <div>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required>
        </div>
        <br>
        <div>
            <label for="repeat_password">Repetir contraseña:</label><br>
            <input type="password" id="repeat_password" name="repeat_password" required>
        </div>
        <br>
        <button type="submit">Registrarse</button>
        <a href="<?= base_url('/'); ?>"><button type="button">Cancelar</button></a>
    </form>

</body>
</html>