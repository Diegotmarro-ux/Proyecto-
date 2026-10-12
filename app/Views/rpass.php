<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= (session()->get('lang') === 'en') ? 'Password reset' : 'Restablecer Contraseña'; ?></title>
</head>
<body>
    <h2><?= (session()->get('lang') === 'en') ? 'Password reset' : 'Restablecer Contraseña'; ?></h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <div style="color: red;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('guardar-nueva-password'); ?>" method="post">
        <input type="hidden" name="token" value="<?= $token; ?>">
        <div>
            <label>Password:</label><br>
            <input type="password" name="password" required>
        </div>
        <br>
        <div>
            <label><?= (session()->get('lang') === 'en') ? 'Repeat password' : 'Repetir contraseña'; ?>:</label><br>
            <input type="password" name="repeat_password" required>
        </div>
        <br>
        <button type="submit"><?= (session()->get('lang') === 'en') ? 'Reset password' : 'Restablecer contraseña'; ?></button>
    </form>
</body>
</html>