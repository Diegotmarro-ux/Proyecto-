<?php
$lang  = session()->get('lang') ?? 'es';
$title = ($lang === 'en') ? 'Edit profile image' : 'Editar imagen de perfil';
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
        <h2><?= ($lang === 'en') ? 'Edit profile image' : 'Editar imagen de perfil'; ?></h2>

        <form action="<?= base_url('/perfil/guardar-foto'); ?>" method="post" enctype="multipart/form-data">
            
             <div style="margin-bottom: 20px;">
               <input type="file" name="foto" accept="image/*" required>
                    </div>

            <div>
                     <div style="display: flex; align-items: center; gap: 10px;">
                    <button type="submit"><?= ($lang === 'en') ? 'Save' : 'Guardar'; ?></button>
                     <a href="<?= base_url('/perfil'); ?>"><?= ($lang === 'en') ? 'Cancel' : 'Cancelar'; ?></a>

            </div>
        </form>
    </main>

</body>
</html>