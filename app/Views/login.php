<?php $lang = session()->get('lang') ?? 'es'; 
$txtTitle    = ($lang === 'en') ? 'Log in - School Tasks' : 'Iniciar Sesión - Tareas Escolares';
$txtBack     = ($lang === 'en') ? 'Back to Home' : 'Volver al Inicio';
$txtHeader   = ($lang === 'en') ? 'Log in' : 'Iniciar Sesión';
$txtEmail    = ($lang === 'en') ? 'Email:' : 'Correo:';
$txtPass     = ($lang === 'en') ? 'Password:' : 'Contraseña:';
$txtRemember = ($lang === 'en') ? 'Remember me' : 'Recordarme';
$txtSubmit   = ($lang === 'en') ? 'Log in' : 'Ingresar';
$txtForgot   = ($lang === 'en') ? 'Forgot password?' : '¿Olvidaste tu contraseña?';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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

    <h2>Iniciar Sesión</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: #dc3545; font-weight: bold;"><?= session()->getFlashdata('error'); ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('Mensaje')): ?>
        <p style="color: #dc3545; font-weight: bold;"><?= session()->getFlashdata('Mensaje'); ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('Mensaie')): ?>
        <p style="color: #dc3545; font-weight: bold;"><?= session()->getFlashdata('Mensaie'); ?></p>
    <?php endif; ?>


    <?php if (session()->getFlashdata('mensaje')): ?>
        <p style="color: #198754; font-weight: bold;"><?= session()->getFlashdata('mensaje'); ?></p>
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
 





