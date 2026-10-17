<?php
$lang  = session()->get('lang') ?? 'es';
$title = ($lang === 'en') ? 'Edit profile' : 'Editar perfil';
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
        <h2><?= ($lang === 'en') ? 'Edit profile' : 'Editar perfil'; ?></h2>

        <form action="<?= base_url('/perfil/guardar'); ?>" method="post">
      
            <div style="margin-bottom: 15px;">
           <label for="nombre"><strong><?= ($lang === 'en') ? 'name' : 'nombre'; ?></strong></label><br>
             <input type="text" id="nombre" name="nombre" value="<?= esc($usuario['nombre']) ?>" required>
                    </div>

            
                <div style="margin-bottom: 20px;">
                    <label for="correo"><strong><?= ($lang === 'en') ? 'email' : 'correo'; ?></strong></label><br>
                    <input type="email" id="correo" name="correo" value="<?= esc($usuario['correo']) ?>" required>
                         </div>

           
            <div style="display: flex; align-items: center; gap: 10px;">
             <button type="submit"><?= ($lang === 'en') ? 'Save' : 'Guardar'; ?></button>
          <a href="<?= base_url('/perfil'); ?>"><?= ($lang === 'en') ? 'Cancel' : 'Cancelar'; ?></a>
                           </div>
               
        </form>
    </main>

</body>
</html>