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
   body { font-family: sans-serif; margin: 0; }

 .nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 18px 24px;
  background: #f8f9fa;
  border-bottom: 1px solid #dee2e6;
}
.nav a { text-decoration: none; color: #333; margin: 0 8px; }
.nav a.home { color: #007bff; font-weight: bold; margin-left: 0; }
.nav .sep { color: #555; }

  .content { text-align: center; margin-top: 60px; padding: 0 20px; }
  .content h1 { font-size: 2.2em; font-weight: bold; margin-bottom: 15px; }
   .content p { color: #333; font-size: 1.1em; }
</style>
</head>
<body> 
    
<div class="nav">
  <div>
    <a href="<?= site_url('/') ?>" class="home"><?= $txtHome ?></a>
    <a href="<?= site_url('idioma/en') ?>"><?= $txtEnglish ?></a>
    <span class="sep">|</span>
    <a href="<?= site_url('idioma/es') ?>"><?= $txtSpanish ?></a>
  </div>

  <div>
    <a href="<?= site_url('registro') ?>"><?= $txtSignup ?></a>
    <span class="sep">|</span>
    <a href="<?= site_url('login') ?>"><?= $txtLogin ?></a>
  </div>
         </div>

    <div class="content">
        <h1><?= $txtWelcome ?></h1>
        <p><?= $txtDesc ?></p>
    </div>

</body>
</html>  