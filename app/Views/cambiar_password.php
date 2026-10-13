<?php
$lang  = session()->get('lang') ?? 'es';
$title = ($lang === 'en') ? 'Edit password' : 'Editar contraseña';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title> 
</head>
<body style="margin: 0; font-family: sans-serif;">

    <?= $this->include('layout/header') ?>

    <main style="padding: 30px; max-width: 600px;">
        <h2><?= ($lang === 'en') ? 'Edit password' : 'Editar contraseña'; ?></h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/perfil/guardar-password'); ?>" method="post">
            <div style="margin-bottom: 15px;">
                <label for="current_password"><strong><?= ($lang === 'en') ? 'Current Password' : 'Contraseña Actual'; ?></strong></label><br>
                <input type="password" id="current_password" name="current_password" style="width: 100%; padding: 10px; background-color: #b0e0e6; border: 1px solid #000; border-radius: 5px; box-sizing: border-box;" required>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="new_password"><strong><?= ($lang === 'en') ? 'New password' : 'Nueva contraseña'; ?></strong></label><br>
                <input type="password" id="new_password" name="new_password" style="width: 100%; padding: 10px; background-color: #b0e0e6; border: 1px solid #000; border-radius: 5px; box-sizing: border-box;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="repeat_password"><strong><?= ($lang === 'en') ? 'Repeat new password' : 'Repetir nueva contraseña'; ?></strong></label><br>
                <input type="password" id="repeat_password" name="repeat_password" style="width: 100%; padding: 10px; background-color: #b0e0e6; border: 1px solid #000; border-radius: 5px; box-sizing: border-box;" required>
            </div>

            <div>
                <button type="submit" style="padding: 8px 20px; background-color: #d4edda; color: #155724; border: 1px solid #000; border-radius: 5px; font-weight: bold; cursor: pointer; margin-right: 10px;">
                    <?= ($lang === 'en') ? 'Save' : 'Guardar'; ?>
                </button>

                <a href="<?= base_url('/perfil'); ?>" style="display: inline-block; padding: 8px 20px; background-color: #f8d7da; color: #721c24; text-decoration: none; border: 1px solid #000; border-radius: 5px; font-weight: bold;">
                    <?= ($lang === 'en') ? 'Cancel' : 'Cancelar'; ?>
                </a>
            </div>
        </form>
    </main>

</body>
</html>