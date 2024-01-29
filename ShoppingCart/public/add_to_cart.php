<?php

session_start();

include_once '../database/ConnectionManager.php';
include_once '../models/ItemRepository.php';

$id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
$amount = filter_var($_POST['amount'], FILTER_VALIDATE_INT, [
    'options' => [
        'min_range' => 1,
        'max_range' => 20
    ],
]);

if ($id === false || $amount === false) {
    echo '將商品放入購物車時發生錯誤，<a href="/">回首頁</a>';
    exit();
}

$repo = new ItemRepository(ConnectionManager::db());

$item = $id === false ? null : $repo->selectById($id);
if (is_null($item)) {
    echo '找不到該商品，<a href="/">回首頁</a>';
    exit();
}

include_once '../features/cart.php';

addToCart($item, $amount);
header('Location: ' . '/');
exit();
