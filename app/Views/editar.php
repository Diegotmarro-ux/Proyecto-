<?php
$lang  = session()->get('lang') ?? 'es';
$title = ($lang === 'en') ? 'Edit profile' : 'Editar perfil';
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
        <h2><?= ($lang === 'en') ? 'Edit profile' : 'Editar perfil'; ?></h2>

        <form action="<?= base_url('/perfil/guardar'); ?>" method="post">
      
            <div style="margin-bottom: 15px;">
                <label for="nombre"><strong><?= ($lang === 'en') ? 'name' : 'nombre'; ?></strong></label><br>
                <input type="text" id="nombre" name="nombre" value="<?= esc($usuario['nombre']) ?>" style="width: 100%; padding: 10px; background-color: #b0e0e6; border: 1px solid #000; border-radius: 5px; box-sizing: border-box;" required>
            </div>

            
            <div style="margin-bottom: 20px;">
                <label for="correo"><strong><?= ($lang === 'en') ? 'email' : 'correo'; ?></strong></label><br>
                <input type="email" id="correo" name="correo" value="<?= esc($usuario['correo']) ?>" style="width: 100%; padding: 10px; background-color: #b0e0e6; border: 1px solid #000; border-radius: 5px; box-sizing: border-box;" required>
            </div>

            <!-- Botones Save y Cancel -->
            <div>
                <button type="submit" style="padding: 8px 20px; background-color: #d4edda; color: #155724; border: 1px solid #000; border-radius: 5px; font-weight: bold; cursor: pointer; margin-right: 10px;">
                    <?= ($lang === 'en') ? 'save' : 'guardar'; ?>
                </button>

                <a href="<?= base_url('/perfil'); ?>" style="display: inline-block; padding: 8px 20px; background-color: #f8d7da; color: #721c24; text-decoration: none; border: 1px solid #000; border-radius: 5px; font-weight: bold;">
                    <?= ($lang === 'en') ? 'Cancel' : 'Cancelar'; ?>
                </a>
            </div>
        </form>
    </main>

</body>
</html>