<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

    <a href="<?= base_url('/'); ?>">Volver al Inicio</a>

    <h2>Iniciar Sesión</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error'); ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <p style="color: green; font-weight: bold;"><?= session()->getFlashdata('mensaje'); ?></p>
    <?php endif; ?>

    <form action="<?= base_url('login/autenticar'); ?>" method="post">
        <div>
            <label for="correo">Correo:</label><br>
            <input type="email" id="correo" name="correo" required>
        </div>
        <br>
        <div>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required>
        </div>
        <br>
        <button type="submit">Ingresar</button>
    </form>
    <div>
    <input type="checkbox" id="remember" name="remember" value="1">
    <label for="remember"><?= (session()->get('lang') === 'en') ? 'Remember me' : 'Recordarme'; ?></label>
</div>
<br>
<button type="submit"><?= (session()->get('lang') === 'en') ? 'Log in' : 'Ingresar'; ?></button>

<a href="<?= base_url('/recuperar'); ?>" style="margin-left: 10px;">
    <?= (session()->get('lang') === 'en') ? 'Forgot password?' : '¿Olvidaste tu contraseña?'; ?>
</a>

</body>
</html>













