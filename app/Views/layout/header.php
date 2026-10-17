<?php
$lang    = session()->get('lang') ?? 'es';
$nombre  = session()->get('nombre') ?? 'Usuario';
$isAdmin = (int)session()->get('administrador') === 1;


$txtGreeting = ($lang === 'en') ? 'Hello' : 'Hola';
$txtHome     = ($lang === 'en') ? 'Home' : 'Inicio';
$txtProfile  = ($lang === 'en') ? 'Profile' : 'Perfil';
$txtUsers    = ($lang === 'en') ? 'Users' : 'Usuarios';
$txtTasks    = ($lang === 'en') ? 'Tasks' : 'Tareas';
$txtLogout   = ($lang === 'en') ? 'Log out' : 'Cerrar sesión';

$txtEnglish  = ($lang === 'en') ? 'English' : 'Inglés';
$txtSpanish  = ($lang === 'en') ? 'Spanish' : 'Español';

$homeUrl = $isAdmin ? base_url('/maestra') : base_url('/estudiante');
?>
<?php if (session()->getFlashdata('mensaje')): ?>
    <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 12px; margin: 15px; border-radius: 6px; font-weight: bold;">
        <?= session()->getFlashdata('mensaje') ?>
    </div>
<?php endif; ?>

<nav style="display: flex; justify-content: space-between; align-items: center; background-color: #f8f9fa; padding: 12px 25px; border-bottom: 2px solid #e9ecef; font-family: sans-serif;">
    <div>
        <a href="<?= $homeUrl ?>" style="margin-right: 15px; text-decoration: none; color: #007bff; font-weight: bold;"><?= $txtHome ?></a>
        <a href="<?= site_url('idioma/en') ?>" style="margin-right: 10px; text-decoration: none; color: #333;"><?= $txtEnglish ?></a> | 
        <a href="<?= site_url('idioma/es') ?>" style="margin-left: 10px; text-decoration: none; color: #333;"><?= $txtSpanish ?></a>
    </div>

    <div>
        <span style="margin-right: 15px; font-size: 1.1em;">
            <?= $txtGreeting ?>, <strong><?= esc($nombre) ?></strong>
        </span>
        
        <a href="<?= base_url('/perfil') ?>" style="margin-right: 12px; text-decoration: none; color: #333;"><?= $txtProfile ?></a> |
        
        <?php if ($isAdmin): ?>
            <a href="<?= base_url('/usuarios') ?>" style="margin: 0 12px; text-decoration: none; color: #333;"><?= $txtUsers ?></a> |
        <?php endif; ?>

        <a href="<?= base_url('/tareas') ?>" style="margin: 0 12px; text-decoration: none; color: #333;"><?= $txtTasks ?></a> |
        
        <a href="<?= base_url('/logout') ?>" style="margin-left: 12px; text-decoration: none; color: #dc3545; font-weight: bold;"><?= $txtLogout ?></a>
    </div>
</nav>