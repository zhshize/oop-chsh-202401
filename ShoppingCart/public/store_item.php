<?php

include_once '../database/ConnectionManager.php';
include_once '../models/ItemRepository.php';

$repo = new ItemRepository(ConnectionManager::db());

$name = htmlspecialchars($_POST['name']);
$price = filter_var($_POST['amount'], FILTER_VALIDATE_INT, [
    'options' => [
        'min_range' => 1,
    ],
]);

if ($name === false || $price === false) {
    echo '上架商品時發生錯誤，<a href="/">回首頁</a>';
    exit();
}

$repo->insert($name, $price);
header('Location: ' . '/');
exit();
