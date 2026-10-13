<?php
$lang  = session()->get('lang') ?? 'es';
$title = ($lang === 'en') ? 'Delete profile image' : 'Eliminar imagen de perfil';
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
        <h2><?= ($lang === 'en') ? 'Delete profile image' : 'Eliminar imagen de perfil'; ?></h2>

        <p style="font-size: 1.2em; font-weight: bold; margin-bottom: 20px;">
            <?= ($lang === 'en') ? 'Are you sure?' : '¿Estás seguro/a?'; ?>
        </p>

        <form action="<?= base_url('/perfil/confirmar-eliminar-foto'); ?>" method="post">
            <button type="submit" style="padding: 8px 20px; background-color: #d4edda; color: #155724; border: 1px solid #000; border-radius: 5px; font-weight: bold; cursor: pointer; margin-right: 10px;">
                <?= ($lang === 'en') ? 'Save' : 'Guardar'; ?>
            </button>

            <a href="<?= base_url('/perfil'); ?>" style="display: inline-block; padding: 8px 20px; background-color: #f8d7da; color: #721c24; text-decoration: none; border: 1px solid #000; border-radius: 5px; font-weight: bold;">
                <?= ($lang === 'en') ? 'Cancel' : 'Cancelar'; ?>
            </a>
        </form>
    </main>

</body>
</html>