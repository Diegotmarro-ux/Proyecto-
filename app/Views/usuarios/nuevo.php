<?php $lang = session()->get('lang') ?? 'es'; ?>
<!DOCTYPE html>
<html lang="<?= $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?= ($lang === 'en') ? 'New User' : 'Nuevo Usuario'; ?></title>
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
            <a href="<?= base_url('logout'); ?>"><?= ($lang === 'en') ? 'Log out' : 'Cerrar Sesión'; ?></a>
        </div>
    </div>

    <h2><?= ($lang === 'en') ? 'New User' : 'Nuevo Usuario'; ?></h2>

    <a href="<?= base_url('usuarios'); ?>">&lt;&lt; <?= ($lang === 'en') ? 'back to index' : 'volver al índice'; ?></a>
    <br><br>

    <?php if (session()->getFlashdata('errors')): ?>
        <div style="color: red;">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('usuarios/guardar'); ?>" method="post">
        <div>
            <label for="nombre"><?= ($lang === 'en') ? 'Name' : 'Nombre'; ?></label><br>
            <input type="text" id="nombre" name="nombre" value="<?= old('nombre'); ?>" required style="width: 300px;">
        </div>
        <br>
        <div>
            <label for="correo"><?= ($lang === 'en') ? 'email' : 'Correo'; ?></label><br>
            <input type="email" id="correo" name="correo" value="<?= old('correo'); ?>" required style="width: 300px;">
        </div>
        <br>
        <div>
            <label for="password"><?= ($lang === 'en') ? 'Password' : 'Contraseña'; ?></label><br>
            <input type="password" id="password" name="password" required style="width: 300px;">
        </div>
        <br>
        <div>
            <label for="repeat_password"><?= ($lang === 'en') ? 'Repeat password' : 'Repetir contraseña'; ?></label><br>
            <input type="password" id="repeat_password" name="repeat_password" required style="width: 300px;">
        </div>
        <br>
        <div style="display: flex; align-items: center; gap: 10px;">
            <button type="submit"><?= ($lang === 'en') ? 'Save' : 'Guardar'; ?></button>
            <a href="<?= base_url('usuarios'); ?>"><?= ($lang === 'en') ? 'Cancel' : 'Cancelar'; ?></a>
        </div>
    </form>

</body>
</html>