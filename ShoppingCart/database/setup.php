<?php

/**
 * Set up your database
 *
 * Run: `cd <PROJECT_ROOT>/database && php setup.php`
 */

include_once 'ConnectionManager.php';
include_once '../data/items.php';

$db = ConnectionManager::db();

$db->exec("
CREATE TABLE items (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    price INT
);
");

$statement = $db->prepare("INSERT INTO items (`id`, `name`, `price`) VALUES (?, ?, ?)");

$allItems = getAllItems();
foreach ($allItems as ['id' => $id, 'name' => $name, 'price' => $price]) {
    $statement->execute([$id, $name, $price]);
}
