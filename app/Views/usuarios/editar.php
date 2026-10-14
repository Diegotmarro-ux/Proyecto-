<?php $lang = session()->get('lang') ?? 'es'; ?>
<!DOCTYPE html>
<html lang="<?= $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?= ($lang === 'en') ? 'Edit user' : 'Editar usuario'; ?></title>
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

    <h2><?= ($lang === 'en') ? 'Edit user' : 'Editar usuario'; ?></h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <div style="color: red;">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('usuarios/actualizar/' . $usuario['codusuario']); ?>" method="post">
        <div>
            <label for="nombre"><?= ($lang === 'en') ? 'Name' : 'Nombre'; ?></label><br>
            <input type="text" id="nombre" name="nombre" value="<?= esc(old('nombre', $usuario['nombre'])); ?>" required style="width: 300px;">
        </div>
        <br>
        <div>
            <label for="correo"><?= ($lang === 'en') ? 'email' : 'Correo'; ?></label><br>
            <input type="email" id="correo" name="correo" value="<?= esc(old('correo', $usuario['correo'])); ?>" required style="width: 300px;">
        </div>
        <br>
        <div>
            <label for="password"><?= ($lang === 'en') ? 'Password' : 'Contraseña'; ?></label><br>
            <input type="password" id="password" name="password" style="width: 300px;">
        </div>
        <br>
        <div>
            <label for="repeat_password"><?= ($lang === 'en') ? 'Repeat password' : 'Repetir contraseña'; ?></label><br>
            <input type="password" id="repeat_password" name="repeat_password" style="width: 300px;">
        </div>
        <br>
        <div>
            <input type="checkbox" id="active" name="active" value="1" <?= ((int)$usuario['verificado'] === 1) ? 'checked' : ''; ?>>
            <label for="active"><?= ($lang === 'en') ? 'Active' : 'Activo'; ?></label>
        </div>
        <br>
        <div>
            <input type="checkbox" id="administrator" name="administrator" value="1" <?= ((int)$usuario['administrador'] === 1) ? 'checked' : ''; ?>>
            <label for="administrator"><?= ($lang === 'en') ? 'Administrator' : 'Administrador'; ?></label>
        </div>
        <br>
        <div style="display: flex; align-items: center; gap: 10px;">
            <button type="submit"><?= ($lang === 'en') ? 'Save' : 'Guardar'; ?></button>
            <a href="<?= base_url('usuarios/ver/' . $usuario['codusuario']); ?>"><?= ($lang === 'en') ? 'Cancel' : 'Cancelar'; ?></a>
        </div>
    </form>

</body>
</html>