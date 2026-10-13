<?php $lang = session()->get('lang') ?? 'es'; ?>
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

    <?php if (session()->getFlashdata('Mensaje')): ?>
        <p style="color: red;"><?= session()->getFlashdata('Mensaje'); ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('Mensaie')): ?>
        <p style="color: red;"><?= session()->getFlashdata('Mensaie'); ?></p>
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
        <div>
            <input type="checkbox" id="remember" name="remember" value="1">
            <label for="remember">Recordarme</label>
        </div>
        <br>
        <div style="display: flex; align-items: center; gap: 10px;">
            <button type="submit"><?= ($lang === 'en') ? 'Log in' : 'Ingresar'; ?></button>
            
            <a href="<?= base_url('recuperar'); ?>">
                <?= ($lang === 'en') ? 'forgot password?' : '¿Olvidaste tu contraseña?'; ?>
            </a>
        </div>
    </form>
</body>
</html>
 





