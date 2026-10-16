<?php $lang = session()->get('lang') ?? 'es'; ?>

<!DOCTYPE html>
<html lang="<?= $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?= ($lang === 'en') ? 'Task' : 'Tarea'; ?></title>
</head>
<body>

    <!-- Navegación superior -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
            <a href="<?= (session()->get('administrador') == 1) ? base_url('/maestra') : base_url('/estudiante'); ?>"><?= ($lang === 'en') ? 'Home' : 'Inicio'; ?></a> | 
            <a href="<?= base_url('idioma/en'); ?>">English</a> | 
            <a href="<?= base_url('idioma/es'); ?>">Español</a>
        </div>
        <div>
            <?= ($lang === 'en') ? 'Hello,' : 'Hola,'; ?> <?= esc(session()->get('nombre')); ?> | 
            <a href="<?= base_url('perfil'); ?>"><?= ($lang === 'en') ? 'Profile' : 'Perfil'; ?></a> | 
            <?php if (session()->get('administrador') == 1): ?>
                <a href="<?= base_url('usuarios'); ?>"><?= ($lang === 'en') ? 'Users' : 'Usuarios'; ?></a> | 
            <?php endif; ?>
            <a href="<?= base_url('tareas'); ?>"><strong><?= ($lang === 'en') ? 'Tasks' : 'Tareas'; ?></strong></a> | 
            <a href="<?= base_url('logout'); ?>"><?= ($lang === 'en') ? 'Log out' : 'Cerrar Sesión'; ?></a>
        </div>
    </div>

    
    <h2><?= ($lang === 'en') ? 'Task' : 'Tarea'; ?></h2>

    
    <p>
        <a href="<?= base_url('tareas'); ?>">
            &lt;&lt; <?= ($lang === 'en') ? 'back to index' : 'volver al índice'; ?>
        </a>
    </p>

    <
    <div> 
        <p style="margin-bottom: 2px;"><strong>Tarea Num</strong></p>
        <p style="margin-top: 0; margin-left: 20px;"><?= esc($tarea['CodTarea']); ?></p>

        <p style="margin-bottom: 2px;"><strong><?= ($lang === 'en') ? 'Description' : 'Descripción'; ?></strong></p>
        <p style="margin-top: 0; margin-left: 20px;"><?= esc($tarea['descripcion']); ?></p>

        <p style="margin-bottom: 2px;"><strong><?= ($lang === 'en') ? 'Created at' : 'Creado el'; ?></strong></p>
        <p style="margin-top: 0; margin-left: 20px;"><?= esc($tarea['created_at'] ?? 'N/A'); ?></p>

        <p style="margin-bottom: 2px;"><strong><?= ($lang === 'en') ? 'Updated at' : 'Actualizado el'; ?></strong></p>
        <p style="margin-top: 0; margin-left: 20px;"><?= esc($tarea['updated_at'] ?? 'N/A'); ?></p>
    </div>

    <br>

   
    <?php if (session()->get('administrador') == 1): ?>
        <div>
            <a href="<?= base_url('tareas/editar/' . $tarea['CodTarea']); ?>"><?= ($lang === 'en') ? 'Edit' : 'Editar'; ?></a>
            &nbsp;&nbsp;
            <a href="<?= base_url('tareas/eliminar/' . $tarea['CodTarea']); ?>" onclick="return confirm('<?= ($lang === 'en') ? 'Are you sure?' : '¿Estás seguro?'; ?>');">
                <?= ($lang === 'en') ? 'Delete' : 'Eliminar'; ?>
            </a>
        </div>
    <?php endif; ?>

</body>
</html>