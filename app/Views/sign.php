<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
<style>
        body { font-family: sans-serif; margin: 20px; }
        .nav { display: flex; justify-content: space-between; border-bottom: 1px solid #e0e0e0; padding-bottom: 15px; }
        .nav a { text-decoration: none; color: #333; margin: 0 5px; }
        .nav a.home { color: #007bff; font-weight: bold; margin-right: 10px; margin-left: 0; }
        .content { text-align: center; margin-top: 60px; }
        .content h1 { font-size: 2.2em; font-weight: bold; margin-bottom: 15px; }
        .content p { color: #333; font-size: 1.1em; }
    </style>
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