<?php
$lang = session()->get('lang') ?? $lang ?? 'es';
$txtTitle    = ($lang === 'en') ? 'Welcome - School Tasks' : 'Bienvenida - Tareas Escolares';
$txtHome     = ($lang === 'en') ? 'Home' : 'Inicio';
$txtEnglish  = ($lang === 'en') ? 'English' : 'Inglés';
$txtSpanish  = ($lang === 'en') ? 'Spanish' : 'Español';
$txtSignup   = ($lang === 'en') ? 'Sign up' : 'Registrarse';
$txtLogin    = ($lang === 'en') ? 'Log in' : 'Iniciar sesión';
$txtWelcome  = ($lang === 'en') ? 'Welcome!' : '¡Bienvenido/a!';
$txtDesc     = ($lang === 'en') 
    ? 'to the school task management system.' 
    : 'al sistema de gestión de tareas escolares.';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8"> 
    <title><?= $txtTitle ?></title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .nav { display: flex; justify-content: space-between; border-bottom: 1px solid #e0e0e0; padding-bottom: 15px; }
        .nav a { text-decoration: none; color: #333; margin: 0 5px; }
        .nav a.home { color: #007bff; font-weight: bold; margin-right: 10px; margin-left: 0; }
        .content { text-align: center; margin-top: 60px; }
        .content h1 { font-size: 2.2em; font-weight: bold; margin-bottom: 15px; }
        .content p { color: #333; font-size: 1.1em; }
    </style>
</head>
<body> 

   <div class="nav">
        <div>
        <a href="<?= site_url('/') ?>"><?= $txtHome ?></a>
            <a href="<?= site_url('idioma/en') ?>"><?= $txtEnglish ?></a> |
            <a href="<?= site_url('idioma/es') ?>"><?= $txtSpanish ?></a>
        </div>

        <div>
           <a href="<?= site_url('registro') ?>"><?= $txtSignup ?></a> |
            <a href="<?= site_url('login') ?>"><?= $txtLogin ?></a>
        </div>
    </div> 

    <div class="content">
        <h1><?= $txtWelcome ?></h1>
        <p><?= $txtDesc ?></p>
    </div>

</body>
</html> 