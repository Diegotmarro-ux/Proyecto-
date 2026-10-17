<?php
$lang  = session()->get('lang') ?? 'es';
$title = ($lang === 'en') ? 'Profile' : 'Perfil';
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
        <h2><?= ($lang === 'en') ? 'Profile' : 'Perfil'; ?></h2>

        <?php if (session()->getFlashdata('mensaje')): ?>
            <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 15px; border-radius: 5px; font-weight: bold;">
                <?= session()->getFlashdata('mensaje'); ?>
            </div>
        <?php endif; ?>

     
<div style="margin-bottom: 15px;">
    <div style="width: 120px; height: 110px; border: 2px solid #000; display: flex; align-items: center; justify-content: center; background-color: #f0f0f0;">
        <?php if (!empty($usuario['foto']) && file_exists(FCPATH . 'uploads/' . $usuario['foto'])): ?>
            <img src="<?= base_url('uploads/' . $usuario['foto']) ?>" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
        <?php else: ?>
            <span style="color: #666; font-size: 14px; font-weight: bold;"><?= ($lang === 'en') ? 'No image' : 'Sin imagen'; ?></span>
        <?php endif; ?>
    </div>
           
            <a href="<?= base_url('/perfil/eliminar-foto'); ?>" style="display: inline-block; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 6px 12px; border-radius: 4px; text-decoration: none;">
                <?= ($lang === 'en') ? 'Delete Profile image' : 'Eliminar imagen de perfil'; ?>
            </a>
        </div>

        
        <div style="margin-bottom: 15px;">
            <strong><?= ($lang === 'en') ? 'Name' : 'Nombre'; ?></strong><br>
            <span><?= esc($usuario['nombre']) ?></span>
        </div>

        <div style="margin-bottom: 20px;">
            <strong><?= ($lang === 'en') ? 'email' : 'correo'; ?></strong><br>
            <span><?= esc($usuario['correo']) ?></span>
        </div>

       
        <div>
           
            <a href="<?= base_url('/perfil/validar-password'); ?>" style="padding: 8px 18px; background-color: #b0e0e6; color: #000; text-decoration: none; border: 1px solid #000; border-radius: 5px; margin-right: 10px; font-weight: bold;">
                <?= ($lang === 'en') ? 'Edit' : 'Editar'; ?>
            </a>

            
            <a href="<?= base_url('/perfil/cambiar-password'); ?>" style="padding: 8px 18px; background-color: #b0e0e6; color: #000; text-decoration: none; border: 1px solid #000; border-radius: 5px; margin-right: 10px; font-weight: bold;">
                <?= ($lang === 'en') ? 'Change password' : 'Cambiar contraseña'; ?>
            </a>

            
            <a href="<?= base_url('/perfil/cambiar-foto'); ?>" style="padding: 8px 18px; background-color: #b0e0e6; color: #000; text-decoration: none; border: 1px solid #000; border-radius: 5px; font-weight: bold;">
                <?= ($lang === 'en') ? 'Change profile image' : 'Cambiar imagen'; ?>
            </a>
        </div>
    </main>

</body>
</html>