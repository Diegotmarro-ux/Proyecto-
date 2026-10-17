<?php $lang = session()->get('lang') ?? 'es'; ?>
<!DOCTYPE html>
<html lang="<?= $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?= ($lang === 'en') ? 'Tasks' : 'Tareas'; ?></title>
</head>
<body>

   
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
            <a href="<?= ((int)session()->get('administrador') === 1) ? base_url('/maestra'): base_url('/estudiante'); ?>"><?= ($lang === 'en') ? 'Home' : 'Inicio'; ?></a> |
            <a href="<?= base_url('idioma/en'); ?>">English</a> | 
            <a href="<?= base_url('idioma/es'); ?>">Español</a>
        </div>
        <div>
            <a href="<?= base_url('perfil'); ?>"><?= ($lang === 'en') ? 'Profile' : 'Perfil'; ?></a> |
            <?php if ((int)session()->get('administrador') === 1): ?>
               <a href="<?= base_url('usuarios'); ?>"><?= ($lang === 'en') ? 'Users' : 'Usuarios'; ?></a> | 
               <?php endif; ?>
            <strong><?= ($lang === 'en') ? 'Tasks' : 'Tareas'; ?></strong> | 
            <a href="<?= base_url('logout'); ?>"><?= ($lang === 'en') ? 'Log out' : 'Cerrar Sesión'; ?></a> 
        </div>
    </div>

    <h2><?= ($lang === 'en') ? 'Tasks' : 'Tareas'; ?></h2>

   <?php if (session()->get('administrador') == '1'): ?>
    <a href="<?= base_url('tareas/nueva'); ?>">
        <button type="button"><?= ($lang === 'en') ? 'New Task' : 'Nueva Tarea'; ?></button>
    </a>
    <br><br>
    <?php endif; ?> 
   
    <form action="<?= base_url('tareas'); ?>" method="get" style="margin-bottom: 20px;">
        <input type="text" id="search" name="search" value="<?= esc($search ?? ''); ?>">
        <button type="submit">Buscar🔍</button>
        <?php if (!empty($search)): ?>
            <a href="<?= base_url('tareas'); ?>"><?= ($lang === 'en') ? 'Clear' : 'Limpiar'; ?></a>
        <?php endif; ?>
    </form>

    <div style="line-height: 2;">
        <?php if (!empty($tareas) && is_array($tareas)): ?>
            <?php foreach ($tareas as $t): ?>
                <div>
                    <a href="<?= base_url('tareas/ver/' . $t['CodTarea']); ?>">
                        <?= esc($t['titulo']); ?>
                    </a>
                </div>
                 <?php endforeach; ?>
            <?php else: ?>
                   <p><?= ($lang === 'en') ? 'No tasks found.' : 'No se encontraron tareas.'; ?></p>

                   <?php endif; ?>
                </div>
        

    <br>

  
    <div>
        <a href="<?= base_url('tareas?order=DESC' . (!empty($search) ? '&search=' . esc($search) : '')); ?>">
            <button type="button" <?= ($order === 'DESC') ? 'disabled' : ''; ?>><?= ($lang === 'en') ? 'Newer' : 'Más recientes'; ?></button>
        </a>
        <a href="<?= base_url('tareas?order=ASC' . (!empty($search) ? '&search=' . esc($search) : '')); ?>">
            <button type="button" <?= ($order === 'ASC') ? 'disabled' : ''; ?>><?= ($lang === 'en') ? 'Older' : 'Más antiguas'; ?></button>
        </a>
    </div>

</body>
</html> 