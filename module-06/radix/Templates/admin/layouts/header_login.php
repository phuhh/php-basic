<?php defined('_ACCESS_DENIED') or die('Access Denied !!!') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= _WEB_HOST_ROOT ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= !empty($data['pageTitle']) ? trim($data['pageTitle']) : false ?></title>
    <link rel="stylesheet" href="<?= _ADMIN_HOST_TEMPLATES ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= _ADMIN_HOST_TEMPLATES ?>/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= _ADMIN_HOST_TEMPLATES ?>/assets/css/style.css?v=<?= rand() ?>">
</head>

<body>