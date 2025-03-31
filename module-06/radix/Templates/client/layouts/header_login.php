<?php defined('_ACCESS_DENIED') or die('Access Denied !!!') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= _WEB_HOST_ROOT ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= !empty($data['pageTitle']) ? trim($data['pageTitle']) : false ?></title>
    <link rel="stylesheet" href="<?= _WEB_HOST_TEMPLATES ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= _WEB_HOST_TEMPLATES ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= _WEB_HOST_TEMPLATES ?>/css/style.css?v=<?= rand() ?>">
</head>

<body>