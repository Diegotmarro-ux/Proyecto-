<?php
$lang    = session()->get('lang') ?? 'es';
$title   = ($lang === 'en') ? 'Student Dashboard - School Tasks' : 'Panel Estudiante - Tareas Escolares';
$welcome = ($lang === 'en') ? 'Welcome' : 'Bienvenido/a';
$desc    = ($lang === 'en') ? 'Main dashboard for students.' : 'Panel principal para Estudiantes.';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body style="margin: 0; font-family: sans-serif;">

    <?= $this->include('layout/header') ?>

    <main style="padding: 30px;">
        <h1><?= $welcome ?></h1>
        <p><?= $desc ?></p>
    </main>

</body>
</html> 