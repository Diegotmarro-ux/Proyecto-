<?php $lang = session()->get('lang') ?? 'es'; ?>
<!DOCTYPE html>
<html lang="<?= $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?= ($lang === 'en') ? 'New Task' : 'Nueva Tarea'; ?></title>
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
            <a href="<?= base_url('usuarios'); ?>"><?= ($lang === 'en') ? 'Users' : 'Usuarios'; ?></a> | 
            <a href="<?= base_url('tareas'); ?>"><strong><?= ($lang === 'en') ? 'Tasks' : 'Tareas'; ?></strong></a> | 
            <a href="<?= base_url('logout'); ?>"><?= ($lang === 'en') ? 'Log out' : 'Cerrar Sesión'; ?></a>
        </div>
    </div>

    <h2><?= ($lang === 'en') ? 'New Task' : 'Nueva Tarea'; ?></h2>

    <
    <?php if (session()->getFlashdata('errors')): ?>
        <div style="color: red;">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

    <?php endif; ?> 

    <form action="<?= base_url('tareas/crear'); ?>" method="post">
        <div>
            <label for="descripcion"><?= ($lang === 'en') ? 'Description' : 'Descripción'; ?></label><br>
            <input type="text" id="descripcion" name="descripcion" value="<?= esc(old('descripcion')); ?>" required style="width: 380px;">
        </div>
        <br>
        <div style="display: flex; align-items: center; gap: 10px;">
            <button type="submit"><?= ($lang === 'en') ? 'Send' : 'Guardar'; ?></button>
            <a href="<?= base_url('tareas'); ?>"><?= ($lang === 'en') ? 'Cancel' : 'Cancelar'; ?></a>
        </div>
    </form>

</body>
</html>