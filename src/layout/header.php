<?php

if(!function_exists('getTitle')) {
    function getTitle() {
        return SITE_TITLE;
    }
}

?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= getTitle(); ?></title>

    <link rel="stylesheet" href="<?= getHomeURL('src/layout/style.css'); ?>">
    <?php if(file_exists('src/layout/module/' . loadedModule() . '/style.css')): ?>
    <link rel="stylesheet" href="src/layout/module/<?= loadedModule(); ?>/style.css">
    <?php endif; ?>
</head>
<body>
<?php include_once('navbar.php'); ?>