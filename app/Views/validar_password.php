<?php
$lang  = session()->get('lang') ?? 'es';
$title = ($lang === 'en') ? 'Please enter your password' : 'Por favor ingrese su contraseña';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8"> 
    <title><?= $title ?></title>
    <meta charset="UTF-8"> 
    <title><?= $txtTitle ?></title>
    <style>
       <style>
        body { font-family: sans-serif; margin: 20px; }
        .nav { display: flex; justify-content: space-between; border-bottom: 1px solid #e0e0e0; padding-bottom: 15px; }
        .nav a { text-decoration: none; color: #333; margin: 0 5px; }
        .nav a.home { color: #007bff; font-weight: bold; margin-right: 10px; margin-left: 0; }
        .content { text-align: center; margin-top: 60px; }
        .content h1 { font-size: 2.2em; font-weight: bold; margin-bottom: 15px; }
        .content p { color: #333; font-size: 1.1em; }
    </style> 
    </style>
</head>
<body style="margin: 0; font-family: sans-serif;">

    <?= $this->include('layout/header') ?>

    <main style="padding: 30px; max-width: 600px;">
        <h2><?= ($lang === 'en') ? 'Please enter your password to continue' : 'Por favor ingrese su contraseña para continuar'; ?></h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/perfil/verificar-password'); ?>" method="post">
            <div style="margin-bottom: 15px;">
                <label for="password"><strong>PASSWORD</strong></label><br>
                <input type="password" id="password" name="password" style="width: 100%; padding: 10px; background-color: #b0e0e6; border: 1px solid #000; border-radius: 5px; box-sizing: border-box;" required>
            </div>

            <div>
                <button type="submit" style="padding: 8px 20px; background-color: #d4edda; color: #155724; border: 1px solid #000; border-radius: 5px; font-weight: bold; cursor: pointer; margin-right: 10px;">
                    <?= ($lang === 'en') ? 'Send' : 'Enviar'; ?>
                </button>

                <a href="<?= base_url('/perfil'); ?>" style="display: inline-block; padding: 8px 20px; background-color: #f8d7da; color: #721c24; text-decoration: none; border: 1px solid #000; border-radius: 5px; font-weight: bold;">
                    <?= ($lang === 'en') ? 'Cancel' : 'Cancelar'; ?>
                </a>
            </div>
        </form>
    </main>

</body>
</html>