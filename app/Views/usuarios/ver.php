<?php $lang = session()->get('lang') ?? 'es'; ?>
<!DOCTYPE html>
<html lang="<?= $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?= ($lang === 'en') ? 'User' : 'Usuario'; ?></title>
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
            <a href="<?= base_url('usuarios'); ?>"><strong><?= ($lang === 'en') ? 'Users' : 'Usuarios'; ?></strong></a> | 
            <a href="<?= base_url('logout'); ?>"><?= ($lang === 'en') ? 'Log out' : 'Cerrar Sesión'; ?></a>
        </div>
    </div>

    <h2><?= ($lang === 'en') ? 'User' : 'Usuario'; ?></h2>

    <a href="<?= base_url('usuarios'); ?>">&lt;&lt; <?= ($lang === 'en') ? 'back to index' : 'volver al índice'; ?></a>
    <br><br>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <p style="color: green; font-weight: bold;"><?= session()->getFlashdata('mensaje'); ?></p>
    <?php endif; ?>

    <div style="line-height: 1.8;">
        <strong><?= ($lang === 'en') ? 'name' : 'Nombre'; ?>:</strong><br>
        <?= esc($usuario['nombre']); ?><br><br>

        <strong><?= ($lang === 'en') ? 'email' : 'Correo'; ?>:</strong><br>
        <?= esc($usuario['correo']); ?><br><br>

        <strong><?= ($lang === 'en') ? 'active' : 'Activo'; ?>:</strong><br>
        <?= ((int)$usuario['verificado'] === 1) ? (($lang === 'en') ? 'yes' : 'sí') : 'no'; ?><br><br>

        <strong><?= ($lang === 'en') ? 'Administrator' : 'Administrador'; ?>:</strong><br>
        <?= ((int)$usuario['administrador'] === 1) ? (($lang === 'en') ? 'Yes' : 'Sí') : 'No'; ?><br><br>

        <strong><?= ($lang === 'en') ? 'Created at' : 'Creado el'; ?>:</strong><br>
        <?= esc($usuario['created_at'] ?? '2026-10-16 09:05:55'); ?><br><br>

        <strong><?= ($lang === 'en') ? 'Updated at' : 'Actualizado el'; ?>:</strong><br>
        <?= esc($usuario['updated_at'] ?? $usuario['created_at'] ?? '2026-10-21 03:05:55'); ?><br><br>

        <a href="<?= base_url('usuarios/editar/' . $usuario['codusuario']); ?>"><?= ($lang === 'en') ? 'Edit' : 'Editar'; ?></a>
        &nbsp;&nbsp;
        <a href="<?= base_url('usuarios/eliminar/' . $usuario['codusuario']); ?>" onclick="return confirm('<?= ($lang === 'en') ? 'Are you sure?' : '¿Estás seguro?'; ?>');" style="color: red;">
            <?= ($lang === 'en') ? 'Delete' : 'Eliminar'; ?>
        </a>
    </div>

</body>
</html>