<?php

include_once '../data/items.php';
include_once '../database/ConnectionManager.php';
include_once '../models/ItemRepository.php';


function render() {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    $repo = new ItemRepository(ConnectionManager::db());

    $item = $id === false ? null : $repo->selectById($id);
    if (is_null($item)) {
        echo '找不到該商品，<a href="/">回首頁</a>';
        exit();
    }

    include '../templates/pages/view.php';
}

render();
