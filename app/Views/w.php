<?php
$lang = $lang ?? 'es';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($lang == 'en') ? 'Welcome - School Tasks' : 'Bienvenida - Tareas Escolares'; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .nav { display: flex; justify-content: space-between; border-bottom: 1px solid #ccc; padding-bottom: 10px; }
        .nav a { margin-right: 10px; text-decoration: none; color: #000; }
        .content { text-align: center; margin-top: 50px; }
    </style>
</head>
<body> 

   <div class="nav">
        <div>
            <a href="<?php echo base_url('/'); ?>">Home</a>
            <a href="?lang=en">English</a>
            <a href="?lang=es">Español</a>
        </div>
        <div>
            <a href="<?php echo base_url('registro'); ?>"><?php echo ($lang == 'en') ? 'Sign up' : 'Registrarse'; ?></a>
            <a href="<?php echo base_url('login'); ?>"><?php echo ($lang == 'en') ? 'Log in' : 'Iniciar sesión'; ?></a>
        </div>
    </div>

    <div class="content">
        <h1><?php echo ($lang == 'en') ? 'Welcome' : '¡Bienvenido!'; ?></h1>
        <p><?php echo ($lang == 'en') ? 'Welcome to the school task management system.' : 'Bienvenido al sistema de gestión de tareas escolares.'; ?></p>
    </div>

</body>
</html>