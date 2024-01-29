<?php

session_start();

include_once '../database/ConnectionManager.php';
include_once '../models/ItemRepository.php';
include_once '../features/cart.php';

function render() {
    $repo = new ItemRepository(ConnectionManager::db());

    $allItems = $repo->select();
    $cart = getCart();

    include '../templates/pages/index.php';
}

render();
