<?php $lang = session()->get('lang') ?? 'es'; ?>

<!DOCTYPE html>
<html lang="<?= $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?= ($lang === 'en') ? 'Users' : 'Usuarios'; ?></title>
</head>
<body style="margin: 0; font-family: sans-serif;">
  <?= $this->include('layout/header') ?>
      
  <main style="padding: 30px;">


    <h2><?= ($lang === 'en') ? 'Users' : 'Usuarios'; ?></h2>

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
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($usuarios) && is_array($usuarios)): ?>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        
                    <td>
                        <a href="<?= base_url('usuarios/ver/' . $u['codusuario']); ?>">
                        <?= esc($u['nombre']); ?>
                
                           </a>
                      </td>
                        <td><?= esc($u['correo']); ?></td>
                        <td><?= ((int)$u['verificado'] === 1) ? 'Sí' : 'No'; ?></td>
                        <td><?= ((int)$u['administrador'] === 1) ? 'Sí' : 'No'; ?></td>
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
    </main>

</body> 
</html>