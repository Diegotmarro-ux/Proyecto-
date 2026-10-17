<?php
$lang  = session()->get('lang') ?? 'es';
$title = ($lang === 'en') ? 'Please enter your password' : 'Por favor ingrese su contraseña';
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
        <h2><?= ($lang === 'en') ? 'Please enter your password to continue' : 'Por favor ingrese su contraseña para continuar'; ?></h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/perfil/verificar-password'); ?>" method="post">
            <div style="margin-bottom: 15px;">
                <label for="password"><strong><?= ($lang === 'en') ? 'Password' : 'Contraseña'; ?></strong></label><br>
                <input type="password" id="password" name="password" required>
                       </div>
                      <div style="display: flex; align-items: center; gap: 10px;">
               <button type="submit"><?= ($lang === 'en') ? 'Send' : 'Enviar'; ?></button>
                       <a href="<?= base_url('/perfil'); ?>"><?= ($lang === 'en') ? 'Cancel' : 'Cancelar'; ?></a>
                         </div>
        </form>
    </main>

</body>
</html>