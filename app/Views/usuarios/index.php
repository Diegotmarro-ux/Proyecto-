<?php $lang = session()->get('lang') ?? 'es'; ?>
<!DOCTYPE html>
<html lang="<?= $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?= ($lang === 'en') ? 'Users' : 'Usuarios'; ?></title>
</head>
<body>

   
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
            <a href="<?= base_url('/maestra'); ?>"><?= ($lang === 'en') ? 'Home' : 'Inicio'; ?></a> | 
            <a href="<?= base_url('idioma/en'); ?>">English</a> | 
            <a href="<?= base_url('idioma/es'); ?>">Español</a>
        </div>
        <div>
            <?= ($lang === 'en') ? 'Hello,' : 'Hola,'; ?> <?= esc(session()->get('nombre')); ?> | 
            <a href="<?= base_url('perfil'); ?>"><?= ($lang === 'en') ? 'Profile' : 'Perfil'; ?></a> | 
            <strong><?= ($lang === 'en') ? 'Users' : 'Usuarios'; ?></strong> | 
            <a href="<?= base_url('logout'); ?>"><?= ($lang === 'en') ? 'Log out' : 'Cerrar Sesión'; ?></a>
        </div>
    </div>

    <h2><?= ($lang === 'en') ? 'Users' : 'Usuarios'; ?></h2>

    <!-- Botón Nuevo Usuario -->
    <a href="<?= base_url('usuarios/nuevo'); ?>">
        <button type="button"><?= ($lang === 'en') ? 'New user' : 'Nuevo usuario'; ?></button>
    </a>
    <br><br>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <p style="color: green; font-weight: bold;"><?= session()->getFlashdata('mensaje'); ?></p>
    <?php endif; ?>

   
    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th><?= ($lang === 'en') ? 'Name' : 'Nombre'; ?></th>
                <th><?= ($lang === 'en') ? 'email' : 'Correo'; ?></th>
                <th><?= ($lang === 'en') ? 'Active' : 'Activo'; ?></th>
                <th><?= ($lang === 'en') ? 'Administrator' : 'Administrador'; ?></th>
                <th><?= ($lang === 'en') ? 'Created at' : 'Creado el'; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($usuarios) && is_array($usuarios)): ?>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td><?= esc($u['nombre']); ?></td>
                        <td><?= esc($u['correo']); ?></td>
                        <td><?= ((int)$u['verificado'] === 1) ? 'Sí' : 'No'; ?></td>
                        <td><?= ((int)$u['administrador'] === 1) ? 'Sí' : 'No'; ?></td>
                        <td><?= esc($u['created_at'] ?? '2025-01-01 00:00:00'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center;"><?= ($lang === 'en') ? 'No users found.' : 'No hay usuarios registrados.'; ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>
    
    <div>
        <?= $pager->links(); ?>
    </div>

</body> 
</html>