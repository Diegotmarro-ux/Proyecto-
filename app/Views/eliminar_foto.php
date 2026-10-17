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
            <div style="display: flex; align-items: center; gap: 10px;">
            <button type="submit"><?= ($lang === 'en') ? 'Save' : 'Guardar'; ?></button>
              <a href="<?= base_url('/perfil'); ?>"><?= ($lang === 'en') ? 'Cancel' : 'Cancelar'; ?></a>
                   </div>
          </form>
    </main> 

</body> 
</html> 