<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= (session()->get('lang') === 'en') ? 'Forgot password' : 'Recuperar Contraseña'; ?></title>
</head>
<body>
    <h2><?= (session()->get('lang') === 'en') ? 'Forgot password' : 'Recuperar Contraseña'; ?></h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red;"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('enviar-recuperacion'); ?>" method="post">
        <div>
            <label>Email:</label><br>
            <input type="email" name="correo" required>
        </div>
        <br>
        <button type="submit"><?= (session()->get('lang') === 'en') ? 'Send' : 'Enviar'; ?></button>
        <a href="<?= base_url('/login'); ?>"><button type="button"><?= (session()->get('lang') === 'en') ? 'Cancel' : 'Cancelar'; ?></button></a>
    </form>
</body>
</html> 