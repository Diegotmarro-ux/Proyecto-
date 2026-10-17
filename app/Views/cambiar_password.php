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
             <input type="password" id="current_password" name="current_password" required>
                 </div>

                   <div style="margin-bottom: 15px;">
                     <label for="new_password"><strong><?= ($lang === 'en') ? 'New password' : 'Nueva contraseña'; ?></strong></label><br>
                         <input type="password" id="new_password" name="new_password" required>
                         </div>

                  <div style="margin-bottom: 20px;">
                   <label for="repeat_password"><strong><?= ($lang === 'en') ? 'Repeat new password' : 'Repetir nueva contraseña'; ?></strong></label><br>
                        <input type="password" id="repeat_password" name="repeat_password" required>
                           </div>

                         <div style="display: flex; align-items: center; gap: 10px;">
                            <button type="submit"><?= ($lang === 'en') ? 'Save' : 'Guardar'; ?></button>
                                       <a href="<?= base_url('/perfil'); ?>"><?= ($lang === 'en') ? 'Cancel' : 'Cancelar'; ?></a>
                                                 </div>
             
        </form>
    </main>

</body>
</html>